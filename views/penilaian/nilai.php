<?php

use app\assets\PenilaianAsset;
use app\models\DetailIndikator;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Indikator Penilaian');
$this->params['breadcrumbs'][] = $this->title;
PenilaianAsset::register($this);



?>

<div id="nilai">
    <div class="card h4">
        <div class="card-header">Pewawancara : <?= Yii::$app->user->identity->username ?></div>
    </div>

    <div id="blok-soal" data-now="0" data-max="<?= count($indikator) ?>">

        <div class="card card-soal" data-no="0">
            <div class="card-header with-border text-center">
                <h3 class="card-title">Mulai</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body row">
                <div class="col-sm-12 col-sm-offset-3 text-center col-xs-12">
                    <p> Klik tombol Pertanyaan Pertama untuk melihat pertanyaan yang pertama.</p>
                    <button id="nav-first" class="btn btn-success btn-lg">Pertanyaan Pertama <i class="fa fa-angle-double-right"></i></button>
                </div>
            </div>
        </div>

        <?php
        $nomor = 1;
        foreach ($indikator as $soal) {
        ?>
            <div class="card d-none card-soal" data-no="<?= $nomor ?>">
                <div class="card-header h4 bg-info text-white"> Elemen : <?= $soal->elemen->nama ?></div>
                <div class="card-body">
                    <h5 class="card-title">Indikator : <?= $soal->nama ?></h5>
                    <div class="row">
                        <p class="card-text col-md-6 h5"><?= $soal->pertanyaan ?></p>
                        <div class="card-text col-md-6 h5">
                            <?= Html::radioList(
                                'jawaban',
                                null,
                                ArrayHelper::map(DetailIndikator::find()->where(['id_indikator' => $soal->id])->asArray()->all(), 'nilai', 'jawaban')
                            ) ?>


                        </div>
                    </div>



                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <button id="nav-prev" class="btn btn-success disabled float-left"><i class="fa fa-angle-double-left"></i> Sebelumnya</button>
                        </div>


                        <div class="col-lg-7 col-md-7 col-sm-6">
                         <p class="text-center">   <?= $nomor ?> </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 text-right">

                            <button id="nav-next" class="btn btn-success float-right">Selanjutnya <i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>

                </div>
            </div>






    </div>
</div>



<?php $nomor++;
        } ?>



</div>
</div>