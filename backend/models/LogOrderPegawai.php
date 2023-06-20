<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "log_order_pegawai".
 *
 * @property int $id_log_order
 * @property int $id_order_pegawai
 * @property int $id_mst_order_progress
 * @property string $isi_log_order
 */
class LogOrderPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_order_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_pegawai', 'id_mst_order_progress', 'isi_log_order'], 'required'],
            [['id_order_pegawai', 'id_mst_order_progress'], 'integer'],
            [['isi_log_order'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_log_order' => 'Id Log Order',
            'id_order_pegawai' => 'Id Order ',
            'progress.order_progress' => 'Progress Pekerjaan',
            'id_mst_order_progress' => 'Progress Pekerjaan',
            'isi_log_order' => 'Catatan Aktivitas',
        ];
    }
    public function getProgress()
    {
        return $this->hasOne(MstOrderProgres::className(), ['id_mst_order_progres' => 'id_mst_order_progress']);
    }
}
