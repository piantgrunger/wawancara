<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "elemen".
 *
 * @property int $id
 * @property string $nama
 * @property float $nilai
 * @property float $prasyarat_minimal
 *
 * @property Indikator[] $indikators
 * @property UserElemen[] $userElemens
 */
class Elemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'elemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nilai', 'prasyarat_minimal'], 'required'],
            [['nilai', 'prasyarat_minimal'], 'number'],
            [['nama'], 'string', 'max' => 255],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nilai' => 'Nilai',
            'prasyarat_minimal' => 'Prasyarat Minimal',
        ];
    }

    /**
     * Gets query for [[Indikators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikators()
    {
        return $this->hasMany(Indikator::className(), ['id_elemen' => 'id']);
    }

    /**
     * Gets query for [[UserElemens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserElemens()
    {
        return $this->hasMany(UserElemen::className(), ['id_elemen' => 'id']);
    }
}
