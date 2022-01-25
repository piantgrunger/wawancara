<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Sekolah;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Aktif',
            'offText' => 'Non Aktif',
        ]
    ]) ?>

<?= $form->field($model, 'tanggal_lahir')->widget(MaskedInput::className(), [
                'mask' =>'9999-99-99',
                'id'=> 'tanggal_lahir'
            ])->label('Tanggal Lahir (2001-02-25)') ?>
<?= $form->field($model, 'id_sekolah')->widget(Select2::className(), [
        'data' =>(ArrayHelper::map(Sekolah::find()->asArray()->all(), 'id', 'nama')),
        'options' => [
        'placeholder' => 'Pilih Madrasah ...',
        ],])->label('Madrasah')
 ?>

	
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
