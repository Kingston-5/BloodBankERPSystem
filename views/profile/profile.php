<?php	$this->title = 'Profile';

use app\models\DonorCenter;
use app\models\BloodClerk;

$donorCenterModel = new DonorCenter();
$clerkModel = new BloodClerk();

 ?>
<section class="profilearea">
	<div class="container">
		<div class="main">
		<div class="jumbotron">
			<?php if($_SESSION['user_status'] == "U") { ?>
		        <h1>Welcome <?php echo $profile->getDisplayName(); ?></h1>
		        <h2>This is a Donor Account</h2>
            <?php } else if($_SESSION['user_status'] == "H"){ 
            	$clerkModel = $clerkModel->findOne(['user_id' => $profile->id]);
				$donorCenterModel = $donorCenterModel->findOne(['id' => $clerkModel->center_id]);
				?>
				
		        <h1>Welcome <?php echo $profile->getDisplayName(); ?></h1>
				<h2>This is a Donation Center Account at <?php echo $donorCenterModel->location ?></h2>
		        <a class="btn btn-primary" href="/appointments/view/<?php echo $donorCenterModel->id; ?>">View Appointments</a>
		        <a class="btn btn-primary" href="/orders/create">Create New Order</a>
		        <a class="btn btn-primary" href="/orders/view/<?php echo $donorCenterModel->id ?>">view Orders</a>
		        
            <?php } else if($_SESSION['user_status'] == "A"){ ?>
            
		        <h1>Welcome <?php echo $profile->getDisplayName(); ?></h1>
		        <h2>This is a Admin Account </h2>
		        <a class="btn btn-primary" href="/admin/viewaccounts">View Accounts</a>
		        <a class="btn btn-primary" href="/admin/viewcenters">View Donation Centers</a>
		        <a class="btn btn-primary" href="/admin/viewstock">View Blood Stock</a>
		        <a class="btn btn-primary" href="/admin/vieworders">view Orders</a>
		        
            <?php } ?>
		</div>
		</div>
	</div>
<section>

<section class="profilearea">
	<div class="container">
		<div class="main">
			<div class="user-profile card">
				<div class="card-body">
					<div class="card-header">
						<h5 class="card-title">Name : <?php echo $profile->getDisplayName(); ?></h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Email : <?php echo $profile->email; ?></li>
						<li class="list-group-item">Cell Number : <?php echo $profile->phone_number; ?></li>
						<li class="list-group-item">Address : <?php echo $profile->address; ?></li>
						<li class="list-group-item">Age : <?php echo date_diff(date_create($profile->dob), date_create(date("Y-m-d")))->format('%y'); ?></li>
						<li class="list-group-item">gender : <?php echo $profile->gender; ?></li>
						<li class="list-group-item">D.O.B : <?php echo $profile->dob; ?></li>
						<li class="list-group-item">Blood Group : </li>
					</ul>
					<div class="row">
						<div class="col">
                        <a href="/profile/edit/<?php echo $profile->id ?>" class="btn btn-primary">Edit Profile</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="appointment card">
				<div class="card-body">
					<div class="card-header">
						<h5 class="card-title">Appointments</h5>
					</div>
					<div class="col">
							<a href="/appointments/create" class="btn btn-primary">Make Appointment</a>
						</div>
					<?php
					 foreach(array_reverse($appointments) as $appointment){ 
					 $donorCenterModel = $donorCenterModel->findOne(['id' => $appointment->center_id]);
					 ?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Date : <?php echo $appointment->datetime; ?></li>
						<li class="list-group-item">Location : <?php echo $donorCenterModel->location; ?></li>
						<?php if($appointment->status == 0){ ?>
								<a href="/appointments/cancel/<?php echo $appointment->id; ?>" class="btn btn-danger">Cancell</a>
						<?php }else if($appointment->status == 1){ ?>
								<div class="col">
									<a href="#" class="btn btn-disabled">Cancelled</a>
								</div>
						<?php } else if($appointment->status == 2){ ?>
							<div class="col">
								<a href="#" class="btn btn-success">Filled</a>
							</div>
						<?php } ?>
					</ul>
					<?php } ?>
					
						
				</div>
			</div>
		</div>
	</div>
</section>


