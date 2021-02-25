<?php


use app\models\DetailIndikator;
use yii\bootstrap4\ActiveForm;
use app\models\Nilai;
use app\models\Peserta;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Indikator Penilaian');
$this->params['breadcrumbs'][] = $this->title;

$peserta = $this->params['peserta'];
$id_penilai = Yii::$app->user->identity->id;


?>

<div id="blok-nilai" data-url="<?= Url::to(['api/nilai']) ?>">

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
        $elemen = '';
        foreach ($indikator as $soal) {
        ?>

            <div class="card d-none card-soal" data-no="<?= $nomor ?>" data-elemen="<?= ($elemen == $soal->id_elemen) ? 0 : $soal->id_elemen ?>">
            <!--
                <div class="card-header h4 bg-info text-white"> Elemen : <?= $soal->elemen->nama ?></div>
                <div class="card-header bg-primary text-white h5">Indikator : <?= $soal->nama ?></div>
                -->
				<div class="card-header h5 bg-dark text-white">
					<?= $soal->pertanyaan ?>
				  </div>
                <div class="card-body">

                    
                        <ul class="list-group list-group-flush">
							
                            <?= Html::radioList(
                                'jawaban',
                                Nilai::getNilaiPeserta($id_penilai, $peserta->id, $soal->id),
                                ArrayHelper::map(
                                    DetailIndikator::find()->where(['id_indikator' => $soal->id])->asArray()->all(),
                                    'nilai',
                                    'jawaban'
                                ),
                                [
                                    'item' => function ($index, $label, $name, $checked, $value) use ($soal, $peserta, $nomor) {
                                        $checked = ($checked) ? 'checked' : '';

                                        $return = '<li class="list-group-item">';
                                        $return .= '<input type="radio"  name="' . $name . '-' . $nomor . '" value="' . $value . '" class="radio-wawancara" data-indikator="' . $soal->id . '" data-peserta="' . $peserta->id . '" data-penilai="' . Yii::$app->user->identity->id . '" ' . $checked . ' >';
                                        $return .= '<i></i>';
                                        $return .= '<span> ' . ($label) . ' </span>';
                                        $return .= '</li>';

                                        return $return;
                                    }
                                ]

                            ) ?>
							</ul>
    
                        


                </div>
                <div class="card-footer text-muted bg-whitesmoke">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <button id="nav-prev-<?= $nomor ?>" data-destination="<?= $nomor - 1 ?>" class="btn btn-navigation btn-success <?= (($nomor - 1) > 0) ? "" : "disabled" ?>  float-left"><i class="fa fa-angle-double-left"></i> Sebelumnya</button>
                        </div>


                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <p class="text-center"> <?= $nomor ?> </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 text-right">

                            <?php if (($nomor + 1) <= count($indikator)) { ?>

                                <button id="nav-next-<?= $nomor ?>" data-destination="<?= $nomor + 1 ?>" class="btn btn-navigation btn-success <?= (($nomor + 1) <= count($indikator)) ? "" : "disabled" ?> float-right">Selanjutnya <i class="fa fa-angle-double-right"></i></button>
                            <?php } else {
                            ?>
                                <a id="nav-finish" href="<?= Url::to(['finish', 'id' => $peserta->id]) ?>" data-method="POST" data-confirm="Apakah Anda yakin ingin menyelesaikan sesi ini??" class="btn btn-navigation btn-danger  float-right">Selesaikan Sesi Wawancara </a>

                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>








        <?php $nomor++;
            $elemen = $soal->id_elemen;
        } ?>



    </div>
</div>