<!DOCTYPE html>
	<html lang="en" dir="ltr" style="background-color: 	#0000ff">
	<head>
		<meta charset="utf-8">
		<title>Form Login Peserta Didik Baru</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/style/html.css">
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logorpl.jpg') ?>"/>
	</head>
	<body>
	<div class="limiter">
		<div class="container-login100" style="background-color: #2980b9;">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">	
	<form class="box" action="<?= base_url('Auth/login_action')?>" method="post">
		<?= $this->session->flashdata('message'); ?>
		<span class="login100-form-title p-b-30 animated fadeInDown" style="font-family: sans-serif;font-size: 300%;margin-top: -10%">
						<img width="40%" src="<?php echo base_url('assets/img/smk.jpg') ?>" alt=""><br>
						<!-- <i>Newsletter</i> -->
					</span>
		<a><b><i>FORM LOGIN PENDAFTARAN</i></b></a>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="" value="Login">
	</form>

	</body>
	</html>	