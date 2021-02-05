<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_indikator".
 *
 * @property int $id
 * @property int $id_indikator
 * @property string $jawaban
 * @property int $nilai
 *
 * @property Indikator $indikator
 */
class DetailIndikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'jawaban', 'nilai'], 'required'],
            [['id_indikator', 'nilai'], 'integer'],
            [['jawaban'], 'string', 'max' => 255],
            [['id_indikator'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::className(), 'targetAttribute' => ['id_indikator' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_indikator' => 'Id Indikator',
            'jawaban' => 'Jawaban',
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
}
