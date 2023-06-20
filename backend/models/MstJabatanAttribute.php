<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_jabatan_attribute".
 *
 * @property int $id_mst_jabatan_attribute
 * @property string $jabatan_attribute
 * @property int $is_active
 */
class MstJabatanAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_jabatan_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jabatan_attribute'], 'required'],
            [['is_active'], 'integer'],
            [['jabatan_attribute'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_jabatan_attribute' => 'Id Mst Jabatan Attribute',
            'jabatan_attribute' => 'Jabatan Attribute',
            'is_active' => 'Is Active',
        ];
    }
}
