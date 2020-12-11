	<div class="home">
		<div class="banner_background" style="background-image:url(<?= base_url('assets/frontend/'); ?>images/weddingcake.jpg)"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title" style="color: white">About Us</h2>
		</div>
	</div>


	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"><?= $detail['description']; ?></div>
					<div class="single_post_text">
						<?= $detail['about_us']; ?>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="https://wa.me/<?= $detail['no_telpon']; ?>?text=Halo%20saya%20mau%20pesan%20hantaran"><img height="100" src="<?= base_url('assets/images/hubungikamiwa.png') ?>"></a></li>
						<li class="list-group-item">Email : <?= $detail['email_setting']; ?></li>
						<li class="list-group-item">Alamat : <?= $detail['alamat_setting']; ?></li>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<!-- Blog Posts -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">

						<!-- Blog post -->

						<!-- <div class="blog_post">
							<div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
							<div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
							<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>