<?php

namespace common\labeling;

use Yii;

class ApprovalLabel
{
	const BELUM_DI_APPROVE =  0;
	const APPROVE =  1;
	const REJECTED =  2;
	const AJUKAN_ULANG =  3;
	const HOLD=  4;

	public static function getApprovalKode($kode){
		switch($kode){
			case 0 : return "BELUM DI-APPROVE";
			case 1 : return "APPROVED";
			case 2 : return "REJECTED";
			case 3 : return "AJUKAN ULANG";
			case 4 : return "HOLD";
		}
		return "--";

	}

	public static function getColorApprovalKode($kode){
		switch($kode){
			case 0 : return "blue";//"BELUM DI-APPROVE";
			case 1 : return "green";//"APPROVED";
			case 2 : return "red";//"REJECTED";
			case 3 : return "orange";//"AJUKAN ULANG";
			case 4 : return "black";//"HOLD";
		}
		return "--";

	}

	public static function getApprovalCode(){
		return
		[
			self::BELUM_DI_APPROVE => Yii::t('app','BELUM DI-APPROVE'),
			self::APPROVE => Yii::t('app','APPROVE'),
			self::REJECTED => Yii::t('app','REJECTED'),
			self::AJUKAN_ULANG => Yii::t('app','AJUKAN ULANG'),
			self::HOLD => Yii::t('app','HOLD'),
		];
	}
}

?>
