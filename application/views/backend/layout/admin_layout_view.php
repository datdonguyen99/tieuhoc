<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/assets/backend/css/AdminLTE.min.css">  
	<link rel="stylesheet" href="/assets/backend/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="/assets/backend/plugins/fancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="/assets/jquery/jquery-ui.min.css">
	<link rel="stylesheet" href="/assets/backend/plugins/select2/select2.min.css" />
	<link rel="stylesheet" href="/assets/backend/css/style.css" />
	<link rel="stylesheet" href="/assets/backend/css/image-uploader.min.css" />

	<script src="/assets/jquery/jquery-1.12.4.min.js"></script>
	<script src="/assets/jquery/jquery-ui.min.js"></script>

	<script src="/assets/backend/plugins/select2/select2.min.js"></script>
	
	<style>
		.box-body{padding: 15px;}
	</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="/admin" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>TechDev</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>TechDev</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">        
					<!-- User Account: style can be found in dropdown.less -->
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo $user_info['avatar'] ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $user_info['name'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo $user_info['avatar'] ?>" class="img-circle" alt="User Image">

									<p>
										<?php echo $user_info['name'] ?>
										<small><?php echo $user_info['email'] ?></small>
									</p>
								</li>
								<!-- Menu Body -->
								<!-- <li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</div>
									/.row
								</li> -->
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat"><i class="fa fa-password"></i> Password</a>
									</div>
									<div class="pull-right">
										<a href="/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<!-- <li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li> -->
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo $user_info['avatar'] ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $user_info['name'] ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?php
				if(User_model::CheckAdminRole($user_info['role'])){
					include 'admin_sidebar_view.php';
				}
				else{
					$this->load->view('backend/layout/manager_sidebar_view');
				}
				?>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1 class='text-primary'>
					<i class="fa fa-circle"></i> <?php echo $title ?>
				</h1>				
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- Small boxes (Stat box) -->
				<div class="box">

					<div class='box-body'>

						<?php $this->load->view($template, $data); ?>
					</div>
					
				</div>
			</section>

			<!-- Main row -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->

<script src="/assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/backend/js/app.min.js"></script>
<script src="/assets/backend/plugins/fancybox/jquery.fancybox.js"></script>
<script src="/assets/backend/plugins/tinymce/tinymce.min.js"></script>
<script src="/assets/backend/js/crud_manage.js"></script>
<script src="/assets/js/home.js"></script>
<script src="/assets/backend/js/image-uploader.min.js"></script>
<script>
    function format_num(num) {
        var n = parseInt(n);
        if (n == 0) {
            return num;
        }
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };
    $(".num_format").each(function () {
        var num = $(this).text().trim();
        $(this).text(format_num(num));
    });

    $(".currency_format").each(function () {
        var num = $(this).text().trim();
        $(this).text(format_num(num) + ' đ');
    });


    // $('#province_id').on('change',function () {
    //     var province_id = $(this).val();
    //     var href = '/api/district_search/get_district/'+province_id;
    //     var province_name = $('option:selected', this).attr('data-name');
    //     $.post(href, {}, function (res) {
    //         $('#district').html(res.district);
    //         $('#store_id').html(res.store);
	//
    //     }, 'json');
    //     $('#province_name').val(province_name);
    // });
    // $('#district').on('change',function () {
    //     var district_code = $(this).val(), href ='/api/store_search/get_stores'+district_code;
    //     var district_name = $('option:selected', this).attr('data-name');
	//
    //     $.post(href, {}, function (res) {
    //         $('#store_id').html(res);
    //     }, 'json');
    //     $('#district_name').val(district_name);
	//
    // })
</script>
</body>
</html>
