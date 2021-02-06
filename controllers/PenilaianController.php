<?php

namespace app\controllers;

use app\models\Elemen;
use app\models\Peserta;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;

class PenilaianController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel([
            'no_peserta', 'tanggal_lahir','id_peserta'
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
               return $this->redirect(['elemen',
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
        $peserta=Peserta::findOne($id);
        $elemen = ArrayHelper::map((Elemen::find()->asArray()->all()),'id','nama');
        $model = new \yii\base\DynamicModel([
            'elemen'
        ]);
        $model->addRule(['elemen'], 'required');
        
   

        return $this->render('elemen',[
            'peserta' => $peserta,
            'elemen' => $elemen,
            'model' => $model,
        ]);

    }
}
