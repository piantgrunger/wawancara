<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */


use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Sekolah;
use kartik\select2\Select2;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->label('Nama Lengkap') ?>

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



            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>