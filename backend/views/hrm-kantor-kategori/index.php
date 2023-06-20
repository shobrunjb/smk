<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HrmKantorKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hrm Kantor Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-kantor-kategori-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hrm Kantor Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hrm_kantor_kategori',
            'kategori',
            'keterangan',
            'id_parent_kategori',
            'is_used',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
