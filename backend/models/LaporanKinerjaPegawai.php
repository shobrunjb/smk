<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "laporan_kinerja_pegawai".
 *
 * @property int $id_laporan_kinerja
 * @property int $id_order_pegawai
 * @property int $id_pegawai
 * @property string $deskripsi
 */
class LaporanKinerjaPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_kinerja_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_pegawai', 'id_pegawai', 'deskripsi'], 'required'],
            [['id_order_pegawai', 'id_pegawai'], 'integer'],
            [['deskripsi'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_laporan_kinerja' => 'Id Laporan Kinerja',
            'id_order_pegawai' => 'Id Order Pegawai',
            'order.nomor_order' => 'Nomor Order',
            'id_pegawai' => 'Pegawai',
            'deskripsi' => 'Deskripsi',
        ];
    }
    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
    public function getOrder()
    {
        return $this->hasOne(OrderPegawai::className(), ['id_order_pegawai' => 'id_order_pegawai']);
    }
}
