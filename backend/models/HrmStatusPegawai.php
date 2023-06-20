<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_status_pegawai".
 *
 * @property int $id_hrm_status_pegawai
 * @property string $status_pegawai
 */
class HrmStatusPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_status_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_pegawai'], 'required'],
            [['status_pegawai'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_status_pegawai' => 'Id Hrm Status Pegawai',
            'status_pegawai' => 'Status Pegawai',
        ];
    }
}
