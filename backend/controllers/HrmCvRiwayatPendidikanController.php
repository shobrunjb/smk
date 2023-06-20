<?php

namespace backend\controllers;

use Yii;
use backend\models\HrmCvRiwayatPendidikan;
use backend\models\HrmCvRiwayatPendidikanSearch;
use backend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HrmCvRiwayatPendidikanController implements the CRUD actions for HrmCvRiwayatPendidikan model.
 */
class HrmCvRiwayatPendidikanController extends Controller
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
     * Lists all HrmCvRiwayatPendidikan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmCvRiwayatPendidikanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmCvRiwayatPendidikan model.
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
     * Creates a new HrmCvRiwayatPendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmCvRiwayatPendidikan();
        $pegawai = User::getPegawai();
        $model->id_pegawai = $pegawai->id_pegawai;

        if ($model->load(Yii::$app->request->post())) {
            /*
            $model->file_img = UploadedFile::getInstance($model,'file_img');
            $img = uniqid('foto-sertifikat-',true);
            $model->foto_ijazah = '/uploads/'.$img.'.'.$model->file_img->extension;
            $model->file_img = UploadedFile::getInstance($model,'file_img');

            $lokasi_simpan = 'uploads/foto-ijazah/'.$img.'.'.$model->file_img->extension;
            $model->file_img->saveAs($lokasi_simpan,false);

            $model->file_img2 = UploadedFile::getInstance($model,'file_img2');
            $img2 = uniqid('foto-transkrip-',true);
            $model->foto_transkrip = '/uploads/'.$img2.'.'.$model->file_img2->extension;
            $model->file_img2 = UploadedFile::getInstance($model,'file_img2');

            $lokasi_simpan2 = 'uploads/foto-transkrip/'.$img2.'.'.$model->file_img2->extension;
            $model->file_img2->saveAs($lokasi_simpan2,false);

            $model->save();
            */

            $model->foto_ijazah = UploadedFile::getInstance($model, 'foto_ijazah');
            $model->foto_transkrip = UploadedFile::getInstance($model, 'foto_transkrip');
            if($model->save(false)){
                if ($model->uploadFotoIjazah()) {
                    Yii::$app->session->setFlash('success', "Menambahkan foto ijazah sudah berhasil!");
                }
                if ($model->uploadFotoTranskrip()) {
                    Yii::$app->session->setFlash('success', "Menambahkan foto transkrip sudah berhasil!");
                }
                \common\helpers\LogHelper::setPublicSubmitted2($model);
                return $this->redirect(['view', 'id' => $model->id_riwayat_pendidikan]);
            }
             
            return $this->redirect(['view', 'id' => $model->id_riwayat_pendidikan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HrmCvRiwayatPendidikan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = HrmCvRiwayatPendidikan::MODE_UPDATE;

        if ($model->load(Yii::$app->request->post())) {
            $model->foto_ijazah = UploadedFile::getInstance($model, 'foto_ijazah');
            $model->foto_transkrip = UploadedFile::getInstance($model, 'foto_transkrip');
            if($model->save(false)){
                if ($model->uploadFotoIjazah()) {
                    Yii::$app->session->setFlash('success', "Update foto ijazah sudah berhasil!");
                }
                if ($model->uploadFotoTranskrip()) {
                    Yii::$app->session->setFlash('success', "Update foto transkrip sudah berhasil!");
                }
                \common\helpers\LogHelper::setPublicSubmitted2($model);
                return $this->redirect(['view', 'id' => $model->id_riwayat_pendidikan]);
            }
             
            return $this->redirect(['view', 'id' => $model->id_riwayat_pendidikan]);
        }



        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HrmCvRiwayatPendidikan model.
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
     * Finds the HrmCvRiwayatPendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmCvRiwayatPendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmCvRiwayatPendidikan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
