<?php

namespace app\controllers;
use Yii;

use app\models\Elemen;
use app\models\Indikator;
use app\models\Peserta;
use yii\base\DynamicModel;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class PenilaianController extends \yii\web\Controller
{
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
        $this->layout='main-penelitian';
 
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
        $this->layout='main-penelitian';
        $session = Yii::$app->session;
        if(!isset($session['elemen-' . $id]))
        {
            return $this->goBack();
        }

        $peserta=Peserta::findOne($id);
        $indikator=Indikator::find()->where(['in','id_elemen',$session['elemen-' . $id]])->orderBy("id_elemen,id")->all();
        return $this->render('nilai', [
            'peserta' => $peserta,
            'indikator' => $indikator,
    
        ]);


    }
}

