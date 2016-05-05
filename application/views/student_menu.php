<style type="text/css">
	.nopadding{
		padding: 0 !important;
   		margin: 0 !important;
	}
	img{
		width:50px;
		height:50px
	}
</style>
<div id="sidebar-default" class="main-sidebar">
	<div class="current-user">
		<a href="index.html" class="name">
			<div class="row">
				<div class="col-md-2 nopadding">
					<img class="avatar" src="<?php echo base_url(get_user_pic());?>" />
				</div>
				<div class="col-md-8">
					<?php echo get_user_name(); ?>
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
				<a href="<?php echo base_url('/home/achievement');?>">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					<span>Add Achievement</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('/achievement/student');?>">
				<i class="fa fa-download" aria-hidden="true"></i>
					<span>My Achievements</span>
				</a>
			</li>
		</ul>
	</div>
</div>
