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
					<li><a href="<?= base_url('product/tambahproduk');
									?>">Post a Product</a></li>
					<li><a href="<?= base_url('product/kelolaproduk');
									?>">Manage Products</a></li>
				</ul>
			</li>


			<li class="ts-label">Orders</li>
			<li><a href="#"><i class="fa fa-files-o"></i> Rekening Toko</a>
				<ul>
					<li><a href="<?= base_url('Rekening/tambahrekening');
									?>">Add Rekening</a></li>
					<li><a href="<?= base_url('Rekening/kelola');
									?>">Manage Rekening</a></li>
				</ul>
			</li>
			<li><a href="manage-bookings.php"><i class="fa fa-users"></i>Booking</a>
			<ul>
					
					<li><a href="<?= base_url('Booking/manage');
									?>">Booking/Transaksi</a></li>
				</ul>

				<ul>
					
					<li><a href="<?= base_url('Booking/kelola');
									?>">Produk Booking</a></li>
				</ul>	
		
		
		
		</li>
			


			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i>Performa Sewa Produk</a></li>


			<li class="ts-label">Users</li>
			<li><a href="reg-users.php"><i class="fa fa-users"></i>Users</a>
				<ul>
					<li><a href="post-avehical.php">Admin</a></li>
					<li><a href="manage-vehicles.php">Karyawan</a></li>
					<li><a href="manage-vehicles.php">Customer</a></li>
					<li><a href="manage-vehicles.php">Customer + Member</a></li>
				</ul>
			</li>
			<li><a href="manage-contactusquery.php"><i class="fa fa-desktop"></i>Customer Service</a></li>


			<li class="ts-label">Pages</li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Contact Info</a></li>
			<li><a href="<?= base_url('admin/manage_page');
							?>"><i class="fa fa-files-o"></i> About / FAQ / Privacy / Terms</a></li>

		</ul>
	</nav>