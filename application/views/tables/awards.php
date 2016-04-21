<div class="table-responsive">
				<table class="table">
				<?php if(!empty($info)):?>
					<thead>
						<tr>
							<th>Details</th>
							<th>Date</th>
							<th>Amount</th>
							<th></th>
						</tr>
					</thead>
				<?php endif;?>
					<tbody>
					<?php if(!empty($info)):
							foreach($info as $detail):?>
							<tr>
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
								<td><a href="<?php echo base_url('/achievement/deleteAchievement/'.$infoType.'/'.$detail['id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
							</tr>
							<?php endforeach;
						else:
							echo "<h2 class='center-error-text'>No Data Available</h2>";
						endif; ?>
					</tbody>
				</table>
</div>