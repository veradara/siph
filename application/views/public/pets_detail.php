<!-- Single Product -->
	<!-- Home -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/product_responsive.css">


	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<!-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
					</ul>
				</div> -->

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?= base_url('uploads/hewan/') . $detail['file']; ?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Pets</div>
						<div class="product_name"><?=ucfirst($detail['name'])?></div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text">
							<p><?=$detail['description']?></p>
							<h5>Age : </h5> <?=$detail['age']?> Year
							<h5>Gender : </h5> <?=$detail['gender']?>
							<h5>Ras : </h5> <?=$detail['ras']?>

						</div>
						
					</div>
				</div>
				<br>
				<hr>
			</div>
		</div>
	</div>
	<br>

