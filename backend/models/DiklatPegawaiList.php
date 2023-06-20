<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "diklat_pegawai_list".
 *
 * @property int $id_peserta
 * @property int $id_diklat
 * @property int $id_pegawai
 */
class DiklatPegawaiList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diklat_pegawai_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diklat', 'id_pegawai'], 'required'],
            [['id_diklat', 'id_pegawai'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_peserta' => 'Id Peserta',
            'id_diklat' => 'Id Diklat',
            'id_pegawai' => 'Pegawai',
        ];
    }
    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

}
