<?php $this->title = 'View Accounts';

use app\models\User;
?>
<title><?php echo $title ?></title>

<section class="appointmentarea">
	<div class="container">

	<h5>Appointments</h5>
		<div class="main">
			<div class="cards">
				<?php foreach (array_reverse($appointments) as $appointment) { ?>
					<div class="card">
						<div class="card-body" style="overflow:scroll">
							<div class="card-header">
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Date : <?php echo $appointment->datetime; ?></li>
								<li class="list-group-item">Location : <?php echo $appointment->location; ?></li>

								<?php foreach ($users as $user) {
									if ($appointment->user_id == $user->id) { ?>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Name : <?php echo $user->firstname . ' ' . $user->lastname; ?></li>
											<li class="list-group-item">Email : <?php echo $user->email; ?></li>
											<li class="list-group-item">Cell Number : <?php echo $user->phone_number; ?></li>
										</ul>
								<?php }
								} ?>

								<div class="col">
									<?php if ($appointment->status == 0) { ?>
										<button class="btn btn-primary" data-toggle="modal" data-target="#donationModal">Fill</button>
										<a href="/appointments/cancel/<?php echo $appointment->id; ?>" class="btn btn-danger">Cancell</a>
									<?php } else if ($appointment->status == 1) { ?>
										<a href="" class="btn btn-warning">Cancelled</a>
									<?php } else if ($appointment->status == 2) { ?>
										<a href="" class="btn btn-success">filled</a>
									<?php } ?>
								</div>
							</ul>
						</div>
						<div id="donationModal" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times</button>
										<h4 class="modal-title">Fulfill Appointment</h4>
									</div>
									<div class="modal-body">
										<form action="/appointments/fill/<?php echo $appointment->id; ?>/<?php echo $appointment->user_id; ?>/<?php echo $appointment->center_id; ?>/" method="post">
											<div class="form-group">
												<label class="form-control">Enter Blood Unit Code</label>
											</div>
											<div class="form-group">
												<input class="form-control" type="text" name="code">
											</div>
											<div class="form-group">
												<label class="form-control">Blood Group</label>
												<select class="form-control" name="blood_group">
													<option class="form-control" value="A+">A+</option>
													<option class="form-control" value="A-">A-</option>
													<option class="form-control" value="AB+">AB+</option>
													<option class="form-control" value="AB-">AB-</option>
													<option class="form-control" value="B+">B+</option>
													<option class="form-control" value="B-">B-</option>
													<option class="form-control" value="O+">O+</option>
													<option class="form-control" value="O-">O-</option>
												</select>
											</div>
											<div>
												<button class="btn btn-success" type="success">Submit</button>
											</div>
										</form>

									</div>
								</div>

							</div>
						</div>
					</div>

				<?php } ?>
			</div>
		</div>
	</div>
</section>



<script>
	$("#statusModal").modal()
</script>