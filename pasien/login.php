<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Radmin - the Raddest Admin Template</title>
	<meta name="description" content="An admin template from Square Turtle Studios" />
	<meta name="author" content="Square Turtle Studios" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Styles -->
	<!-- Logo Font - Molle -->
	<link href="css/molle.css" rel="stylesheet" type="text/css" />

	<link href="css/bootstrap.css" rel="stylesheet" />
    <link href="stylelogin.css" rel="stylesheet">
	<link rel="stylesheet" href="css/icon-style.css" />
    
	<!--[if lte IE 7]>
	<script src="../scripts/lte-ie7.js"></script>
	<![endif]-->
	<link href="css/bootstrap-responsive.css" rel="stylesheet" />
	<link href="css/radmin.css" rel="stylesheet" id="main-stylesheet" />
	<link href="css/radmin-responsive.css" rel="stylesheet" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.cloneposition.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if lte IE 9]>
	<script src="scripts/placeholder.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="scripts/theme.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body id="body-login">

	<div class="container-fluid">

		<div class="row-fluid">
			<div class="span4"></div>

			<div class="span4 login-span">
				<div class="login-radmin align-center">
					<h1 class="brand">
						<span class="rad">Rekam</span>medis
					</h1>
				</div>
				<div class="login-wrapper">
					<div class="login-inner">
						<h2 class="sign-in">Masuk</h2>
						<small class="muted">Pakai user pasien</small>
						<div class="squiggly-border"></div>

						<div class="login-inner">
							<form class="form-horizontal" action="login_proses.php" method="post" name="form_login" />
								<div class="input-prepend">
									<span class="add-on"> <i class="radmin-icon radmin-user"></i>
									</span>
									<input class="input-large" name="txtnama" id="input-username" size="16" type="text" placeholder="Username" /></div>
								<br />
								<br />
								<div class="input-prepend">
									<span class="add-on"> <i class="radmin-icon radmin-locked"></i>
									</span>
									<input class="input-large" name="txtpass" id="input-password" size="16" type="password" placeholder="Password" />
									</div>
							
							<input style="margin-top:20px; width:210px" class="btn btn-lg btn-primary btn-block" type="submit" value="Login" />
								<br><a href="depan.html"></br>
							</form>
						</div>

					</div>
				</div>
			</div>

			<div class="span4"></div>
		</div>

	</div>

</body></html>