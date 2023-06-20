<?php 

use yii\helpers\Html;
use backend\models\MstPersonalAttribute;
use backend\models\MstPersonalAttributeSearch;
use backend\models\MstJabatanAttribute;
use backend\models\MstJabatanAttributeSearch;
/* @var $this yii\web\view */
/* @var $model backend\models\MaterialIn */

$this->title = 'Detail Matching Personal vs Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?> 

<div class="box">
    <div class="box-body material-in-create">

    <?= $this->render('_view_pegawai', [
        'model' => $model,
    ])?>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        <h3>Personal Atribute</h4>
        <?php 
            $searchModel = new MstPersonalAttributeSearch();
            $dataProvider = $searchModel->search(yii::$app->request->queryParams);
            $dataProvider->pagination = false;
            echo $this->render('mst-personal-attribute/_index', [
                'model'         => $model,
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider,
                'i'             => $i,
                'status_view'   => true
            ]);
        ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3>Jabatan Atribute</h4>
        <?php 
            $searchModel = new MstJabatanAttributeSearch();
            $dataProvider = $searchModel->search(yii::$app->request->queryParams);
            echo $this->render('mst-jabatan-attribute/_index', [
                'model'         => $model,
                'searchModel'   => $searchModel,
                'dataProvider'  => $dataProvider,
                'i'             => $i,
                'status_view'   => true
            ]);
        ?>
        </div>
    </div>
    </div>
</div>