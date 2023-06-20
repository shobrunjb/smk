<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_kantor_kategori".
 *
 * @property int $id_hrm_kantor_kategori
 * @property string $kategori
 * @property string $keterangan
 * @property int $id_parent_kategori
 * @property int $is_used
 */
class HrmKantorKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_kantor_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori', 'keterangan', 'id_parent_kategori'], 'required'],
            [['id_parent_kategori', 'is_used'], 'integer'],
            [['kategori'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_kantor_kategori' => 'Id Hrm Kantor Kategori',
            'kategori' => 'Kategori',
            'keterangan' => 'Keterangan',
            'id_parent_kategori' => 'Id Parent Kategori',
            'is_used' => 'Is Used',
        ];
    }
}
