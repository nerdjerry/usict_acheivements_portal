<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>USICT | ACHIEVEMENTS PORTAL</title>
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

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="signin" class="clear login">	
	<nav class="navbar navbar-default navbar-fixed-top header" role="navigation">
		<div class="login-logo">
			<img src="<?php echo base_url('images/univ_logo.png')?>"/>
		</div>
		<div class="login-heading">
			<h3 id="heading-text">USICT ACHIEVEMENTS PORTAL</h3>
		</div>
	</nav>
	<div class="content login">
		<form method = "POST" action="<?php echo base_url('login/auth_login'); ?>">
			<div class="fields">
				<strong>Email address</strong>
				<input class="form-control" name="email" type="email" placeholder="Your email" />
			</div>
			<div class="fields">
				<strong>Password</strong>
				<input class="form-control" name="password" type="password" placeholder="Password" />
			</div>
			<div class="info">
				<label>
					<input type="checkbox" name="remember" data-val="true" value="true" checked />
					Remember me
				</label>
			</div>
			<?php if($this->session->flashdata('loginError')): ?>
				<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('loginError'); ?></div>
			<?php endif?>
			<?php if($this->session->flashdata('logoutSuccess')): ?>
				<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('logoutSuccess'); ?></div>
			<?php endif?>
			<div class="actions">
				<button type="submit" class="btn btn-primary btn-lg">Sign in</button>
			</div>
		</form>
	</div>
</body>
</html>