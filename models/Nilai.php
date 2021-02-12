<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nilai".
 *
 * @property int $id
 * @property int $id_peserta
 * @property int $id_penilai
 * @property int $id_indikator
 * @property int|null $nilai
 *
 * @property Indikator $indikator
 * @property User $penilai
 * @property Peserta $peserta
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_peserta', 'id_penilai', 'id_indikator'], 'required'],
            [['id_peserta', 'id_penilai', 'id_indikator', 'nilai','status'], 'integer'],
            [['id_indikator'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::className(), 'targetAttribute' => ['id_indikator' => 'id']],
            [['id_penilai'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_penilai' => 'id']],
            [['id_peserta'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['id_peserta' => 'id']],
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
            'id_indikator' => 'Id Indikator',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * Gets query for [[Indikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(Indikator::className(), ['id' => 'id_indikator']);
    }

    /**
     * Gets query for [[Penilai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenilai()
    {
        return $this->hasOne(User::className(), ['id' => 'id_penilai']);
    }

    /**
     * Gets query for [[Peserta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(Peserta::className(), ['id' => 'id_peserta']);
    }

    public static function getNilaiPeserta($id_penilai,$id_peserta,$id_indikator)
    {
        $nilai= Nilai::find()->where(['id_penilai'=>$id_penilai,'id_peserta'=>$id_peserta,'id_indikator'=>$id_indikator])->one();
        return $nilai?$nilai->nilai:null;
    }
}
