	<nav class="ts-sidebar">
		<ul class="ts-sidebar-menu">

			<!-- QUERY MENU -->
			<?php
			$id_role = $this->session->userdata('id_role');
			$queryMenu = "SELECT `user_menu`.`id_user_menu`, `menu` 
				FROM `user_menu` JOIN `user_access_menu` 
				ON `user_menu`.`id_user_menu` = `id_access`
				WHERE `user_access_menu`.`id_role` = $id_role
				ORDER BY `id_access` ASC
				";



			$menu = $this->db->query($queryMenu)->result_array();

			?>

			<!-- LOOPING MENU -->
			<?php
			foreach ($menu as $m) : ?>
				<div class="sidebar-heading">
					<?= $m['menu'] ?>
				</div>



				<!-- LOOPING SUB-MENU -->
				foreach ($menu as $m) : ?>
				<div class="sidebar-heading">
					<?= $m['menu'] ?>
				</div>

				<?php
				$menuId = $m['id_user_menu'];
				$querySubMenu = "SELECT * 
								FROM `user_sub_menu` JOIN `user_menu` 
									ON `user_sub_menu`.`id_sub_menu` = `user_menu`.id_user_menu 
									WHERE `user_sub_menu`.`id_sub_menu` = $menuId
									AND `user_sub_menu`.`is_active` = YES
									ORDER BY `id_access` ASC";

				$querySubMenu = "SELECT * 
								FROM `user_sub_menu` WHERE `id_sub_menu` = $menuId
								AND `is_active` = 'yes'";

				$subMenu = $this->db->query($querySubMenu)->result_array();
				?>

				<!-- LOOPING SUB-MENU -->
				<?php foreach ($subMenu as $sm) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url($sm['url']); ?>">
							<i class="<?= $sm['icon']; ?>"></i>
							<span><?= $sm['title']; ?></span></a>
					</li>

				<?php endforeach; ?>

			<?php endforeach; ?>

			<li class="ts-label">Main</li>
			<li><a href="<?= base_url('admin');
							?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

			<li><a href="#"><i class="fa fa-files-o"></i> Brands</a>
				<ul>
					<li><a href="<?= base_url('brand/tambahbrand');
									?>">Add Brand</a></li>
					<li><a href="<?= base_url('brand/kelola');
									?>">Manage Brands</a></li>
				</ul>
			</li>
			<li class="ts-label">Main</li>

			<li><a href="#"><i class="fa fa-sitemap"></i> Products</a>
				<ul>
					<li><a href="post-avehical.php">Post a Product</a></li>
					<li><a href="<?= base_url('product/kelolaproduk');
									?>">Manage Products</a></li>
				</ul>
			</li>
			<li><a href="manage-bookings.php"><i class="fa fa-users"></i> Manage Booking</a></li>
			<li><a href="manage-contactusquery.php"><i class="fa fa-desktop"></i> Manage Customer Service</a></li>

			<li><a href="reg-users.php"><i class="fa fa-users"></i> Manage Users</a>
				<ul>
					<li><a href="post-avehical.php">Admin</a></li>
					<li><a href="manage-vehicles.php">Karyawan</a></li>
					<li><a href="manage-vehicles.php">Customer</a></li>
				</ul>
			</li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>
			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i> Manage Rekening Toko</a></li>
			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i> Manage Members</a></li>

		</ul>
	</nav>