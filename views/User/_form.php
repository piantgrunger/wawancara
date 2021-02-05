<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'pluginOptions' => [
			'onText' => 'Aktif',
			'offText' => 'Non Aktif',
		]
	]) ?>

	
		<strong> Leave blank if not change password</strong>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password') ?>
		<?= $form->field($model, 'repeat_password') ?>
		<?= $form->field($model, 'old_password') ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
