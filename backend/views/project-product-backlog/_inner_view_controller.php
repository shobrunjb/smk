<?php
use backend\models\ProductBacklog;
use backend\models\ProductBacklogSearch;
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
        $searchModel = new \backend\models\ProductBacklogSearch();
        $searchModel->id_project = $project->id_project;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Lock sprint planning
        $messagelock = '';
        if(isset($_POST['lock'])){
            $yourrole = \backend\models\ProjectMember::getYourRole($project->id_project, 2); 
            $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
            if($yourrole == $po_role){
                //$messagelock = 'Anda berhak mengunci dan membuka kunci lagi';
                $project->backlog_is_locked = 2; //Dikunci jadi bernilai 2
                $project->save(false);
                 \common\helpers\CommonMessageHelper::addSuccesMessage("Product backlog telah dikunci!");
                Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t]);
            }else{
                $messagelock = 'Untuk mengunci sprint planning hanya bisa dilakukan oleh Product Owner!';
                \common\helpers\CommonMessageHelper::addErrorMessage($messagelock);
            }
        }

        //Unlock
        if(isset($_POST['unlock'])){
            $yourrole = \backend\models\ProjectMember::getYourRole($project->id_project, 2); 
            $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
            if($yourrole == $po_role){
                //$messagelock = 'Anda berhak mengunci dan membuka kunci lagi';
                $project->backlog_is_locked = 0; //Dikunci jadi bernilai 0 atau 1
                $project->save(false);
                \common\helpers\CommonMessageHelper::addSuccesMessage("Product backlog telah dibuka kembali kuncinya!");
                Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t]);
            }else{
                $messagelock = 'Untuk membuka kunci sprint planning hanya bisa dilakukan oleh Product Owner!';
                \common\helpers\CommonMessageHelper::addErrorMessage($messagelock);
            }
        }

        echo  $this->render('/project-product-backlog/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => $action,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
            'project' => $project
        ]);


        break;

    case "create":
        $model = new ProductBacklog();
        $lkProductBacklogModel = new ProductBacklog();

        //Lembar Kerja dibuat auto mapping (jgn dientry manual lagi)
        $id_lembar_kerja = \common\utils\EncryptionDB::encryptor('decrypt', $i);
        $model->id_project_mst_type = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-TYPE-DEFAULT");
        $model->id_project = $project->id_project;

        if (Yii::$app->request->isPost) {
            $productbacklog = Yii::$app->request->post()['ProductBacklog'];

            $model->product_backlog = $productbacklog['product_backlog'];
            //$model->id_project_mst_type  = $productbacklog['id_project_mst_type'];
            //$model->id_project = $productbacklog['id_project'];
            $model->id_project_mst_type = \backend\models\AppSettingSearch::getValueByKey("ID-PROJECT-TYPE-DEFAULT");
            $model->id_project = $project->id_project;
            $model->order_number  = $productbacklog['order_number'];
            $model->priority  = $productbacklog['priority'];
            $model->load_estimatation = $productbacklog['load_estimatation'];
            $model->id_time_metric  = $productbacklog['id_time_metric'];


            if($model->save()){
                Yii::$app->session->setFlash('success', "Anda telah berhasil membuat product backlog baru!");

                $idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_product_backlog);
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
        $model = findProductBacklogModel($id);

        echo $this->render('view', [
            'model' => $model,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
        ]);
        break;

    case "update":
        $id = \common\utils\EncryptionDB::encryptor('decrypt', $idi);
        $model = findProductBacklogModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Update product backlog berhasil!");
                //$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model->id_product_backlog);
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
        $ProductBacklog = ProductBacklog::findOne([
            'id_product_backlog' => $id,
        ]);
        $ProductBacklog->delete();

        Yii::$app->session->setFlash('success', "Hapus product backlog berhasil!");
        Yii::$app->response->redirect(['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'index']);
        break;
}


function findProductBacklogModel($id)
{
    if (($model = ProductBacklog::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Product backlog tidak ditemukan!'.$id);
}

function findModel($id)
{
    if (($model = ProductBacklog::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Product backlog tidak ditemukan!.'.$id);
}
