<?php

namespace backend\controllers;

use Yii;
use backend\models\OrderPegawai;
use backend\models\OrderPegawaiSearch;
use backend\models\LogOrderPegawai;
use backend\models\OrderPegawaiList;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderPegawaiController implements the CRUD actions for orderPegawai model.
 */
class OrderPegawaiController extends Controller
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
     * Lists all orderPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single orderPegawai model.
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



    public function actionViewLaporan($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        $model = $this->findModel($id);

        return $this->render('view-laporan', [
            'model' => $model,
            'i' => $i,
        ]);
    }
    public function actionViewOrder($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id;

        $model = $this->findModel($id);

        //Simpan hasil actionnya
        switch ($model->id_mst_order_progres) {
            case 1: //BARU
                if ($model->load(Yii::$app->request->post())) {
                    //Jika statusnya lanjut maka progresnya naik jadi pilih TKBM
                    if ($model->status_order == "OPEN") {
                        Yii::$app->session->setFlash('success', 'Validasi sudah sesuai, step dilanjutkan ke tahap selanjutnya!');
                        if ($model->id_order_pegawai_kategori == 1) {
                            $NoOrder1 = 'BK';
                        } elseif ($model->id_order_pegawai_kategori == 2) {
                            $NoOrder1 = 'MT';
                        } elseif ($model->id_order_pegawai_kategori == 3) {
                            $NoOrder1 = 'BM';
                        }
                        $noOrder = $NoOrder1;
                        $model->nomor_order = $noOrder . $model->id_order_pegawai . "-" . $model->id_asset_kendaraan1 . "-" . $model->id_asset_kendaraan2;
                        $model->id_mst_order_progres = 2;
                    }
                    //echo "Simpan berhasil";
                    $model->save();
                }
                //Log order pegawai model
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
            case 2: //Pilih TKBM
                // if (isset($_POST['namapostsubmit'])) {
                if ($model->load(Yii::$app->request->post())) {
                    //Jika statusnya lanjut maka progresnya naik jadi Persiapan

                    // $model->id_mst_order_progres = 3;

                    //echo "Simpan berhasil";
                    $model->save();
                }
                // }
                //Log order pegawai model
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;

            case 3: //Persiapan
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
            case 4: //Mulai Tugas
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
            case 5: //BARU
                if ($model->load(Yii::$app->request->post())) {
                    //Jika statusnya lanjut maka progresnya naik jadi pilih TKBM
                    if ($model->status_pembayaran == "LUNAS") {
                        Yii::$app->session->setFlash('success', 'Validasi sudah sesuai, step dilanjutkan ke tahap selanjutnya!');
                        $model->id_mst_order_progres = 6;
                    }
                    //echo "Simpan berhasil";
                    $model->save();
                }
                //Log order pegawai model
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
        }


        return $this->render('view-order', [
            'model' => $model,
            'i' => $i,
        ]);
    }
    public function actionViewOrderMember($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id;

        $model = $this->findModel($id);

        //Simpan hasil actionnya
        switch ($model->id_mst_order_progres) {
                // case 1: //BARU
                //     if ($model->load(Yii::$app->request->post())) {
                //         //Jika statusnya lanjut maka progresnya naik jadi pilih TKBM
                //         if ($model->status_order == "OPEN") {
                //             Yii::$app->session->setFlash('success', 'Validasi sudah sesuai, step dilanjutkan ke tahap selanjutnya!');
                //             $model->id_mst_order_progres = 2;
                //         }
                //         //echo "Simpan berhasil";
                //         $model->save();
                //     }
                //     //Log order pegawai model
                //     $modellog = new logOrderPegawai();
                //     if ($modellog->load(Yii::$app->request->post())) {

                //         // echo "Simpan berhasil";
                //         $modellog->save();
                //     }
                //     break;
                // case 2: //Pilih TKBM
                //     // if (isset($_POST['namapostsubmit'])) {
                //     if ($model->load(Yii::$app->request->post())) {
                //         //Jika statusnya lanjut maka progresnya naik jadi Persiapan

                //         // $model->id_mst_order_progres = 3;

                //         //echo "Simpan berhasil";
                //         $model->save();
                //     }
                //     // }
                //     //Log order pegawai model
                //     $modellog = new logOrderPegawai();
                //     if ($modellog->load(Yii::$app->request->post())) {

                //         // echo "Simpan berhasil";
                //         $modellog->save();
                //     }
                //     break;

            case 3: //Persiapan
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
            case 4: //Mulai Tugas
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
            case 5: //BARU
                if ($model->load(Yii::$app->request->post())) {
                    //Jika statusnya lanjut maka progresnya naik jadi pilih TKBM
                    if ($model->status_pembayaran == "LUNAS") {
                        Yii::$app->session->setFlash('success', 'Validasi sudah sesuai, step dilanjutkan ke tahap selanjutnya!');
                        $model->id_mst_order_progres = 6;
                    }

                    //echo "Simpan berhasil";
                    $model->save();
                }
                //Log order pegawai model
                $modellog = new LogOrderPegawai();
                if ($modellog->load(Yii::$app->request->post())) {

                    // echo "Simpan berhasil";
                    $modellog->save();
                }
                break;
        }


        return $this->render('view-order-member', [
            'model' => $model,
            'i' => $i,
        ]);
    }

    public function actionSaveOrderListPegawai($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id;

        //Untuk ubah status progres
        $model = $this->findModel($id);
        $model->id_mst_order_progres = 3;
        $model->save(false);

        //Redirect ke view lagi
        return $this->redirect(['view-order', 'i' => $i]);
    }
    public function actionSavePilihTkbm($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id;

        //Untuk ubah status progres
        $model = $this->findModel($id);
        $model->id_mst_order_progres = 4;
        $model->save(false);

        //Redirect ke view lagi
        return $this->redirect(['view-order-member', 'i' => $i]);
    }
    public function actionSavePersiapan($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //echo $id;

        //Untuk ubah status progres
        $model = $this->findModel($id);
        $model->id_mst_order_progres = 5;
        $model->save(false);

        //Redirect ke view lagi
        return $this->redirect(['view-order-member', 'i' => $i]);
    }
    public function actionTutupTiket($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        $model = $this->findModel($id);
        // $modelList = $this->findModelAllOrderList($id);
        //echo $id;
        $datalists = OrderPegawaiList::find()
            ->where(['id_order_pegawai' => $id])
            ->all();

        foreach ($datalists as  $datalist) {
            echo           $datalist->id_pegawai;
            if (($modelPegawai = \backend\models\HrmPegawai::findOne($datalist->id_pegawai)) !== null) {
                $modelPegawai->id_hrm_status_pegawai = 1;
                $modelPegawai->save(false);
            }
        }


        if ($model->status_pembayaran == "LUNAS") {
            $model->id_mst_order_progres = 7;
            $model->save(false);
        }

        //Redirect ke view lagi
        $id = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_order_pegawai);
        return $this->redirect(['view-order', 'i' => $id]);
    }

    /**
     * Creates a new orderPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderPegawai();
        $model->id_mst_order_progres = 1;
        $model->status_pembayaran = "BELUM";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_order_pegawai);
            return $this->redirect(['view-order', 'i' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing orderPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_order_pegawai]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing orderPegawai model.
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

    public function actionDeletePegawai($id)
    {
        $model = $this->findModelOrderList($id);
        $idOrder = $model->id_order_pegawai;
        $i = \common\utils\EncryptionDB::encryptor('encrypt', $idOrder);
        if (($modelPegawai = \backend\models\HrmPegawai::findOne($model->id_pegawai)) !== null) {
            $modelPegawai->id_hrm_status_pegawai = 1;
            $modelPegawai->save(false);
        }

        $this->findModelOrderList($id)->delete();

        return $this->redirect(['view-order', 'i' => $i]);
    }

    /**
     * Finds the orderPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return orderPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderPegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelOrderList($id)
    {
        if (($model = OrderPegawaiList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelAllOrderList($id)
    {


        // if (($model = OrderPegawaiList::findAll($id)) !== null) {
        //     return $model;
        // }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
