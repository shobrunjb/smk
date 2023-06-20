<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_pegawai_list".
 *
 * @property int $id_order_pegawai_list
 * @property int $id_order_pegawai
 * @property int $id_pegawai
 */
class OrderPegawaiList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_pegawai_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order_pegawai', 'id_pegawai'], 'required'],
            [['id_order_pegawai', 'id_pegawai'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_pegawai_list' => 'List Id Order',
            'id_order_pegawai' => 'Id Order',
            'id_pegawai' => 'Pegawai',
            'pegawai.nama_lengkap' => 'Nama Anggota',
        ];
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
    public function getOrderPegawai()
    {
        return $this->hasOne(OrderPegawai::className(), ['id_order_pegawai' => 'id_order_pegawai']);
    }
}
