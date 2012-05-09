<?php ?>

	<div id="admin_nav">
		<div class="row">
			<div class="span16 offset2">
				<ul class="tabs">
					<li id="suggestions"><a href="<?php echo base_url(); ?>index.php/main">Suggestions</a></li>
					<?php if($this->session->userdata('id') == 4){ ?>
					<!-- only administrator can see users -->
					<li id="users"><a href="<?php echo base_url(); ?>index.php/users">Users</a></li>
					<?php } ?>
					<li id="reports"><a href="<?php echo base_url(); ?>index.php/reports">Reports</a></li>
				</ul>
			</div>
		</div>
	</div>