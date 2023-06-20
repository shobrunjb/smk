<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pro_organization_attribute".
 *
 * @property int $id_pro_organization_attribute
 * @property int $id_organization
 * @property int $id_mst_organization_attribute
 * @property int $id_mst_organization_attribute_grade
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProOrganizationAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_organization_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organization', 'id_mst_organization_attribute', 'id_mst_organization_attribute_grade'], 'required'],
            [['id_organization', 'id_mst_organization_attribute', 'id_mst_organization_attribute_grade', 'created_id_user'], 'integer'],
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
            'id_pro_organization_attribute' => 'Id Pro Organization Attribute',
            'id_organization' => 'Id Organization',
            'id_mst_organization_attribute' => 'Id Mst Organization Attribute',
            'id_mst_organization_attribute_grade' => 'Id Mst Organization Attribute Grade',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getGrade()
    {
        return $this->hasOne(MstOrganizationAttributeGrade::className(), ['id_mst_organization_attribute_grade' => 'id_mst_organization_attribute_grade']);
    }
}
