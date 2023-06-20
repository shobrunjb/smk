<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_pegawai".
 *
 * @property int $id_order_pegawai
 * @property string $tanggal_order
 * @property string $nomor_order
 * @property int $nomor_order_inc
 * @property int $id_order_pegawai_kategori
 * @property int $id_asset_kendaraan1
 * @property int $id_asset_kendaraan2
 * @property int $jumlah
 * @property int $id_mst_order_progres
 * @property string|null $deskripsi
 * @property int|null $total_biaya
 * @property string|null $status_pembayaran
 * @property string|null $tanggal_pembayaran
 * @property string|null $bukti_pembayaran
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class OrderPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_order', 'id_order_pegawai_kategori', 'id_asset_kendaraan1', 'id_asset_kendaraan2', 'jumlah',], 'required'],
            [['tanggal_order', 'tanggal_pembayaran', 'created_date'], 'safe'],
            [['nomor_order_inc', 'id_order_pegawai_kategori', 'id_asset_kendaraan1', 'id_asset_kendaraan2', 'jumlah', 'id_mst_order_progres', 'total_biaya', 'created_id_user'], 'integer'],
            [['status_pembayaran', 'status_order'], 'string'],
            [['nomor_order'], 'string', 'max' => 150],
            [['deskripsi', 'bukti_pembayaran'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_pegawai' => 'Id Order Pegawai',
            'tanggal_order' => 'Tanggal Order',
            'nomor_order' => 'Nomor Order',
            'nomor_order_inc' => 'Nomor Order Inc',
            'id_order_pegawai_kategori' => 'Kategori',
            'id_asset_kendaraan1' => 'Kapal',
            'id_asset_kendaraan2' => 'Tongkang',
            'jumlah' => 'Jumlah TKBM',
            'id_mst_order_progres' => 'Id Mst Order Progres',
            'deskripsi' => 'Deskripsi',
            'total_biaya' => 'Total Biaya',
            'status_pembayaran' => 'Status Pembayaran',
            'tanggal_pembayaran' => 'Tanggal Pembayaran',
            'bukti_pembayaran' => 'Bukti Pembayaran',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
            'progress.order_progress' => 'Progres',
            'kapal.number2' => 'kapal',
            'tongkang.number2' => 'tongkang',
        ];
    }

    public function getKategori()
    {
        return $this->hasOne(OrderPegawaiKategori::className(), ['id_order_pegawai_kategori' => 'id_order_pegawai_kategori']);
    }
    public function getProgress()
    {
        return $this->hasOne(MstOrderProgres::className(), ['id_mst_order_progres' => 'id_mst_order_progres']);
    }
    public function getKapal()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_kendaraan1']);
    }
    public function getTongkang()
    {
        return $this->hasOne(AssetItem::className(), ['id_asset_item' => 'id_asset_kendaraan2']);
    }
}
