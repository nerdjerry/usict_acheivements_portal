<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>My Achievements</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/animate.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/jquery.dataTables.css" />


	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/vendor/jquery.dataTables.min.js"></script>
	<script src="js/vendor/jquery.cookie.js"></script>
	<script src="js/vendor/moment.min.js"></script>
	<script src="js/theme.js"></script>

	<script src="js/vendor/jquery.flot/jquery.flot.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.time.js"></script>
	<script src="js/vendor/jquery.flot/jquery.flot.tooltip.js"></script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="reports">
	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
			<div class="current-user">
				<a href="index.html" class="name">
					<img class="avatar" src="images/avatars/1.jpg" />
					<span>
						<?php echo $user_name;?>
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
						<a href="<?php echo base_url('achievement');?>">
							<i class="ion-flash"></i> 
							<span>My Achievements</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="content">
			<div class="row">
				<div class="col-md-3"><h3><strong>Achievement</strong></h3></div>
				<div class="col-md-3"><h3><strong>Organisation</strong></h3></div>
				<div class="col-md-3"><h3><strong>Description</strong></h3></div>
				<div class="col-md-3"><h3><strong>Created at</strong></h3></div>
			</div>
			<?php foreach($achievements as $achievement): ?>
    		<div class="row">
    			<div class="col-md-3">Fake Achievement</div>
    			<div class="col-md-3">Fake Organisation</div>
	            <div class="col-md-3"><?php echo $achievement['description']; ?></div>
	            <div class="col-md-3"><?php echo $achievement['created_at']; ?></div>
            </div>
        	<?php endforeach; ?>
		</div>
	</div>

</body>
</html>