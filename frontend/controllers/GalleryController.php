<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\MemberLoginForm;
use backend\models\ContactUs;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

use backend\models\User;
use backend\models\UserSearch;
use common\modules\auth\models\AuthAssignment;

use backend\models\Galery;
use backend\models\GalerySearch;

use common\utils\EncryptionDB;
use common\helpers\Timeanddate;
use common\helpers\IPAddressFunction;

use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class GalleryController extends Controller
{
    var $layout = "main_page";

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        echo 'Galery Testing';
    }

    public function actionList(){
        $this->layout = "main_page";
        
        return $this->render('list_mode_simple1', [
            //'model' => $this->findModel($id_publik_user),
        ]);
    }

    public function actionDetail($i, $title)
    {
        $id = EncryptionDB::encryptor('decrypt',$i);

        $model = $this->findModel(($id));
        $model->count_view = $model->count_view + 1;
        $model->save(false);

        return $this->render('detail', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Galery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Halaman berita dengan spesifikasi tersebut tidak ditemukan');
    }

/*
    public function actionListComplex()
    {
        $searchModel = new GalerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=2;
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
*/
}
