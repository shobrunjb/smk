<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiSequenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bei Sequence';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bei-interview-bacth-index box box-primary">

       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <?= Html::a('Tambah Sequence', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>

<div class="box-body table-responsive no-padding">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_bei_sequence',
            'sequence_name',
            'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
