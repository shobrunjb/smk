<?php

namespace backend\controllers;

use Yii;
use backend\models\LaporanKinerjaPegawai;
use backend\models\LaporanKinerjaPegawaiSearch;
use backend\models\OrderPegawaiList;
use backend\models\OrderPegawaiListSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LaporanKinerjaPegawaiController implements the CRUD actions for LaporanKinerjaPegawai model.
 */
class LaporanKinerjaPegawaiController extends Controller
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
     * Lists all LaporanKinerjaPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new LaporanKinerjaPegawaiSearch();
        $pegawai = \backend\models\User::getPegawai();
        $searchModel = new OrderPegawaiListSearch();
        $searchModel->id_pegawai = $pegawai->id_pegawai;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaporanKinerjaPegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewOrder($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);

        return $this->render('view-order', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionView($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LaporanKinerjaPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LaporanKinerjaPegawai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_laporan_kinerja);
            return $this->redirect(['view', 'i' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionLaporan($id)
    {

        $model = new LaporanKinerjaPegawai();
        $modelList = $this->findModelList($id);

        $j = $modelList->id_order_pegawai;
        $k = $modelList->id_pegawai;

        $kinerja = LaporanKinerjaPegawai::find()
        ->where(['id_pegawai' => $k, 'id_order_pegawai'=>$j])
        ->one();
        if($kinerja != null){
            $model = $kinerja;
        }else{
            $model = new LaporanKinerjaPegawai();
            $model->id_order_pegawai = $j;
            $model->id_pegawai = $k;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_laporan_kinerja);
            return $this->redirect(['view', 'i' => $id]);
        }
        return $this->render('update', [
            'model' => $model,
            'modelList' => $modelList,
            'modelOrderPegawai' => $modelList->orderPegawai,
            'i' => \common\utils\EncryptionDB::encryptor('encrypt', $modelList->id_order_pegawai_list)
        ]);
    }

    /**
     * Updates an existing LaporanKinerjaPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_laporan_kinerja]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LaporanKinerjaPegawai model.
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
     * Finds the LaporanKinerjaPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LaporanKinerjaPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaporanKinerjaPegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelList($id)
    {
        if (($model = OrderPegawaiList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
