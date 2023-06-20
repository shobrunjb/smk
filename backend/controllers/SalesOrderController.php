<?php

namespace backend\controllers;

use Yii;
use backend\models\SalesOrder;
use backend\models\MaterialSales;
use backend\models\MaterialSalesSearch;
use backend\models\SalesOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalesOrderController implements the CRUD actions for SalesOrder model.
 */
class SalesOrderController extends Controller
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
     * Lists all SalesOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalesOrderSearch();
        $searchModel->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SalesOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionView($id)
    {
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
        ]);
    }
    */

    public function actionViewOrder($i, $opt="bc")
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
            'i'=>$i,
            'opt'=>$opt,
        ]);
    }

    public function actionViewOrderReadOnly($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $searchModel = new MaterialSalesSearch();
        $searchModel->sales_id_sales_order = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;
        //$pagination = 10;

        //$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
        $dataProvider->sort->defaultOrder = ['sales_created_date' => SORT_DESC];

        return $this->render('view-only', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $this->findModel($id),
            'i' =>$i
        ]);
    }

    /**
     * Creates a new SalesOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SalesOrder();
        
        //Diberikan default value tanggal hari ini
        $model->tanggal_order = \common\helpers\Timeanddate::getCurrentDate();

        if ($model->load(Yii::$app->request->post())) {
            $model->month = \common\helpers\Timeanddate::getMonthOnly($model->tanggal_order);
            $model->year = \common\helpers\Timeanddate::getYearOnly($model->tanggal_order);
            $model->id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
            $model->generateNomorSalesOrder();
            if($model->save()){
                 $i = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_sales_order);
                return $this->redirect(['view-order', 'i' => $i]);
            }
        }

        return $this->render('create_sales_order', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SalesOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sales_order]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SalesOrder model.
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

    public function actionDeleteOrder($i)
    {
        $id = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        
        $model = $this->findModel($id);
        if($model->status_invoice == "INVOICE"){
            Yii::$app->session->setFlash('danger', "Order ini tidak bisa dihapus. Order ini sudah jadi invoice!");
        }else{
            if($model->status_invoice == "CANCEL"){
                Yii::$app->session->setFlash('danger', "Order ini tidak bisa dihapus. Order ini sudah dibatalkan!");
            }else{

                //1. Ambil data-data sales
                $materialsaless = \backend\models\MaterialSales::find()->where([
                        'sales_id_sales_order' => $id,
                    ])
                    ->all();
                foreach($materialsaless as $materialsales){
                    //echo $materialsales->id_material_sales." <Br>";
                    MaterialSales::rollBackToMaterialFinish($materialsales);
                }
                
                //2. Hapus Sales Order
                $model->delete();
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the SalesOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SalesOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalesOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelItem($id)
    {
        if (($model = MaterialSales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPostMessageSessionOri(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_sales_order = 0;
            if(isset($_POST['iso'])){
                $id_sales_order = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_sales_order <= 0){
                echo '<div class="alert alert-danger">Tidak ada sales order yang digunakan</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->one();
            if($materialfinish != null){
                $sales_id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
                $desc = $materialfinish->getDetailBarang();
                //$desc ='';
                $this->saveProductOrder($materialfinish, $id_sales_order, $sales_id_outlet_penjualan);
                echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
            }else{
                 $matSales = \backend\models\MaterialSales::find()->where([
                    'barcode_kode' => $barcode,
                    'sales_id_sales_order' => $id_sales_order
                ])
                ->one();
                if($matSales != null){
                    echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
                }else{
                    echo '<div class="alert alert-danger">Kode Barcode <b>['.$barcode.']</b> tidak dikenali/belum   terdaftar.</div>';
                }
            }

            exit();

            /*
            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);
            //echo $id_session." ".$id_pegawai;

            exit();
            */
        }

    }

    public function actionPostMessageSession(){
        //Untuk debuging lokal
        //Contoh : http://localhost/minierp/administrator/sales-order/post-message-session?msg=2003000000009&iso=48
        //$_POST['msg'] = $_GET['msg'];
        //$_POST['iso'] = $_GET['iso'];
        
        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_sales_order = 0;
            if(isset($_POST['iso'])){
                $id_sales_order = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_sales_order <= 0){
                echo '<div class="alert alert-danger">Tidak ada sales order yang digunakan</div>';
                exit();
            }

            $barcode = strip_tags($_POST['msg']);
            if($barcode == ""){
                echo '<div class="alert alert-danger">Silakan isi barcode terlebih dahulu</div>';
                exit();
            }

            $materialfinishs = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->all();
            $materialfinishscount = \backend\models\MaterialFinish::find()->where([
                    'barcode_kode' => $barcode,
                ])
                ->count();
            if($materialfinishscount > 0){
                if($materialfinishscount > 1){
                    echo '<div class="alert alert-warning">Mohon maaf, ada banyak data yang duplicate dengan kode barcode ini. Silakan pilih yang mana dari antara barcode tersebut:<br><br> ';
                    $no=0;
                    foreach($materialfinishs as $materialfinish){
                        $no++;
                        echo $no.".";

                        /*
                        echo \yii\helpers\Html::a(
                            '<i class="fa fa-fw fa-check"></i> PILIH',
                            ['material-in/update-packing', 'id_item' => $materialfinish->id_material_finish],
                            ['class' => 'btn btn-success btn-xs', 'style'=>'margin-bottom:4px']
                        );
                        */
                        echo '<button class="btn btn-success btn-xs" style="margin-bottom:4px" onclick="sendMessagePostById(\''.$materialfinish->kode.'\')"><i class="fa fa-fw fa-check"></i> PILIH</button>';
                        echo " ".$materialfinish->getDetailBarang();
                        echo "<br>";
                    }

                    echo \yii\helpers\Html::a(
                            '<i class="fa fa-fw fa-question"></i> Mengapa bisa double barcode?',
                            ['info/double-barcode', ],
                            ['class' => 'btn btn-info btn-xs', 'style'=>'margin-bottom:4px', 'target'=>'_blank']
                        );
                    echo '</div>';
                }
                else{
                    $materialfinish = \backend\models\MaterialFinish::find()->where([
                        'barcode_kode' => $barcode,
                    ])
                    ->one();

                    $sales_id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
                    $desc = $materialfinish->getDetailBarang();
                    //$desc ='';
                    $this->saveProductOrder($materialfinish, $id_sales_order, $sales_id_outlet_penjualan);
                    echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
                }
            }else{
                 $matSales = \backend\models\MaterialSales::find()->where([
                    'barcode_kode' => $barcode,
                    'sales_id_sales_order' => $id_sales_order
                ])
                ->one();
                if($matSales != null){
                    echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
                }else{
                    echo '<div class="alert alert-danger">Kode Barcode <b>['.$barcode.']</b> tidak dikenali/belum   terdaftar.</div>';
                }
            }

            exit();

            /*
            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);
            //echo $id_session." ".$id_pegawai;

            exit();
            */
        }

    }

    public function actionPostMessageSessionKodeBarang(){

        if(isset($_POST['msg'])){
            //echo $_POST['msg'];
            //echo "data sudah diterima";
            $id_sales_order = 0;
            if(isset($_POST['iso'])){
                $id_sales_order = $_POST['iso']*1;
            }
            echo '<br>';

            if($id_sales_order <= 0){
                echo '<div class="alert alert-danger">Tidak ada sales order yang digunakan</div>';
                exit();
            }

            $kode = strip_tags($_POST['msg']);
            if($kode == ""){
                echo '<div class="alert alert-danger">Silakan isi kode barang terlebih dahulu</div>';
                exit();
            }

            $materialfinish = \backend\models\MaterialFinish::find()->where([
                    'kode' => $kode,
                ])
                ->one();
            if($materialfinish != null){
                $sales_id_outlet_penjualan = \backend\models\User::getOutletPenjualan()->id_outlet_penjualan;
                $desc = $materialfinish->getDetailBarang();
                //$desc ='';
                $this->saveProductOrder($materialfinish, $id_sales_order, $sales_id_outlet_penjualan);
                echo '<div class="alert alert-info">Data <b>['.$desc.']</b> berhasil ditambahkan.</div>';
            }else{
                 $matSales = \backend\models\MaterialSales::find()->where([
                    'kode' => $kode,
                    'sales_id_sales_order' => $id_sales_order
                ])
                ->one();
                if($matSales != null){
                    echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
                }else{
                    echo '<div class="alert alert-danger">Kode Barang <b>['.$kode.']</b> tidak dikenali/belum   terdaftar.</div>';
                }
            }

            exit();

            /*
            $is = isset($_POST['is']) ? $_POST['is'] : "";
            $id_session = EncryptionUtil::staticEncryptor('decrypt',$is);

            $ipe = isset($_POST['ipe']) ? $_POST['ipe'] : "";
            $id_pegawai = EncryptionUtil::staticEncryptor('decrypt',$ipe);
            //echo $id_session." ".$id_pegawai;

            exit();
            */
        }

    }

    private function saveProductOrder($materialfinish, $id_sales_order, $sales_id_outlet_penjualan=0){

        //Simpan ke Material Sales
        //1. Untuk tahap awal (sbelum dipindahkan maka data di material_finish masih ada /belum dihapus)
        //2. Nanti ketika sudah digenerate invoice/tagihan maka baru dipindahkan data di material_finish akan dihapus untuk menunjukkan bahwa stok sudah berkurang
        $materialsales = \backend\models\MaterialSales::find()->where([
                'id_material_finish' => $materialfinish->id_material_finish,
                'sales_id_sales_order' => $id_sales_order,
            ])
            ->one();
        if($materialsales == null){
            $materialsales = new \backend\models\MaterialSales();
        }else{
            //echo $materialfinish->id_material_finish;
            echo '<div class="alert alert-warning">Data produk ini sudah masuk ke data.</div>';
            exit();
        }
        $materialsales->sales_id_sales_order = $id_sales_order;
        $materialsales->sales_id_outlet_penjualan = $sales_id_outlet_penjualan;

        //1. Pindahkan atau copy data-data dari material_finish ke material sales
        $materialsales->id_material_finish = $materialfinish->id_material_finish;
        $materialsales->id_material = $materialfinish->id_material;
        $materialsales->id_material_kategori1 = $materialfinish->id_material_kategori1;
        $materialsales->id_material_kategori2 = $materialfinish->id_material_kategori2;
        $materialsales->id_material_kategori3 = $materialfinish->id_material_kategori3;
        $materialsales->yard = $materialfinish->yard;
        $materialsales->kode = $materialfinish->kode;
        $materialsales->year = $materialfinish->year;
        $materialsales->no_urut = $materialfinish->no_urut;
        $materialsales->no_urut_kode = $materialfinish->no_urut_kode;
        $materialsales->no_splitting = $materialfinish->no_splitting;
        $materialsales->barcode_kode = $materialfinish->barcode_kode;
        $materialsales->deskripsi = $materialfinish->deskripsi;
        $materialsales->is_packing = $materialfinish->is_packing;
        $materialsales->id_basic_packing = $materialfinish->id_basic_packing;
        $materialsales->id_material_in_item_proc = $materialfinish->id_material_in_item_proc;
        $materialsales->id_material_in = $materialfinish->id_material_in;
        $materialsales->is_join_packing = $materialfinish->is_join_packing;
        $materialsales->join_info = $materialfinish->join_info;
        $materialsales->id_gudang = $materialfinish->id_gudang;
        $materialsales->created_id_user = $materialfinish->created_id_user;
        $materialsales->created_date = $materialfinish->created_date;
        $materialsales->created_ip_address = $materialfinish->created_ip_address;

        


        //Log Created
        $materialsales->sales_created_id_user = Yii::$app->user->identity->id;
        $materialsales->sales_created_ip_address = \common\helpers\IPAddressFunction::getUserIPAddress();
        $materialsales->sales_created_date = \common\helpers\Timeanddate::getCurrentDateTime();

        $materialsales->save(false);

        //2. Backup datanya di material drop
        $materialDrop = \backend\models\MaterialFinishDrop::find()->where([
                'id_material_finish' => $materialfinish->id_material_finish,
            ])
            ->one();
        if($materialDrop == null){
            $materialDrop = new \backend\models\MaterialFinishDrop();
        }
        $materialDrop->id_material_finish = $materialfinish->id_material_finish;
        $materialDrop->id_material = $materialfinish->id_material;
        $materialDrop->id_material_kategori1 = $materialfinish->id_material_kategori1;
        $materialDrop->id_material_kategori2 = $materialfinish->id_material_kategori2;
        $materialDrop->id_material_kategori3 = $materialfinish->id_material_kategori3;
        $materialDrop->yard = $materialfinish->yard;
        $materialDrop->kode = $materialfinish->kode;
        $materialDrop->year = $materialfinish->year;
        $materialDrop->no_urut = $materialfinish->no_urut;
        $materialDrop->no_urut_kode = $materialfinish->no_urut_kode;
        $materialDrop->no_splitting = $materialfinish->no_splitting;
        $materialDrop->barcode_kode = $materialfinish->barcode_kode;
        $materialDrop->deskripsi = $materialfinish->deskripsi;
        $materialDrop->is_packing = $materialfinish->is_packing;
        $materialDrop->id_basic_packing = $materialfinish->id_basic_packing;
        $materialDrop->id_material_in_item_proc = $materialfinish->id_material_in_item_proc;
        $materialDrop->id_material_in = $materialfinish->id_material_in;
        $materialDrop->is_join_packing = $materialfinish->is_join_packing;
        $materialDrop->join_info = $materialfinish->join_info;
        $materialDrop->id_gudang = $materialfinish->id_gudang;
        $materialDrop->created_id_user = $materialfinish->created_id_user;
        $materialDrop->created_date = $materialfinish->created_date;
        $materialDrop->created_ip_address = $materialfinish->created_ip_address;
        $materialDrop->save(false);

        //3. Hapus data dari material-finish
        $materialfinish->delete();
    }

    //public function actionDeleteItem($id_item, $id_parent)
    public function actionDeleteItem($i, $ip)
    {
        //$model = $this->findModelItem($id_item);       
        $id_item = \common\utils\EncryptionDB::encryptor('decrypt',$i);
        $id_parent = \common\utils\EncryptionDB::encryptor('decrypt',$ip);

        //1. Rollback, kembalikan ke material_finish
        $materialsales = $this->findModelItem($id_item);
        MaterialSales::rollBackToMaterialFinish($materialsales);
        /*
        $materialfinish = \backend\models\MaterialFinish::find()->where([
                'id_material_finish' => $materialsales->id_material_finish,
            ])
            ->one();
        if($materialfinish == null){
            $materialfinish = new \backend\models\MaterialFinish();
        }
        $materialfinish->id_material_finish = $materialsales->id_material_finish;
        $materialfinish->id_material = $materialsales->id_material;
        $materialfinish->id_material_kategori1 = $materialsales->id_material_kategori1;
        $materialfinish->id_material_kategori2 = $materialsales->id_material_kategori2;
        $materialfinish->id_material_kategori3 = $materialsales->id_material_kategori3;
        $materialfinish->yard = $materialsales->yard;
        $materialfinish->kode = $materialsales->kode;
        $materialfinish->year = $materialsales->year;
        $materialfinish->no_urut = $materialsales->no_urut;
        $materialfinish->no_urut_kode = $materialsales->no_urut_kode;
        $materialfinish->no_splitting = $materialsales->no_splitting;
        $materialfinish->barcode_kode = $materialsales->barcode_kode;
        $materialfinish->deskripsi = $materialsales->deskripsi;
        $materialfinish->is_packing = $materialsales->is_packing;
        $materialfinish->id_basic_packing = $materialsales->id_basic_packing;
        $materialfinish->id_material_in_item_proc = $materialsales->id_material_in_item_proc;
        $materialfinish->id_material_in = $materialsales->id_material_in;
        $materialfinish->is_join_packing = $materialsales->is_join_packing;
        $materialfinish->join_info = $materialsales->join_info;
        $materialfinish->id_gudang = $materialsales->id_gudang;
        $materialfinish->created_id_user = $materialsales->created_id_user;
        $materialfinish->created_date = $materialsales->created_date;
        $materialfinish->created_ip_address = $materialsales->created_ip_address;
        $materialfinish->save(false);

        //2. Hapus dari materialsales
        $materialsales->delete();
        */

        //return $this->redirect(['view', 'id' => $id_parent]);
        return $this->redirect(['view-order', 'i' => $ip]);
    }
}
