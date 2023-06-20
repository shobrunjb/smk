<?php
use backend\models\Sprint;
use backend\models\SprintSearch;
use common\helpers\LogHelper;
use yii\web\NotFoundHttpException;

\yii\web\YiiAsset::register($this);

/*
$this->title = "Detail Lembar Kerja";
$this->params['breadcrumbs'][] = ['label' => 'Lembar Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Lembar Kerja Detail', 'url' => ['detail', 'i'=>$i]];
*/
/*
    Petunjuk :
    Copykan fungsi dari controller utamanya
    1. Ganti $this->request menjadi Yii::$app->request
    2. Gantin return $this->render(..) jadi echo $this->render
    3. Jika ada $this->redirect diganti dengan Yii::$app->response->redirect
    */


/*
    Controllernya diatur di view lagi karena dirender di view
    */

switch ($action) {
    case "index":
        $searchModel = new \backend\models\SprintSearch();
        $searchModel->id_project = $project->id_project;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        echo  $this->render('/project-sprint/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => $action,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
        ]);


        break;

    case "create":
        $model = new Sprint();
        $lkSprintModel = new Sprint();

        //Lembar Kerja dibuat auto mapping (jgn dientry manual lagi)
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        //$model->id_project_mst_type = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-TYPE-DEFAULT");
        $model->id_project = $project->id_project;

        if (Yii::$app->request->isPost) {
            $Sprint = Yii::$app->request->post()['Sprint'];

            $model->load(Yii::$app->request->post());
            $model->id_project = $project->id_project;

            if($model->save()){
                Yii::$app->session->setFlash('success', "Anda telah berhasil membuat product backlog baru!");

                $idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_sprint);
                //Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'view', 'idi' => $idi]);
                Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index']);
            }else{
                Yii::$app->session->setFlash('error', "Terdapat kesalahan ketika menyimpan data");
            }


        } else {
            $model->loadDefaultValues();
        }

        echo $this->render('create', [
            'model' => $model,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
        ]);
        break;

    case "view":
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
        $model = findSprintModel($id);

        echo $this->render('view', [
            'model' => $model,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
        ]);
        break;

    case "update":
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
        $model = findSprintModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Update product backlog berhasil!");
                //$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_sprint);
                //Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'view', 'idi' => $idi]);
                Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index']);
            }
        }

        echo $this->render('update', [
            'model' => $model,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
        ]);
        break;

    case "delete":
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
        $Sprint = Sprint::findOne([
            'id_sprint' => $id,
        ]);
        $Sprint->delete();

        Yii::$app->session->setFlash('success', "Hapus product backlog berhasil!");
        Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index']);
        break;
}


function findSprintModel($id)
{
    if (($model = Sprint::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Product backlog tidak ditemukan!'.$id);
}

function findModel($id)
{
    if (($model = Sprint::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Product backlog tidak ditemukan!.'.$id);
}
