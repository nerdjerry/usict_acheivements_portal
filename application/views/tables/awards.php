<div class="table-responsive">
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
				<th>Details</th>
				<th>Date</th>
				<th>Amount</th>
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
					<td><?php echo $detail['details']; ?></td>
					<td><?php 
						if(isset($detail['date']))
							echo $detail['date'];
						else
							echo "Not Available";
					?></td>
					<td><?php 
						if(isset($detail['amount']))
							echo "&#x20B9;".$detail['amount'];
						else
							echo "Not Available";
					?></td>
					<?php if(!isset($requestedUserType)):?>
					<td><a href="<?php echo base_url('/achievement/deleteAchievement/'.$infoType.'/'.$detail['id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
					<?php endif;?>
				</tr>
				<?php endforeach;
			else:
				echo "<h2 class='center-error-text'>No Data Available</h2>";
			endif; ?>
		</tbody>
	</table>
</div>