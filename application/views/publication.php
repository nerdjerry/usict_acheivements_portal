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
					Add a new Publication 
				</div>
				<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
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
					    <label class="col-sm-2 col-md-2 control-label">Year of Publication</label>
					    <div class="col-sm-10 col-md-8">
					    	<input type="text" class="form-control year_of_pub" name="year_of_pub" autocomplete="off" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Month of Publication</label>
					    <div class="col-sm-10 col-md-8">
					      <select class="form-control month_of_pub" name="month_of_pub">
					      	<option value"January">January</option>
					      	<option value"Februray">February</option>
					      	<option value"March">March</option>
					      	<option value"April">April</option>
					      	<option value"May">May</option>
					      	<option value"June">June</option>
					      	<option value"July">July</option>
					      	<option value"August">August</option>
					      	<option value"September">September</option>
					      	<option value"October">October</option>
					      	<option value"November">November</option>
					      	<option value"December">December</option>
					      </select>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Journal/Conference Name</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="journal_name" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label"></label>
					    <label class="col-sm-10 col-md-8">Please Specify co-authors(if any)</label>
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
					    <label class="col-sm-2 col-md-2 control-label">Are you a Communicating Author?</label>
					    <div class="col-sm-10 col-md-8">
					      	<label class="radio-inline"><input type="radio" name="comm_author_radio" value="Yes">Yes</label>
							<label class="radio-inline"><input type="radio" name="comm_author_radio" value="No" checked="true">No</label> 
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label"></label>
					    <label class="col-sm-10 col-md-8">Please Specify communicating author(if selected no)</label>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Communicating Author</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="comm_author" id="comm_author" /> 
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Are you a First Author?</label>
					    <div class="col-sm-10 col-md-8">
					      	<label class="radio-inline"><input type="radio" name="first_author_radio" value="Yes">Yes</label>
							<label class="radio-inline"><input type="radio" name="first_author_radio" value="No" checked="true">No</label>
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label"></label>
					    <label class="col-sm-10 col-md-8">Please Specify first author(if selected no)</label>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">First Author</label>
					    <div class="col-sm-10 col-md-8">
					      	<input type="text" class="form-control" name="first_author" id="first_author" /> 
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
			var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
			var today = new Date();
		    var mm = today.getMonth(); //January is 0!
		    var yyyy = today.getFullYear();
		    $('.month_of_pub').val(months[mm]);
			$('.year_of_pub').change(function(){
				if($('.year_of_pub').val()== " 2016"){
					for(month=mm+1;month<12;month++){
						$(".month_of_pub option:contains("+months[month]+")").hide(); 
					}
				}else{
					for(month=0;month<12;month++){
						$(".month_of_pub option:contains("+months[month]+")").show();
					}
				}
			});
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
					"journal_name": {
						required: true
					},
					"comm_author" : {
						required:true
					},
					"first_author": {
						required:true
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
			//Filling communicating author and first author field
			$('input[name="comm_author_radio"]').change(function(){
				if(this.value === 'Yes'){
					$('#comm_author').val('<?php echo get_user_name();?>');
					$('#comm_author').prop('readonly',true);
				}else{
					$('#comm_author').val('');
					$('#comm_author').prop('readonly',false);
				}
			});
			$('input[name="first_author_radio"]').change(function(){
				if(this.value === 'Yes'){
					$('#first_author').val('<?php echo get_user_name();?>');
					$('#first_author').prop('readonly',true);
				}else{
					$('#first_author').val('');
					$('#first_author').prop('readonly',false);
				}
			});
			$('.year_of_pub').datepicker({
				format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true,
				endDate: new Date()
			});
		});
	</script>

</body>
</html>