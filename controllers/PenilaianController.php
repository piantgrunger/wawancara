<?php

namespace app\controllers;
use Yii;

use app\models\Elemen;
use app\models\Indikator;
use app\models\Nilai;
use app\models\Peserta;
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
            'no_peserta', 'tanggal_lahir', 'id_peserta'
        ]);
        $model->addRule(['no_peserta', 'tanggal_lahir'], 'required');
        $model->addRule(['id_peserta'], 'safe');

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
                    'elemen',
                    'id' => $model->id_peserta
                ]);
            }
        }


        return $this->render('index', [
            'model' => $model
        ]);
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

    public function actionNilai($id)
    {
        $this->layout='main-penilaian';
        $session = Yii::$app->session;
        if(!isset($session['elemen-' . $id]))
        {
            return $this->goHome();
        }

        $peserta=Peserta::findOne($id);
        $indikator=Indikator::find()->where(['in','id_elemen',$session['elemen-' . $id]])->orderBy("id_elemen,id")->all();
        $elemen=\app\models\Elemen::find()->where(['in','id',$session['elemen-' . $id]])->all();
        
        $this->view->params['peserta'] = $peserta;
        $this->view->params['elemen'] = $elemen;
        Yii::$app->session['indikator'] = $indikator;

        return $this->render('nilai', [
            'peserta' => $peserta,
            'indikator' => $indikator,
    
        ]);


    }
    public function actionFinish($id) {

        if(isset(Yii::$app->session['indikator'])) {
           $indikator = Yii::$app->session['indikator'];
           foreach($indikator as $data) {
              $nilai =  Nilai::find()->where(['id_penilai'=>Yii::$app->user->identity,'id_indikator'=>$data->id,'id_peserta'=>$id ])->one();
              if($nilai)
              {
                  $nilai->status=2;
                  $nilai->save(false);
              }


           }


        }
       return $this->goHome();
    }
}

