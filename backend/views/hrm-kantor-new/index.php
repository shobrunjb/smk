<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HrmKantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kantor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body hrm-kantor-index">

        
        <p>
            <?= Html::a('Tambah Kantor', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_kantor',
            'alamat_kantor',
            'telepon',
            'email',
            // 'latitude',
            // 'longitude',
            // 'fax',
            //'telepon',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
