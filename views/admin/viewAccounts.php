<?php $this->title = 'View Accounts';

use app\models\User;
use app\models\DonorCenter;
use app\models\BloodClerk;

$user = new User();
$donorCenterModel = new DonorCenter();
$clerkModel = new BloodClerk();
?>
<title><?php echo $title ?></title>

<section class="adminarea">
	<div class="container">

		<h5>User Accounsts</h5>
		<div class="main">
			<div class="cards">
				<?php
				foreach ($accounts as $account) {
					$user->id = $account->id; ?>
					<div class="user-profile card">
						<div class="card-body">
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Name : <?php echo $account->firstname; ?></li>
								<li class="list-group-item">Email : <?php echo $account->email; ?></li>
								<li class="list-group-item">Account Status: <?php
																			if ($user->isAdmin()) {
																				echo "Admin";
																			} else if ($user->isClerk()) {
																				echo "Health Center Clerk";
																			} else {
																				echo "Donor";
																			}

																			?>
								</li>
								<?php if ($_SESSION['user_status'] == "H") {
									$clerkModel = $clerkModel->findOne(['user_id' => $account->id]);
									$donorCenterModel = $donorCenterModel->findOne(['id' => $clerkModel->center_id]);
								?>
									<li class="list-group-item">Donation Center: <?php echo $donorCenterModel->location ?></li>

								<?php } ?>

								<div class="row">
									<div class="col">
										<button class="btn btn-primary" data-toggle="modal" data-target="#statusModal<?php echo $account->id ?>">Edit Account</button>
									</div>
								</div>

								<div id="statusModal<?php echo $account->id ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times</button>
												<h4 class="modal-title">Set Account Status</h4>
											</div>
											<div class="modal-body">
												<form action="/admin/editclerk/<?php echo $account->id ?>" method="post">
													<div class="col">
														<label class="form-control">Account Status</label>
														<select class="form-control" name="status">
															<option value="0" <?php if ($_SESSION['user_status'] == "A") {
																					echo 'selected="selected"';
																				} ?>>Admin</option>
															<option value="1" <?php if ($_SESSION['user_status'] == "H") {
																					echo 'selected="selected"';
																				} ?>>Clerk</option>
															<option value="2" <?php if ($_SESSION['user_status'] == "U") {
																					echo 'selected="selected"';
																				} ?>>Donor</option>
															<select>

																<label class="form-control">Assigned Donation Center</label>
																<select class="form-control" name="location" selected="<?php echo $donorCenterModel->location ?>">
																	<?php foreach ($donorCenterModel->getAll() as $donorCenter) { ?>
																		<option class="form-control" value="<?php echo $donorCenter->location ?>"><?php echo $donorCenter->location ?></option>
																	<?php } ?>
																</select>

													</div>
													<button class="btn btn-success" type="success">Submit</button>
												</form>

											</div>
										</div>

									</div>
								</div>
							</ul>
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