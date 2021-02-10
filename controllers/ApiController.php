<?php

namespace app\controllers;

class ApiController extends \yii\web\Controller
{
    public function actionNilai()
    {
        return $this->render('nilai');
    }

}
