<?php

/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;


$form = new Form();

?>
<title><?php echo $title ?></title>
<!-- register section -->
<section class="formarea">
	<div class="container">
		<h1>Register</h1>

		<div class="main">
			<?php $form = Form::begin('', 'post') ?>
			<div class="row">
				<div class="col">
					<?php echo $form->field($model, 'firstname') ?>
				</div>
				<div class="col">
					<?php echo $form->field($model, 'lastname') ?>
				</div>
			</div>
			<?php echo $form->field($model, 'email') ?>

			<div class="row">
				<div class="col">
					<?php echo $form->field($model, 'address') ?>
				</div>
				<div class="col">
					<?php echo $form->field($model, 'dob')->dateField() ?>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<?php echo $form->field($model, 'phone_number')->telField() ?>
				</div>
				<div class="col">
					<?php echo $form->field($model, 'gender') ?>
				</div>
			</div>


			<?php echo $form->field($model, 'password')->passwordField() ?>
			<?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>

			<button class="btn btn-success">Submit</button>
			<p>Already have and acount? <a href="/auth/login">Login Here</a>.</p>
			<?php Form::end() ?>
		</div>
	</div>
</section>