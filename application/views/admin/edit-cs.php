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

							<h2 class="page-title">Balas Customer</h2>
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
							<div class="row">
								<div class="col-md-10">
									<div class="panel panel-default">
										<div class="panel-heading">Form fields</div>
										<div class="panel-body">
											<?php foreach ($CSEdit as $listCSEdit) { ?>
												<form method="post" class="form-horizontal" action="<?= base_url('rekening/proses_edit_data'); ?>">

													<div class="form-group">
														<label class="col-sm-4 control-label">Nama Lengkap</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" value="<?= $listRekeningEdit->id_rekening_toko ?>" name="idrekening" id="idrekening" readonly>
														</div>
													</div>

													<div class="form-group">
														<label class="col-sm-4 control-label">Create at</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" value="<?= $listRekeningEdit->bank_rekening_toko ?>" name="rekening" id="rekening">
															<?= form_error('rekening', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

                                                    <div class="form-group">
														<label class="col-sm-4 control-label">Status</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" value="<?= $listRekeningEdit->no_rekening_toko ?>" name="no_rekening" id="no_rekening">
															<?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>
													</div>

													<tr>
														<label class="col-sm-4 control-label">Status</label>
														<td>

															<select name="status">
																<?php if ($listRekeningEdit->status_rekening_toko == "aktif") { ?>

																	<option value="pending">Pending</option>
																	<option value="processed">Processed</option>
                                                                    <option value="done">Done</option>
																<?php } else if ($listRekeningEdit->status_rekening_toko == "tidak_aktif") { ?>
																	<option value="processed">Processed</option>
																	<option value="done">Done</option>
                                                                    <option value="pending">Pending</option>
                                                                <?php }else if ($listRekeningEdit->status_rekening_toko == "aktif") { ?>
                                                                    <option value="dong">Done</option>
																	<option value="pending">pending</option>
                                                                    <option value="processed">Processed</option>
																<?php } ?>
															</select>

														</td>
													</tr>

													<div class="hr-dashed"></div>

													

													<div class="form-group">
														<div class="col-sm-8 col-sm-offset-4">

															<button class="btn btn-primary" name="submit" type="submit">Submit</button>
														</div>
													</div>
												<?php
											}
												?>
												</form>

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