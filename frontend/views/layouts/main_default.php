<?php

?>
<?php

use backend\models\Product;
use backend\models\ProductSearch;
use common\utils\EncryptionDB;
use frontend\assets\AppAsset;
use backend\models\LandingHome;
use backend\models\LandingAsset;
use backend\models\WebVocabularySearch;
use backend\models\ContentSearch;
use common\helpers\ContentStringManipulator;
use yii\helpers\Url;

use backend\models\AppSettingSearch;


$appName = AppSettingSearch::getValueByKey("APP-NAME-SINGKAT");
$appNameSingkat = AppSettingSearch::getValueByKey("APP-NAME-SINGKATAN");

$basepath = Yii::$app->request->baseUrl;
if($basepath == "/" ){
  //Handle untuk case di server (sudah pakai domain)
  $basepath = "";
}
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php
  //Display Asset
  $assets = LandingAsset::find()
    ->where(['is_active' => 1])
    ->all();
  foreach($assets as $asset){
    //echo $asset->jenisLandingAsset->jenis_landing_asset;
    switch ($asset->jenisLandingAsset->jenis_landing_asset) {
      case 'css':
        echo '<link href="'.$basepath.'/landing_asset/'.$asset->file.'" rel="stylesheet">'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>

<?php
  //Display Asset
  $assets = LandingAsset::find()
    ->where(['is_active' => 1])
    ->all();
  foreach($assets as $asset){
    //echo $asset->jenisLandingAsset->jenis_landing_asset;
    switch ($asset->jenisLandingAsset->jenis_landing_asset) {
      case 'js':
        echo '<script  src="'.$basepath.'/landing_asset/'.$asset->file.'"> </script>'."\n";
        break;
      
      default:
        // code...
        break;
    }
  }
?>

<link href="<?php echo $basepath; ?>/css/front_form.css" rel="stylesheet">
<link href="<?php echo $basepath; ?>/css/front_layout.css" rel="stylesheet">

<?php
  $codes = LandingHome::find()
    ->where([ 'type_landing' => 'HEADER'])
    ->orderBy(['page_number'=>SORT_ASC])->all();
  foreach($codes as $code){
    echo $code->source_html;
  }
?>
&nbsp;<br>
&nbsp;<br>

<div class="main-content" style="padding:20px;">
<?= $content ?>
</div>
<?php
  $codes = LandingHome::find()
    ->where(['is_active' => 1, 'type_landing' => 'FOOTER'])
    ->orderBy(['page_number'=>SORT_ASC])->all();
  foreach($codes as $code){
    echo $code->source_html;
  }
?>
<?php /*
<?= $this->render('header') ?>
<?= $content ?>
<?= $this->render('footer') ?>
<!-- FOOTER -->
<?php $this->endBody() ?>


<?php
echo $this->render('_dialog_cookies', [
]);
?>
<button id="back-to-top"  class="back-to-top" title="Go to top"></button>
</body>
</html>
<?php $this->endPage() ?>
*/ ?>

<?php
echo $this->render('_back_to_top', [
]);
?>