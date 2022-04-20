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

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<style>
	table {
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
</style>

<body>

	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Registered Users</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Reg Users</div>
							<div class="panel-body">
								<!--Pesan berhasil/gagal-->
								<?php
								if ($this->session->flashdata('messagesuccess')) {
								?>
									<div class="succWrap" role="alert"><?= $this->session->flashdata('messagesuccess'); ?></div>
								<?php
									$this->session->unset_userdata('messagesuccess');
								} else if ($this->session->flashdata('messagefailed')) {
								?>
									<div class="errorWrap" role="alert"><?= $this->session->flashdata('messagefailed'); ?></div>
								<?php
									$this->session->unset_userdata('messagefailed');
								}
								?>

								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Address</th>
											<th>Tanggal Lahir</th>
											<th>KTP</th>
											<th>Selfie KTP</th>
											<th>Status KTP</th>
											<th>Note User</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Address</th>
											<th>Tanggal Lahir</th>
											<th>KTP</th>
											<th>Selfie KTP</th>
											<th>Status KTP</th>
											<th>Note User</th>
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

										<?php /* $sql = "SELECT * from  tblusers ";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1; */
										if (!empty($user)) {
											foreach ($user as $listUser) {				?>
												<tr>
													<td><?php echo $listUser->id_user ?></td>
													<td><?php echo $listUser->nama_lengkap ?></td>
													<td><?php echo $listUser->alamat_lengkap ?></td>
													<td><?php echo $listUser->tgl_lahir ?></td>
													<td><img src="<?= base_url('assets/img/ktp/') . $listUser->foto_ktp  ?>" class="card-img" width="300" height="200"></td>
													<td><img src="<?= base_url('assets/img/ktp/') . $listUser->foto_selfie_ktp  ?>" class="card-img" width="300" height="200"></td>
													<td><?php echo $listUser->status_ktp ?></td>
													<td><?php echo $listUser->note_user ?></td>
													<td><a href="<?php echo base_url() . 'user/terimaidentity/' . $listUser->id_user; ?>">Terima</a> || <a href="<?php echo base_url() . 'user/tolakidentity/' . $listUser->id_user; ?>">Tolak</a> ||
														<a href="<?php echo base_url() . 'user/noteidentity/' . $listUser->id_user; ?>">Beri Catatan</a>
													</td>
												</tr>
										<?php //$id_user = $id_user + 1;
												//}
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
	<script>
		$(document).ready(function() {
			$('#zctb').DataTable();
		});
	</script>

</body>

</html>