<?php 	
session_start();
require_once('./connect.php');
require_once('./random_number_generator.php');

// Get all details of order
$user_id = $_SESSION['user']['id'];
$purchase_date = date('Y-m-d G:1:s');
$status_id = 1;
$payment_mode_id = $_POST['paymentMethod'];
$shipping_id = $_POST['shipping'];
$billing_id = $_POST['billing'];

// Generate new transaction number
$transaction_number = referenceNumberGenerator();

// Create new order

$sql = "INSERT INTO orders (user_id, transaction_number, timestamp, status_id, payment_mode_id, shipping_id, billing_id) VALUES ('$user_id', '$transaction_number', '$purchase_date', '$status_id', '$payment_mode_id', '$shipping_id', '$billing_id')";

$result = mysqli_query($conn, $sql);

// Get mew prder ID to associate items with
$new_order_id = mysqli_insert_id($conn);

if ($result) {
	foreach ($_SESSION['cart'] as $item_id => $quantity) {
	// Get price of current item
		$sql = "SELECT item_price FROM items WHERE id = '$item_id'";
		$result = mysqli_query($conn, $sql);
		$item = mysqli_fetch_assoc($result);

		// Create new order_item
		$sql = "INSERT INTO order_items (order_id, item_id, quantity, price) VALUES ('$new_order_id', '$item_id', '$quantity', '".$item['item_price']."')";
		mysqli_query($conn, $sql);
	}
}

// Clear items from shopping cart
$_SESSION['cart'] = [];
header("location: confirmation_page.php?id=$user_id");

// Send confirmation email to customer
//==========================================================================================================
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'michanismos@gmail.com';                 // SMTP username
    $mail->Password = 'Today123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('michanismos@gmail.com', 'Michanismos Support');
    $mail->addAddress('jrasalonga@gmail.com');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '  Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}