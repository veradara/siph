<!-- Home -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<form action="<?= base_url('public/emergency/save_process'); ?>" method="post" enctype="multipart/form-data">
				<div class="cart_container">
					<div class="cart_title">Emergency Pets</div>
					<div class="cart_items">
						<ul class="cart_list">
							<li class="cart_item clearfix">
								<table class="table">
									<tr>
										<td>Description</td>
										<td>
											<div class="product_quantity clearfix">
												<textarea name="description" class="form-control" rows="12" cols="40"></textarea>
											</div>
										</td>											
									</tr>
									<tr>
										<td>Alamat</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="" name="address">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Priority</td>
										<td>
											<div class="product_quantity clearfix">
												<select name="priority" class="form-control">
													<option value="high">high</option>
													<option value="low">low</option>
													<option value="medium">medium</option>
												</select>
											</div>
										</td>											
									</tr>
									<tr>
										<td>Pets</td>
										<td>
											<div class="product_quantity clearfix">
												<select name="hewan" class="form-control">
													<option value="Kucing">Kucing</option>
													<option value="Anjing">Anjing</option>
													
												</select>
											</div>
										</td>											
									</tr>
									<tr>
										<td>Location</td>
										<td>
											<a onclick="getLocation()" class="button cart_button_checkout" >Get Location</a>									
											<p id="demo"></p>
											Latitude &nbsp;&nbsp; : <input type="text" class="form-control" value="" name="latitude" id="latitude" readonly="readonly"> <br>
											<hr>
											Longitude : <input type="text" value="" class="form-control" name="longitude" id="longitude" readonly="readonly"> <br>
										</td>											
									</tr>

								</table>
							</li>
						</ul>
					</div>	
					<!-- Order Total -->	
				</div>
				<hr>
				<div class="button_container">
					<button type="submit" id="submit" class="button cart_button_checkout" >Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
	document.getElementById("latitude").value = position.coords.latitude; 
	document.getElementById("longitude").value = position.coords.longitude; 
	x.innerHTML = "Your location detected.";
}
</script>




	




