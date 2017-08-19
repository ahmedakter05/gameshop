<div class="widget">
	<div class="panel panel-default">
		<div class="panel-heading">User Menu</div>
		<div class="panel-body no-padding">
			<ul class="panel-list-bordered">
				<?php if (!$this->ion_auth->logged_in())	{ ?>
				<li><a href="<?php echo base_url(); ?>games/login"><i class="fa fa-gamepad"></i> Login</a></li>
				<li><a href="<?php echo base_url(); ?>games/register"><i class="fa fa-paper-plane"></i> Register</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>games/manage_orders"><i class="fa fa-user-secret"></i> Manage Orders</a></li>
				<li><a href="<?php echo base_url(); ?>games/edit_profile"><i class="fa fa-users"></i> View Profile</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>