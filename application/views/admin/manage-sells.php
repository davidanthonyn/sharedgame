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
		<script src="<?php echo base_url() . "chartjs/"; ?>chart.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

			.dot {
				height: 25px;
				width: 25px;
				border-radius: 50%;
				display: inline-block;
			}
		</style>

	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title"><?= $title ?></h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading"><?= $smalltitle ?></div>
								<div class="panel-body">
									<canvas id="myChart"></canvas>


								</div>
							</div>



						</div>
					</div>

				</div>
			</div>
		</div>
		<script>
			let myChart = document.getElementById('myChart').getContext('2d');

			// Global Options
			Chart.defaults.global.defaultFontFamily = 'Lato';
			Chart.defaults.global.defaultFontSize = 18;
			Chart.defaults.global.defaultFontColor = '#777';

			let massPopChart = new Chart(myChart, {
				type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
				data: {
					labels: ['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
					datasets: [{
						label: 'Population',
						data: [
							617594,
							181045,
							153060,
							106519,
							105162,
							95072
						],
						//backgroundColor:'green',
						backgroundColor: [
							'rgba(255, 99, 132, 0.6)',
							'rgba(54, 162, 235, 0.6)',
							'rgba(255, 206, 86, 0.6)',
							'rgba(75, 192, 192, 0.6)',
							'rgba(153, 102, 255, 0.6)',
							'rgba(255, 159, 64, 0.6)',
							'rgba(255, 99, 132, 0.6)'
						],
						borderWidth: 1,
						borderColor: '#777',
						hoverBorderWidth: 3,
						hoverBorderColor: '#000'
					}]
				},
				options: {
					title: {
						display: true,
						text: 'Largest Cities In Massachusetts',
						fontSize: 25
					},
					legend: {
						display: true,
						position: 'right',
						labels: {
							fontColor: '#000'
						}
					},
					layout: {
						padding: {
							left: 50,
							right: 0,
							bottom: 0,
							top: 0
						}
					},
					tooltips: {
						enabled: true
					}
				}
			});
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