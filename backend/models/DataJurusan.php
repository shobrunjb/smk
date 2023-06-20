<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_jurusan".
 *
 * @property int $id_jurusan
 * @property string $nama_jurusan_id
 * @property string|null $nama_jurusan_en
 * @property int $status
 */
class DataJurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_jurusan_id', 'nama_jurusan_en'], 'required'],
            [['status'], 'integer'],
            [['nama_jurusan_id', 'nama_jurusan_en'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jurusan' => 'Id Jurusan',
            'nama_jurusan_id' => 'Nama Jurusan',
            'nama_jurusan_en' => 'Nama Jurusan (English)',
            'status' => 'Status',
        ];
    }
}
