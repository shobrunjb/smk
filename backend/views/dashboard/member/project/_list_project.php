<?php
    /*
    //Get Active Project
    $projects = \backend\models\ProjectMember::find()
            ->where(['id_pegawai' => \backend\models\HrmPegawai::getIdPegawaiFromUserId()])
            ->all();
    foreach($projects as $project){
        echo $project->project->nama_proyek;
    }
    */
?>
<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
?>
<?php /*
<div class="box-header ">
<div class="box-tools pull-right">
    <a href="" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Gabung Proyek</a> &nbsp;
    <a href="<?= Yii::$app->request->baseUrl ?>/member-project/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Proyek Baru</a>
   
</div>
</div>
*/ ?>
<?php
    echo $this->render('_add_join_project', [
        't' => "",
    ]);
?>

<?php
/*
$searchModel = new \backend\models\ProjectMemberSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item_project',
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
*/
?>


<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<table class="table table-hover">
    <?php

    $searchModel = new \backend\models\ProjectMemberSearch();
    $searchModel->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_project_in_table',
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
