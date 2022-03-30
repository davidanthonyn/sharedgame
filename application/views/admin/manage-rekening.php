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

	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Manage Rekening</h2>

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

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Listed Rekening</div>
								<div class="panel-body">
									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Bank</th>
												<th>No Rekening</th>
												<th>Status Rekening</th>
												<th>Creation Datetime</th>

												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
                                                <th>#</th>
												<th>Nama Bank</th>
												<th>No Rekening</th>
												<th>Status Rekening</th>
												<th>Creation Datetime</th>

												<th>Action</th>
											</tr>
											</tr>
										</tfoot>
										<tbody>

											<?php
											foreach ($rekening as $listrekening) { ?>
												<tr>
													<td><?php echo $listrekening->id_rekening_toko ?></td>
													<td><?php echo $listrekening->bank_rekening_toko ?></td>

													<td><?php echo $listrekening->no_rekening_toko ?></td>
													<td><?php echo $listrekening->status_rekening_toko ?></td>
                                                    <td><?php echo $listrekening->created_at ?></td>
													<td>
														<a href="<?php echo base_url() . 'Rekening/edit_data/' . $listrekening->id_rekening_toko; ?>">Edit</a> ||
														<a href="<?php echo base_url() . 'Rekening/delete_data/' . $listrekening->id_rekening_toko; ?>">Hapus</a>
													</td>
												</tr>
											<?php
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