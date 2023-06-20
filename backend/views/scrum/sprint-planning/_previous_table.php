<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>


<h4>B. Pilih dari Backlog yang belum selesai dari sprint sebelumnya</h4>
<div class="box-tools pull-left">
    <span class="btn btn-warning btn-xs" id="butonUncompleted" onclick="displayUncompleted()"><i class="fa fa-sort-desc"></i> Display yang belum selesai saja</span>
    <?php
    $urld = Url::toRoute(['/member-sprint/detail/', 'i' => $i, 't'=>$t]);
    echo  '<a href="'.$urld.'" class="btn btn-warning btn-xs" id="buttonCompleted" style="display:none"><i class="fa fa-sort-up"></i> Display semua</a>';
    ?>
</div>
<table class="table table-hover">
<tr>
    <?php
        if($sprint->is_locked != 2){
    ?>
    <th>Pilih</th>
    <?php
    }
    ?>
    <th>No</th>
    <th>Product Backlog</th>
    <th>Progres (Versi Tim)</th>
    <th>Progres (Versi PO)</th>
    <th>SPRINT</th>
    <th>Selesai</th>
</tr>

<?php

$searchModel = new \backend\models\ProductBacklogSearch();
$searchModel->id_project = $sprint->id_project;
//$searchModel->id_sprint = 0;
$dataProvider = $searchModel->searchForOthers1(Yii::$app->request->queryParams);
$dataProvider->pagination = false;

echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_product_backlog_prev',
        'options' => [
                    //'tag' => 'ul',
                    'class' => 'list-view'
        ],
        'itemOptions' => [
            //'tag' => 'li',
            'class' => 'item',
        ],
        'viewParams' => [
                'action'=>$action,
                't' => $t,
                'i' =>$i,
                'idi'=>$idi,
                'sprint' =>$sprint,
                'readonly' => $readonly,
        ],
        'summary'=>'',
    ]);
?>

</table>

<script>
function displayUncompleted() {
  var x = document.getElementById("special_completed");
  x.style.display = "none";
  var y = document.getElementById("butonUncompleted");
  y.style.display = "none";
  var y = document.getElementById("buttonCompleted");
  y.style.display = "block";
}
</script>