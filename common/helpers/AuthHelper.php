<?php


namespace common\helpers;

use backend\models\User;
use backend\models\HrmPegawai;
use Yii;

class AuthHelper
{	
	public static function getIDPegawaByUserID(){
		$id_user = Yii::$app->getUser()->getId();
		$model = HrmPegawai::find()->where(
			[
				'id_user' => $id_user,
			])
			->one();
			
		if($model != null){
			return $model;
		}else{
			$mod = new HrmPegawai;
			$mod->id_pegawai = 0;
			return $mod;
		}
	}
	
}