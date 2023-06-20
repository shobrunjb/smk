<?php 

use yii\helpers\Html;
use backend\models\MstPersonalAttribute;
use backend\models\MstPersonalAttributeSearch;
use backend\models\MstEnvironmentAttribute;
use backend\models\MstEnvironmentAttributeSearch;
/* @var $this yii\web\view */
/* @var $model backend\models\MaterialIn */

$this->title = 'Detail Matching Personal vs Environment';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?> 

<div class="box">
    <div class="box-body material-in-create">

    <?= $this->render('_view_kabupaten', [
        'model' => $model,
    ])?>

    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
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
                'status_view'   => true,
                'd'             => $d
            ]);
        ?>
        </div>

    </div>
    </div>
</div>