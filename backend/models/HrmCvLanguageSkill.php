<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_language_skill".
 *
 * @property int $id_language_skill
 * @property int $code_id
 * @property int $id_pegawai
 * @property string|null $bahasa
 * @property int $id_mst_bahasa
 * @property string $tingkat_keahlian
 * @property int $punya_sertifikat
 * @property string|null $sertifikat
 * @property string|null $foto_sertifikat
 * @property string|null $created_date
 * @property string|null $created_user
 * @property string|null $created_ip_address
 * @property string|null $modified_date
 * @property string|null $modified_user
 * @property string|null $modified_ip_address
 */
class HrmCvLanguageSkill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_language_skill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_mst_bahasa', 'tingkat_keahlian'], 'required'],
            [['code_id', 'id_pegawai', 'id_mst_bahasa', 'punya_sertifikat'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['bahasa', 'tingkat_keahlian', 'sertifikat', 'foto_sertifikat'], 'string', 'max' => 150],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_language_skill' => 'Id Language Skill',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Id Pegawai',
            'bahasa' => 'Bahasa',
            'id_mst_bahasa' => 'Bahasa',
            'tingkat_keahlian' => 'Tingkat Keahlian',
            'punya_sertifikat' => 'Punya Sertifikat',
            'sertifikat' => 'Sertifikat',
            'foto_sertifikat' => 'Foto Sertifikat',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }

    public function getBahasa()
    {
        return $this->hasOne(HrmMstBahasa::className(), ['id_mst_bahasa' => 'id_mst_bahasa']);
    }
}
