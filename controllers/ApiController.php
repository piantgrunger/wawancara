<?php

namespace app\controllers;
use Yii;
use app\models\Nilai;
class ApiController extends \yii\web\Controller
{
    public function actionNilai()
    {
        $p = Yii::$app->request->post();

        // Cek status
        if( Yii::$app->user->isGuest ) {
            $r['m'] = 'Error';
        } elseif( !Yii::$app->request->isPost ) {
            $r['m'] = 'Error';
        } elseif( Yii::$app->user->isGuest ) {
            $r['m'] = 'Error';
        } else {

            $nilai = $p['nilai'];
            $penilai = $p['penilai'];
            $peserta = $p['peserta'];
            $indikator = $p['indikator'];
            
            $penilaian = Nilai::find()->where(['id_penilai'=>$penilai,'id_peserta'=>$peserta,'id_indikator'=>$indikator])->one();
            if (is_null($penilaian))
            {
                $penilaian = new Nilai();
            } 
            $penilaian->id_peserta = $peserta;
            $penilaian->id_penilai = $penilai;
            $penilaian->id_indikator = $indikator;
            $penilaian->nilai = $nilai;

            
    
            if( !$penilaian->save(false) ) {
                $r['m'] = $penilaian->getFirstError('o');
            } else {
                $r['s'] = true;
                $r['m'] = '';
                $r['d'] = [];
            }

        }

        // Set output = JSON
        Yii::$app->response->format = 'json';

        // Return
        return $r;
  

  
        
    }

}
