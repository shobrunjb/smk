<?php 

use yii\helpers\Html;
use backend\models\MstJabatanAttribute;
use backend\models\MstJabatanAttributeSearch;
/* @var $this yii\web\view */
/* @var $model backend\models\MaterialIn */

$this->title = 'Lihat Atribut Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Atribut Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?> 

<div class="box">
    <div class="box-body material-in-create">

    <?= $this->render('_view_jabatan', [
        'model' => $model,
    ])?>

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