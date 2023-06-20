<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_jenis_penyakit".
 *
 * @property int $id_mst_jenis_penyakit
 * @property string $jenis_penyakit
 * @property string|null $keterangan
 */
class MstJenisPenyakit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_jenis_penyakit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_penyakit'], 'required'],
            [['jenis_penyakit', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_jenis_penyakit' => 'Id Mst Jenis Penyakit',
            'jenis_penyakit' => 'Jenis Penyakit',
            'keterangan' => 'Keterangan',
        ];
    }
}
