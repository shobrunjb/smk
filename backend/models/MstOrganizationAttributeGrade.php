<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_organization_attribute_grade".
 *
 * @property int $id_mst_organization_attribute_grade
 * @property int $id_mst_organization_attribute
 * @property string $grade_label
 * @property int $grade_value
 * @property string|null $keterangan
 */
class MstOrganizationAttributeGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_organization_attribute_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_organization_attribute', 'grade_label', 'grade_value'], 'required'],
            [['id_mst_organization_attribute', 'grade_value'], 'integer'],
            [['grade_label', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_organization_attribute_grade' => 'Id Organization Attribute Grade',
            'id_mst_organization_attribute' => 'Organization Attribute',
            'grade_label' => 'Grade Label',
            'grade_value' => 'Grade Value',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getOrganizationAttribute()
    {
        return $this->hasOne(MstOrganizationAttribute::className(), ['id_mst_organization_attribute' => 'id_mst_organization_attribute']);
    }
}
