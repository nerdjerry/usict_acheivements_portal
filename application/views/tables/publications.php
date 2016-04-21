<div class="table-responsive">
				<table class="table-hover">
				<?php if(!empty($info)):?>
					<thead>
						<tr>
							<th>Title</th>
							<th>Date of Publication</th>
							<th>Journal/Conference Name</th>
							<th>Co Author</th>
							<th>Co Author</th>
							<th>Co Author</th>
							<th>Co Author</th>
							<th>Presented In</th>
							<th>Level</th>
						</tr>
					</thead>
				<?php endif;?>
					<tbody>
					<?php if(!empty($info)):
							foreach($info as $detail):?>
							<tr>
								<td><?php echo $detail['title']; ?></td>
								<td><?php 
									if(is_null($detail['month_of_pub']))
										echo $detail['month_of_pub'].",".$detail['year_of_pub'];
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
							</tr>
							<?php endforeach;
						else:
							echo "<h2 class='center-error-text'>No Data Available</h2>";
						endif; ?>
					</tbody>
				</table>
</div>
