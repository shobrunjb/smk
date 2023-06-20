<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "absensi_type".
 *
 * @property int $id_absensi_type
 * @property string $absensi_type
 * @property string|null $keterangan
 */
class AbsensiType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['absensi_type'], 'required'],
            [['absensi_type', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_absensi_type' => 'Id Absensi Type',
            'absensi_type' => 'Absensi Type',
            'keterangan' => 'Keterangan',
        ];
    }
}
