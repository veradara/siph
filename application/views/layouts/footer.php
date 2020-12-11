<!-- Footer -->

<footer class="footer bg-primary">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-lg-3 footer_col">
				<div class="footer_column footer_contact">
					<div class="logo_container">
						<div class="logo"><a href="#" class="text-white">FamesArt</a></div>
					</div>
					<div class="footer_title text-white">Got Question? Call Us 24/7</div>
					<div class="footer_phone text-white">0816576764 </div>
					<div class="footer_contact_text">
						<p class="text-white">Jl. Sentolo Kawat Rt 01 Rw 01 Cilacap Selatan</p>
					</div>
				</div>
			</div>

			<div class="col-lg-2 offset-lg-2">
				<div class="footer_column">
					<div class="footer_title text-white">Menu</div>
					<ul class="footer_list">
						<li><a class="text-white" href="<?= base_url(); ?>">Home</a></li>
						<li><a class="text-white" href="<?= base_url('/public/blogs'); ?>">Blog</a></li>
						<li><a class="text-white" href="<?= base_url('/public/product/index/'); ?>">All Product</a></li>
						<li><a class="text-white" href="<?= base_url('/public/about_us'); ?>">About Us</a></li>
					</ul>
				</div>

			</div>

			<div class="col-lg-2">
				<div class="footer_column">
					<div class="footer_title text-white">Customer Care</div>
					<ul class="footer_list">
						<li><a class="text-white" href="<?= base_url('/public/profile/'); ?>">My Account</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</footer>

<!-- Copyright -->

<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col">

				<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
					<div class="copyright_content">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | FamesArt
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?= base_url('assets/frontend/'); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>styles/bootstrap4/popper.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/slick-1.8.0/slick.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/easing/easing.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>js/custom.js"></script>
<script src="<?= base_url('assets/'); ?>build/js/jconfirm.min.js"></script>

<script type="text/javascript">
	$('.confirm').confirm({
		content: "Silahkan login terlebih dahulu !!",
		title: "Halo",
	});

	$('.confirm2').confirm({
		content: "Apakah anda yakin !!",
		title: "Halo",
	});
	$('a.confirm2').confirm({
		buttons: {
			hey: function() {
				location.href = this.$target.attr('href');
			}
		}
	});
</script>
<script type="text/javascript">
	$('#password, #confirm_password').on('keyup', function() {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Matching').css('color', 'green');
			document.getElementById("submit").disabled = false;
		} else {
			$('#message').html('Not Matching').css('color', 'red');
			document.getElementById("submit").disabled = true;
		}
	});
</script>

</body>

</html>