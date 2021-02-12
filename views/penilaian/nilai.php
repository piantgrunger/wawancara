<?php

use app\assets\PenilaianAsset;
use app\models\DetailIndikator;
use yii\bootstrap4\ActiveForm;
use app\models\Nilai;
use app\models\Peserta;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Indikator Penilaian');
$this->params['breadcrumbs'][] = $this->title;
PenilaianAsset::register($this);
$id_penilai= Yii::$app->user->identity->id;
$peserta = $this->params['peserta'];


?>

<div id="blok-nilai" data-url="<?=Url::to(['api/nilai'])?>">
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
        $elemen ='';
        foreach ($indikator as $soal) {
        ?>
            <div class="card d-none card-soal" data-no="<?= $nomor ?>" data-elemen="<?=($elemen== $soal->id_elemen)?0:$soal->id_elemen ?>" >
                <div class="card-header h4 bg-info text-white"> Elemen : <?= $soal->elemen->nama ?></div>
                <div class="card-body">
                    <h5 class="card-title">Indikator : <?= $soal->nama ?></h5>
                    <div class="row">
                        <p class="card-text col-md-6 h5"><?= $soal->pertanyaan ?></p>
                        <div class="card-text col-md-6 h5">
                            <?= Html::radioList(
                                'jawaban',
                                Nilai::getNilaiPeserta($id_penilai,$peserta->id,$soal->id),
                                ArrayHelper::map(DetailIndikator::find()->where(['id_indikator' => $soal->id])->asArray()->all(),
                                 'nilai', 'jawaban'),
                                 [
                                    'item' => function($index, $label, $name, $checked, $value) use($soal,$peserta,$nomor) {
                                        $checked = ($checked) ? 'checked' : '';

                                        $return = '<label class="modal-radio">';
                                        $return .= '<input type="radio"  name="' . $name.'-'.$nomor . '" value="' . $value . '" class="radio-wawancara" data-indikator="'.$soal->id.'" data-peserta="'.$peserta->id.'" data-penilai="'.Yii::$app->user->identity->id.'" '.$checked.' >';
                                        $return .= '<i></i>';
                                        $return .= '<span> ' .($label) . ' </span>';
                                        $return .= '</label><br>';
    
                                        return $return;
                                    }
                                ]
                                 
                            ) ?>


                        </div>
                    </div>



                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <button id="nav-prev-<?=$nomor?>" data-destination="<?=$nomor-1?>" class="btn btn-navigation btn-success <?=(($nomor-1)>0)?"":"disabled"?>  float-left"><i class="fa fa-angle-double-left"></i> Sebelumnya</button>
                        </div>


                        <div class="col-lg-7 col-md-7 col-sm-6">
                         <p class="text-center">   <?= $nomor ?> </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 text-right">

                           <?php if(($nomor+1)<=count($indikator)) {?>

                            <button id="nav-next-<?=$nomor?>" data-destination="<?=$nomor+1?>" class="btn btn-navigation btn-success <?=(($nomor+1)<=count($indikator))?"":"disabled"?> float-right">Selanjutnya <i class="fa fa-angle-double-right"></i></button>
                           <?php } else {
                            ?>
                            <a id="nav-finish" href="<?=Url::to(['finish','id'=>$peserta->id])?>" data-method="POST" data-confirm="Apakah Anda yakin ingin menyelesaikan sesi ini??" class="btn btn-navigation btn-danger  float-right">Selesaikan Sesi Wawancara </a>
                    
                            <?php } ?> 
                        </div>
                    </div>

                </div>
            </div>








<?php $nomor++;
       $elemen=$soal->id_elemen;
        } ?>

       

</div>
</div>