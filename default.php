<!DOCTYPE html>
<html lang="en">
	<head>
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.jpg" type="image/ico" />

	    <title>Petshop Ku | <?php echo $title;?> </title>

	    <!-- Bootstrap -->
	    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Font Awesome -->
	    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	    <!-- NProgress -->
	    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	    <!-- iCheck -->
	    <link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		
	    <!-- bootstrap-progressbar -->
	    <link href="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	    <!-- JQVMap -->
	    <link href="<?php echo base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
	    <!-- bootstrap-daterangepicker -->
	    <link href="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	    <link href="<?php echo base_url();?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

	    <!-- Custom Theme Style -->
	   <link href="<?php echo base_url();?>assets/build/css/custom.css" rel="stylesheet">
	   <link href="<?php echo base_url();?>assets/build/css/jconfirm.min.css" rel="stylesheet">

	   <!-- jQuery -->
	    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
	    <?php $userdata = $this->session->all_userdata();?>
	</head>
	<body class="nav-md">
	    <div class="container body">
	      <div class="main_container">
	        <div class="col-md-3 left_col">
	          <div class="left_col scroll-view">
	            
	            <div class="navbar nav_title" style="border: 0;">
	              <a href="#" class="site_title"><img style="width: 65%; padding-left: 40px;" src="<?php echo base_url();?>assets/images/logo.png" alt="..." ></a>
	            </div>

	            <div class="clearfix"></div>

	            <!-- menu profile quick info -->
	            <div class="profile clearfix">
	              <div class="profile_pic">
	              	<object data="<?php echo base_url();?>uploads/users/<?=$userdata['file']?>" type="image/png" style="width : 60px;" class="img-circle profile_img">
                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 60px;" class="img-circle profile_img">
                      </object>
	              </div>
	              <div class="profile_info">
	                <span>Welcome,</span>
	                <h2><?php echo($userdata['fullname']); ?></h2>
	              </div>
	            </div>
	            <!-- /menu profile quick info -->
	            <br />
	            <!-- sidebar menu -->
	            <?php $this->load->view('layouts/side_menu')?>
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
				        <object data="<?php echo base_url();?>uploads/users/<?=$userdata['file']?>" type="image/png" style="width : 40px; border-radius: 50%;" >
	                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 40px; border-radius: 50%;" >
	                    </object>&nbsp;<?php echo($userdata['fullname']); ?>
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
	        <div class="right_col" role="main" >
	          <!-- content -->
	          <?php echo $contents;?>	       
	        </div>
	        <!-- /page content -->

	        <!-- footer content -->
	        <footer>
	          <div class="pull-right">
	            Touraya <a href="#">&copy; 2019</a>
	          </div>
	          <div class="clearfix"></div>
	        </footer>
	        <!-- /footer content -->
	      </div>
	    </div>



	    <script src="<?php echo base_url();?>assets/build/js/jconfirm.min.js"></script>
		<!-- load js -->
		<script src="<?php echo base_url();?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
	    <!-- Bootstrap -->
	    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	    <!-- Skycons -->
	    <script src="<?php echo base_url();?>assets/vendors/skycons/skycons.js"></script>
	    <!-- Custom Theme Scripts -->
	    <script src="<?php echo base_url();?>assets/build/js/custom.js"></script>

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
		              hey: function(){
		                  location.href = this.$target.attr('href');
		              }
		          }
		    });
		</script>
	
  	</body>
</html>