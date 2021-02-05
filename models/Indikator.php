<?php

namespace app\models;

use Yii;
use mdm\behaviors\ar\RelationTrait;

/**
 * This is the model class for table "indikator".
 *
 * @property int $id
 * @property int $id_elemen
 * @property string $nama
 * @property string $pertanyaan
 *
 * @property DetailIndikator[] $detailIndikators
 * @property Elemen $elemen
 */
class Indikator extends \yii\db\ActiveRecord
{
    
    
    use RelationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_elemen', 'nama', 'pertanyaan'], 'required'],
            [['id_elemen'], 'integer'],
            [['pertanyaan'], 'string'],
            [['nama'], 'string', 'max' => 255],
            [['id_elemen'], 'exist', 'skipOnError' => true, 'targetClass' => Elemen::className(), 'targetAttribute' => ['id_elemen' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_elemen' => 'Id Elemen',
            'nama' => 'Nama',
            'pertanyaan' => 'Pertanyaan',
        ];
    }

    /**
     * Gets query for [[DetailIndikators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailIndikators()
    {
        return $this->hasMany(DetailIndikator::className(), ['id_indikator' => 'id']);
    }
    public function setDetailIndikators($value)
    {
        return $this->loadRelated('detailIndikators', $value);
    }

    
    /**
     * Gets query for [[Elemen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getElemen()
    {
        return $this->hasOne(Elemen::className(), ['id' => 'id_elemen']);
    }
}
