<?php
namespace app\helpers;
use app\models\Periode;


class Setting
{

     public static function PeriodeAktif()
     {
         $periode = Periode::find()->where(['status'=>'Aktif'])->one();
         return $periode;

     }

}
