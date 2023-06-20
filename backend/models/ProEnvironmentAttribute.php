<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pro_environment_attribute".
 *
 * @property int $id_pro_environment_attribute
 * @property int $id_environment
 * @property int $id_mst_environment_attribute
 * @property int $id_mst_environment_attribute_grade
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProEnvironmentAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_environment_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_environment', 'id_mst_environment_attribute', 'id_mst_environment_attribute_grade'], 'required'],
            [['id_environment', 'id_mst_environment_attribute', 'id_mst_environment_attribute_grade', 'created_id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pro_environment_attribute' => 'Id Pro Environment Attribute',
            'id_environment' => 'Id Environment',
            'id_mst_environment_attribute' => 'Id Mst Environment Attribute',
            'id_mst_environment_attribute_grade' => 'Id Mst Environment Attribute Grade',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
