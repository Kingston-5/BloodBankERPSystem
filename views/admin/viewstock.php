<?php $this->title = 'Blood Stock';


?>

<section class="adminarea">
	<div class="container">
		<h2>Blood Units in stock</h2>
		<div class="main">
			<div class="table table-responsive">
				<table>
					<tr>
						<th>User ID</th>
						<th>Center ID</th>
						<th>Date</th>
						<th>code</th>
						<th>Blood Group</th>
					</tr>

					<?php foreach (array_reverse($bloodModel) as $bloodunit) { ?>

						<tr>
							<td><?php echo $bloodunit->user_id; ?></td>
							<td><?php echo $bloodunit->center_id; ?></td>
							<td><?php echo $bloodunit->datetime; ?></td>
							<td><?php echo $bloodunit->code; ?></td>
							<td><?php echo $bloodunit->blood_group; ?></td>
						</tr>

					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<section>