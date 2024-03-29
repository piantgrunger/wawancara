<?php

namespace app\controllers;

use Yii;

use app\models\Elemen;
use app\models\Indikator;
use app\models\Nilai;
use app\models\Peserta;
use app\models\Timer;
use yii\base\DynamicModel;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;

class PenilaianController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'finish' => ['POST'],
                ],
            ],
        ];
    }

 
    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel([
            'no_peserta', 'tanggal_lahir', 'id_peserta','zoom_id'
        ]);
        $model->addRule(['no_peserta', 'tanggal_lahir'], 'required');
        $model->addRule(['id_peserta','zoom_id'], 'safe');

        $model->addRule('tanggal_lahir', function ($attribute, $params) use ($model) {
            $peserta = \app\models\Peserta::find()->where(['nopeserta' => $model->no_peserta, 'tgl_lahir' => $model->tanggal_lahir])->one();
            if (!$peserta) {
                $model->addError('error', 'Peserta Tidak Ditemukan');
            } else {
                $model->id_peserta = $peserta->id;
            }
        });

        if ($model->load(\Yii::$app->request->post())) {
            if (!$model->validate()) {
                return $this->render('index', [
                    'model' => $model
                ]);
            } else {
                return $this->redirect([
                    'nilai',
                    'id' => $model->id_peserta,
                    'zoom_id' => $model->zoom_id

                ]);
            }
        }


        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionVicon($zoom_id)
    {
        return $this->render('vicon', ['zoom_id' => $zoom_id]);
    }

    public function actionElemen($id)
    {
        $peserta = Peserta::findOne($id);
        $elemen = ArrayHelper::map((Elemen::find()->asArray()->all()), 'id', 'nama');
        $model = new \yii\base\DynamicModel([
            'elemen'
        ]);
        $model->addRule(['elemen'], 'required');

        if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            $session['elemen-' . $peserta->id] = $model->elemen;
            return $this->redirect(['nilai','id'=>$peserta->id]);
        }


        return $this->render('elemen', [
            'peserta' => $peserta,
            'elemen' => $elemen,
            'model' => $model,
        ]);
    }

    public function actionNilai($id, $zoom_id='')
    {
        $this->layout='main-penilaian';
        $session = Yii::$app->session;
        $elemen = ArrayHelper::map(Yii::$app->user->identity->userElemens, 'id_elemen', 'id_elemen');
        $waktu = Timer::find()->where(['id_peserta' => $id,'id_penilai'=>Yii::$app->user->identity->id])->one();
        if (!$waktu) {
            $waktu = new Timer();
            $waktu->id_peserta = $id;
            $waktu->id_penilai = Yii::$app->user->identity->id;
            $waktu->sisawaktu = Yii::$app->params['waktuWawancara'];
            $waktu->save();
        }
        // $elemen =  ArrayHelper::getColumn($elemens, 'id_elemen');
       
        $peserta=Peserta::findOne($id);
        $peserta->zoom_id = $zoom_id;
        $peserta->save(false);
        $indikator=Indikator::find()->where(['in','id_elemen',$elemen])->orderBy("id_elemen,id")->all();
        $this->view->params['waktu'] = $waktu->sisawaktu;
        //  $elemen=\app\models\Elemen::find()->where(['in','id',$session['elemen-' . $id]])->all();
        
        $this->view->params['peserta'] = $peserta;
        $this->view->params['zoom_id'] = $zoom_id;
        $this->view->params['indikator'] = $indikator;
        Yii::$app->session['indikator'] = $indikator;

        return $this->render('nilai', [
            'peserta' => $peserta,
            'indikator' => $indikator,
    
        ]);
    }
    public function actionFinish($id)
    {
        if (isset(Yii::$app->session['indikator'])) {
            $indikator = Yii::$app->session['indikator'];
            foreach ($indikator as $data) {
                $nilai =  Nilai::find()->where(['id_penilai'=>Yii::$app->user->identity,'id_indikator'=>$data->id,'id_peserta'=>$id ])->one();
                if ($nilai) {
                    $nilai->status=2;
                    $nilai->save(false);
                }
            }
        }
        return $this->goHome();
    }
}
