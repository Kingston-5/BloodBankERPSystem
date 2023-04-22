<?php


use thecodeholic\phpmvc\form\Form;

?>
<title><?php echo $title ?></title>

<!-- login section -->
<section class="formarea">
	<div class="container">
		<h1>Login</h1>

		<div class="main">
			<?php $form = Form::begin('', 'post') ?>
			<?php echo $form->field($model, 'email') ?>
			<?php echo $form->field($model, 'password')->passwordField() ?>
			<button class="btn btn-success">Login</button>
			<p>Not Registered? <a href="/auth/register">Register Here</a></p>
			<?php Form::end() ?>
		</div>
	</div>
</section>