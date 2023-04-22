<?php

/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;

$form = new Form();
?>

<section class="editprofilearea">
    <div class="container">
        <h1>Edit Donor Details</h1>

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
            <button class="btn btn-success">Save Changes</button>
            <?php Form::end() ?>
        </div>
    </div>
</section>