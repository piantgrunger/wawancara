<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Elemen */

$this->title = Yii::t('app', 'Elemen Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Elemen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elemen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
