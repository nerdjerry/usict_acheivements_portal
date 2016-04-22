<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Achievements</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/compiled/theme.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mytheme.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/animate.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/brankic.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/ionicons.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/font-awesome.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/datepicker.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/morris.css');?>" />
	<link rel="icon" href="<?php echo base_url('favicon.png');?>" type="image/png"/>

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="<?php echo base_url('js/bootstrap/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/jquery.cookie.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/moment.min.js');?>"></script>
	<script src="<?php echo base_url('js/theme.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/bootstrap-datepicker.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/raphael-min.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/morris.min.js');?>"></script>

	<script src="<?php echo base_url('js/vendor/jquery.flot/jquery.flot.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/jquery.flot/jquery.flot.time.js');?>"></script>
	<script src="<?php echo base_url('js/vendor/jquery.flot/jquery.flot.tooltip.js');?>"></script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
		.nopadding{
			padding: 0 !important;
	   		margin: 0 !important;
		}
		img{
			width:50px;
			height:50px
		}
	</style>
</head>
<body id="dashboard">
	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
			<div class="current-user">
				<a href="index.html" class="name">
					<div class="row">
						<div class="col-md-2 nopadding">
							<img class="avatar" src="<?php echo base_url(get_user_pic());?>" />
						</div>
						<div class="col-md-8">
							Administrator
						</div>
						<div class="col-md-2 nopadding">
						<i class="fa fa-chevron-down" style=""></i>
						</div>
					</div>
				</a>
				<ul class="menu">
					<li>
						<a href="<?php echo base_url('logout');?>">Sign out</a>
					</li>
				</ul>
			</div>
			<div class="menu-section">
				<ul>
					<li>
						<a href="<?php echo base_url('achievement/admin/1');?>">
						<i class="fa fa-download" aria-hidden="true"></i>
							<span>Faculty</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('achievement/admin/2');?>">
						<i class="fa fa-download" aria-hidden="true"></i>
							<span>Students</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				<?php if($requestedUserType == 1):?>
				<div class="page-title">
					Achivements by Faculty
				</div>
			</div>
			<div class="content-wrapper">
				<div class="metrics clearfix">
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/admin/1/1');?>">
							<label class="field">Publications</label>
							<div class="data"><?php echo $noOfPublications;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/admin/1/2');?>">
							<label class="field">Seminars</label>
							<div class="data"><?php echo $noOfSeminars;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/admin/1/3');?>">
							<label class="field">Projects</label>
							<div class="data"><?php echo $noOfProjects;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/admin/1/4');?>">
							<label class="field">Awards</label>
							<div class="data"><?php echo $noOfAwards;?></div>
						</a>
					</div>
				</div>
			</div>
			<?php 
				switch($infoType){
				case 1:
					include('tables/publications.php');
					break;
				case 2:
					include('tables/seminars.php');
					break;
				case 3:
					include('tables/projects.php');
					break;
				case 4:
					include('tables/awards.php');
					break;
				}
			?>
			<?php elseif($requestedUserType == 2):?>
				<!--TODO:Complete this<div class="page-title">
					Achivements by Students
				</div>
			</div>
			<div class="content-wrapper">
				<div class="metrics clearfix">
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/staff/1');?>">
							<label class="field">Publications</label>
							<div class="data"><?php echo $noOfPublications;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/staff/2');?>">
							<label class="field">Seminars</label>
							<div class="data"><?php echo $noOfSeminars;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/staff/3');?>">
							<label class="field">Projects</label>
							<div class="data"><?php echo $noOfProjects;?></div>
						</a>
					</div>
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/staff/4');?>">
							<label class="field">Awards</label>
							<div class="data"><?php echo $noOfAwards;?></div>
						</a>
					</div>
				</div>
			</div>-->
			<?php endif;?>
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