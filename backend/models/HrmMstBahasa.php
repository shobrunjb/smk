<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_mst_bahasa".
 *
 * @property int $id_mst_bahasa
 * @property string $id_perusahaan
 * @property string $bahasa
 * @property int $is_used
 */
class HrmMstBahasa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_mst_bahasa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id_perusahaan', 'bahasa'], 'required'],
            // [['id_perusahaan', 'is_used'], 'integer'],
            [['bahasa'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_bahasa' => 'Id Mst Bahasa',
            // 'id_perusahaan' => 'Id Perusahaan',
            'bahasa' => 'Bahasa',
            'is_used' => 'Is Used',
        ];
    }
}
