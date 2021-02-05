<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property int $id
 * @property string|null $nopeserta
 * @property string|null $nama
 * @property string|null $tgl_lahir
 * @property int $status
 * @property string|null $foto
 */
class Peserta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lahir'], 'safe'],
            [['status'], 'integer'],
            [['nopeserta', 'nama', 'foto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nopeserta' => 'Nopeserta',
            'nama' => 'Nama',
            'tgl_lahir' => 'Tgl Lahir',
            'status' => 'Status',
            'foto' => 'Foto',
        ];
    }
}
