<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<?php
$this->registerCssFile("@web/js/bootstrap-slider.min.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/js/fastclick.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-slider.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="panel panel-primary"><div class="panel-heading">    
	<div class="pull-right"><div class="summary">&nbsp;</div></div>
    <h3 class="panel-title"><span class="fa fa-check"></span> Silakan isikan di bagian mana backlog yang terkait beserta kontribusi progres</h3>
    <div class="clearfix"></div></div>


<table class="table table-hover">
<tr>

    
    <th>Pilih</th>
    <th>No</th>
    <th>Product Backlog</th>
    <th>Progres Sebelumnya</th>
    <th>Progres Saat ini</th>
    <th>Kontribusi Anda</th>
</tr>

<?php
$searchModel = new \backend\models\ProductBacklogSearch();
$searchModel->id_project = $sprint->id_project;
$searchModel->id_sprint = $sprint->id_sprint;
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->pagination = false;

echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_progres_backlog',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'viewParams' => [

                't' => $t,
                'i' =>$i,
                //'idi'=>$idi,
                'sprint' =>$sprint,
                'readonly' => true,
        ],
        'summary'=>'',
    ]);
?>

</table>
</div>