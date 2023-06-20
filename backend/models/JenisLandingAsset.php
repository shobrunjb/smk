<?php

namespace backend\models;

use Yii;
use common\utils\EncryptionDB;

/**
 * This is the model class for table "jenis_landing_asset".
 *
 * @property int $id_jenis_landing_asset
 * @property string $jenis_landing_asset
 * @property int $is_active
 */
class JenisLandingAsset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const MODE_UPDATE = 'update';
    public $attachFile;

    public static function tableName()
    {
        return 'jenis_landing_asset';
    }

    /**
     * {@inheritdoc}
     */
   

    public function rules()
    {
        return [
            [['jenis_landing_asset', 'icon', 'deskripsi'], 'required'],
            [['deskripsi'], 'string', 'max' => 250],
            [['is_active'], 'integer'],
            [['jenis_landing_asset'], 'string', 'max' => 250],

            //Maxsize 1 MB
            [['icon'], 'file', 'skipOnEmpty' => false, 'extensions'=>'jpg, jpeg, png', 'maxSize' => 1024*1024],

            [['icon'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg, jpeg, png', 'maxSize' => 1024*1024, 'on' => self::MODE_UPDATE],

        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::MODE_UPDATE] = ['jenis_landing_asset',  'is_active'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    

    
    public function attributeLabels()
    {
        return [
            'id_jenis_landing_asset' => 'Id Jenis landing_asset',
            'jenis_landing_asset' => 'Jenis landing_asset',
            'deskripsi' => 'Deskripsi',
            'icon' => 'Icon',
            'is_active' => 'Status Aktif',
        ];
    }

    public function uploadFile()
    {
        if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'icon');
            if (!empty($uploadedFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_jenis_landing_asset);
                $filename = "icon-" . $i . '.' . $uploadedFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                //$this->attachFile->saveAs('uploads/galery/' . $filename);

                $this->icon = $filename;
                $uploadedFile->saveAs('../../frontend/web/file/JenisLandingAsset/' . $filename);

                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getStatusAktif()
    {
        if ($this->is_active == 1) {
            return 'AKTIF';
        } else {
            return "TIDAK AKTIF";
        }
    }
}
