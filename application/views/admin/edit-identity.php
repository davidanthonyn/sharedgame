<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title><?= $title ?></title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="<?php echo base_url() . "assetsadmin/"; ?>css/style.css">
	<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameSettings.png">
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
	<script type="text/javascript" src="<?php echo base_url() . "ckeditor/"; ?>ckeditor.js"></script>

</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<?php
						foreach ($customer as $listUser) { ?>
							<h2 class="page-title">Edit Identity: <?= $listUser->nama_lengkap ?> </h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<?php
										if ($this->session->flashdata('message')) {
										?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo $this->session->flashdata('message');
																							$this->session->unset_userdata('message');
																							?> </div><?php }
																										?>
										<?php
										if ($this->session->flashdata('message_error')) {
										?>
											<div class="errorWrap"><strong>ERROR</strong> : <?php echo $this->session->flashdata('message_error');
																							$this->session->unset_userdata('message_error');
																							?> </div><?php }
																										?>

										<div class="panel-body">

											<form method="post" action="<?php echo base_url() . 'Admin/reviewidentity/' . $listUser->id_user; ?>" class="form-horizontal" enctype="multipart/form-data">

												<div class="form-group">
													<label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="hidden" value="<?= $listUser->id_user ?>" name="userid" id="userid" class="form-control" disabled>
														<input type="text" value="<?= $listUser->nama_lengkap ?>" name="username" id="username" class="form-control">
													</div>

													<?php
													foreach ($card as $listCard) { ?>

												</div>
										</div>



										<div class="form-group">
											<div class="col-sm-4">
												<label class="col-sm-4 control-label">Status Identitas <span style="color:red">*</span></label>

												<select class="selectpicker" name="cardtype" id="cardtype" required>
													<?php if ($listCard->status_ktp == "belum") { ?>
														<option value="belum">Belum</option>
														<option value="sedang_verifikasi">Sedang Verifikasi</option>
														<option value="diterima">Diterima</option>
														<option value="ditolak">Ditolak</option>
													<?php } else if ($listCard->status_ktp == "sedang_verifikasi") { ?>
														<option value="sedang_verifikasi">Sedang Verifikasi</option>
														<option value="belum">Belum</option>
														<option value="diterima">Diterima</option>
														<option value="ditolak">Ditolak</option>
													<?php } else if ($listCard->status_ktp == "diterima") { ?>
														<option value="diterima">Diterima</option>
														<option value="sedang_verifikasi">Sedang Verifikasi</option>
														<option value="belum">Belum</option>
														<option value="ditolak">Ditolak</option>
													<?php } else if ($listCard->status_ktp == "ditolak") { ?>
														<option value="ditolak">Ditolak</option>
														<option value="diterima">Diterima</option>
														<option value="sedang_verifikasi">Sedang Verifikasi</option>
														<option value="belum">Belum</option>
													<?php }

													?>
												</select>
											</div>
											<label class="col-sm-2 control-label">KTP<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<img src="<?= base_url('assets/img/ktp/') . $listCard->foto_ktp  ?>" class="card-img" width="300" height="200">
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Selfie KTP<span style="color:red">*</span></label>
												<div class="col-sm-4">
													<img src="<?= base_url('assets/img/ktp/') . $listCard->foto_selfie_ktp  ?>" class="card-img" width="300" height="200">
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Note User<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<textarea value="<?= $listCard->note_user ?>" type="text" name="noteuser" id="noteuser" class="form-control">
														<?= form_error('noteuser', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>


													
												<?php } ?>





												<div class="hr-dashed"></div>
											</div>
										</div>
									</div>
								</div>
																</div>

								<!--
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Accessories</div>
									<div class="panel-body">


										<div class="form-group">
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
													<label for="airconditioner"> Air Conditioner </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
													<label for="powerdoorlocks"> Power Door Locks </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
													<label for="antilockbrakingsys"> AntiLock Braking System </label>
												</div>
											</div>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
												<label for="brakeassist"> Brake Assist </label>
											</div>
										</div>



										<div class="form-group">
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="powersteering" name="powersteering" value="1">
													<input type="checkbox" id="powersteering" name="powersteering" value="1">
													<label for="inlineCheckbox5"> Power Steering </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
													<label for="driverairbag">Driver Airbag</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
													<label for="passengerairbag"> Passenger Airbag </label>
												</div>
											</div>
											<div class="checkbox checkbox-inline">
												<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
												<label for="powerwindow"> Power Windows </label>
											</div>
										</div>


										<div class="form-group">
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
													<label for="cdplayer"> CD Player </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox h checkbox-inline">
													<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
													<label for="centrallocking">Central Locking</label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
													<label for="crashcensor"> Crash Sensor </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
													<label for="leatherseats"> Leather Seats </label>
												</div>
											</div>
										</div>
														-->



								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">

										<button class="btn btn-primary" name="submit" type="submit">Save</button>
									</div>
								</div>
							<?php
						}
							?>
							</form>
							<button class="btn btn-default"><a href="<?php echo base_url() . "admin/kelolaidentity"; ?>">Back</a></button>
							</div>
					</div>
				</div>
			</div>



		</div>
	</div>



	</div>
	</div>
	</div>
	<!-- Loading Scripts -->

	<!-- Loading Scripts -->
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/Chart.min.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/fileinput.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/chartData.js"></script>
	<script src="<?php echo base_url() . "assetsadmin/"; ?>js/main.js"></script>
	<script>
		function onlyNumberKey(evt) {

			// Only ASCII character in that range allowed
			var ASCIICode = (evt.which) ? evt.which : evt.keyCode
			if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
				return false;
			return true;
		}
	</script>
</body>

</html>
<?php //} 
?>