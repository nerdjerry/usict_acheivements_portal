<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>USICT | ACHEIVEMENTS PORTAL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css" />

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<script src="js/theme.js"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="signin" class="clear">	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<h3>USICT Acheivements Portal</h3>
	</nav>
	<div class="content">
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
					<input type="checkbox" name="remember" checked />
					Remember me
				</label>
			</div>
			<div class="actions">
				<button type="submit" class="btn btn-primary btn-lg">Sign in</button>
			</div>
		</form>
	</div>
</body>
</html>