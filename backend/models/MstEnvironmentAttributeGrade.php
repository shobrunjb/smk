<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_environment_attribute_grade".
 *
 * @property int $id_mst_environment_attribute_grade
 * @property int $id_mst_environment_attribute
 * @property string $grade_label
 * @property int $grade_value
 * @property string|null $keterangan
 */
class MstEnvironmentAttributeGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_environment_attribute_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_environment_attribute', 'grade_label', 'grade_value'], 'required'],
            [['id_mst_environment_attribute', 'grade_value'], 'integer'],
            [['grade_label', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_environment_attribute_grade' => 'Id Environment Attribute Grade',
            'id_mst_environment_attribute' => 'Environment Attribute',
            'grade_label' => 'Grade Label',
            'grade_value' => 'Grade Value',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getEnvironmentAttribute()
    {
        return $this->hasOne(MstEnvironmentAttribute::className(), ['id_mst_environment_attribute' => 'id_mst_environment_attribute']);
    }
}
