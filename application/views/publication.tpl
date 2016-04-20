<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Add Publication</title>
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
					Add a new Publication 
				</div>
			</div>

			<div class="content-wrapper">
				<form id="new-publication" class="form-horizontal" method="post" action="#" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Title</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="publication_title" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Month of Publication</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="month_of_pub" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Year of Publication</label>
					    <div class="col-sm-10 col-md-8">
					    	<input type="text" class="form-control" name="year_of_pub" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Journal Name</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="journal_name" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Co-Author 1</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="coauthor_1" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Co-Author 2</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="coauthor_2" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Co-Author 3</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="coauthor_3" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Co-Author 4</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="coauthor_4" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Presented in</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
					      		<input type="text" class="form-control" name="presented_in" />
					      		<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Presented in Meaning"></i>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Presented at</label>
					    <div class="col-sm-10 col-md-8">
					    	<div class="has-feedback">
					      		<input type="text" class="form-control" name="presented_at" />
					      		<i class="ion-information-circled form-control-feedback" data-toggle="tooltip" title="Presented at Meaning"></i>
					      	</div>
					    </div>
				  	</div>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10">
				    		<a href="form.html" class="btn btn-default">Cancel</a>
				      		<button type="submit" class="btn btn-success">Save Publication</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function () {

			// form validation
			$('#new-customer').validate({
				rules: {
					"title": {
						required: true
					},
					"month_of_pub": {
						required: true
					},
					"year_of_pub": {
						required: true
					},
					"journal_name": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});

			// tags with select2
			$("#customer-tags").select2({
				placeholder: 'Select tags or add new ones',
				tags:["supplier", "lead", "client", "friend", "developer", "customer"],
				tokenSeparators: [",", " "]
			});

			// masked input example using phone input
			$(".mask-phone").mask("(999) 999-9999");
			$(".mask-cc").mask("9999 9999 9999 9999");
		});
	</script>

</body>
</html>