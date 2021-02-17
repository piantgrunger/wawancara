<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_elemen".
 *
 * @property int $id
 * @property int $id_elemen
 * @property int $id_user
 *
 * @property Elemen $elemen
 * @property User $user
 */
class UserElemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_elemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_elemen', 'id_user'], 'required'],
            [['id_elemen', 'id_user'], 'integer'],
            [['id_elemen'], 'exist', 'skipOnError' => true, 'targetClass' => Elemen::className(), 'targetAttribute' => ['id_elemen' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'Id User',
        ];
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
