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
	<!--Scrolling after filter logic-->
	<script type="text/javascript">
		function scrollToResult(){
			$('html, body').animate({
				scrollTop : $('#results').offset().top
			},1000);
		}
	</script>


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
		<?php include('menu/admin.php') ?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				<?php if($requestedUserType == 1):?>
				<div class="page-title">
					Achivements by Faculty
				</div>
				<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
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
					include('filter/publications.php');
					include('tables/publications.php');
					break;
				case 2:
					include('filter/seminars.php');
					include('tables/seminars.php');
					break;
				case 3:
					include('filter/projects.php');
					include('tables/projects.php');
					break;
				case 4:
					include('filter/awards.php');
					include('tables/awards.php');
					break;
				}
				if(isset($results) && $results)
					echo '<script>scrollToResult();</script>';
			?>
			<?php elseif($requestedUserType == 2):?>
			<div class="page-title">
					Achivements by Students
				</div>
			<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="metrics clearfix">
					<div class="metric">
						<a href = "<?php echo base_url('/achievement/admin/2/1');?>">
							<label class="field">Achievements</label>
							<div class="data"><?php echo $noOfAchievements;?></div>
						</a>
					</div>
				</div>
			</div>
			<?php
				include('filter/achievements.php');
				include('tables/achievements.php');
				if(isset($results) && $results)
					echo '<script>scrollToResult();</script>';
			?>
			<?php endif;?>
			<?php echo $links;?>
		</div>
	</div>
	
	<script type="text/javascript">
		$(function () {
				
			$('#filter_awards').validate({
				rules: {
					"amount_start": {
						min:0
					},
					"amount_end": {
						min:0
					},
					"project_amount":{
						number:true
					},
					"start_date":{
						required:true
					},
					"end_date":{
						required:true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});
			$('#filter_publications').validate({
				rules: {
					"publications_start_date":{
						required:true
					},
					"publications_end_date":{
						required:true
					},
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});
			$('#filter_seminars').validate({
				rules: {
					"no_of_participants" :{
						min:1
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});
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
	        // Range Datepicker
	        $('.start_date').datepicker({
	        	format:"yyyy-mm-dd",
	        	autoclose: true,
	        	orientation: 'right top',
	        	endDate: new Date()
	        });
	        $( ".start_date" ).val('<?php if(isset($filter['startDate'])) echo $filter['startDate']; else echo '2000-01-01';?>');
	        $('.end_date').datepicker({
	        	format:"yyyy-mm-dd",
	        	autoclose: true,
	        	orientation: 'right top',
	        	endDate: new Date()
	        });
	        $( ".end_date" ).val('<?php if(isset($filter['endDate'])) echo $filter["endDate"];  else echo date('Y-m-d');?>');
	        $('.publications_start_date').datepicker({
	        	format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true
	        });
	        $( ".publications_start_date" )
	        .val('<?php if(isset($filter['startDate'])) echo $filter['startDate']; else echo '2000';?>');
	        $('.publications_end_date').datepicker({
	        	format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true
	        });
	        $( ".publications_end_date" )
	        .val('<?php if(isset($filter['endDate'])) echo $filter["endDate"];  else echo date('Y');?>');
	        $('.student_year').datepicker({
	        	format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true,
				endDate:new Date()
	        });
	        $( ".achievement_year_start" ).val('<?php if(isset($filter['startDate'])) echo $filter['startDate']; else echo '2000';?>');
	        $('.achievement_year').datepicker({
	        	format: " yyyy", // Notice the Extra space at the beginning
				viewMode: "years", 
				minViewMode: "years",
				autoclose: true,
				endDate:new Date()
	        });
	        $( ".achievement_year_end" ).val('<?php if(isset($filter['endDate'])) echo $filter["endDate"];  else echo date('Y');?>');
		});


	</script>
</body>
</html>