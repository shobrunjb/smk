<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mst_tingkat_pendidikan".
 *
 * @property int $id_mst_tingkat_pendidikan
 * @property string $tingkat_pendidikan
 * @property string|null $keterangan
 */
class MstTingkatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_tingkat_pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tingkat_pendidikan'], 'required'],
            [['tingkat_pendidikan', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mst_tingkat_pendidikan' => 'Id Mst Tingkat Pendidikan',
            'tingkat_pendidikan' => 'Tingkat Pendidikan',
            'keterangan' => 'Keterangan',
        ];
    }
}
