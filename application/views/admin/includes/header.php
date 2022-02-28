<div class="brand clearfix">
	<a href="" style="font-size: 20px;"><?= $title; ?></a>
	<span class="menu-btn"><i class="fa fa-bars"></i></span>
	<ul class="ts-profile-nav">

		<li class="ts-account">
			<?php
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			?>
			<a href="#"><?= $data['user']['nama_lengkap']; ?><i class="fa fa-angle-down hidden-side"></i></a>
			<ul>
				<li><a href="change-password.php">Change Password</a></li>
				<li><a href="<?= base_url('');
								?>">Web Page for Customer</a></li>
				<li><a href="<?= base_url('Auth/logout');
								?>">Logout</a></li>
			</ul>
		</li>
	</ul>
</div>