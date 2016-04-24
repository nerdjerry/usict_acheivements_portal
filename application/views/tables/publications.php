<div class="table-responsive" id="results">
	<table class="table">
	<?php if(!empty($info)):?>
		<thead>
			<tr>
				<?php if(isset($requestedUserType)):?>
				<th>Name</th>
					<?php if($requestedUserType == 1):?>
							<th>Designation</th>
						<?php elseif ($requestedUserType == 2):?>
							<th>Branch</th>
							<th>Year</th>
						<?php endif;?>
				<?php endif;?>
				<th>Title</th>
				<th>Date of Publication</th>
				<th>Journal/Conference Name</th>
				<th>Co Author</th>
				<th>Co Author</th>
				<th>Co Author</th>
				<th>Co Author</th>
				<th>Presented In</th>
				<th>Level</th>
				<?php if(!isset($requestedUserType)):?>
				<th></th>
				<?php endif;?>
				</tr>
			</thead>
		<?php endif;?>
			<tbody>
			<?php if(!empty($info)):
					foreach($info as $detail):?>
					<tr>
					<?php if(isset($requestedUserType)):?>
						<td><?php echo $detail['name'];?></td>
						<?php if($requestedUserType == 1):?>
							<td><?php echo $detail['designation'];?></td>
						<?php elseif($requestedUserType == 2):?>
							<td><?php echo $detail['branch'];?></td>
							<td><?php echo $detail['year'];?></td>
						<?php endif;?>
					<?php endif;?>
					<td><?php echo $detail['title']; ?></td>
					<td><?php 
						if(is_null($detail['month_of_pub']))
							echo noToMonth($detail['month_of_pub']).",".$detail['year_of_pub'];
						else
							echo $detail['year_of_pub'];
					?></td>
					<td><?php echo $detail['journal_name'];?></td>
					<td><?php 
						if(isset($detail['coauthor_1']))
							echo $detail['coauthor_1'];
						else
							echo "--";
					?></td>
					<td><?php 
						if(isset($detail['coauthor_2']))
							echo $detail['coauthor_2'];
						else
							echo "--";
					?></td>
					<td><?php 
						if(isset($detail['coauthor_3']))
							echo $detail['coauthor_3'];
						else
							echo "--";
					?></td>
					<td><?php 
						if(isset($detail['coauthor_4']))
							echo $detail['coauthor_4'];
						else
							echo "--";
					?></td>
					<td><?php echo $detail['presented_in'];?></td>
					<td><?php echo $detail['presented_at'];?></td>
					<?php if(!isset($requestedUserType)):?>
					<div class="modal fade" id="confirm_deletion">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aia-hidden="true">&times;</span><span class="sr-only"></span></button>
									<h4 class="modal-title">Confirm Deletion</h4>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete the Publication&hellip;</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
									<a href="<?php echo base_url('/achievement/deleteAchievement/'.$infoType.'/'.$detail['id']);?>"><button class="btn btn-primary">Yes</button></a>
								</div>
							</div>
						</div>
					</div>
				<td><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#confirm_deletion"></i></a></td>
					<?php endif;?>
					</tr>
				<?php endforeach;
				else:
				echo "<h2 class='center-error-text'>No Data Available</h2>";
				endif; ?>
		</tbody>
	</table>
</div>
<?php if(isset($results) && $results)
	echo '<script>scrollToResult();</script>';
?>