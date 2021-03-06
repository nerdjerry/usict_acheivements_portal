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
		<?php include('menu/staff.php') ?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Add a new Seminar
				</div>
				<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
				</div>
			</div>
			<div class="content-wrapper">
				<form id="new-seminar" class="form-horizontal" method="post" action="<?php echo base_url('achievement/store'); ?>" role="form">
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
					      	<input type="text" class="form-control start_date" name="start_date" autocomplete="off" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">End date</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control end_date" name="end_date" autocomplete="off" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Region</label>
					    <div class="col-sm-10 col-md-8">
					    	<select class="form-control" name="region">
					    		<option value=""  selected disabled>Please Select a Region</option>
							 	<option value="National">National</option>
							  	<option value="International">International</option>
							</select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Type</label>
					    <div class="col-sm-10 col-md-8">
					      	<select class="form-control" name="seminar_type">
					    		<option value=""  selected disabled>Please Select a Seminar Type</option>
							 	<option value="Seminar">Seminar</option>
							  	<option value="Workshop">Workshop</option>
							  	<option value="Training Programme">Training Programme</option>
							  	<option value="Faculty Development Programme">Faculty Development Programme</option>
							  	<option value="Symposium">Symposium</option>
							</select>
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
					    	<select class="form-control" name="status">
					    		<option value=""  selected disabled>Please Select a Status</option>
							 	<option value="Attended">Attended</option>
							  	<option value="Organised">Organised</option>
							</select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Number of Participants</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="no_of_participant" />
					    </div>
				  	</div>

				  	<input type="hidden" value="2" name="form_type"></input>

				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-success">Save Seminar</button>
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
			var today = new Date();
		    var dd = today.getDate();
		    var mm = today.getMonth()+1; //January is 0!

		    var yyyy = today.getFullYear();
		    if(dd<10){
		        dd='0'+dd
		    } 
		    if(mm<10){
		        mm='0'+mm
		    } 
		    var today = yyyy+'-'+mm+'-'+dd;

			$('#new-seminar').validate({
				rules: {
					"seminar_title": {
						required: true
					},
					"seminar_place": {
						required: true
					},
					"start_date": {
						required: true,
					},
					"end_date":{
						max:today
					},
					"region": {
						required: true
					},
					"seminar_type": {
						required: true
					},
					"status": {
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
			$('.start_date').datepicker({
				format: 'yyyy-mm-dd',
				autoclose:true,
				endDate: new Date()
			});
			$('.end_date').datepicker({
				format: 'yyyy-mm-dd',
				autoclose:true,
				endDate: new Date()
			});
		});
	</script>