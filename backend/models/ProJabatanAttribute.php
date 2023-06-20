<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pro_jabatan_attribute".
 *
 * @property int $id_pro_jabatan_attribute
 * @property int $id_jabatan
 * @property int $id_mst_jabatan_attribute
 * @property int $id_mst_jabatan_attribute_grade
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProJabatanAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_jabatan_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jabatan', 'id_mst_jabatan_attribute', 'id_mst_jabatan_attribute_grade'], 'required'],
            [['id_jabatan', 'id_mst_jabatan_attribute', 'id_mst_jabatan_attribute_grade', 'created_id_user'], 'integer'],
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
            'id_pro_jabatan_attribute' => 'Id Pro Jabatan Attribute',
            'id_jabatan' => 'Id Jabatan',
            'id_mst_jabatan_attribute' => 'Id Mst Jabatan Attribute',
            'id_mst_jabatan_attribute_grade' => 'Id Mst Jabatan Attribute Grade',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
