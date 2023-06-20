<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<?php
        $searchModel = new \backend\models\SprintBacklogSearch();
        $searchModel->id_project = $sprint->id_project;
        $searchModel->id_sprint = $sprint->id_sprint;
        $dataProvider = $searchModel->searchWithProductBacklog(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        $noted = "";
        //Get Noted Info
        $sprintceremony = \backend\models\SprintCeremony::find()
            ->where([
                'id_sprint' => $sprint->id_sprint,
                'id_project' => $sprint->id_project,
                'ceremony' => 'PLANNING',
            ])->one();
        if($sprintceremony != null){
            $noted = $sprintceremony->noted;
        }
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<div class="alert alert-info">
<?php
    echo 'Berikut ini adalah progres backlog untuk SPRINT #'.$sprint->sprint_number.".";
?>
</div>

<table class="table">
<tr>

    <th>No</th>
    <th>Product Backlog</th>
    <th>Progres</th>
    <th width="40%">Progres dan Kontributor</th>
</tr>

<?php
echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_sprint_backlog',
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
                'readonly' => true,
        ],
        'summary'=>'',
    ]);
?>

</table>


</div>