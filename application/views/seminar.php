<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Add Seminar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/compiled/theme.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/animate.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/brankic.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/ionicons.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/font-awesome.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/datepicker.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/morris.css');?>" />

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
</head>
<body id="form">
	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
		<div class="current-user">
				<a href="index.html" class="name">
					<img class="avatar" src="<?php echo base_url('images/avatars/1.jpg');?>" />
					<span>
						<?php echo get_user_name(); ?>
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
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Add a new Seminar
				</div>
			</div>

			<div class="content-wrapper">
				<form id="new-customer" class="form-horizontal" method="post" action="#" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Title</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="seminar_title" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Organiser</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="seminar_organiser" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Place</label>
					    <div class="col-sm-10 col-md-8">
					    	<input type="text" class="form-control" name="seminar_place" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Start date</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="start_date" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">End date</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="end_date" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Region</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
								<input type="text" class="form-control" name="region" />
						      	<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="National/ International">
						      	</i>
							</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Type</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="seminar_type" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Event Details</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="event_details" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Status</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
								<input type="text" class="form-control" name="region" />
						      	<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Attended/ Orgnised">
						      	</i>
							</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Number of Participants</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="no_of_participant" />
					    </div>
				  	</div>

				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10">
				    		<a href="form.html" class="btn btn-default">Cancel</a>
				      		<button type="submit" class="btn btn-success">Save Seminar</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>