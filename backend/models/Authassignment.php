<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "authassignment".
 *
 * @property string $itemname
 * @property string $userid
 * @property string $bizrule
 * @property string $data
 *
 * @property Authitem $itemname0
 */
class Authassignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['itemname', 'userid'], 'required'],
            [['bizrule', 'data'], 'string'],
            [['itemname', 'userid'], 'string', 'max' => 64],
            [['itemname', 'userid'], 'unique', 'targetAttribute' => ['itemname', 'userid']],
            [['itemname'], 'exist', 'skipOnError' => true, 'targetClass' => Authitem::className(), 'targetAttribute' => ['itemname' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'itemname' => 'Itemname',
            'userid' => 'Userid',
            'bizrule' => 'Bizrule',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemname0()
    {
        return $this->hasOne(Authitem::className(), ['name' => 'itemname']);
    }
}
