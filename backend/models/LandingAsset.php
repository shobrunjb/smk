<?php

namespace backend\models;
use common\utils\EncryptionDB;

use Yii;

/**
 * This is the model class for table "informasi".
 *
 * @property string $id_landing_asset
 * @property int $id_jenis_landing_asset
 * @property string $id_parent
 * @property int $has_child
 * @property string $judul
 * @property string $icon
 * @property int $nomor
 * @property int $tahun
 * @property int $id_bagian
 * @property string $file
 * @property int $created_id_user
 * @property string $created_date
 * @property string $created_ip_address
 */
class LandingAsset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $attachFile;

    const INDUK = 'induk';

    const MODE_UPDATE = 'update';

    const MODE_APPROVAL = 'approval';

    public static function tableName()
    {
        return 'landing_asset';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_landing_asset', 'has_child', 'judul'], 'required'],
            [['judul'], 'required', 'on' => self::INDUK],
            [['id_jenis_landing_asset', 'id_parent', 'has_child', 'nomor', 'tahun', 'id_bagian', 'created_id_user', 'triwulan', 'is_active'], 'integer'],
            [['created_date'], 'safe'],
            [['judul', 'icon', 'type'], 'string', 'max' => 250],
            [['link_url'], 'string', 'max' => 500],
            [['created_ip_address'], 'string', 'max' => 64],

            //Maxsize 100 MB
            //[['file'], 'file', 'skipOnEmpty' => true, 'extensions'=>'pdf, jpg, jpeg, png', 'maxSize' => 1024*1024*100],

            //[['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpeg, png, jpg'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::INDUK] = ['id_jenis_landing_asset', 'has_child','judul', 'nomor'];
        $scenarios[self::MODE_UPDATE] = ['judul', 'nomor', 'tahun',  'id_parent', 'has_child','id_jenis_landing_asset', 'type', 'triwulan'];
        $scenarios[self::MODE_APPROVAL] = ['status_approval'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_landing_asset' => 'Id Informasi Publik',
            'id_jenis_landing_asset' => 'Jenis landing_asset',
            'id_parent' => 'Induk',
            'has_child' => 'Ada Anak?',
            'judul' => 'Judul',
            'icon' => 'Icon',
            'nomor' => 'Nomor',
            'tahun' => 'Tahun',
            'triwulan' => 'Triwulan',
            'file' => 'File',
            'created_id_user' => 'Diusulkan Oleh',
            'created_date' => 'Tgl. Usulan',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getJenisLandingAsset()
    {
        return $this->hasOne(JenisLandingAsset::className(), ['id_jenis_landing_asset' => 'id_jenis_landing_asset']);
    }

    public function getParent()
    {
        return $this->hasOne(LandingAsset::className(), ['id_landing_asset' => 'id_parent']);
    }

    public function getUserCreated()
    {
        return $this->hasOne(User::className(), ['id' => 'created_id_user']);
    }

    public function uploadIcon()
    {
        if ($this->validate()) {
            if (isset($this->attachFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_landing_asset);
                $filename = "icon-" . $i . '.' . $this->attachFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                //$this->attachFile->saveAs('uploads/LandingAsset-icon/' . $filename);
                $this->attachFile->saveAs('../../frontend/web/landing_asset-publik-icon/' . $filename);
                $this->icon= $filename;
                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function uploadFile()
    {
        if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'file');
            if (!empty($uploadedFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_landing_asset);
                $filename = "file-" . $i . '.' . $uploadedFile->extension;
                $filename = $this->judul.'.' . $uploadedFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                //$this->attachFile->saveAs('uploads/galery/' . $filename);

                $this->file = $filename;
                $uploadedFile->saveAs('../../frontend/web/landing_asset/' . $filename);

                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
