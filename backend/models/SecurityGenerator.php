<?php

namespace backend\models;
use Yii;


class SecurityGenerator {	
	public static function CodeIdGenerate($phrase){
		$data=md5($phrase);
		return $data;
	}

	public static function SecurityDisplay($phrase){
		$data= substr($phrase,5,10);
		return $data;
	}


	public static function FooterPrintGenerator(){
		$title = "Curriculum Vitae ";
		if(Yii::app()->language=='id'){
			$title .= "dicetak dari";
		}else{
			$title .= "generated from";
		}
			$LIST_DATA = '<table width="100%" height:100px; style="background-color:#0d1b29; vertical-align: bottom; font-family: Arial; font-size: 6pt; 
			color: #fff;   position:absolute; bottom:0;border-top:1px solid black"><tr>
			<td width="33%"><span style="font-weight: bold; font-style: italic;"> <img src="css/logo3.png"></span></td>
			<td width="33%" align="center" style="font-weight: bold; font-style: italic;"></td>
			<td width="32%" style="text-align: right;" vertical-align="top">'.Yii::app()->dateFormatter->formatDateTime(time(), 'long', false).' | '.$title.' <br><span style="font-size: 8pt;">www.careerln.com</span>'.' </td>
			<td width="1%"> &nbsp; </td>
			</tr></table>';
		

		return $LIST_DATA;
	}

	
}




?>