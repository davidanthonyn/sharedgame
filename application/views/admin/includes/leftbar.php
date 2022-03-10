	<nav class="ts-sidebar">
		<ul class="ts-sidebar-menu">

			<li class="ts-label">Home</li>
			<li><a href="<?= base_url('admin');
							?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

			<li class="ts-label">Resources</li>
			<li><a href="#"><i class="fa fa-files-o"></i> Brands</a>
				<ul>
					<li><a href="<?= base_url('brand/tambahbrand');
									?>">Add Brand</a></li>
					<li><a href="<?= base_url('brand/kelola');
									?>">Manage Brands</a></li>
				</ul>
			</li>

			<li><a href="#"><i class="fa fa-sitemap"></i> Products</a>
				<ul>
					<li><a href="post-avehical.php">Post a Product</a></li>
					<li><a href="<?= base_url('product/kelolaproduk');
									?>">Manage Products</a></li>
				</ul>
			</li>

			<li class="ts-label">Orders</li>
			<li><a href="manage-bookings.php"><i class="fa fa-users"></i>Booking</a></li>

			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i>Rekening Toko</a></li>


			<li class="ts-label">Users</li>
			<li><a href="reg-users.php"><i class="fa fa-users"></i> Manage Users</a>
				<ul>
					<li><a href="post-avehical.php">Admin</a></li>
					<li><a href="manage-vehicles.php">Karyawan</a></li>
					<li><a href="manage-vehicles.php">Customer</a></li>
					<li><a href="manage-vehicles.php">Customer + Member</a></li>
				</ul>
			</li>
			<li><a href="manage-contactusquery.php"><i class="fa fa-desktop"></i> Manage Customer Service</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>

		</ul>
	</nav>