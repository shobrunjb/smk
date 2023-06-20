<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BeiPredefinedQuestion */

$this->title = 'View Daftar Pertanyaan : '.$model->categoryBei->category_predef_quest;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pertanyaan Kompetensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bei-predefined-question-view  box box-primary">

   <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id_bei_predefined_question], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bei_predefined_question], [
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
         // 'id_bei_predefined_question',
            'question_ind',
            'question_eng',
            'number',
            [
                'label' => 'Category Predef Quest',
                'value' => $model->categoryBei->category_predef_quest,

            ],
           // 'id_bei_mst_category_predef_quest',
        ],
    ]) ?>

</div>
</div>
