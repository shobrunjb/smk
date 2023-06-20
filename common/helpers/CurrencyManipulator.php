<?php

namespace common\helpers;

use Yii;
use yii\base\Component;

class CurrencyManipulator extends Component
{

    public static function penyebutRupiah($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/10)." puluh". CurrencyManipulator::penyebutRupiah($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . CurrencyManipulator::penyebutRupiah($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/100) . " ratus" . CurrencyManipulator::penyebutRupiah($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . CurrencyManipulator::penyebutRupiah($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/1000) . " ribu" . CurrencyManipulator::penyebutRupiah($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/1000000) . " juta" . CurrencyManipulator::penyebutRupiah($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/1000000000) . " milyar" . CurrencyManipulator::penyebutRupiah(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = CurrencyManipulator::penyebutRupiah($nilai/1000000000000) . " trilyun" . CurrencyManipulator::penyebutRupiah(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    public static function terbilangRupiah($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(CurrencyManipulator::penyebutRupiah($nilai));
        } else {
            $hasil = trim(CurrencyManipulator::penyebutRupiah($nilai));
        }           
        return $hasil;
    }
}
