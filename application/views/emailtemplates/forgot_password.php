<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to SharedGame</title>
	<style type="text/css">
		body {
			Margin: 0;
			padding: 0;
			background-color: #F6F9FC;
		}

		table {
			border-spacing: 0;
		}

		td {
			padding: 0;
		}

		img {
			border: 0;
		}

		.wrapper {
			width: 100%;
			table-layout: fixed;
			background-color: #F6F9FC;
			padding-bottom: 40px;
		}

		.webkit {
			max-width: 600px;
			background-color: #FFFFFF;
		}

		.outer {
			Margin: 0 auto;
			width: 100%;
			max-width: 600px;
			border-spacing: 0;
			font-family: sans-serif;
			color: #4a4a4a;
		}

		.three-columns {
			text-align: center;
			font-size: 0;
			padding-top: 40px;
			padding-bottom: 30px;
		}

		.three-columns .column {
			width: 100%;
			max-width: 200px;
			display: inline-block;
			vertical-align: top;
		}

		.padding {
			padding: 15px;
		}

		.three-columns .content {
			font-size: 15px;
			line-height: 20px;
		}

		a {
			text-decoration: none;
			color: #F76D2B;
			font-size: 8px;
		}

		.btn {
			font-family: "Roboto", sans-serif;
			font-size: 12px;
			font-weight: bold;
			background: #95D321;
			width: 100px;
			padding: 20px;
			text-align: center;
			text-decoration: none;
			text-transform: uppercase;
			color: #fff;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		@media screen and (max-width: 600px) {
			img.third-img-last {
				width: 200px !important;
				max-width: 200px !important;
			}

			.padding {
				padding-right: 0 !important;
				padding-left: 0 !important;
			}
		}

		@media screen and (max-width: 400px) {
			img.third-img {
				width: 200px !important;
				max-width: 200px !important;
			}
		}
	</style>
</head>

<body>
	<center class="wrapper">
		<div class="webkit">
			<table class="outer" align="center">
				<tr>
					<td>
						<table width="100%" style="border-spacing: 0;">
							<tr>
								<td style="background-color: #F76D2B;padding:10px;text-align: 
								center;">
									<!--
									<a href="https://sharedgame.tech"><img src="img/SharedGameController.png" width="60"
											<a href="https://sharedgame.tech">-->
									<img src="<?php base_url('assets/images/SharedGameController.png') ?>" width="60" alt="Logo" title="Logo"></a>

								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-size: 30px;font-weight:bold;text-align:center;
															">Lupa Password</p><br>
						<!--
						<a href="https://sharedgame.tech"><img src="https://drive.google.com/thumbnail?id=1k9j5YPQLVX2dhRM3ZH7QrpVd1Ohg73Ld" width="600" alt="Banner" style="max-width: 100%;"></a>
	-->
						<a href="<?= base_url('auth/resetpassword?email=' . $email . '&token=' . urlencode($token)) ?>" class="btn" style="align-items:center; justify-content:center; display: block; margin:0 auto;">Reset Password</a><br><br>

						<hr>
						<p style="text-align:center;font-size: 10px;">Apabila Anda tidak mengajukan ganti Password pada SharedGame, mohon untuk tidak menekan tombol Reset Password.</p>

					</td>
				</tr>

				<tr>
					<td>
						<!--
						<table width="100%" style="border-spacing: 0;">
							<tr>
								<td class="three-columns">
									<table class="column">
										<tr>
											<td class="padding">
												<table class="content">
													<tr>
														<td><a href="#"><img src="https://drive.google.com/thumbnail?id=1S8ldynQLVnz7WVkMoYLDn0vKasbnJ__u" alt="" width="150" style="max-width: 150px;"></a>
														</td>
													</tr>
													<tr>
														<td style="padding: 10px;">
															<p style="font-size: 17px;font-weight:bold;
															">Apple Watch</p>
															<p>Responsive HTML Email Templates that you can build around
																to master email development. </p>
															</p>
															<a href="#">Learn more.</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>

									<table class="column">
										<tr>
											<td class="padding">
												<table class="content">
													<tr>
														<td><a href="#"><img src="https://drive.google.com/thumbnail?id=12E7UqSJZ9i_sINeNa--5hrkLQIiKpFJ3" alt="" width="150" style="max-width: 150px;"></a>
														</td>
													</tr>
													<tr>
														<td style="padding: 10px;">
															<p style="font-size: 17px;font-weight:bold;
															">AirPods</p>
															<p>Responsive HTML Email Templates that you can build around
																to master email development. </p>
															<a href="#">Learn more.</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>

									<table class="column">
										<tr>
											<td class="padding">
												<table class="content">
													<tr>
														<td><a href="#"><img class="third-img-last" src="https://drive.google.com/thumbnail?id=1RiMDImtqo9mAG9El-lkmTLfFyNZtv-BW" alt="" width="150" style="max-width: 150px;"></a>
														</td>
													</tr>
													<tr>
														<td style="padding: 10px;">
															<p style="font-size: 17px;font-weight:bold;
															">Apple Watch</p>
															<p>Responsive HTML Email Templates that you can build around
																to master email development. </p>
															<a href="#">Learn more.</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
	-->


					</td>
				</tr>
			</table>
			</td>
			</tr>

			<tr>
				<td>
					<table width="100%" style="border-spacing: 0;">
						<tr>
							<td style="background-color: #F76D2B;padding: 10px;text-align: center;">
								<p style="font-size: 15px;color: #fff;Margin-bottom:13px;">Connect with us</p>
								<a href="#1"><img src="<?php base_url('assets/images/white-facebook.png') ?>" width="30" alt=""></a>
								<a href="#2"><img src="<?php base_url('assets/images/white-twitter.png') ?>" width="30" alt=""></a>
								<a href="#3"><img src="<?php base_url('assets/images/white-youtube.png') ?>" width="30" alt=""></a>
								<a href="#4"><img src="<?php base_url('assets/images/white-linkedin.png') ?>" width="30" alt=""></a>
								<a href="#5"><img src="<?php base_url('assets/images/white-instagram.png') ?>" width="30" alt=""></a>

							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td style="background-color: #efefef;">
					<table width="100%" style="border-spacing: 0;">
						<tr>
							<td style="padding:10px; text-align:center;padding-bottom: 5px;">
								<!--
									<a href="#"><img src="img/SharedGameController.png" alt="" width="60"></a>
									-->
								<a href="<?php base_url(); ?>"><img src="<?php base_url('assets/images/SharedGameController.png') ?>" width="60" alt="Logo" title="Logo"></a>
								<?php

								foreach ($cs as $listCs) { ?>
									<p style="font-size: 8px;Margin-top:9px;"><?php echo $listCs->pesan_cs ?></p>
									<p style="font-size: 8px;Margin-top:9px;"><?php echo $listCs->nama_lengkap ?></p>
									<p style="font-size: 8px;Margin-top:9px;"><a href="mailto:<?php echo $listCs->email_cs ?>"><?php echo $listCs->email_cs ?></a></p>
									<p style="font-size: 8px;Margin-top:9px;"><a href="tel:<?php echo $listCs->number_cs ?>"><?php echo $listCs->number_cs ?></a>
									</p>
								<?php }

								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td align="center" style="padding-bottom:25px;text-align:center;">
					<table width="100%" style="border-spacing: 0;">
						<tr>
				</td>
			</tr>

			<tr>
				<td height="20" style="background-color: #F76D2B;"></td>
			</tr>
			</table>
			</td>
			</tr>

			</table>
		</div>
	</center>

</body>

</html>

<!---
<div style=" position:absolute;bottom: 0;width: 100%;text-align: center;line-height: 40px;font-size: 25px;">
	<a href="https://sharedgame.tech" target="_blank"
		style="color: #404577;text-decoration: none;">www.sharedgame.tech</a>
</div>
-->