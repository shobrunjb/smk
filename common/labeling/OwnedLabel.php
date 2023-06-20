<?php

namespace common\labeling;

use Yii;

class OwnedLabel
{
	const Status_Belum_Diset =  0;
	const SUDAH_DIBEBASKAN =  1;
	const BELUM_DIBEBASKAN =  2;

	public static function getOwnedKode($kode){
		switch($kode){
			case 0 : return "(Status Belum Diset)";
			case 1 : return "SUDAH DIBEBASKAN";
			case 2 : return "BELUM DIBEBASKAN";
		}
		return "--";

	}

	public static function getColorKode($kode){
		switch($kode){
			case 0 : return "orange";//"Status Belum Diset";
			case 1 : return "green";//"SUDAH DIBEBASKAN";
			case 2 : return "red";//"BELUM DIBEBASKAN";
		}
		return "--";

	}

	public static function getOwnedCode(){
		return
		[
			self::Status_Belum_Diset => Yii::t('app','BELUM DI-APPROVE'),
			self::SUDAH_DIBEBASKAN => Yii::t('app','SUDAH DIBEBASKAN'),
			self::BELUM_DIBEBASKAN => Yii::t('app','BELUM DIBEBASKAN'),
		];
	}
}

?>
