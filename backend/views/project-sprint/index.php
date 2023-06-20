<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;


echo $this->render('_add_sprint', [
    'action' => $action,
    't' => $t,
    'i' => $i,
]);

?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<table class="table table-hover">
<tr>
    <th>No</th>
    <th>Sprint</th>
    <th>*</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Berakhir</th>
    
</tr>

<?php
echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_sprint',
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