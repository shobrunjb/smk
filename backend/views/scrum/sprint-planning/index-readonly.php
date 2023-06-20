<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="box-body <?php /*table-responsive*/ ?> no-padding">
<div class="alert alert-info">
<?php
    echo 'Berikut ini adalah sprint backlog untuk SPRINT #'.$sprint->sprint_number.".";

?>
</div>

<table class="table table-hover">
<tr>

    <th>No</th>
    <th>Product Backlog</th>
    <th>Estimasi</th>
    <th>Progres</th>
    <th>Label</th>
    <th>SPRINT</th>
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
                'sprint' =>$sprint,
                'readonly' => true,
        ],
        'summary'=>'',
    ]);
?>

</table>


</div>