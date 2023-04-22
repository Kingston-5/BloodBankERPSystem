<?php	$this->title = 'Orders';


 ?>
 
 <section class="bannerarea">
	<div class="container">
		<h2>Blood Orders</h2>
		<div class="table table-responsive">
			<table>
				<tr>
					<th>User ID</th>
					<th>Center ID</th>
					<th>Date</th>
					<th>A+</th>
					<th>A-</th>
					<th>AB+</th>
					<th>AB-</th>
					<th>B+</th>
					<th>B-</th>
					<th>O+</th>
					<th>O-</th>
				</tr>
				
				<?php foreach (array_reverse($orders)  as $order){ 
				?>
				<tr>
					<td><?php echo $order->user_id; ?></td>
					<td><?php echo $order->center_id; ?></td>
					<td><?php echo $order->datetime; ?></td>
					<td><?php echo $order->A_pos; ?></td>
					<td><?php echo $order->A_neg; ?></td>
					<td><?php echo $order->AB_pos; ?></td>
					<td><?php echo $order->AB_neg; ?></td>
					<td><?php echo $order->B_pos; ?></td>
					<td><?php echo $order->B_neg; ?></td>
					<td><?php echo $order->O_pos; ?></td>
					<td><?php echo $order->O_neg; ?></td>
					<?php if($order->status == 1){ ?>
						<td><a class="btn btn-success">Filled</a></td>
					<?php } else if($order->status == 2){ ?>
						<td><a class="btn btn-danger">Cancelled</a></td>
					<?php } else { ?>
						<td><a class="btn btn-primary">Placed</a></td>
					<?php } ?>
                    
				</tr>
				
				<?php } ?>
			</table>
		</div>
	</div>
<section>
