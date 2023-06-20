<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_personal_attribute".
 *
 * @property int $id_mst_personal_attribute
 * @property string $personal_attribute
 * @property int $is_active
 */
class MstPersonalAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_personal_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['personal_attribute'], 'required'],
            [['is_active'], 'integer'],
            [['personal_attribute'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_personal_attribute' => 'Id Mst Personal Attribute',
            'personal_attribute' => 'Personal Attribute',
            'is_active' => 'Is Active',
        ];
    }
}
