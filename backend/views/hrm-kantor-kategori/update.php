<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmKantorKategori */

$this->title = 'Update hrm-kantor-kategori: ' . $model->id_hrm_kantor_kategori;
$this->params['breadcrumbs'][] = ['label' => 'hrm-kantor-kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hrm_kantor_kategori, 'url' => ['view', 'id' => $model->id_hrm_kantor_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-kantor-kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
