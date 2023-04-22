<?php

/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;

$form = new Form();

$user = $user->findOne([
	'user_id' => $_SESSION['user_id']
]);
?>
<title><?php echo $title; ?></title>

<section class="formarea">
	<div class="container">
		<h1>New Blood Order</h1>

		<div class="main">
			<?php $form = Form::begin('/orders/create/' . $user->user_id . '/' . $user->center_id, 'post'); ?>
			<div class="row">
				<div>
					<div class="col">
						<?php echo $form->field($model, 'A_pos')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'A_neg')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'AB_pos')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'AB_neg')->intField() ?>
					</div>
				</div>
				<div>
					<div class="col">
						<?php echo $form->field($model, 'B_pos')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'B_neg')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'O_pos')->intField() ?>
					</div>
					<div class="col">
						<?php echo $form->field($model, 'O_neg')->intField() ?>
					</div>
				</div>
			</div>
			<button class="btn btn-success">Place Order</button>

			<?php Form::end() ?>
		</div>
	</div>
</section>