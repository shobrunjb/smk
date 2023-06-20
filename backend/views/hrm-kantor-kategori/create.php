<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HrmKantorKategori */

$this->title = 'Create hrm-kantor-kategori';
$this->params['breadcrumbs'][] = ['label' => 'hrm-kantor-kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-kantor-kategori-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
