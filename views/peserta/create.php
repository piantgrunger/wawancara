<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Peserta */

$this->title = Yii::t('app', 'Peserta Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Peserta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
