<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiCompentecyQuestion */

$this->title = 'View Kompetensi: '. $model->competency->competeny_dimension_ind;
$this->params['breadcrumbs'][] = ['label' => 'Petanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-compentecy-question-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_compentecy_question], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_compentecy_question], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

<div class="box-body table-responsive no-padding">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'id_bei_compentecy_question',
            'competency.competeny_dimension_ind',
            'question_ind',
            'question_eng',
            'number',
        ],
    ]) ?>

</div>
</div>
