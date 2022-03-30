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
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Brand Name</th>
												<th>Product Name</th>
												<!--<th>Price Per Day</th>
												<th>Price 3 Days</th>
												<th>Price 7 Days</th>-->
												<th>Product Category</th>
												<th>Product Color</th>
												<th>Product Picture</th>
												<th>Product Description</th>
												<th>Serial Product</th>
												<th>Stock</th>

												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Brand Name</th>
												<th>Product Name</th>
												<!--<th>Price 1 Day</th>
												<th>Price 3 Days</th>
												<th>Price 7 Days</th>-->
												<th>Product Category</th>
												<th>Product Color</th>
												<th>Product Picture</th>
												<th>Product Description</th>
												<th>Serial Product</th>
												<th>Stock</th>

												<th>Action</th>
											</tr>
											</tr>
										</tfoot>
										<tbody>

											<?php
											if (!empty($product)) {
												foreach ($product as $listProduct) { ?>
													<tr>
														<td><?php echo $listProduct->id_produk ?></td>
														<td><?php echo $listProduct->nama_brand ?></td>
														<td><?php echo $listProduct->nama_produk ?></td>
														<td><?php echo $listProduct->kategori_produk ?></td>
														<!--<td><span class="dot" color="<?php //echo $listProduct->warna_produk 
																							?>"></span></td>-->
														<!---
														<td>
															<font size="7" color="<?php //echo $listProduct->warna_produk
																					?>"><?php //echo $listProduct->warna_produk
																						?></font>
														</td>--->
														<!--
														<td style="background-color:<?php //echo $listProduct->warna_produk
																					?>;">
														</td>-->

														<td><span class="dot" style="background-color:<?php echo $listProduct->warna_produk
																										?>;"></span></td>
														<td><img src="<?= base_url('assets/img/product/') . $listProduct->gambar_produk ?>" class="card-img" width="100" height="100"></td>
														<td><?php echo $listProduct->deskripsi_produk ?></td>
														<td><?php echo $listProduct->serial_produk ?></td>
														<td><?php echo $listProduct->jumlah_tersedia ?></td>
														<td>
															<a href="<?php echo base_url() . 'Brand/edit_data/' . $listProduct->id_produk; ?>">Edit</a> ||
															<a href="<?php echo base_url() . 'Brand/delete_data/' . $listProduct->id_produk; ?>">Hapus</a>
														</td>
													</tr>
											<?php
												}
											}
											?>

										</tbody>
									</table>



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
	</body>

	</html>