<?php

namespace backend\controllers;

use Yii;
use backend\models\MaterialSales;
use backend\models\MaterialSalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialSalesController implements the CRUD actions for MaterialSales model.
 */
class MaterialSalesController extends Controller
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
     * Lists all MaterialSales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSalesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekapitulasiSales()
    {
        $query = new yii\db\Query();
        $query->select('
            sales_order.tanggal_order, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales');

        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.tanggal_order']);
        $query->orderBy('sales_order.tanggal_order DESC');

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);

        return $this->render('laporan/rekapitulasi-harian', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanHarian()
    {
        //$searchModel = new MaterialSalesSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        /*
            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order

            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard*a.sales_harga_jual) as total_pendapatan,
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order
        */
        $query = new yii\db\Query();
        $query->select('
            sales_order.tanggal_order, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales');

        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.tanggal_order']);
        $query->orderBy('sales_order.tanggal_order DESC');

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);


        return $this->render('laporan/laporan-harian', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanBulanan()
    {
        //$searchModel = new MaterialSalesSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        /*
            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order

            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard*a.sales_harga_jual) as total_pendapatan,
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order
        */
        $query = new yii\db\Query();
        $query->select('
            sales_order.month,  sales_order.year, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales');

        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.month', 'sales_order.year']);
        $query->orderBy('sales_order.tanggal_order DESC');

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);


        return $this->render('laporan/laporan-bulanan', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanTahunan()
    {
        //$searchModel = new MaterialSalesSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = new yii\db\Query();
        $query->select('
            sales_order.year, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales');

        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.year']);
        $query->orderBy('sales_order.tanggal_order DESC');

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);


        return $this->render('laporan/laporan-tahunan', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanHarianDetail($tanggal_order)
    {
        $searchModel = new MaterialSalesSearch();
        //$searchModel->tanggal_order = $tanggal_order;
        $dataProvider = $searchModel->searchByOrder(Yii::$app->request->queryParams, $tanggal_order);

        return $this->render('laporan/laporan-harian-detail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tanggal_order' => $tanggal_order,
        ]);
    }

    public function actionLaporanBulananDetail($month, $year)
    {
        //$searchModel = new MaterialSalesSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        /*
            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order

            SELECT b.tanggal_order, count(a.id_material_sales) as total_roll, 
            SUM(a.yard*a.sales_harga_jual) as total_pendapatan,
            SUM(a.yard) as total_yard FROM `material_sales` a 
            LEFT JOIN sales_order b on b.id_sales_order = a.sales_id_sales_order 
            group by b.tanggal_order
        */
        $query = new yii\db\Query();
        $query->select('
            sales_order.tanggal_order, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales')
            ->where(['and',['sales_order.month'=>$month]])
            ->andWhere(['sales_order.year' => $year]);
        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.tanggal_order']);
        $query->orderBy('sales_order.tanggal_order DESC');

        //echo $query->createCommand()->getRawSql(); exit();

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);


        return $this->render('laporan/laporan-harian-perbulan', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'month' =>$month,
            'year' =>$year,
        ]);
    }

    public function actionLaporanTahunanDetail($year)
    {
        $query = new yii\db\Query();

        $query->select('
            sales_order.month,  sales_order.year, count(material_sales.id_material_sales) as total_roll, 
            SUM(material_sales.yard*material_sales.sales_harga_jual) as total_pendapatan,
            SUM(material_sales.yard) as total_yard
                ')
            ->from('material_sales')
            //->where(['and',['sales_order.month'=>$month]])
            ->where(['sales_order.year' => $year]);
        $query->join = [
            ['LEFT JOIN', 'sales_order', 'sales_order.id_sales_order = material_sales.sales_id_sales_order'],
            //['LEFT JOIN', 'test_group', 'patient_test.test_group_id = test_group.id']
        ];

        $query->groupBy(['sales_order.month', 'sales_order.year']);
        $query->orderBy('sales_order.month DESC');

        //echo $query->createCommand()->getRawSql(); exit();

        $pagination = 10;
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => $pagination],
            //'sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        ]);


        return $this->render('laporan/laporan-bulanan-pertahun', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'year' =>$year,
        ]);
    }

    /**
     * Displays a single MaterialSales model.
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
     * Creates a new MaterialSales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialSales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_sales]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MaterialSales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_material_sales]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MaterialSales model.
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
     * Finds the MaterialSales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialSales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialSales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
