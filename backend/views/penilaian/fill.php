<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use backend\models\SmkAspekRencana;
use backend\models\SmkAspekRencanaSearch;

use backend\models\SmkPeriode;
use backend\models\SmkPeriodeSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkAspekRencanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Isi Penilaian Kinerja Individu '.'Tahun ' . $year . ' Periode '. $periode ;
// $this->title = 'Isi Penilaian Kinerja Individu '.'Tahun ' . $year . ' Periode '. $nama_periode ;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body perencanaan-penilaian-index">
    <i class="fa fa-info-circle" aria-hidden="true"></i> Tata Cara Pengisian Penilaian Kinerja Individu
         
         <hr>
         1. Silakan isi capaian pada setiap kolom tabel <br>
         2. Pastikan semua terisi dengan data yang benar <br>
         3. Jika data sudah diisi, maka klik tombol ‘Save’ pada bagian bawah tabel. <br>
         4. Data penilaian awal tahun berhasil disimpan, jika ada kendala terhadap pengisian silakan menghubungi Administrator.<br>
  
         <hr> <br>

        

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?php /*
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">PENILAIAN PENDEKATAN SISTEM SIKLUS</a></li>
                    <li role="presentation"><a href="#">PENILAIAN PENDEKATAN PROGRESS CABANG</a></li>
                </ul>
                */ ?>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php
                        $listAspekPenilaian = \yii\helpers\ArrayHelper::map(
                            \backend\models\SmkAspekPenilaian::find()->all(),
                            'id_aspek_penilaian',
                            'aspek_penilaian'
                        );
                        
                        //$label = ["PENILAIAN PENDEKATAN SISTEM SIKLUS", "PENILAIAN PENDEKATAN PROGRESS CABANG"];
                        //for($x=1;$x <=count($label);$x++){
                        foreach($listAspekPenilaian as $key=>$value){
                            $url = "";

                            $active = "";
                            //$tabLabel = strtolower($label[$x-1]);
                            $tabLabel = strtolower($value);
                            if ($t == $key) {
                                $active = "active";
                            }

                            $url_menu = Url::toRoute(['fill','i'=>$i, 'year'=>$year,'periode'=>$periode,'t'=>$key,]);

                            echo '
                                <li class="' . $active . '"><a href="' . $url_menu . '" >' . $value. '</a></li>
                                ';
                        }
                        ?>
                    </ul>
                    <div class="tab-content">
                        <?php
                                
                                $searchModel = new SmkAspekRencanaSearch();
                                $searchModel->id_aspek_penilaian = $t;
                                $searchModel->tahun = $year;
                                $searchModel->id_smk_periode = $periode;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                                echo $this->render('_indikator_sistem', [
                                    'searchModel' => $searchModel,
                                    'dataProvider' => $dataProvider,
                                    't' =>$t,
                                    'year'=>$year,
                                    'periode'=>$periode
                                ]);


                        ?>
                    </div>
                    
                    <!-- /.tab-content -->
                </div>
                <br>

    
    
    </div>
</div>
