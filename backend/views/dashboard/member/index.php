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

$this->title = 'Home';
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
                    //'model' => $model,
                ]) ?>
            </div>
            <!-- ./col -->
            <div class="col-lg-8 col-xs-8">
              <!-- small box -->
                <?= $this->render('_profile2', [
                    //'model' => $model,
                ]) ?>
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
                    $label = ["Project", "Absensi"];
                    for($x=1;$x<=1;$x++){
                        $url = "";

                        $active = "";
                        $tabLabel = strtolower($label[$x-1]);
                        if ($t == $tabLabel) {
                            $active = "active";
                        }

                        $url_menu = Url::toRoute(['index', 't'=>$tabLabel]);

                        echo '
                            <li class="' . $active . '"><a href="' . $url_menu . '" >' . $label[$x-1]. '</a></li>
                            ';
                    }
                    ?>
                </ul>
                <div class="tab-content">
                    <?php

                    switch ($t) {
                        case "project":
                            echo  $this->render('_my_project', [
                                //'model' => $model,
                            ]);
                            break;

                        case 2:
                            $searchModel = new MaterialFinishSearch();
                            $dataProvider = $searchModel->searchGroupByKategori1Yard(Yii::$app->request->queryParams);
                            echo $this->render('rekapitulasi-stok-kategori1', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                't' => $t,
                            ]);
                            break;

                        case 3:
                            $searchModel = new MaterialFinishSearch();
                            $dataProvider = $searchModel->searchGroupByKategori2Yard(Yii::$app->request->queryParams);
                            echo $this->render('rekapitulasi-stok-kategori2', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                't' => $t,
                            ]);
                            break;

                        case 4:
                            $searchModel = new MaterialFinishSearch();
                            $dataProvider = $searchModel->searchGroupByKategori3Yard(Yii::$app->request->queryParams);
                            echo $this->render('rekapitulasi-stok-kategori3', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                                't' => $t,
                            ]);
                            break;
                    }

                    ?>
                </div>
                <!-- /.tab-content -->
            </div>

    </div>
</div>