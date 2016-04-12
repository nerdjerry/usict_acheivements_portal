<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/morris.css" />

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/jquery.cookie.js"></script>
	<script src="js/vendor/moment.min.js"></script>
	<script src="js/theme.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/raphael-min.js"></script>
	<script src="js/vendor/morris.min.js"></script>

	<script src="js/vendor/jquery.flot/jquery.flot.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.time.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.tooltip.js"></script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="dashboard">
	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
			<div class="current-user">
				<a href="index.html" class="name">
					<img class="avatar" src="images/avatars/1.jpg" />
					<span>
						<?php echo $user->name; ?>
						<i class="fa fa-chevron-down"></i>
					</span>
				</a>
				<ul class="menu">
					<li>
						<a href="<?php echo base_url('logout');?>">Sign out</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Dashboard
				</div>

				<div class="period-select hidden-xs">
					<form class="input-daterange">
						<div class="input-group input-group-sm">
						  	<span class="input-group-addon">
						  		<i class="fa fa-calendar-o"></i>
						  	</span>
						  	<input name="start" type="text" class="form-control datepicker" placeholder="01/01/2015" />
						</div>
						
						<p class="pull-left">to</p>

						<div class="input-group input-group-sm">
						  	<span class="input-group-addon">
						  		<i class="fa fa-calendar-o"></i>
						  	</span>
						  	<input name="end" type="text" class="form-control datepicker" placeholder="01/01/2016" />
						</div>
					</form>
				</div>
			</div>

			<div class="content-wrapper">
				<div class="metrics clearfix">
					<div class="metric">
						<span class="field">#Achievements</span>
						<span class="data">258</span>
					</div>
					<div class="metric">
						<span class="field">By Staff</span>
						<span class="data">108</span>
					</div>
					<div class="metric">
						<span class="field">By Students</span>
						<span class="data">150</span>
					</div>
					<div class="metric">
						<span class="field">Last Month</span>
						<span class="data">100</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		$(function () {
			
	        // Range Datepicker
	        $('.input-daterange').datepicker({
	        	autoclose: true,
	        	orientation: 'right top',
	        	endDate: new Date()
	        });
		});
	</script>

</body>
</html>