<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Add Achievement</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/compiled/theme.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/animate.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/brankic.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/ionicons.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/font-awesome.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/datepicker.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/morris.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mytheme.css');?>"/>
	<link rel="icon" href="<?php echo base_url('favicon.png');?>" type="image/png"/>
	<!-- javascript -->
	<script src="<?php echo base_url('js/jquery/jquery-2.2.3.min.js');?>"></script>
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
	<script src="<?php echo base_url('js/vendor/jquery.validate.min.js');?>"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="form">
	<div id="wrapper">
		<?php include('menu/student.php') ?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Add a new Achievement
				</div>
				<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
				</div>
			</div>
			<?php $status = $this->session->flashdata('insertStatus');
					if(isset($status) && !$status): ?>
				<div class="alert alert-danger" role="alert">Failed to insert achievement.Please Try Again.</div>
			<?php endif?>
			<div class="content-wrapper">
				<form id="new-seminar" class="form-horizontal" method="post" action="<?php echo base_url('achievement/studentStore'); ?>" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Details</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="details" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Year of Achievement</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control year" class ="year" name="year" autocomplete="off" />
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
</body>
</html>

<script type="text/javascript">
		$(function () {
			// form validation
			$('#new-seminar').validate({
				rules: {
					"details": {
						required: true
					},
					"year":{
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
			$('.date').datepicker({
				format: 'yyyy-mm-dd',
				autoclose:true,
				endDate: new Date()
			});
			$('.year').datepicker({
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true,
				endDate: new Date()
			});
		});
	</script>