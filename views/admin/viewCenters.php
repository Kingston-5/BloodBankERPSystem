<?php $this->title = 'View Centers';

use app\models\User;

$user = new User();

?>
<title><?php echo $title ?></title>

<section class="adminarea">
	<div class="container">
		<div class="main">
			<div class="cards">
				<div class="card">
					<div class="card-body">
						<div class="card-header">
							<h5 class="card-title">Donation Centers</h5>
						</div>
						<div class="container">
							<a href="/admin/makecenter" class="btn btn-primary">Register New Donation Center</a>
						</div>
					</div>

				</div>



				<?php
				if (empty($centers)) {
				?><h3>No Donation Centers Registered</h3>
					<?php } else {
					foreach ($centers as $center) { ?>

						<div class="card">
							<div class="card-body">
								<lh5>Location : <?php echo $center->location; ?></h5>

							</div>
						</div>
				<?php }
				}
				?>

			</div>


		</div>
	</div>
</section>



<script>
	$("#statusModal").modal()
</script>