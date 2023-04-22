<?php
/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;

$form = new Form();

?>
<title><?php echo $title ?></title>

<section class="formarea">
	<div class="container">
		<h1>New Donation Center</h1>

		<div class="main">
		<?php $form = Form::begin('', 'post') ?>
			<div class="row">
				<div class="col">
				    <?php echo $form->field($model, 'location') ?>
				</div>
			</div>    <button class="btn btn-success">Submit</button>
			
		<?php Form::end() ?>
		</div>
	</div>
</section>
