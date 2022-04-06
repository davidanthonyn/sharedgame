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
									<canvas id="myChart" width="400" height="400"></canvas>


								</div>
							</div>



						</div>
					</div>

				</div>
			</div>
		</div>
		<script>
			const ctx = document.getElementById('myChart').getContext('2d');
			const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					datasets: [{
						label: '# of Votes',
						data: [12, 19, 3, 5, 2, 3],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true
						}
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
		<script src="<?php echo base_url() . "chartjs/"; ?>chart.min.js"></script>
	</body>

	</html>