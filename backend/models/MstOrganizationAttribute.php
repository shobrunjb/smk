<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_organization_attribute".
 *
 * @property int $id_mst_organization_attribute
 * @property string $organization_attribute
 * @property int $is_active
 */
class MstOrganizationAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_organization_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_attribute'], 'required'],
            [['is_active'], 'integer'],
            [['organization_attribute'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_organization_attribute' => 'Id Mst Organization Attribute',
            'organization_attribute' => 'Organization Attribute',
            'is_active' => 'Is Active',
        ];
    }
}
