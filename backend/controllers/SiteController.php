<?php
namespace backend\controllers;

use common\models\ChangePassword;
use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use backend\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'something'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['something'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'change-password', 'register-company','join-company'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($t="project")
    {
        //return $this->render('index');

        $level = Yii::$app->user->identity->user_level;
        //$modeluser = HrmPegawai::findOne(Yii::$app->user->identity->id);

        if($level == "member"){
            return $this->render('/dashboard/member/index',
                [
                    't' => $t,
                ]
            );
        }else{
            return $this->render('index');
        }
    }

    public function actionSomething()
    {
        return $this->render('something');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegisterCompany()
    {
        //$_POST['msg'] = '2l3-baf3';
        if(isset($_POST['msg'])){
            $kode = $_POST['msg'];
            //echo Yii::$app->user->identity->id;

            $perusahaan = \backend\models\Perusahaan::find()
                        ->where([
                            'kode' => $kode,
                        ])->one();
            if($perusahaan != null){
                
                echo '<div class="alert alert-info">Perusahaan dengan kode tersebut ['.$kode.'] adalah <B>'.$perusahaan->perusahaan.'</b><br>Silakan klik tombol berikut ini untuk bergabung!<Br>
                    <button class="btn btn-success" onClick="joinCompany(\''.$kode.'\')">Bergabung</button>
                </div>';
            }else{
                echo '<div class="alert alert-danger">Perusahaan dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
            }
        }
    }


    /*
    Tahap 2 : Join ke perusahaan
    Update tabel hrm_pegawai dimana yang awalanya id_perusahaan kosong, diisi dengan id perusahaan
    */
    public function actionJoinCompany()
    {
        //$_POST['msg'] = '2l3-baf3';
        if(isset($_POST['msg'])){
            $kode = $_POST['msg'];
            //echo Yii::$app->user->identity->id;

            $perusahaan = \backend\models\Perusahaan::find()
                        ->where([
                            'kode' => $kode,
                        ])->one();
            if($perusahaan != null){
                $pegawai = \backend\models\HrmPegawai::find()
                        ->where(['id_user' => Yii::$app->user->identity->id])
                        ->one();
                if($pegawai != null) {
                    $pegawai->id_perusahaan = $perusahaan->id_perusahaan;
                    $pegawai->save(false);
                }
            }else{
                echo '<div class="alert alert-danger">Perusahaan dengan kode tersebut ['.$kode.'] tidak ditemukan!</div>';
            }
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Ubah password berhasil! Silakan logout dan login kembali dengan password yang baru!');
            return $this->goBack();
        } else {
            return $this->render('change-password', [
                'model' => $model,
            ]);
        }
    }



}
