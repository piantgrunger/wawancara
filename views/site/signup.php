<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;



$this->title = 'Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel ">
                <div class="x_title">

                    <p>Silahkan Isi Data Dibawah ini untuk mengikuti ICT Test UIN Sunan Ampel Surabaya:</p>


                </div>
                <div class="x_content">



                    <div class="row">
                        <div class="col-lg-6">
                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <?= $form->errorSummary($model); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('nim') ?>
                    

                       

                            <div class="form-group">
                                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>