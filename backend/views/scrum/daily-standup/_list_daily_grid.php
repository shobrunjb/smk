<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<table class="table table-hover">
    <?php

    $searchModel = new \backend\models\ScrumDailySearch();
    $modeview = isset($_GET['v']) ? $_GET['v'] : "self";
    if($modeview == "all"){

    }else{
        $searchModel->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    }
    //$searchModel->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    $searchModel->id_sprint = $sprint->id_sprint;
    $searchModel->id_project = $sprint->id_project;

    //echo $searchModel->id_pegawai." ".$searchModel->id_sprint." ".$searchModel->id_project; 
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_daily',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'summary'=>'',
    ]);
    ?>
</table>
</div>