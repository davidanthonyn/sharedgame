<?php
/*
//session_start();
error_reporting(0);
//include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Vehicle posted successfully";
		} else {
			$error = "Something went wrong. Please try again";
		}
	}

*/
?>
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

						<h2 class="page-title">Post A Product</h2>

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
										<?php
										foreach ($productEdit as $listProductEdit) { ?>
											<form method="post" action="<?php echo base_url() . 'Admin/edit_data_produk'; ?>" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Product Name<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" value="<?= $listProductEdit->nama_produk ?>" name="productname" id="productname" class="form-control">
														<?= form_error('productname', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
													<div class="col-sm-4">

														<select class="selectpicker" name="id_brand" required>

															<?php foreach ($brand as $listBrand) { ?>

																<option value="<?php echo $listBrand->id_brand ?>">

																	<?php echo $listBrand->nama_brand ?>

																</option>

															<?php } ?>
														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Deskripsi Produk<span style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" cols="50"></textarea>

														<?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
														<script>
															// Replace the <textarea id="editor1"> with a CKEditor 4
															// instance, using default configuration.
															CKEDITOR.replace('deskripsi');
															//var editor = CKEDITOR.replace('detail');
															//var detail = CKEDITOR.instances.editor.getData();

															function CKUpdate() {
																for (instance in CKEDITOR.instances) {
																	CKEDITOR.instances['deskripsi'].updateElement();
																}
															}
														</script>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Price 1 Day<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="priceperday" id="priceperday" class="form-control">
														<?= form_error('priceperday', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<label class="col-sm-2 control-label">Price 3 Days<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="price3days" id="price3days" class="form-control">
														<?= form_error('price3days', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Price 7 Days<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="price7days" id="price7days" class="form-control">
														<?= form_error('price7days', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<label class="col-sm-2 control-label">Select Game Type<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="gametype" id="gametype" required>

															<option value="console">Console</option>
															<option value="game_physics">Game Physics</option>
															<option value="CNG">Game Gear</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Serial Produk<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input value="<?= $listProductEdit->serial_produk ?>" type="text" name="serialnumber" id="serialnumber" class="form-control">
														<?= form_error('serialnumber', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
													<label class="col-sm-2 control-label">Jumlah Stok Tersedia<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input value="<?= $listProductEdit->jumlah_tersedia ?>" type="text" name="stock" id="stock" class="form-control">
														<?= form_error('stock', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Warna Produk<span style="color:white">*</span></label>
													<div class="col-sm-4">
														<input type="color" id="favcolor" name="favcolor" value="#ffffff"><br><br>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<img src="<?= base_url('assets/img/product/') . $listProductEdit->gambar_produk ?>" class="card-img" width="100" height="100">
												<div class="form-group">
													<div class="col-sm-12">
														<h4><b>Upload Images</b></h4>
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														Product Image<span style="color:red">*</span><input type="file" name="img" id="img">
													</div>
													<!--
												<div class="col-sm-4">
													Image 2<span style="color:red">*</span><input type="file" name="img2" required>
												</div>
												<div class="col-sm-4">
													Image 3<span style="color:red">*</span><input type="file" name="img3" required>
												</div>
														-->
												</div>

												<!---
											<div class="form-group">
												<div class="col-sm-4">
													Image 4<span style="color:red">*</span><input type="file" name="img4" required>
												</div>
												<div class="col-sm-4">
													Image 5<input type="file" name="img5">
												</div>

											</div>
														-->

												<div class="hr-dashed"></div>
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
					<button class="btn btn-default"><a href="<?php echo base_url() . "admin/kelolaproduk"; ?>">Cancel</a></button>
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
	<script>
		function CKupdate() {
			for (instance in CKEDITOR.instance) {
				CKEDITOR.instances[''].updateElement();
			}
		}
	</script>

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
</body>

</html>
<?php //} 
?>