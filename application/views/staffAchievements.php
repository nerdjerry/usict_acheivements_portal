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


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="dashboard">
	<div id="wrapper">
		<?php include('menu/staff.php') ?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Achievements
				</div>
				<div class="page-logo">
					<img src="<?php echo base_url('images/univ_logo.png');?>"/>
				</div>
			</div>
			<?php if($this->session->flashdata('insertionSuccess')): ?>
				<div class="alert alert-success alert-message" role="alert"><?php echo $this->session->flashdata('insertionSuccess'); ?></div>
			<?php endif?>
			<?php 
				$status = $this->session->flashdata('deleteStatus');
				if(isset($status)&&$status): ?>
				<div class="alert alert-success alert-message" role="alert">Delete Successful!!</div>
			<?php endif?>
			<?php 
				$status = $this->session->flashdata('deleteStatus'); 
			if(isset($status)&&!($status)): ?>
				<div class="alert alert-danger alert-message" role="alert">Delete Unsuccessful!!</div>
			<?php endif?>
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
			<div><?php echo $links;?></div>
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
		$('#confirm_deletion').on('show.bs.modal', function (event) {
  			var button = $(event.relatedTarget);
  			var id = button.data('id'); // Extract id from data-id attribute
  			var infoType = button.data('info');
  			var modal = $(this);
  			modal.find('.modal-footer #yes_button').attr('href','/usict/achievement/deleteAchievement/'+infoType+'/'+id);
		});
	</script>

</body>
</html>