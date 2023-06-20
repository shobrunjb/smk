<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_personal_attribute_grade".
 *
 * @property int $id_mst_personal_attribute_grade
 * @property int $id_mst_personal_attribute
 * @property string $grade_label
 * @property int $grade_value
 * @property string|null $keterangan
 */
class MstPersonalAttributeGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_personal_attribute_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mst_personal_attribute', 'grade_label', 'grade_value'], 'required'],
            [['id_mst_personal_attribute', 'grade_value'], 'integer'],
            [['grade_label', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_personal_attribute_grade' => 'Personal Attribute Grade',
            'id_mst_personal_attribute' => 'Personal Attribute',
            'grade_label' => 'Grade Label',
            'grade_value' => 'Grade Value',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getPersonalAttribute()
    {
        return $this->hasOne(MstPersonalAttribute::className(), ['id_mst_personal_attribute' => 'id_mst_personal_attribute']);
    }
}
