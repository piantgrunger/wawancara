<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use app\models\Elemen;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Indikator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indikator-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_elemen')->widget(Select2::className(), [
        'data' =>(ArrayHelper::map(Elemen::find()->asArray()->all(), 'id', 'nama')),
        'options' => [
        'placeholder' => 'Pilih Elemen ...',
        ],])->label('Elemen')
 ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pertanyaan')->textArea(['rows' => 10,'style'=>" height: 120px;"])?>

    <div class="card"   >
<div class="card-header bg-info text-white"> Jawaban
</div>
<div class="card-body">
<table class="table table-striped table-hover " width="100%">
    <thead>
        <tr>

            <th>Jawaban</th>
            <th>Nilai</th>

            <th><a id="btn-add2" class="btn btn-success"  href="#"><span class="fas fa-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailIndikators,
        'model' => \app\models\DetailIndikator::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]); 
    ?>
    </table>
    </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
