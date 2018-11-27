	// echo "<tr class='text-center'>";
								
								// echo '<td><img src="' . $item['image'] . '"></td>';
								
								// echo '<td>' . $item['item_name'] . '</td>';
								
								// echo '<td id="itemPrice'.$item['id'].'">' . $item['item_price'] . '</td>';
								
								// echo '<td> <input id="itemQuantity'.$item['id'].'" type="number" name="quantity" value="' . $quantity . '" min="1" max="99" onchange="computeSubtotal('.$item['id'].')"></td>';
								
								// echo '<td id="itemSubtotal'.$item['id'].'">' . $item['item_price'] * $quantity . '</td>';
								
								// echo "</tr>";




								<div class="col-md-4">
									<div class="card my-3">
										<img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Card image cap">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row['item_name']; ?></h5>
											<h5 class="card-title">PHP <?php echo $row['item_price'];?></h5>
											<p class="card-text itemDescription"><?php echo $row['item_description'];?></p>
										</div>
										<div class="card-footer view-item-btn">
											<a href="#" class="btn btn-primary">Add To Cart</a>
										</div>
									</div>
								</div>


								<!-- backup of catalog -->

								echo '<div class="col-md-4">
						<div class="card my-3">
						<img class="card-img-top" src="' . $row['image'] . '" alt="Card image cap">
						<div class="card-body">
						<h5 class="card-title">'. $row['item_name'] .'</h5>
						<h5 class="card-title">PHP '. $row['item_price'] .'</h5>
						<p class="card-text itemDescription">'. $row['item_description'] .'</p>
						</div>
						<div class="card-footer view-item-btn">
						<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
						</div>
						</div>
						';