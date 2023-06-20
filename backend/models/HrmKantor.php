<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_kantor".
 *
 * @property int $id_hrm_kantor
 * @property int $id_perusahaan
 * @property string $nama_kantor
 * @property int $id_hrm_kantor_parent
 * @property int $id_kantor_kategori
 * @property string $alamat_kantor
 * @property int $id_kabupaten
 * @property int $id_propinsi
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $fax
 * @property string $telepon
 */
class HrmKantor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_kantor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perusahaan', 'nama_kantor', 'id_hrm_kantor_parent', 'id_kantor_kategori', 'alamat_kantor', 'id_kabupaten', 'id_propinsi', 'fax', 'telepon'], 'required'],
            [['id_perusahaan', 'id_hrm_kantor_parent', 'id_kantor_kategori', 'id_kabupaten', 'id_propinsi'], 'integer'],
            [['nama_kantor', 'alamat_kantor', 'fax', 'telepon', 'email'], 'string', 'max' => 250],
            [['latitude', 'longitude'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hrm_kantor' => 'Id Hrm Kantor',
            'id_perusahaan' => 'Id Perusahaan',
            'nama_kantor' => 'Nama Kantor',
            'id_hrm_kantor_parent' => 'Id Hrm Kantor Parent',
            'id_kantor_kategori' => 'Id Kantor Kategori',
            'alamat_kantor' => 'Alamat Kantor',
            'id_kabupaten' => 'Id Kabupaten',
            'id_propinsi' => 'Id Propinsi',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'fax' => 'Fax',
            'telepon' => 'Telepon',
            'email' => 'Email',
        ];
    }
}
