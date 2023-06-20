<?php
namespace common\helpers;

use Yii;
use yii\base\Component;
//https://gist.github.com/JohnIncog/50f5cc9c5bec0703a7e9

class UniqueIDHelper extends Component {
	public static function toUId($baseId, $multiplier = 1) {
	    return base_convert($baseId * $multiplier, 10, 36);
	}

	public static function fromUId($uid, $multiplier = 1) {
	    return (int) base_convert($uid, 36, 10) / $multiplier;
	}

	public static function generateUniqueID($from) {
		//Kombinasi Base 36 dan md5
		$firstpart = UniqueIDHelper::toUId($from, 1117);
		$secondpart = substr(md5($from),-4);

		return $firstpart."-".$secondpart;
	}

	public static function generateUniqueID2($from) {
		//Kombinasi Base 36 dan md5
		$firstpart = UniqueIDHelper::toUId($from, 456);
		$secondpart = substr(md5($from),0,4);

		return $firstpart."-".$secondpart;
	}
}
?>
