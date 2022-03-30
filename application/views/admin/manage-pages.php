	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">
		<link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>images/SharedGameController.png">
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
		<!--<script rel="javascript" type="text/javascript" src="<?php echo base_url() ?>jquery-3.4.1.min.js"></script>-->
		<script rel="javascript" type="text/javascript" src="<?php echo base_url() . "assetsadmin/";
																?>js/jquery.min.js"></script>
		<script type="text/JavaScript">
			/*
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
*/
		</script>

		<script type="text/javascript" src="<?php echo base_url() . "ckeditor/"; ?>ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url() . "assetsadmin/"; ?>js/nicEdit.js"></script>
		<script type="text/javascript">
			/*bkLib.onDomLoaded(function() {
				nicEditors.allTextAreas()
			});*/
		</script>

		<script>
			$(document).ready(function() {
				$('#id_page').change(function() {
					var id_page = $(this).val();

					$.ajax({

						type: 'POST',

						url: "<?php echo base_url('admin/getPagesByAjax') ?>",

						dataType: "JSON",

						data: {
							id_page: id_page
						},

						success: function(data)

						{

							$.each(data, function() {

								$('[name="page_name"]').val(data.page_name);

								$('[name="detail"]').val(data.detail);

								CKupdate();
								CKEDITOR.instances['detail'].setData(detail);

							});

						}



					});

				});

			});

			//JSONInPrettyFormat;
		</script>
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
		<?php include('includes/header.php');
		?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php');
			?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title"><?= $title; ?></h2>

							<div class="row">
								<div class="col-md-10">
									<div class="panel panel-default">
										<div class="panel-heading"><?= $smalltitle; ?></div>
										<div class="panel-body">
											<form method="post" class="form-horizontal" action="<?php echo base_url() . 'Admin/manage_page'; ?>">
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
												<div class="form-group">
													<label class="col-sm-4 control-label">select Page</label>
													<div class="col-sm-8">
														<!---
														<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
															<option value="" selected="selected" class="form-control">***Select One***</option>
															<option value="manage-pages.php?type=terms">terms and condition</option>
															<option value="manage-pages.php?type=privacy">privacy and policy</option>
															<option value="manage-pages.php?type=aboutus">aboutus</option>
															<option value="manage-pages.php?type=faqs">FAQs</option>
														</select>
														--->

														<select name="id_page" id="id_page">

															<option value="0">-- Pilih Halaman --</option>
															<?php foreach ($page as $listPage) { ?>
																<option value="<?php echo $listPage->id_page ?>"><?php echo $listPage->page_name ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-4 control-label">Page Details </label>
													<div class="col-sm-8">
														<textarea name="detail" id="detail" class="form-control" rows="5" cols="50">
										<?php
										/*
										$pagetype = $_GET['type'];
										$sql = "SELECT detail from tblpages where type=:pagetype";
										$query = $dbh->prepare($sql);
										$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {
												echo htmlentities($result->detail);
											}
										}*/
										?>

										</textarea>

														<?= form_error('detail', '<small class="text-danger pl-3">', '</small>'); ?>
														<script>
															// Replace the <textarea id="editor1"> with a CKEditor 4
															// instance, using default configuration.
															CKEDITOR.replace('detail');
															//var editor = CKEDITOR.replace('detail');
															//var detail = CKEDITOR.instances.editor.getData();

															function CKUpdate() {
																for (instance in CKEDITOR.instances) {
																	CKEDITOR.instances['detail'].updateElement();
																}
															}
														</script>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-4">

														<button type="submit" name="submit" value="Update" id="submit" class="btn-primary btn">Update</button>

													</div>
												</div>

											</form>
											<button class="btn btn-primary mb1 black bg-darken-1"><a href="<?php echo base_url() . "admin/add_page"; ?>">Tambah</a></button>

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

		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap-select.min.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/bootstrap.min.js"></script>
		<script rel="javascript" type="text/javascript" src="<?php echo base_url() . "assetsadmin/"; ?>js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/Chart.min.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/fileinput.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/chartData.js"></script>
		<script src="<?php echo base_url() . "assetsadmin/"; ?>js/main.js"></script>

	</body>

	</html>