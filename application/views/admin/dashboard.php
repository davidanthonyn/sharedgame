<?php
//session_start();
error_reporting(0);
//include('includes/config.php');
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

	<title><?= $title; ?></title>
	<link href="<?php echo base_url() . "assets/"; ?>css/font-awesome.min.css" rel="stylesheet">

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
</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title"><?= $title; ?></h2>

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql = "SELECT id from tblusers ";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$regusers = $query->rowCount();*/
													?>
													<div class="stat-panel-number h1 "><?= $jumlahcustomer; ?></div>
													<div class="stat-panel-title text-uppercase">Customer</div>
												</div>
											</div>
											<a href="reg-users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql1 = "SELECT id from tblvehicles ";
														$query1 = $dbh->prepare($sql1);;
														$query1->execute();
														$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
														$totalvehicle = $query1->rowCount();*/
													?>
													<div class="stat-panel-number h1 "><?= $jumlahproduct; ?></div>
													<div class="stat-panel-title text-uppercase">Listed Products</div>
												</div>
											</div>
											<a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql2 = "SELECT id from tblbooking ";
													$query2 = $dbh->prepare($sql2);
													$query2->execute();
													$results2 = $query2->fetchAll(PDO::FETCH_OBJ);
													$bookings = $query2->rowCount();*/
													?>

													<div class="stat-panel-number h1 "><?= $jumlahbooking; ?></div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql3 = "SELECT id from tblbrands ";
														$query3 = $dbh->prepare($sql3);
														$query3->execute();
														$results3 = $query3->fetchAll(PDO::FETCH_OBJ);
														$brands = $query3->rowCount();*/
													?>
													<div class="stat-panel-number h1 "><?= $jumlahbrand; ?></div>
													<div class="stat-panel-title text-uppercase">Listed Brands</div>
												</div>
											</div>
											<a href="<?= base_url('brand/kelola'); ?>" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12">


						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql4 = "SELECT id from tblsubscribers ";
														$query4 = $dbh->prepare($sql4);
														$query4->execute();
														$results4 = $query4->fetchAll(PDO::FETCH_OBJ);
														$subscribers = $query4->rowCount();*/
													?>
													<div class="stat-panel-number h1 "><?= $jumlahsubs; ?></div>
													<div class="stat-panel-title text-uppercase">Subscribers</div>
												</div>
											</div>
											<a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
													/*$sql6 = "SELECT id from tblcontactusquery ";
													$query6 = $dbh->prepare($sql6);;
													$query6->execute();
													$results6 = $query6->fetchAll(PDO::FETCH_OBJ);
													$query = $query6->rowCount();*/
													?>
													<div class="stat-panel-number h1 "><?= $jumlahcustomerservice; ?></div>
													<div class="stat-panel-title text-uppercase">Keluhan Customer Service</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<!---
										<div class="col-md-3">
											<div class="panel panel-default">
												<div class="panel-body bk-info text-light">
													<div class="stat-panel text-center">
														<?php
														/*$sql5 = "SELECT id from tbltestimonial ";
														$query5 = $dbh->prepare($sql5);
														$query5->execute();
														$results5 = $query5->fetchAll(PDO::FETCH_OBJ);
														$testimonials = $query5->rowCount();*/
														?>

														<div class="stat-panel-number h1 "><?php /* echo htmlentities($testimonials); */ ?></div>
														<div class="stat-panel-title text-uppercase">Testimonials</div>
													</div>
												</div>
												<a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>
										</div>
										--->
								</div>
							</div>
						</div>
					</div>
				</div>









			</div>
		</div>
	</div>

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
	<!---
	<script>
		window.onload = function() {

			// Line chart from swirlData for dashReport
			var ctx = document.getElementById("dashReport").getContext("2d");
			window.myLine = new Chart(ctx).Line(swirlData, {
				responsive: true,
				scaleShowVerticalLines: false,
				scaleBeginAtZero: true,
				multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
			});

			// Pie Chart from doughutData
			var doctx = document.getElementById("chart-area3").getContext("2d");
			window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
				responsive: true
			});

			// Dougnut Chart from doughnutData
			var doctx = document.getElementById("chart-area4").getContext("2d");
			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
				responsive: true
			});

		}
	</script>
	--->
</body>

</html>