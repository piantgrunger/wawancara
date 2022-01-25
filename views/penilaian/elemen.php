<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = Yii::t('app', 'Elemen Penilaian');
$this->params['breadcrumbs'][] = $this->title;


?>

<div id="elemen">


<h4>No Peserta : <?=$peserta->nopeserta?></h4>
<h4>Nama : <?=$peserta->nama?></h4>

<h5>Silahkan Pilih Elemen Penilaian</h5>
<div class="row h5">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['id' => 'form']); ?>
            <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
 

            <?= $form->field($model, 'elemen')->checkboxList($elemen, [
                
            ])->label(false) ?>




            <div class="form-group">
                <?=Html::submitButton('Mulai Penilaian', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>





</div>