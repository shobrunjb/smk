<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_mst_jenis_asuransi".
 *
 * @property int $id_hrm_mst_jenis_asuransi
 * @property string $jenis_asuransi
 * @property int $active_status
 */
class HrmMstJenisAsuransi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_mst_jenis_asuransi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_asuransi'], 'required'],
            [['active_status'], 'integer'],
            [['jenis_asuransi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_mst_jenis_asuransi' => 'Jenis Asuransi',
            'jenis_asuransi' => 'Jenis Asuransi',
            'active_status' => 'Active Status',
        ];
    }
}
