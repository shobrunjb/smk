<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\BeiPegawaiChat;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeiCompentecyQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chat Interview';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-body">
<div class="alert alert-info">Selamat datang dalam proses interview online. Anda saat ini akan dibantu dengan asisten kami untuk diberikan beberapa pertanyaan.</div>
<div class="col-md-12">
          <!-- DIRECT CHAT PRIMARY -->
          <?php //<div class="box box-primary direct-chat direct-chat-primary"> ?>
          <div class="boxi direct-chat direct-chat-primary">
            <?php /*
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages"></span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            */ ?>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">

                <?php
                    $id_user = Yii::$app->getUser()->getId();
                    $id_pegawai = 1; //Sementara hardcoded dulu
                    $chats =  BeiPegawaiChat::find()->where(['id_pegawai' => $id_pegawai])->orderBy(['time_log' => SORT_DESC])->all();
                    //$chats =  PesertaChat::find()->where(['id_peserta' => $id_peserta])->all();
                    foreach($chats as $chat):
                        if($chat->from_user_id == Yii::$app->getUser()->getId()) {
                ?>
                        <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Saya</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="<?= Yii::$app->urlManager->baseUrl.'/images/chatbot/user-account.png' ?>" alt="User"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?= $chat->message ?>
                            </div>
                            <!-- /.direct-chat-text -->
                            </div>
                        <?php }else{ ?>
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">Admin</span>
                                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="<?= Yii::$app->urlManager->baseUrl.'/images/chatbot/interviewer.png' ?>" alt="User"><!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    <?= $chat->message ?>
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                        <?php } ?>
                     <?php endforeach; ?>

                
                <!-- /.direct-chat-msg -->

                <?php for($i=1;$i<=0;$i++): ?>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Saya</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="<?= Yii::$app->urlManager->baseUrl.'/img/user-account.png' ?>" alt="User"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    <?= $chat->message ?>
                </div>
                <!-- /.direct-chat-text -->
                </div>


                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Admin</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="<?= Yii::$app->urlManager->baseUrl.'/logo.png' ?>" alt="User"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Ok silakan bro!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <?php endfor; ?>
                <!-- /.direct-chat-msg -->


              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action = "" method = "POST">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
</div>
</div>