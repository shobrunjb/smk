<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\helpers\UniqueIDHelper;

use app\models\HrmPegawai;
use app\models\HrmKantor;
//use app\models\HrmKantorKategori;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
/*
        $cs = new UUIDHelper();
        $pass = true;
        for ($i=0; $i < 100; $i++) {
            $a = array($cs->get32BitRand(), $cs->get32BitRand(), $cs->get32BitRand(), $cs->get32BitRand());
            $uuid = $cs->generateUUIDFromInts($a);

            $ints = $cs->getIntsFromUUID($uuid);
            echo $i." = ".$uuid." "."<Br>";
            var_dump($ints);
            if ($a != $ints) {
                $pass = false;
                echo "Test FAILED $i Random combinations\n";
                echo "UID: $uuid\n";
                echo "Input:" . var_export($a, true) . "\n";
                echo "Output:" . var_export($inta, true) . "\n";
            }
        }
        if ($pass) {
            echo "Test PASSED. $i Random combinations [0 - 0xFFFFFFFF]\n";
        }
*/

function toUId($baseId, $multiplier = 1) {
    return base_convert($baseId * $multiplier, 10, 36);
}
function fromUId($uid, $multiplier = 1) {
    return (int) base_convert($uid, 36, 10) / $multiplier;
}

for ($i=9999100; $i < 9999999; $i++) {
    /*
    $kode = toUId($i, 1117);
    echo $kode;
    echo " ";
    $id = fromUId($kode, 1117);
    echo $id;
    echo " ";
    echo md5($i);
    */
    echo $i;
    echo " ";
    echo UniqueIDHelper::generateUniqueID($i);
    echo '<br>';
}

?>
