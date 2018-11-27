// cart.php
function amount(id) {
	let itemQuantity = document.querySelector(`#itemQuantity${id}`).value;
	let itemPrice = document.querySelector(`#price${id}`).innerHTML;
	document.querySelector(`#subTotal${id}`).innerHTML = itemQuantity * itemPrice;

	// getTotal Amount
	getTotal();


	// call ajax
	$.ajax({
		type: 'POST', // Define method: POST or GET
		url: '../../controllers/update_cart.php', // Define action: php url
		data: {
			'item_id': id,
			'item_quantity': itemQuantity
		}, // Data to be passed
		success: (data) => {
			/*console.log(data);*/
			document.querySelector('#itemCount').textContent = data;
		}
	});
}


/* total of subtotal */
function getTotal() {
	let subTotalList = document.querySelectorAll('[id^="subTotal"]');
	// console.log(subTotalList);

	let totalOfSubTotal = 0;
	subTotalList.forEach((item) => {
		let itemSubTotal = parseInt(item.innerHTML);
		// console.log(itemSubTotal);
		totalOfSubTotal = totalOfSubTotal + itemSubTotal;
	});
	console.log(totalOfSubTotal);
	document.querySelector('#totalOfSubTotal').textContent = totalOfSubTotal;
}

// catalog.php
function addCart(item_id) {
	console.log(item_id);

	$.ajax({
		type: 'POST', // Define method: POST or GET
		url: '../../controllers/update_cart.php', // Define action: php url
		data: {
			'item_id': item_id,
			'item_quantity': 1
		}, // Data to be passed
		success: (data) => {
			document.querySelector('#itemCount').textContent = data;
		}
	});
}


/* delete/remove item */
function removeItem(id) {


	$.ajax({
		type: 'POST', // Define method: POST or GET
		url: '../../controllers/delete_item.php', // Define action: php url
		data: {
			'item_id': id
		}, // Data to be passed
		success: (data) => {
			// console.log(data);
			document.querySelector('#itemCount').textContent = data;

			removeElement("itemRow" + id);

			getTotal();
		}
	});
	
}

/* removing an element using JS */
function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    console.log(elementId);
    element.parentNode.removeChild(element);
}

/* ajax to display cities under province */
$('#province').on('change', e => {
	let province_code = $('#province').val();

	$.ajax ({
		type: 'POST',
		url: '../../controllers/get_municipalities.php',
		data: {
			province_code: province_code
		},
		success: (data) => {
			// console.log(JSON.parse(data));
			const city = JSON.parse(data);
			$('#city').html('<option value=""></option>');
			$.each(JSON.parse(data), function(k, city){
				$('#city').append('<option value="'+ city[3] +'" >'+ city[1] +'</option>');
			});

		}
	})
});

$('#city').on('change', e => {
	let city_municipality_code = $('#city').val();

	$.ajax ({
		type: 'POST',
		url: '../../controllers/get_barangay.php',
		data: {
			city_municipality_code: city_municipality_code
		},
		success: (data) => {
			const city = JSON.parse(data);
			$('#barangay').html('<option value=""></option>');
			$.each(JSON.parse(data), function(k, barangay){
				$('#barangay').append('<option value="'+ barangay[0] +'" >'+ barangay[1] +'</option>');
			});
		}
	})
});


previewImg = () => {
	let imgInput = document.querySelector('#imgPreview');
	let imgElement = document.querySelector('#itemImage');

	let readImg = new FileReader();

	readImg.onload = function () {
		imgElement.src = readImg.result;
	}

	readImg.readAsDataURL(imgInput.files[0]);

	console.log("connected");
}
