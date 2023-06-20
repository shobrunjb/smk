<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProPersonalAttribute;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstPersonalAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id_pegawai = \common\utils\EncryptionDB::encryptor('decrypt', $i);
?>
<div class="box">
    <div class="box-body mst-personal-attribute-index">
        <?= Html::beginForm(['personal-attribute/save-change', 'i' => $i], 'POST'); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'personal_attribute',
                    'is_active',
                    [
                        'label' => 'Nilai Grade',
                        'format' => 'raw',
                        'value' => function ($data) use ($status_view, $id_pegawai) {
                            $lastvalue = ProPersonalAttribute::find()
                                ->where([
                                    'id_pegawai' => $id_pegawai,
                                    'id_mst_personal_attribute'=>$data->id_mst_personal_attribute
                                ])->one();
                            if($lastvalue == null){
                                $lastvalue = new ProPersonalAttribute();
                            }

                            if($status_view == false){
                                $listGrade = \yii\helpers\ArrayHelper::map(
                                    \backend\models\MstPersonalAttributeGrade::find()
                                        ->where([
                                            'id_mst_personal_attribute' => $data->id_mst_personal_attribute 
                                        ])
                                        ->asArray()->all(),
                                    'id_mst_personal_attribute_grade',
                                    'grade_label'
                                );

                                $result = Html::dropDownList("entry_".$data->id_mst_personal_attribute,$lastvalue->id_mst_personal_attribute_grade,$listGrade, ['prompt' => '--- select ---']);
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
