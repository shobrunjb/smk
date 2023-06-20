<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_mst_jenis_tunjangan_kesehatan".
 *
 * @property int $id_mst_jenis_tunjangan_kesehatan
 * @property int|null $id_perusahaan
 * @property string $jenis_tunjangan_kesehatan
 * @property int $is_used
 */
class HrmMstJenisTunjanganKesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_mst_jenis_tunjangan_kesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id_perusahaan', 'is_used'], 'integer'],
            [['jenis_tunjangan_kesehatan'], 'required'],
            [['jenis_tunjangan_kesehatan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_jenis_tunjangan_kesehatan' => 'ID Jenis Tunjangan Kesehatan',
            // 'id_perusahaan' => 'Id Perusahaan',
            'jenis_tunjangan_kesehatan' => 'Jenis Tunjangan Kesehatan',
            'is_used' => 'Is Used',
        ];
    }
}
