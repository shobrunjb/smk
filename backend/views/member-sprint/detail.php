<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use backend\models\AppSettingSearch;
$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$imgdefault = '@web/images/home.jpg';
$backimage = AppSettingSearch::getImageUrl("MAIN-BACKGROUND", $imgdefault);

$this->title = 'Proyek';
$this->title = $appName;
$this->params['breadcrumbs'][] = $this->title;


$total_perhomonan_baru = 1;
$total_proyek = 1;
?>
<div class="box">
    <div class="box-body dash-in-index">
        <div class="row">
            <div class="col-lg-4 col-xs-4">
                <?= $this->render('_profile', [
                    'model' => $model,
                ]) ?>
            </div>
            <!-- ./col -->
            <div class="col-lg-8 col-xs-8">


<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Deskripsi</a></li>
    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Role Anda</a></li>
    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tim</a></li>
    <?php /*
    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tab 3</a></li>
    */ ?>

    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            Mulai tanggal : <?= \common\helpers\Timeanddate::getShortDateIndo($model->start_date) ?><Br>
            Berakhir tanggal : <?= \common\helpers\Timeanddate::getShortDateIndo($model->end_date) ?><br>
        </div>
        <div class="tab-pane" id="tab_2">
        Role Anda : <?= \backend\models\ProjectMember::getYourRole($model->id_project); ?>
        </div>
        <div class="tab-pane" id="tab_3">
            <?= $this->render('_tim_member', [
                    'model' => $model,
                ]) ?> 
        </div>
        <?php /*
        <div class="tab-pane" id="tab_2">
        The European languages are members of the same family. Their separate existence is a myth.
        For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
        in their grammar, their pronunciation and their most common words. Everyone realizes why a
        new common language would be desirable: one could refuse to pay expensive translators. To
        achieve this, it would be necessary to have uniform grammar, pronunciation and more common
        words. If several languages coalesce, the grammar of the resulting language is more simple
        and regular than that of the individual languages.
        </div>

        <div class="tab-pane" id="tab_3">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        */ ?>
    </div>
</div>
            </div>

        </div>

    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

</div>

<div class="boxs">
    <div class="box-bodys dash-in-index">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <?php
                    $label = ["Sprint Planning", "Sprint Backlog", "Daily Report", "Sprint Review",  "Sprint Retrospective", "Sprint Close"];
                     //$label = ["Sprint Planning", "Sprint Backlog", "Daily Standup", "Sprint Review", "Sprint Retrosepective"];
                    for($x=1;$x <=count($label);$x++){
                        $url = "";

                        $active = "";
                        $tabLabel = strtolower($label[$x-1]);
                        if ($t == $tabLabel) {
                            $active = "active";
                        }

                        $url_menu = Url::toRoute(['detail', 'i'=>$i,'t'=>$tabLabel]);

                        echo '
                            <li class="' . $active . '"><a href="' . $url_menu . '" >' . $label[$x-1]. '</a></li>
                            ';
                    }
                    ?>
                </ul>
                <div class="tab-content">
                    <?php

                    switch ($t) {
                        case "sprint planning":
                            echo $this->render('/scrum/sprint-planning/_inner_view_controller', [
                                'action'=>$action,
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            
                            break;

                        case "sprint backlog":
                            echo $this->render('/scrum/sprint-planning/_inner_view_controller', [
                                'action'=>'index-readonly',
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            
                            break;

                        case "daily report":
                            echo $this->render('/scrum/daily-standup/_list_daily', [
                                'action'=>'index-readonly',
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            break;   

                        case "sprint review":
                            echo $this->render('/scrum/sprint-review/_list_backlog', [
                                'action'=>'index-readonly',
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            
                            break;

                         case "sprint retrospective":
                            echo $this->render('/scrum/sprint-retrospective/_inner_view_controller', [
                                'action'=>'index',
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            
                            break;

                        case "sprint close":
                            echo $this->render('/scrum/sprint-close/_inner_view_controller', [
                                'action'=>'index',
                                't' => $t,
                                'i' =>$i,
                                'idi'=>$idi,
                                'sprint' =>$model
                            ]);
                            
                            break;
                    }

                    ?>
                </div>
                <!-- /.tab-content -->
            </div>

    </div>
</div>