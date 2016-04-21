<div class="table-responsive">
				<table class="table">
				<?php if(!empty($info)):?>
					<thead>
						<tr>
							<th>Title</th>
							<th>Granting Agency</th>
							<th>Date of Granting</th>
							<th>Amount(in INR)</th>
						</tr>
					</thead>
				<?php endif;?>
					<tbody>
					<?php if(!empty($info)):
							foreach($info as $detail):?>
							<tr>
								<td><?php echo $detail['title']; ?></td>
								<td><?php 
									if(isset($detail['granting_agency']))
										echo $detail['granting_agency'];
									else
										echo "Not Available";
								?></td>
								<td><?php echo $detail['date'];?></td>
								<td><?php 
									if(isset($detail['amount']))
										echo "&#x20B9;".$detail['amount'];
									else
										echo "Not Available";
								?></td>
							</tr>
							<?php endforeach;
						else:
							echo "<h2 class='center-error-text'>No Data Available</h2>";
						endif; ?>
					</tbody>
				</table>
</div>