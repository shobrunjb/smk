<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_environment_attribute".
 *
 * @property int $id_mst_environment_attribute
 * @property string $environment_attribute
 * @property int $is_active
 */
class MstEnvironmentAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_environment_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['environment_attribute'], 'required'],
            [['is_active'], 'integer'],
            [['environment_attribute'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_environment_attribute' => 'Id Mst Environment Attribute',
            'environment_attribute' => 'Environment Attribute',
            'is_active' => 'Is Active',
        ];
    }
}
