<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_pegawai_kategori".
 *
 * @property int $id_order_pegawai_kategori
 * @property string $kategori
 */
class OrderPegawaiKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_pegawai_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori'], 'required'],
            [['kategori'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_pegawai_kategori' => 'Id Order Pegawai Kategori',
            'kategori' => 'Kategori',
        ];
    }
}
