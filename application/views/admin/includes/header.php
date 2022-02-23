<div class="brand clearfix">
	<a href="" style="font-size: 20px;"><?= $title; ?></a>
	<span class="menu-btn"><i class="fa fa-bars"></i></span>
	<ul class="ts-profile-nav">

		<li class="ts-account">
			<a href="#">nama admin<i class="fa fa-angle-down hidden-side"></i></a>
			<ul>
				<li><a href="change-password.php">Change Password</a></li>
				<li><a href="<?= base_url('Auth/logout');
								?>">Logout</a></li>
			</ul>
		</li>
	</ul>
</div>