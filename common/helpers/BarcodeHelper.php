<?php

namespace common\helpers;

use Yii;
use yii\base\Component;

class BarcodeHelper extends Component
{

    public static function generateEAN($number)
    {
      $code = '200' . str_pad($number, 9, '0');
      $weightflag = true;
      $sum = 0;
      // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
      // loop backwards to make the loop length-agnostic. The same basic functionality 
      // will work for codes of different lengths.
      for ($i = strlen($code) - 1; $i >= 0; $i--)
      {
        $sum += (int)$code[$i] * ($weightflag?3:1);
        $weightflag = !$weightflag;
      }
      $code .= (10 - ($sum % 10)) % 10;
      return $code;
    }

    /*
    Ideal EAN :
    https://www.kiosbarcode.com/blog/ean-13-european-article-numbering/
    3 digit depan : Nomor System/Kode Negara
    4 digit       : Kode Manufaktur
    5 digit       : Kode Produks
    1 digit akhir : Digit Check
    ======================================================================
    Versi sendiri untuk keperluan internal (Versi 2 - start November 2011)
    3 digit depan : Kode Perusahaan (201 untuk domivatex, 301 untuk samwa)
    9 digit tengah: Kode Unik Produk
    1 digit akhir : Digit Check
    untuk duplicat nomer untuk solusinya adalah dengan mengganti nomor digit depan di bawah angka 200.
    */
    public static function generateEANVer2($number, $numberOrganization=201)
    {
      //Angka 0 fill 0 diisi di depan / PAD LEFT
      $numberOrganization = str_pad($numberOrganization, 3, '0',STR_PAD_LEFT);
      $code = $numberOrganization. str_pad($number, 9, '0',STR_PAD_LEFT);
      //$code = $numberOrganization . str_pad($number, 9, '0',STR_PAD_LEFT);
      $weightflag = true;
      $sum = 0;
      // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
      // loop backwards to make the loop length-agnostic. The same basic functionality 
      // will work for codes of different lengths.
      for ($i = strlen($code) - 1; $i >= 0; $i--)
      {
        $sum += (int)$code[$i] * ($weightflag?3:1);
        $weightflag = !$weightflag;
      }
      $code .= (10 - ($sum % 10)) % 10;
      return $code;
    }

    public static function generateEANProductNumberVer2($number, $numberOrganization=201, $startAlt=0){
      $barcode = \common\helpers\BarcodeHelper::generateEANVer2($number, $numberOrganization);

      //Cek dulu apakah ada nomor yang doubling, jika doubling maka 3 digit depan diubah jadi angka di bawah 1. Dan hal ini dilakukan secara rekursif
      $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
          ])
          ->one();
      if($materialfinish != null){
        //Start dengan numberOrganization + 1
        $numNewOrganization = $startAlt + 1;
        if($numNewOrganization <= 199){
          return \common\helpers\BarcodeHelper::generateEANProductNumberVer2($number, $numNewOrganization, $numNewOrganization);
        }else{
          return 0; //Jika masih bentrok terus maka dikasih 0 saja.
        }
      }

      return $barcode;
    }

    public static function generateEANProductNumberVer2_1($model, $number, $numberOrganization=201, $startAlt=0){
      $barcode = \common\helpers\BarcodeHelper::generateEANVer2($number, $numberOrganization);

      //Cek dulu apakah ada nomor yang doubling, jika doubling maka 3 digit depan diubah jadi angka di bawah 1. Dan hal ini dilakukan secara rekursif
      $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
          ])
          ->one();
      if($materialfinish != null && $materialfinish->id_material_finish != $model->id_material_finish){
        //Start dengan numberOrganization + 1
        $numNewOrganization = $startAlt + 1;
        if($numNewOrganization <= 199){
          return \common\helpers\BarcodeHelper::generateEANProductNumberVer2($number, $numNewOrganization, $numNewOrganization);
        }else{
          return 0; //Jika masih bentrok terus maka dikasih 0 saja.
        }
      }

      return $barcode;
    }

}
