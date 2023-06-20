<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SmkAspekPenilaianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rencana Penilaian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body smk-aspek-penilaian-index">
    <i class="fa fa-info-circle" aria-hidden="true"></i> Tata Cara Pengisian Penilaian Awal Tahun
         
       <hr>
       1. Silakan klik tombol ‘Tambah Baru’ pad bagian bawah tabel. <br>
       2.  Isi data sesuai dengan kolom tabel <br>
       3. Jika data sudah diisi, maka klik tombol ‘Save’ pada bagian bawah tabel. <br>
       4. Data penilaian awal tahun berhasil disimpan, jika ada kendala terhadap pengisian silakan menghubungi Administrator.<br>

       <hr> <br>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Baru
        </button>
    
    
    </div>
  

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <h3 class="modal-title" id="exampleModalLabel">Tambah Perencanaan Penilaian Awal Tahun</h3>
            <h5 class="modal-title" id="exampleModalLabel">Silahkan menambahkan rencana penilaian baru dengan memilih kantor cabang dan atasan terlebih dahulu</h5>
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="dropdown">
        <label for="exampleInputEmail1">Pilih Kantor Cabang :</label>
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Pilih Kantor Cabang
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#">KUM Kab.Bogor</a></li>
        <li><a href="#">KUM Sukabumi</a></li>
        <li><a href="#">KUM. Kab Bandung</a></li>
        </div>

        <div class="dropdown">
        <label for="exampleInputEmail1">Pilih Kantor Cabang :</label>
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Pilih Kantor Cabang
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#">KUM Kab.Bogor</a></li>
        <li><a href="#">KUM Sukabumi</a></li>
        <li><a href="#">KUM. Kab Bandung</a></li>
        </div>
        
        

            <br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>
