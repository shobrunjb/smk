<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProEnvironmentAttribute;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstEnvironmentAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id_environment = \common\utils\EncryptionDB::encryptor('decrypt', $i);
?>
<div class="box">
    <div class="box-body mst-environment-attribute-index">
        <?= Html::beginForm(['environment-attribute/save-change', 'i' => $i], 'POST'); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'environment_attribute',
                    'is_active',
                    [
                        'label' => 'Nilai Grade',
                        'format' => 'raw',
                        'value' => function ($data) use ($status_view, $id_environment) {
                            $lastvalue = ProEnvironmentAttribute::find()
                                ->where([
                                    'id_environment' => $id_environment,
                                    'id_mst_environment_attribute'=>$data->id_mst_environment_attribute
                                ])->one();
                            if($lastvalue == null){
                                $lastvalue = new ProEnvironmentAttribute();
                            }

                            if($status_view == false){
                                $listGrade = \yii\helpers\ArrayHelper::map(
                                    \backend\models\MstEnvironmentAttributeGrade::find()
                                        ->where([
                                            'id_mst_environment_attribute' => $data->id_mst_environment_attribute 
                                        ])
                                        ->asArray()->all(),
                                    'id_mst_environment_attribute_grade',
                                    'grade_label'
                                );

                                $result = Html::dropDownList("entry_".$data->id_mst_environment_attribute,$lastvalue->id_mst_environment_attribute_grade,$listGrade, ['prompt' => '--- select ---']);
                            }else{
                                if(isset($lastvalue->grade)){
                                    $result = $lastvalue->grade->grade_label;
                                }else{
                                    $result = "--";
                                }
                            }

                            return $result;
                        },
                    ],


                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); 
            ?>
        <?php if ($status_view == false) { ?>
        <div class="box-footer clearfix">
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name'=>'multiplesubmit']) ?>
            </div>
        </div>
        <?php } ?>  
        <?= Html::endForm(); ?>
    </div>
</div>
