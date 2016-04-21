
<div id="sidebar-default" class="main-sidebar">
	<div class="current-user">
		<a href="index.html" class="name">
			<img class="avatar" src="<?php echo base_url('images/avatars/1.jpg');?>" />
			<span>
				<?php echo get_user_name(); ?>
				<i class="fa fa-chevron-down"></i>
			</span>
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
				<a href="<?php echo base_url('home/award');?>">
					<i class="ion-flash"></i> 
					<span>Awards</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('home/project');?>">
					<i class="ion-flash"></i> 
					<span>Projects</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('home/publication');?>">
					<i class="ion-flash"></i> 
					<span>Publications</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('home/seminar');?>">
					<i class="ion-flash"></i> 
					<span>Seminars</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('achievement');?>">
					<i class="ion-flash"></i> 
					<span>My Achievements</span>
				</a>
			</li>
		</ul>
	</div>
</div>