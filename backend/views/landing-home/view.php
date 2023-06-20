<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LandingHome */

//$this->title = $model->id_landing_home;
$this->title = 'Detail '.'Landing Home';
$this->params['breadcrumbs'][] = ['label' => 'Landing Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body landing-home-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_landing_home], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_landing_home], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'page_number',
            'page_name',
            'source_html:ntext',
            ],
        ]) ?>

    </div>
</div>
