<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
use yii\widgets\MaskedInput;

$this->title = Yii::t('app', 'Penilaian');
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Masukkan Data Peserta yang Di Nilai</h4>

    <div class="row h5">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
 

            <?= $form->field($model, 'no_peserta') ?>

            <?= $form->field($model, 'tanggal_lahir')->widget(MaskedInput::className(), [
                'mask' =>'9999-99-99',
                'id'=> 'tanggal_lahir'
            ])->label('Tanggal Lahir (2001-02-25)') ?>



            <div class="form-group">
                <?= Html::submitButton('Mulai Penilaian', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
