<?php
/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;
use app\Models\DonorCenter;

$form = new Form();
$donorCenterModel = new DonorCenter();
$locations = $donorCenterModel->getAll();

?>
<title><?php echo $title ?></title>

<section>
	<div class="container">
		<h1>New Appointment</h1>

		<?php $form = Form::begin('', 'post') ?>
			<div class="row">
				<div class="col">
				    <?php echo $form->field($model, 'datetime')->dateTimeField() ?>
				</div>
				<div class="col">
				    <select class="form-control" name="center_id">
				    	<?php foreach($locations as $location){ ?>
				    		<option class="form-control" value="<?php echo $location->id ?>"><?php echo $location->location ?></option>
				    	<?php } ?>
				    </select>
				    		
				</div>
			</div>    <button class="btn btn-success">Submit</button>
			
		<?php Form::end() ?>
	</div>
</section>
