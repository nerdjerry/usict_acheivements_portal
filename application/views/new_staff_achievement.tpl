<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Staff - Acheivement</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css" />

	<link rel="stylesheet" type="text/css" href="css/vendor/select2.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/select2-bootstrap.css" />

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/select2.min.js"></script>
	<script src="js/vendor/jquery.validate.min.js"></script>
	<script src="js/vendor/jquery.cookie.js"></script>
	<script src="js/vendor/jquery.maskedinput.js"></script>
	<script src="js/theme.js"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="form">
	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
			<div class="current-user">
				<a href="index.html" class="name">
					<img class="avatar" src="<?php echo base_url('images/avatars/1.jpg');?>" />
					<span>
						<?php echo $user_name; ?>
						<i class="fa fa-chevron-down"></i>
					</span>
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
						<a href="<?php echo base_url('/home');?>">
							<i class="ion-flash"></i> 
							<span>Add Achievement</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('home/award');?>">
							<i class="ion-flash"></i> 
							<span>Awards</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('home/project');?>">
							<i class="ion-flash"></i> 
							<span>Projects</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('home/publication');?>">
							<i class="ion-flash"></i> 
							<span>Publications</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('home/seminar');?>">
							<i class="ion-flash"></i> 
							<span>Seminars</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('achievement');?>">
							<i class="ion-flash"></i> 
							<span>My Achievements</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="content">
			<div class="content-wrapper">
				<form id="new_achievement" class="form-horizontal" method="post" action="<?php echo base_url('achievement/store')?>" role="form">
					<div class="form-group"
>					    <label class="col-sm-2 col-md-2 control-label">Achievement</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="achievement_achievement" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Organisation</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="achievement_organisation" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Description</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="achievement_description" />
					    </div>
				  	</div>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-success">Save Achievement</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function () {

			// form validation
			$('new_achievement').validate({
				rules: {
					"achievement_description": {
						required: true
					},
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});
		});
	</script>

</body>
</html>