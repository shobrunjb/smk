<?php

namespace backend\controllers;

use Yii;
use backend\models\Project;
use backend\models\ProjectMember;
use backend\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class MemberProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */


    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDetail($i, $t="product backlog", $action="index", $idi=0)
    {
        $id = \common\utils\EncryptionDB::encryptor("decrypt", $i);
        return $this->render('detail', [
            'model' => $this->findModelProject($id),
            't'=>$t,
            'i'=>$i,
            'action'=>$action,
            'idi'=>$idi,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        $model->is_active = 1;
        $model->backlog_is_locked = 1; //Default pas create
        $id_perusahaan = \backend\models\HrmPegawai::getIDPerusahaanFromUserId();
        $model->id_project_mst_type = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-TYPE-DEFAULT");

        if($id_perusahaan == 0){
            Yii::$app->session->setFlash('error', "Anda belum terhubung dengan perusahaan tertentu. Anda belum bisa membuat proyek!");
            return $this->redirect(['site/something']);
        }
        $model->id_perusahaan = $id_perusahaan;

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
                $model->kode_proyek = \common\helpers\UniqueIDHelper::generateUniqueID2($model->id_project);
                $model->save(false);

                //Masukkan dalam Project MEmber;
                $modelmember = new ProjectMember();
                $modelmember->id_project = $model->id_project;
                $modelmember->id_pegawai = \backend\models\HrmPegawai::getIdPegawaiFromUserId();
                $modelmember->id_project_mst_role = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-ROLE-DEFAULT");
                $modelmember->start_date = $model->plan_start_date;
                $modelmember->end_date = $model->plan_end_date;
                $modelmember->save(false);

                Yii::$app->session->setFlash('success', "Anda telah berhasil membuat proyek baru! Kode proyek anda adalah : ".$model->kode_proyek."<Br>Silakan bagikan proyek anda tersebut kepada teman-teman anda!");
                //return $this->redirect(['view', 'id' => $model->id_project]);
                return $this->redirect(['/']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_project_member]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelProject($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
