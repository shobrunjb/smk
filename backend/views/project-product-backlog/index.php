<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;


echo $this->render('_add_product_backlog', [
    'action' => $action,
    't' => $t,
    'i' => $i,
    'project' => $project
]);
echo \common\helpers\CommonMessageHelper::displayMessageError();
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<table class="table table-hover">
<tr>
    <th>No</th>
    <th>Product Backlog</th>
    <th>Estimasi</th>
    <th>*</th>
    <th>Progres</th>
    <th>Label</th>
    <th>Sprint</th>
</tr>

<?php
echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_product_backlog',
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
                //'project' =>$model
        ],
        'summary'=>'',
    ]);
?>

</table>
</div>

    <?php
        echo $this->render('_button_lock_backlog', [
          'action' => $action,
          't' => $t,
          'i' => $i,
          'project' => $project
        ]);
    ?>