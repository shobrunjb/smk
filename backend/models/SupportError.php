<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "support_error".
 *
 * @property int $id_support_error
 * @property string $judul
 * @property string|null $deskripsi
 * @property string|null $file_pendukung
 */
class SupportError extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'support_error';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul'], 'required'],
            [['deskripsi'], 'string'],
            [['judul', 'file_pendukung'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_support_error' => 'Id Support Error',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'file_pendukung' => 'File Pendukung',
        ];
    }

    public function uploadFilePendukung()
    {
        $uploadedFile = yii\web\UploadedFile::getInstance($this, 'file_pendukung');
        if (!empty($uploadedFile)) {
            $i = \common\utils\EncryptionDB::encryptor('encrypt',$this->id_support_error);
            $filename = "file-" . $i . '.' . $uploadedFile->extension;

            $this->file_pendukung = $filename;
            $uploadedFile->saveAs('../web/uploads/support-error/' . $filename);

            $this->save(false);
            return true;
        } else {
            return false;
        }
    }
}
