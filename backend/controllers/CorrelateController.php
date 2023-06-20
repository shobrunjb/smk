<?php

namespace backend\controllers;

use backend\models\HrmPegawai;
use backend\models\HrmPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

class CorrelateController extends \yii\web\Controller
{
    public function actionFirst()
    {
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('first_custom', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionGenericPsy()
    {
        $searchModel = new HrmPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('first_generic_psy', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
