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
        $readonlyplanning = false;

        if($sprint->is_closed == 2){
            $readonlyplanning = true;
        }
        if($sprint->is_locked == 2){
            $readonlyplanning = true;
        }


        if(!$readonlyplanning){
            $searchModel = new \backend\models\ProductBacklogSearch();
            $searchModel->id_project = $sprint->id_project;
            //$searchModel->id_sprint = 0;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination = false;

            //echo $sprint->id_sprint;
            $noted = "";
            //Get Noted Info
            $sprintceremony = \backend\models\SprintCeremony::find()
                ->where([
                    'id_sprint' => $sprint->id_sprint,
                    'id_project' => $sprint->id_project,
                    'ceremony' => 'PLANNING',
                ])->one();
            if($sprintceremony != null){
                $noted = $sprintceremony->noted;
            }

            //Ketika diklik tombol save
            if(isset($_POST['saveall'])){
                $models = $dataProvider->getModels();
                $errorUncek = array();
                foreach ($models as $model) {
                    //Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
                    //if($model->id_sprint == 0 || $model->id_sprint == $sprint->id_sprint) {
                        if(isset($_POST['checked_'.$model->id_product_backlog])){
                            //echo $model->id_product_backlog.'<br>';

                            //1. Disimpan di sprint_backlog
                            $sprintbacklog = \backend\models\SprintBacklog::find()
                                ->where([
                                    'id_sprint' => $sprint->id_sprint,
                                    'id_product_backlog' => $model->id_product_backlog,
                                ])->one();
                            if($sprintbacklog == null){
                                //Buat Baru
                                $sprintbacklog = new \backend\models\SprintBacklog();
                                $sprintbacklog->id_sprint = $sprint->id_sprint;
                                $sprintbacklog->id_project = $sprint->id_project;
                                $sprintbacklog->id_product_backlog = $model->id_product_backlog;
                                $sprintbacklog->save(false);
                                \common\helpers\LogHelper::setPublicSubmitted($sprintbacklog);
                            }
                            
                            //2. DIupdate di product backlog
                            if($model->id_sprint == 0){
                                $model->id_sprint = $sprint->id_sprint;
                            }else{
                                $model->is_multiple_sprint = 1;
                                $temp = $model->id_sprint_mutliple. ";".$sprint->id_sprint;
                                $model->id_sprint_mutliple = $temp;
                            }
                            $model->save(false);
                        }else{
                            //Check lagi diuncek tidak
                            //1B. Yang diuncek di bagian A juga harus dihapus
                            if($model->id_sprint == 0 || $model->id_sprint == $sprint->id_sprint) {
                                $sprintbacklog = \backend\models\SprintBacklog::find()
                                    ->where([
                                        'id_sprint' => $sprint->id_sprint,
                                        'id_product_backlog' => $model->id_product_backlog,
                                    ])->one();
                                if($sprintbacklog != null){
                                    //echo 'Uncek A '.$sprintbacklog->id_sprint_backlog;
                                    //Cek dulu sblm di hapus
                                    $cekerror = $sprintbacklog->checkDelete($sprint->id_sprint);
                                    if($cekerror['status']){
                                        /*
                                        $error[1] = "Error 1";
                                        $error[2] = "Error 2";
                                        */
                                        $session = Yii::$app->session;
                                        $errorcek = isset($session['error-planning']) ? $session['error-planning'] : array();
                                        $errorcek[] = $cekerror['error'];
                                        $session->set('error-planning', $errorcek);
                                        
                                        //$main_requestor = isset($session['error-planning']) ? $session['error-planning'] : "-kosong-";
                                    }else{
                                        $sprintbacklog->delete();

                                        //Di product backlog dikembalikan ke 0
                                        //2. DIupdate di product backlog
                                        $model->id_sprint = 0;
                                        $model->save(false);
                                    }
                                }
                                

                            }

                            //1C. Diuncek yang bagian B
                            if($model->id_sprint >= 0 && $model->id_sprint != $sprint->id_sprint) {
                                $sprintbacklog = \backend\models\SprintBacklog::find()
                                    ->where([
                                        'id_sprint' => $sprint->id_sprint,
                                        'id_product_backlog' => $model->id_product_backlog,
                                    ])->one();
                                if($sprintbacklog != null){
                                    //echo 'Uncek B '.$sprintbacklog->id_sprint_backlog;
                                    $cekerror = $sprintbacklog->checkDelete($sprint->id_sprint);
                                    if($cekerror['status']){
                                        $session = Yii::$app->session;
                                        $errorcek = isset($session['error-planning']) ? $session['error-planning'] : array();
                                        $errorcek[] = $cekerror['error'];
                                        $session->set('error-planning', $errorcek);
                                        

                                    }else{
                                        $sprintbacklog->delete();
                                    }

                                }
                            }
                        }
                    //}
                }

                //3. Disimpan atau diupdate di sprint planning
                $sprintceremony = \backend\models\SprintCeremony::find()
                    ->where([
                        'id_sprint' => $sprint->id_sprint,
                        'id_project' => $sprint->id_project,
                        'ceremony' => 'PLANNING',
                    ])->one();
                if($sprintceremony == null){
                    //Buat Baru
                    $sprintceremony = new \backend\models\SprintCeremony();
                    $sprintceremony->id_sprint = $sprint->id_sprint;
                    $sprintceremony->id_project = $sprint->id_project;
                    $sprintceremony->ceremony = 'PLANNING';
                    
                }
                $sprintceremony->noted = $_POST['noted'];
                $noted = $sprintceremony->noted;
                $sprintceremony->save(false);
                common\helpers\LogHelper::setPublicSubmitted($sprintceremony);
                /*
                foreach ($_POST as $key => $value) {
                    echo $key;
                }
                */
            }


            //Lock sprint planning
            $messagelock = '';
            if(isset($_POST['lock'])){
                $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
                $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
                if($yourrole == $po_role){
                    //$messagelock = 'Anda berhak mengunci dan membuka kunci lagi';
                    $sprint->is_locked = 2; //Dikunci jadi bernilai 2
                    $sprint->save(false);

                    Yii::$app->response->redirect(['member-sprint/detail/', 'i' => $i, 't' => $t]);
                }else{
                    $messagelock = 'Untuk mengunci sprint planning hanya bisa dilakukan oleh Product Owner!';
                }
            }

            //Unlock
            if(isset($_POST['unlock'])){
                $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
                $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
                if($yourrole == $po_role){
                    //$messagelock = 'Anda berhak mengunci dan membuka kunci lagi';
                    $sprint->is_locked = 0; //Dikunci jadi bernilai 2
                    $sprint->save(false);

                    Yii::$app->response->redirect(['member-sprint/detail/', 'i' => $i, 't' => $t]);
                }else{
                    $messagelock = 'Untuk membuka kunci sprint planning hanya bisa dilakukan oleh Product Owner!';
                }
            }

            echo  $this->render('/scrum/sprint-planning/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'action' => $action,
                't' => $t,
                'i' => $i,
                'idi' => $idi,
                'sprint' =>$sprint,
                'noted' =>$noted,
                'messagelock' =>$messagelock,
            ]);
        }else{
            if(isset($_POST['unlock'])){
                $yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
                $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
                if($yourrole == $po_role){
                    //$messagelock = 'Anda berhak mengunci dan membuka kunci lagi';
                    $sprint->is_locked = 0; //Dikunci jadi bernilai 2
                    $sprint->save(false);

                    Yii::$app->response->redirect(['member-sprint/detail/', 'i' => $i, 't' => $t]);
                }else{
                    $messagelock = 'Untuk membuka kunci sprint planning hanya bisa dilakukan oleh Product Owner!';
                }
            }

            $searchModel = new \backend\models\SprintBacklogSearch();
            $searchModel->id_project = $sprint->id_project;
            $searchModel->id_sprint = $sprint->id_sprint;
            $dataProvider = $searchModel->searchWithProductBacklog(Yii::$app->request->queryParams);
            $dataProvider->pagination = false;

            $noted = "";
            //Get Noted Info
            $sprintceremony = \backend\models\SprintCeremony::find()
                ->where([
                    'id_sprint' => $sprint->id_sprint,
                    'id_project' => $sprint->id_project,
                    'ceremony' => 'PLANNING',
                ])->one();
            if($sprintceremony != null){
                $noted = $sprintceremony->noted;
            }

            echo  $this->render('/scrum/sprint-planning/index-sprint-backlog-planning', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'action' => $action,
                't' => $t,
                'i' => $i,
                'idi' => $idi,
                'sprint' =>$sprint,
                'noted' =>$noted,

            ]);
        }

        break;

    case "index-readonly-old":
        $searchModel = new \backend\models\ProductBacklogSearch();
        $searchModel->id_project = $sprint->id_project;
        $searchModel->id_sprint = $sprint->id_sprint;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        $noted = "";
        //Get Noted Info
        $sprintceremony = \backend\models\SprintCeremony::find()
            ->where([
                'id_sprint' => $sprint->id_sprint,
                'id_project' => $sprint->id_project,
                'ceremony' => 'PLANNING',
            ])->one();
        if($sprintceremony != null){
            $noted = $sprintceremony->noted;
        }

        echo  $this->render('/scrum/sprint-planning/index-readonly', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => $action,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
            'sprint' =>$sprint,
            'noted' =>$noted,

        ]);


        break;

    case "index-readonly":
        $searchModel = new \backend\models\SprintBacklogSearch();
        $searchModel->id_project = $sprint->id_project;
        $searchModel->id_sprint = $sprint->id_sprint;
        $dataProvider = $searchModel->searchWithProductBacklog(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        $noted = "";
        //Get Noted Info
        $sprintceremony = \backend\models\SprintCeremony::find()
            ->where([
                'id_sprint' => $sprint->id_sprint,
                'id_project' => $sprint->id_project,
                'ceremony' => 'PLANNING',
            ])->one();
        if($sprintceremony != null){
            $noted = $sprintceremony->noted;
        }

        echo  $this->render('/scrum/sprint-planning/index-sprint-backlog', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => $action,
            't' => $t,
            'i' => $i,
            'idi' => $idi,
            'sprint' =>$sprint,
            'noted' =>$noted,

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
