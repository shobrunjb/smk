<?php

namespace backend\controllers;

use Yii;
use backend\models\SmkPegawaiTahunan;
use backend\models\SmkPegawaiTahunanSearch;
use backend\models\SmkPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * SmkPegawaiTahunanController implements the CRUD actions for SmkPegawaiTahunan model.
 */
class PenilaianController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SmkAspekRencana models.
     * @return mixed
     */
    public function actionAjaxAction()
    {
        $selectedValue = $_POST['value']; // Mengambil nilai yang dikirim melalui AJAX
        $selectedId = $_POST['id']; // Mengambil data-id yang dikirim melalui AJAX
        // $capaian = (new \yii\db\Query())
        // ->from('smk_pegawai')
        // ->where(['real_ukuran_pencapaian' => $selectedId->id])
        // ->one();

    
        $connection = Yii::$app->db;

        $command = $connection->createCommand()
            ->update('smk_pegawai', ['real_ukuran_pencapaian' => $selectedValue], 'id_smk_aspek_rencana = :sasaran', [':sasaran' => $selectedId]);
        
        $rowsAffected = $command->execute();
    
        // Mengembalikan respons ke klien (misalnya, nilai yang diambil dari database)
        $response = [
            'id' => $selectedId,
            'value' => $selectedValue,
        ];
    
        return json_encode($command);    }
    
     
    public function actionSaveData()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sasaran = $_POST['sasaran'];
            $value = $_POST['value'];
        
            $connection = Yii::$app->db;
        
            $command = $connection->createCommand()
                ->update('smk_pegawai', ['real_ukuran_pencapaian' => $value], 'id_smk_aspek_rencana = :sasaran', [':sasaran' => $sasaran]);
        
            $rowsAffected = $command->execute();
        
            if ($rowsAffected > 0) {
                // Pembaruan berhasil
                $response = [
                    'sasaran' => $sasaran,
                    'value' => $value,
                    'message' => 'Data sasaran berhasil diperbarui.'
                ];
            } else {
                // Tidak ada baris yang terpengaruh (tidak ada pembaruan yang dilakukan)
                $response = [
                    'sasaran' => $sasaran,
                    'value' => $value,
                    'message' => 'Tidak ada perubahan yang dilakukan pada data sasaran.'
                ];
            }
        
            // Ubah array menjadi format JSON
            $jsonResponse = json_encode($response);
        
            // Kembalikan respons JSON ke klien
            echo $jsonResponse;
        }
                
    }

    public function actionFill($i, $year=0,$periode=0, $t=1)
    {
        $capaian = (new \yii\db\Query())
        ->from('smk_pegawai')
        ->all();

        // var_dump($capaian);
        
        $id_smk_pegawai_tahunan = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        $searchModel = new SmkPegawaiSearch();
        $searchModel->tahun = $year;
        $searchModel->id_smk_periode = $periode;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Copy (clone) data dari Master Rencana
        //echo $id_smk_pegawai_tahunan." ".$year." ".$periode;

        $aspeks = \backend\models\SmkAspekRencana::find()->where([
                    'tahun' => $year,
                    'id_smk_periode' => $periode,
                ])
            ->all();
        foreach($aspeks as $aspek){
            //echo $aspek->sasaran;
            //echo '<br>';

            //Copy dari template(rencana) ke item pegawai
             $smkp = \backend\models\SmkPegawai::find()->where([
                        'tahun' => $year,
                        'id_smk_periode' => $periode,
                        'id_smk_pegawai_tahunan' => $id_smk_pegawai_tahunan,
                        'id_smk_aspek_rencana' => $aspek->id_smk_aspek_rencana
                    ])
                ->one();
            if($smkp == null){
                $smkp = new \backend\models\SmkPegawai();
                $smkp->tahun = $year;
                $smkp->id_smk_periode = $periode;
                $smkp->id_smk_pegawai_tahunan = $id_smk_pegawai_tahunan;
                $smkp->id_smk_aspek_rencana = $aspek->id_smk_aspek_rencana;

                //Isinya dicopy dari smk_aspek_rencana
                $smkp->sasaran = $aspek->sasaran;
                $smkp->target = $aspek->target;
                $smkp->sub_bobot = $aspek->sub_bobot;

                $smkp->save(false);
            }
        }

        //exit();

        if(isset($_POST['SmkPegawaiSearch'])){
            //echo $_POST['barcode'];
            $post = $_POST['SmkPegawaiSearch'];
            $yr = $post['tahun'];
            $isp = $post['id_smk_periode'];

            return $this->redirect(['fill','t'=>$t,'year'=>$yr,'periode'=>$isp]);
        }

        return $this->render('fill', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            't' =>$t,
            'i' =>$i,
            'year' =>$year,
            'periode' =>$periode
        ]);

        // if(isset($_POST['SmkPeriodeSearch'])){
        //     //echo $_POST['barcode'];
        //     $post = $_POST['SmkPeriodeSearch'];
        //     $nama_periode = $post['nama_periode'];

        //     return $this->redirect(['fill','nama_periode'=>$nama_periode]);
        // }

        // return $this->render('fill', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        //     'nama_periode' =>$nama_periode
        // ]);
    }

    /**
     * Lists all SmkPegawaiTahunan models.
     * @return mixed
     */
    public function actionIndex($year=0,$periode=0)
    {
        $searchModel = new SmkPegawaiTahunanSearch();
        $searchModel->year = $year;
        $searchModel->id_smk_periode = $periode;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset($_POST['SmkPegawaiTahunanSearch'])){
            //echo $_POST['barcode'];
            $post = $_POST['SmkPegawaiTahunanSearch'];
            $yr = $post['year'];
            $isp = $post['id_smk_periode'];

            return $this->redirect(['index','year'=>$yr,'periode'=>$isp]);
        }


        //Proses checking untuk melihat apakah SMK Pegawai Tahunan untuk pegawai tersebut sudah ada atau belum?
        if($year > 0 && $periode > 0){
            
            $smkt = \backend\models\SmkPegawaiTahunan::find()->where([
                        'year' => $year,
                        'id_smk_periode' => $periode,
                        'id_pegawai' => Yii::$app->user->identity->id,
                    ])
                ->one();
            if($smkt == null){
                $smkt = new \backend\models\SmkPegawaiTahunan();
                $smkt->year = $year;
                $smkt->id_smk_periode = $periode;
                $smkt->id_pegawai = Yii::$app->user->identity->id;
                $smkt->save(false);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'t' =>10000,
            'year' =>$year,
            'periode' =>$periode
        ]);
    }

    /**
     * Displays a single SmkPegawaiTahunan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SmkPegawaiTahunan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SmkPegawaiTahunan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SmkPegawaiTahunan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SmkPegawaiTahunan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SmkPegawaiTahunan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SmkPegawaiTahunan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SmkPegawaiTahunan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
