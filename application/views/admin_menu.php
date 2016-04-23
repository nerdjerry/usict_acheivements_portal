<div id="sidebar-default" class="main-sidebar">
	<div class="current-user">
		<a href="index.html" class="name">
			<div class="row">
				<div class="col-md-2 nopadding">
					<img class="avatar" src="<?php echo base_url(get_user_pic());?>" />
				</div>
				<div class="col-md-8">
					Admin
				</div>
				<div class="col-md-2 nopadding">
				<i class="fa fa-chevron-down" style=""></i>
				</div>
			</div>
		</a>
		<ul class="menu">
			<li>
				<a href="<?php echo base_url('logout');?>">Sign out</a>
			</li>
		</ul>
	</div>
	<div class="menu-section">
		<ul>
			<li>
				<a href="<?php echo base_url('achievement/admin/1');?>">
				<i class="fa fa-download" aria-hidden="true"></i>
					<span>Faculty</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('achievement/admin/2');?>">
				<i class="fa fa-download" aria-hidden="true"></i>
					<span>Students</span>
				</a>
			</li>
		</ul>
	</div>
</div>