<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timer".
 *
 * @property int $id
 * @property int $id_peserta
 * @property int $id_penilai
 * @property float $sisawaktu
 */
class Timer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_peserta', 'id_penilai', 'sisawaktu'], 'required'],
            [['id_peserta', 'id_penilai'], 'integer'],
            [['sisawaktu'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_peserta' => 'Id Peserta',
            'id_penilai' => 'Id Penilai',
            'sisawaktu' => 'Sisawaktu',
        ];
    }
}
