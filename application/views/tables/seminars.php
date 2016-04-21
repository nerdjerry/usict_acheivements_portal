<div class="table-responsive">
				<table class="table-hover">
				<?php if(!empty($info)):?>
					<thead>
						<tr>
							<th>Title</th>
							<th>Organiser</th>
							<th>Place of Event</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Level</th>
							<th>Event</th>
							<th>Event Details</th>
							<th>Attended/Organised</th>
							<th>No of Participants</th>
						</tr>
					</thead>
				<?php endif;?>
					<tbody>
					<?php if(!empty($info)):
							foreach($info as $detail):?>
							<tr>
								<td><?php echo $detail['title']; ?></td>
								<td><?php 
									if(isset($detail['organiser']))
										echo $detail['organiser'];
									else
										echo "Not Available";
								?></td>
								<td><?php echo $detail['place'];?></td>
								<td><?php echo $detail['start_date'];?></td>
								<td><?php 
									if(isset($detail['end_date']))
										echo $detail['end_date'];
									else
										echo "Not Available";
								?></td>
								<td><?php echo $detail['region'];?></td>
								<td><?php echo $detail['type'];?></td>
								<td><?php echo $detail['event_details'];?></td>
								<td><?php echo $detail['status'];?></td>
								<td><?php
									if(isset($detail['no_of_participants'])) 
										echo $detail['no_of_participants'];
									else
										echo "Not Applicable";
								?></td>
							</tr>
							<?php endforeach;
						else:
							echo "<h2 class='center-error-text'>No Data Available</h2>";
						endif; ?>
					</tbody>
				</table>
</div>