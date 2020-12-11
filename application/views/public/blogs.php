	<div class="home">
		<div class="banner_background" style="background-image:url(<?= base_url('assets/frontend/'); ?>images/weddingcake.jpg)"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title" style="color: white">SIPH Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						<?php foreach ($artikel as $key => $value) { ?>
							<!-- Blog post -->
							<div class="blog_post">
								<div class="blog_image" style="background-image:url(<?= base_url('uploads/artikel/') . $value['file']; ?>)"></div>
								<div class="blog_text">
									<?= $value['title'] ?> <br>
									<p><?= substr($value['content'], 0, 50) ?></p>
								</div>
								<div class="blog_button"><a href="<?= base_url('public/blogs/detail/') . $value['id_article']; ?>">Continue Reading</a></div>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->