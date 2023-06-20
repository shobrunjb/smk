<?php

namespace backend\models;
use common\utils\EncryptionDB;

use Yii;

/**
 * This is the model class for table "publik_user".
 *
 * @property int $id_publik_user
 * @property string $nama
 * @property string $jenis_user
 * @property string $nik
 * @property string $pekerjaan
 * @property string $alamat
 * @property int $id_propinsi
 * @property int $id_kabupaten
 * @property string $nomor_telepon
 * @property string $email
 * @property int $id_user
 * @property string $file_identitas
 * @property string|null $file_akta_pendirian
 */
class PublikUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $attachFile;
    public $password1;
    public $repassword;
    public $verifyCode;

    const BADAN = 'badan publik';

    public static function tableName()
    {
        return 'publik_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_user', 'nik', 'pekerjaan', 'alamat', 'id_propinsi', 'id_kabupaten','email', 'id_user'], 'required',
                'message'=>'Isian {attribute} tidak boleh kosong.'
            ],

            [['password1'], 'required',
                'message'=>'Silakan isi {attribute} terlebih dahulu.'
            ],
            [['jenis_user'], 'string'],
            
            //[['nik'], 'string', 'min' => 16, 'max' => 16, 'tooShort' => '{attribute} minimal 16 karakter' , 'tooLong' => '{attribute} maksimal 16 karakter' ],
            
            //Email Vailidator
            ['email', 'email', 'message' => '{attribute} bukan email yang valid.'],

            //Maxsize 1 MB
            [['file_identitas'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg, jpeg, png, pdf', 'maxSize' => 1024*1024],

            [['nama', 'jenis_user', 'nik', 'pekerjaan', 'alamat', 'id_propinsi', 'id_kabupaten', 'nomor_telepon', 'email', 'id_user', 'file_identitas', 'file_akta_pendirian'], 'required',
                'message'=>'Isian {attribute} tidak boleh kosong.', 'on' => self::BADAN
            ],

            [['file_akta_pendirian'], 'file', 'skipOnEmpty' => true, 'extensions'=>'jpg, jpeg, png, pdf', 'maxSize' => 1024*1024],
            //Cek Double Email
            ['email', 'validateDoubleEmail'],

            //Captcha Validate
            //['verifyCode', 'captcha', 'captchaAction' => 'helper/captcha'],


            [['id_propinsi', 'id_kabupaten', 'id_user', 'nomor_telepon', 'nik'], 'integer',
                'message'=>'Isian {attribute} harus dalam angka.'],
            [['nama'], 'string', 'max' => 250],
            [['nik'], 'string', 'max' => 50],
            [['pekerjaan', 'nomor_telepon', 'email'], 'string', 'max' => 200],
            [['alamat'], 'string', 'max' => 500],

            //Aturan untuk password
            [['password1'], 'string', 'min' => 8, 'max' => 50, 'tooShort' => '{attribute} minimal 8 karakter' , 'tooLong' => '{attribute} maksimal 50 karakter' ],
            // https://opensourcelibs.com/lib/yii2-at-least-validator
            /*
            ['password1', 'filter', 'filter' => function ($value) {
                // normalize phone input here
                if($value == "123456789"){
                    return false;
                }
            }],
            */
            //['password1', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            //['password', 'compare', 'compareAttribute' => 'password_repeat'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::BADAN] = ['nama', 'jenis_user', 'nik', 'pekerjaan', 'alamat', 'id_propinsi', 'id_kabupaten', 'nomor_telepon', 'email', 'id_user', 'file_identitas', 'file_akta_pendirian', 'password1'];

        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_publik_user' => 'Id Publik User',
            'nama' => 'Nama',
            'jenis_user' => 'Jenis Pengguna',
            'nik' => 'NIK',
            'pekerjaan' => 'Pekerjaan',
            'alamat' => 'Alamat',
            'id_propinsi' => 'Provinsi',
            'id_kabupaten' => 'Kabupaten',
            'nomor_telepon' => 'Nomor Telepon',
            'email' => 'Email',
            'id_user' => 'User',
            'file_identitas' => 'KTP',
            'file_akta_pendirian' => 'File Akta Pendirian',
            'password1' => 'Password',
        ];
    }

    public function getPropinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id_propinsi' => 'id_propinsi']);
    }


    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::className(), ['id_kabupaten' => 'id_kabupaten']);
    }

    public function validateDoubleEmail($attribute)
    {
        //Di sini ngecek apakah nomor registrasi sudah pernah ada atau belum pernah.
        $reg =  PublikUser::find()
            ->where(['email' => $this->email])
            ->one();
        if ($reg != null) {
            $this->addError($attribute, "Email ini [" . $this->email."] telah terdaftar di sistem ini. Silakan gunakan email yang lain!");
        }
    }


    public function uploadFileIdentitas()
    {
        //if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'file_identitas');
            if (!empty($uploadedFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_publik_user);
                $filename = "foto-identitas-" . $i . '.' . $uploadedFile->extension;
                echo "dasa";
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                $this->file_identitas = $filename;

                $uploadedFile->saveAs('uploads/file_identitas/' . $filename);
                
                $this->save(false);
                return true;
            } else {
                return false;
            }
        /*
        } else {
            echo var_dump($this->errors);
            return false;
        }
        */
    }

    public function uploadFileAktaPendirian()
    {
        //if ($this->validate()) {
            $uploadedFile = yii\web\UploadedFile::getInstance($this, 'file_akta_pendirian');
            if (!empty($uploadedFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_publik_user);
                $filename = "file-akta-pendirian-" . $i . '.' . $uploadedFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                $this->file_akta_pendirian = $filename;

                $uploadedFile->saveAs('uploads/file_akta_pendirian/' . $filename);
                
                $this->save(false);
                return true;
            } else {
                return false;
            }
        /*
        } else {
            echo var_dump($this->errors);
            return false;
        }
        */
    }

    /*
    public function uploadFile()
    {
        if ($this->validate()) {
            if (isset($this->attachFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_publik_user);
                $filename = "foto-" . $i . '.' . $this->attachFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                $this->attachFile->saveAs('uploads/file_identitas/' . $filename);
                $this->file_identitas = $filename;
                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    */

    /*public function uploadFileAkta()
    {
        if ($this->validate()) {
            if (isset($this->attachFile)) {
                $i = EncryptionDB::encryptor('encrypt',$this->id_publik_user);
                $filename = "foto-" . $i . '.' . $this->attachFile->extension;
                // $this->attachfile1->saveAs('uploads/' . $this->attachfile1->baseName . '.' . $this->attachfile1->extension);
                $this->attachFile->saveAs('uploads/file_akta_pendirian/' . $filename);
                $this->file_akta_pendirian = $filename;
                $this->save(false);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }*/
}
