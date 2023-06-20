<?php

namespace backend\controllers;

use Yii;
use backend\models\DiklatPegawai;
use backend\models\DiklatPegawaiList;
use backend\models\DiklatPegawaiSearch;
use backend\models\OrderPegawaiList;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiklatPegawaiController implements the CRUD actions for DiklatPegawai model.
 */
class DiklatPegawaiController extends Controller
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
     * Lists all DiklatPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiklatPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiklatPegawai model.
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

    public function actionViewDiklat($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        return $this->render('view-diklat', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DiklatPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DiklatPegawai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DiklatPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_diklat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DiklatPegawai model.
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

    public function actionSelesaiDiklat($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        $model = $this->findModel($id);
        // $modelList = $this->findModelDiklatList($id);
        // echo $id;
        $datalists = DiklatPegawaiList::find()
            ->where(['id_diklat' => $id])
            ->all();

        foreach ($datalists as  $datalist) {
            echo           $datalist->id_pegawai;
            if (($modelPegawai = \backend\models\HrmPegawai::findOne($datalist->id_pegawai)) !== null) {
                $modelPegawai->id_hrm_status_pegawai = 1;
                $modelPegawai->save(false);
            }
        }
        $model->status = 'selesai';
        $model->save(false);


        //Redirect ke view lagi
        $id = \common\utils\EncryptionDB::encryptor('encrypt', $id);
        return $this->redirect(['view-diklat', 'i' => $id]);
    }

    public function actionDeletePegawai($id)
    {
        $model = $this->findModelDiklatList($id);
        $idOrder = $model->id_diklat;
        $i = \common\utils\EncryptionDB::encryptor('encrypt', $idOrder);
        if (($modelPegawai = \backend\models\HrmPegawai::findOne($model->id_pegawai)) !== null) {
            $modelPegawai->id_hrm_status_pegawai = 1;
            $modelPegawai->save(false);
        }

        $this->findModelDiklatList($id)->delete();

        return $this->redirect(['view-diklat', 'i' => $i]);
    }
    protected function findModelDiklatList($id)
    {
        if (($model = DiklatPegawaiList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Finds the DiklatPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DiklatPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DiklatPegawai::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
