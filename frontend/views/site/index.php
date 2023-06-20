<?php

use backend\models\Product;
use backend\models\ProductSearch;
use common\utils\EncryptionDB;
use frontend\assets\AppAsset;
use backend\models\News;
use backend\models\NewsSearch;
use backend\models\WebVocabularySearch;
use backend\models\ContentSearch;
use common\helpers\ContentStringManipulator;
use yii\helpers\Url;

use backend\models\AppSettingSearch;


$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$appNameSingkat = AppSettingSearch::getValueByKey("APP-NAME-SINGKATAN");

/* @var $this yii\web\View */
$this->title = $appName;
AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .hovereffect {
      width: 100%;
      height: 100%;
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
    }

    .hovereffect .overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
      opacity: 0;
      background-color: rgba(0, 0, 0, 0.5);
      -webkit-transition: all .4s ease-in-out;
      transition: all .4s ease-in-out
    }

    .hovereffect img {
      display: block;
      position: relative;
      -webkit-transition: all .4s linear;
      transition: all .4s linear;
    }

    .hovereffect h2 {
      text-transform: uppercase;
      color: #fff;
      text-align: center;
      position: relative;
      font-size: 17px;
      background: rgba(0, 0, 0, 0.6);
      -webkit-transform: translatey(-100px);
      -ms-transform: translatey(-100px);
      transform: translatey(-100px);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      padding: 10px;
    }

    .hovereffect a.info {
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      color: #fff;
      border: 1px solid #fff;
      background-color: transparent;
      opacity: 0;
      filter: alpha(opacity=0);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      margin: 80px 0 0;
      padding: 7px 14px;
    }

    .hovereffect a.info:hover {
      box-shadow: 0 0 5px #fff;
    }

    .hovereffect:hover img {
      -ms-transform: scale(1.2);
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
    }

    .hovereffect:hover .overlay {
      opacity: 1;
      filter: alpha(opacity=100);
    }

    .hovereffect:hover h2,
    .hovereffect:hover a.info {
      opacity: 1;
      filter: alpha(opacity=100);
      -ms-transform: translatey(0);
      -webkit-transform: translatey(0);
      transform: translatey(0);
    }

    .hovereffect:hover a.info {
      -webkit-transition-delay: .2s;
      transition-delay: .2s;
    }

    .container {
      position: center;
      width: 50%;
    }

    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .container:hover .image {
      opacity: 0.3;
    }

    .container:hover .middle {
      opacity: 1;
    }

    .text {
      background-color: #04AA6D;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
    }
  </style>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    #myImg:hover {
      opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.9);
      /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes zoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
      .modal-content {
        width: 100%;
      }
    }
  </style>

  <title><?= $appName; ?></title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/" />

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid px-4 py-2">
        <a class="navbar-brand" href="#"><?= $appName; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" href="administrator">Login</a>
            </li>
          </ul>
          <?php /*
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
              </li>
            </ul>
            */ ?>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain3.jpg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5><?= $appName; ?></h5>
            <p>Kualitas kain terbaik</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain1.jpg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Makloon</h5>
            <p>Harga terjangkau</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/web/img/kain2.jpeg" class="d-block w-100" alt="Gambar Kain" height="600px" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Makloon</h5>
            <p>Pelayanan terbaik</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <?php
      $landingpagestatus = AppSettingSearch::getValueByKey("LANDING-PAGE");
      //echo $landingpagestatus."<======";
      if($landingpagestatus != 0){
        echo $this->render('_landing_page', [
          ]);
      }
    ?>

  </main>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>