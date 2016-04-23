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
	<script src="<?php echo base_url('js/vendor/jquery.validate.min.js');?>"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="form">
	<div id="wrapper">
		<?php include('staff_menu.php') ?>
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
				<form id="new-publication" class="form-horizontal" method="post" action="<?php echo base_url('achievement/store'); ?>" role="form">
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Title</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control" name="publication_title" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Month of Publication</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="text" class="form-control month_of_pub" name="month_of_pub" autocomplete="off" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Year of Publication</label>
					    <div class="col-sm-10 col-md-8">
					    	<input type="text" class="form-control year_of_pub" name="year_of_pub" autocomplete="off" />
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
					    	<select class="form-control" name="presented_in">
					    		<option value=""  selected disabled>Publication is Presented in..</option>
							 	<option value="Journal">Journal</option>
							  	<option value="Conference">Conference</option>
							</select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Presented at</label>
					    <div class="col-sm-10 col-md-8">
					    	<select class="form-control" name="presented_at">
					    		<option value=""  selected disabled>Publication is Presented at..</option>
							 	<option value="International">International</option>
							  	<option value="National">National</option>
							</select>
					    </div>
				  	</div>
				  	<input type="hidden" value="1" name="form_type"></input>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-success">Save Publication</button>
			    		</div>
				  	</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function () {

			var today = new Date();
		    var mm = today.getMonth()+1; //January is 0!
		    var yyyy = today.getFullYear();
		    
		    if(mm<10){
		        mm='0'+mm
		    } 
			// form validation
			$('#new-publication').validate({
				rules: {
					"publication_title": {
						required: true
					},
					"year_of_pub": {
						required: true,
						max:yyyy
					},
					"month_of_pub": {
						max:mm
					},
					"journal_name": {
						required: true
					},
					"presented_in": {
						required: true
					},
					"presented_at": {
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
			$('.month_of_pub').datepicker({
				format: "MM", // Notice the Extra space at the beginning
				viewMode: "months", 
				minViewMode: "months",
				autoclose: true
			});
			$('.year_of_pub').datepicker({
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true
			});
		});
	</script>

</body>
</html>