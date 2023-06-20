<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ProPersonalAttribute;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstPersonalAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$id_pegawai = \common\utils\EncryptionDB::encryptor('decrypt', $i);
$id_environment = \common\utils\EncryptionDB::encryptor('decrypt', $d);
// $id_environment = 3201;
echo $id_environment;
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
                    //'is_active',
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
                    [
                        'label' => 'Fitting Attribute Value',
                        'format' => 'raw',
                        'value' => function ($data) use ($status_view, $id_environment, $id_pegawai) {
                            $result = '';
                            $lastvaluePersonal = ProPersonalAttribute::find()
                                ->where([
                                    'id_pegawai' => $id_pegawai,
                                    'id_mst_personal_attribute'=>$data->id_mst_personal_attribute
                                ])->one();
                            if($lastvaluePersonal != null){
                                //$result = "id->".$lastvaluePersonal->id_mst_personal_attribute_grade;
                                if(isset($lastvaluePersonal->grade)){
                                    $labelPersonalGrade = $lastvaluePersonal->grade->grade_label;

                                    //Mencari ID attribute grade untuk environment
                                    $environmentAttributeGrade = 
                                    \backend\models\MstEnvironmentAttributeGrade::find()
                                        ->where([
                                            'grade_label' => $labelPersonalGrade,
                                            //'id_mst_environment_attribute' => $data->id_mst_environment_attribute,
                                            //'id_mst_environment_attribute_grade' =>$listGrade->id_mst_environment_attribute_grade
                                        ])
                                        ->one();
                                    if($environmentAttributeGrade != null){
                                        //$result .= "id2->".$environmentAttributeGrade->id_mst_environment_attribute_grade;

                                        //Mendapatkan Nilai Fitting Value
                                        $currentGrade = 
                                        \backend\models\ProEnvironmentAttribute::find()
                                            ->where([
                                                'id_environment' => $id_environment,
                                                //'id_mst_environment_attribute' => $data->id_mst_environment_attribute,
                                                'id_mst_environment_attribute_grade' =>$environmentAttributeGrade->id_mst_environment_attribute_grade
                                            ])
                                            ->one();
                                        if($currentGrade != null){
                                            $currentFittingValue = $currentGrade->fitting_value;
                                            $bobot = $currentGrade->bobot_in_normalisasi;
                                            $result .= $currentFittingValue. ' ['.$bobot.']';
                                        }else{
                                            $currentFittingValue = 0;
                                        }
                                    }


                                }
                            }
                            return $result;
                        },
                    ],
                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); 
            ?>

        <?php
            $models = $dataProvider->getModels();
            $TOTAL_BOBOT = 0;
            $TOTAL_VALUE = 0;
            $acknowledge_individul_fit_label = "";
            $acknowledge_individul_fit_grade = 0;
            foreach($models as $data){
                //Data Organization
                //echo $data->id_mst_personal_attribute." <Br>";
                $result ="";
                $lastvaluePersonal = ProPersonalAttribute::find()
                    ->where([
                        'id_pegawai' => $id_pegawai,
                        'id_mst_personal_attribute'=>$data->id_mst_personal_attribute
                    ])->one();
                if($lastvaluePersonal != null){
                    //$result = "id->".$lastvaluePersonal->id_mst_personal_attribute_grade;
                    if(isset($lastvaluePersonal->grade)){
                        $labelPersonalGrade = $lastvaluePersonal->grade->grade_label;

                        //Mencari ID attribute grade untuk environment
                        $environmentAttributeGrade = 
                        \backend\models\MstEnvironmentAttributeGrade::find()
                            ->where([
                                'grade_label' => $labelPersonalGrade,
                                //'id_mst_environment_attribute' => $data->id_mst_environment_attribute,
                                //'id_mst_environment_attribute_grade' =>$listGrade->id_mst_environment_attribute_grade
                            ])
                            ->one();
                        if($environmentAttributeGrade != null){
                            //$result .= "id2->".$environmentAttributeGrade->id_mst_environment_attribute_grade;

                            //Mendapatkan Nilai Fitting Value
                            $currentGrade = 
                            \backend\models\ProEnvironmentAttribute::find()
                                ->where([
                                    'id_environment' => $id_environment,
                                    //'id_mst_environment_attribute' => $data->id_mst_environment_attribute,
                                    'id_mst_environment_attribute_grade' =>$environmentAttributeGrade->id_mst_environment_attribute_grade
                                ])
                                ->one();
                            if($currentGrade != null){
                                $currentFittingValue = $currentGrade->fitting_value;
                                $bobot = $currentGrade->bobot_in_normalisasi;
                                $TOTAL_BOBOT = $TOTAL_BOBOT + $bobot;
                                $TOTAL_VALUE = $TOTAL_VALUE + ($currentFittingValue * $bobot);
                                $result .= $currentFittingValue. ' ['.$bobot.']';
                            }else{
                                $currentFittingValue = 0;
                            }
                        }


                    }
                }
                //echo $result."<Br>";


                /*Data Personal*/
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
                //echo $data->personal_attribute." ".$result."<Br>";
                if($data->personal_attribute == "kecocokan_lingkungan"){
                    $acknowledge_individul_fit_label = $result;
                }
            }

            echo "TOTAL BOBOT : ".$TOTAL_BOBOT;
            echo "<br>TOTAL VALUE :".$TOTAL_VALUE;
            $FITTING_VALUE = $TOTAL_VALUE / $TOTAL_BOBOT;
            echo "<br>FIT VALUE :".$FITTING_VALUE;

            //Hasilnya di simpan di tabel MatchingEnvironmentResult
            $result = \backend\models\MatchingEnvironmentResult::find()
                ->where([
                    'id_kabupaten' => $id_environment,
                    'id_pegawai' =>$id_pegawai,
                ])
                ->one();
            if($result == null){
                $result = new  \backend\models\MatchingEnvironmentResult();
                $result->id_kabupaten = $id_environment;
                $result->id_pegawai = $id_pegawai;
            }

            if($result->fit_value>=85){
                if($result->acknowledge_individul_fit_label=="Sangat Cocok / Sesuai"){                
                    $result->check = "Wajar";
                }else{
                    $result->check = "Tidak Wajar";
                }
            }else if($result->fit_value<85){
                if($result->acknowledge_individul_fit_label=="Kurang Cocok / Sesuai"){
                    $result->check = "Wajar";
                }else{
                    $result->check = "Tidak Wajar";
                }
            }else{
                $result->check = "Tidak Wajar";
            }
            $result->fit_value = $FITTING_VALUE;
            $result->acknowledge_individul_fit_label = $acknowledge_individul_fit_label;
            $result->acknowledge_individul_fit_grade = $data->id_mst_personal_attribute;
            $result->save(false);

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
