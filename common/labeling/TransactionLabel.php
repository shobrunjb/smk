<?php

namespace common\labeling;

use Yii;

class TransactionLabel
{
    const CREATE = "Tambah";
    const UPDATE = "Ubah";

	public static function msgSaveSucces($theme){
		return "Simpan data ".$theme." yang baru berhasil!";
	}
    public static function msgFaildSaveSucces($theme){
        return "Data ".$theme." Gagal di Simpan! Cek Kembali Data yang akan anda simpan !";
    }

	public static function msgUpdateSucces($theme){
		return "Update data ".$theme." telah berhasil!";
	}
	
	public static function msgDeleteSucces($theme){
		return "Hapus data ".$theme." telah berhasil!";
	}
	
	public static function msgUploadSuccess($theme){
		return "Upload ".$theme." telah berhasil!";
	}
	
	public static function msgStatusSuccess($theme){
		return "Perubahan data ".$theme." telah berhasil!";
	}
}

?>
