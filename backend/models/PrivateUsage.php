<?php

namespace backend\models;
use Yii;
use backend\models\Kontak;

class PrivateUsage {

	public static function getCurrentContact(){
		$model=Kontak::findOne(1); //Default local user always defined by 78092015
		if($model===null)
			throw new CHttpException(404,'Settingan untuk data perusahaan awal belum benar. Silakan kontak administrator untuk melakukan perbaikannya');
		
		return $model;
	}
}
?>