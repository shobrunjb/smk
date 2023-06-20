<?php

namespace backend\controllers;

use Yii;
use backend\models\JenisLaporan;
use backend\models\JenisLaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JenisLaporanController implements the CRUD actions for JenisLaporan model.
 */
class JenisLaporanController extends Controller
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
     * Lists all JenisLaporan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisLaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisLaporan model.
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
     * Creates a new JenisLaporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JenisLaporan();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->icon = UploadedFile::getInstance($model, 'icon');
            if($model->save()){
                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "Penambahan icon berhasil");
                }
            return $this->redirect(['view', 'id' => $model->id_jenis_laporan]);
        }

    }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JenisLaporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = JenisLaporan::MODE_UPDATE;
        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile  = UploadedFile::getInstance($model, 'icon');
            if (!empty($uploadedFile)) {
                $model->icon = $uploadedFile;
            }else{

            }
            if($model->save()){
                if ($model->uploadFile()) {
                    Yii::$app->session->setFlash('success', "Ubah Icon berhasil");
                }
            return $this->redirect(['view', 'id' => $model->id_jenis_laporan]);
        }
    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JenisLaporan model.
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
     * Finds the JenisLaporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JenisLaporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisLaporan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
