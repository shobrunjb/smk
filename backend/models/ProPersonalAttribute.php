<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pro_personal_attribute".
 *
 * @property int $id_pro_personal_attribute
 * @property int $id_pegawai
 * @property int $id_mst_personal_attribute
 * @property int $id_mst_personal_attribute_grade
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProPersonalAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_personal_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_mst_personal_attribute', 'id_mst_personal_attribute_grade'], 'required'],
            [['id_pegawai', 'id_mst_personal_attribute', 'id_mst_personal_attribute_grade', 'created_id_user'], 'integer'],
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
            'id_pro_personal_attribute' => 'Id Pro Personal Attribute',
            'id_pegawai' => 'Id Pegawai',
            'id_mst_personal_attribute' => 'Id Mst Personal Attribute',
            'id_mst_personal_attribute_grade' => 'Id Mst Personal Attribute Grade',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getGrade()
    {
        return $this->hasOne(MstPersonalAttributeGrade::className(), ['id_mst_personal_attribute_grade' => 'id_mst_personal_attribute_grade']);
    }
}
