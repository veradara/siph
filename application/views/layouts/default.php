<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/logo-default.png" type="image/ico" />

	<title>SIPH</title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

	<!-- bootstrap-progressbar -->
	<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- JQVMap -->
	<link href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
	<!-- bootstrap-daterangepicker -->
	<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?php echo base_url(); ?>assets/build/css/custom.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/build/css/jconfirm.min.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/pemilik/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
	<?php $userdata = $this->session->all_userdata(); ?>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">

					<div class="navbar nav_title" style="border: 0;">
						<div class="sidebar-brand-icon rotate-n-15">
							<img height="50" src="<?php echo base_url(); ?>assets/images/logoo.jpg"> <a style="color: white; font-size:large;">FamesArt</a>
						</div>

					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">

						</div>

					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<?php $this->load->view('layouts/side_menu') ?>
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<object data="<?php echo base_url(); ?>uploads/users/<?= $userdata['file'] ?>" type="image/png" style="width : 40px; border-radius: 50%;">
										<img src="<?php echo base_url(); ?>uploads/users/<?= $userdata['file'] ?>" alt="default" style="width : 40px; border-radius: 50%;">
									</object>&nbsp;<?php echo ($userdata['fullname']); ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">

									<li>
										<a href="<?php echo base_url(); ?>setting">
											<span>Settings</span>
										</a>
									</li>

									<li><a href="<?php echo base_url(); ?>login/logout_process" method="post"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>


						</ul>
					</nav>
				</div>
			</div>

			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<!-- content -->
				<?php echo $contents; ?>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					SIPH <a href="#">&copy; 2020</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>



	<script src="<?php echo base_url(); ?>assets/build/js/jconfirm.min.js"></script>
	<!-- load js -->
	<script src="<?php echo base_url(); ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Skycons -->
	<script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>

	<script src="<?= base_url('assets/pemilik/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('assets/pemilik/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

	<script type="text/javascript">
		var baseURL = "<?php echo base_url(); ?>";
	</script>
	<script type="text/javascript">
		$('a.confirm').confirm({
			content: "Apakah anda yakin melakukan perintah ini !!",
			title: "Halo",
		});
		$('a.confirm').confirm({
			buttons: {
				hey: function() {
					location.href = this.$target.attr('href');
				}
			}
		});

		$(document).ready(function() {
			$('#datatable').DataTable();
		});
	</script>

</body>

</html>