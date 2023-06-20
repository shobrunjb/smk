<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItem */

$this->title = 'Tambah Pembelian Greige Item';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body purchase-raw-item-create">

        <?= $this->render('_form_add', [
            'model' => $model,
        ]) ?>

    </div>
</div>