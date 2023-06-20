<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hrm_cv_riwayat_pendidikan".
 *
 * @property int $id_riwayat_pendidikan
 * @property int|null $code_id
 * @property int $id_pegawai
 * @property int $id_mst_tingkat_pendidikan
 * @property int $id_sekolah
 * @property int $dari
 * @property int $sampai
 * @property int $id_jurusan
 * @property string $grade
 * @property string $foto_ijazah
 * @property string $foto_transkrip
 * @property string $created_date
 * @property string $created_user
 * @property string $created_ip_address
 * @property string $modified_date
 * @property string $modified_user
 * @property string $modified_ip_address
 */
class HrmCvRiwayatPendidikan extends \yii\db\ActiveRecord
{
    public $file_img;
    public $file_img2;

    const MODE_UPDATE = 'update';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hrm_cv_riwayat_pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id', 'id_pegawai', 'id_mst_tingkat_pendidikan', 'id_sekolah', 'dari', 'sampai', 'id_jurusan'], 'integer'],
            [['id_pegawai', 'id_mst_tingkat_pendidikan', 'id_sekolah', 'dari', 'sampai', 'id_jurusan', 'grade', 'foto_ijazah', 'foto_transkrip'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['grade'], 'string', 'max' => 50],
            [['foto_ijazah', 'foto_transkrip'], 'string'],
            [['created_user', 'created_ip_address', 'modified_user', 'modified_ip_address'], 'string', 'max' => 64],
            [['file_img'],'file','skipOnEmpty' =>true, 'extensions'=> 'jpg,jpeg,png'],
            [['file_img2'],'file','skipOnEmpty' =>true, 'extensions'=> 'jpg,jpeg,png'],
            [['foto_ijazah', 'foto_transkrip'],'file','skipOnEmpty' =>true, 'extensions'=> 'jpg,jpeg,png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat_pendidikan' => 'Id Riwayat Pendidikan',
            'code_id' => 'Code ID',
            'id_pegawai' => 'Pegawai',
            'id_mst_tingkat_pendidikan' => 'Tingkat Pendidikan',
            'id_sekolah' => 'Sekolah',
            'dari' => 'Dari',
            'sampai' => 'Sampai',
            'id_jurusan' => 'Jurusan / Konsentrasi',
            'grade' => 'Grade',
            'foto_ijazah' => 'Foto Ijazah',
            'foto_transkrip' => 'Foto Transkrip',
            'created_date' => 'Created Date',
            'created_user' => 'Created User',
            'created_ip_address' => 'Created Ip Address',
            'modified_date' => 'Modified Date',
            'modified_user' => 'Modified User',
            'modified_ip_address' => 'Modified Ip Address',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::MODE_UPDATE] = ['id_mst_tingkat_pendidikan', 'id_sekolah', 'dari', 'sampai', 'id_jurusan'];
        return $scenarios;
    }

    public function uploadFotoIjazah()
    {
        $uploadedFile = yii\web\UploadedFile::getInstance($this, 'foto_ijazah');
        if (!empty($uploadedFile)) {
            $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_riwayat_pendidikan);
            $filename = "foto-" . $i . '.' . $uploadedFile->extension;

            $this->foto_ijazah = $filename;
            $uploadedFile->saveAs('../web/uploads/foto-ijazah/' . $filename);

            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

    public function uploadFotoTranskrip()
    {
        $uploadedFile = yii\web\UploadedFile::getInstance($this, 'foto_transkrip');
        if (!empty($uploadedFile)) {
            $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_riwayat_pendidikan);
            $filename = "foto-" . $i . '.' . $uploadedFile->extension;

            $this->foto_transkrip = $filename;
            $uploadedFile->saveAs('../web/uploads/foto-transkrip/' . $filename);

            $this->save(false);
            return true;
        } else {
            return false;
        }
    }

    public function getTingkatPendidikan()
    {
        return $this->hasOne(MstTingkatPendidikan::className(), ['id_mst_tingkat_pendidikan' => 'id_mst_tingkat_pendidikan']);
    }

    public function getDataSekolah()
    {
        return $this->hasOne(DataSekolah::className(), ['id_sekolah' => 'id_sekolah']);
    }

    public function getDataJurusan()
    {
        return $this->hasOne(DataJurusan::className(), ['id_jurusan' => 'id_jurusan']);
    }
}
