<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

 
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

        
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
             
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
  
   <footer class="login-footer">
         <div class="text-center">
        <img src="https://emadrasah.kemenag.go.id/cbtsnpdb/adm/web/image/default/logo-uinsa.png" class="text-center" width="55.88px" height="58.88px" style="margin: 9px 11px">
    </div>
  <p class="text-center"><small>Aplikasi Wawancara v1.0<br>Copyright © 2021 Aplikasi Wawancara - UIN Sunan Ampel Surabaya</small></p>
    </footer>

</div>
