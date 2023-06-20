      <div class="dropdown messages-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-cog"></i>
      </a>
      <ul class="dropdown-menu">

      <li>

        <ul class="menu" style="list-style-type:none;">
        <li>

        <?php
        echo \yii\helpers\Html::a(
              '<i class="fa fa-fw fa-pencil"></i> Edit Data',
              ['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'update','idi'=>$idi],
              ['class' => '']
          );
        ?>
        </li>
        <li>
        <?php
        echo \yii\helpers\Html::a(
              '<i class="fa fa-fw fa-trash"></i> Hapus Data',
              ['member-project/detail/', 'i' => $i, 't' => $t, 'action' => 'delete','idi'=>$idi],
              [
                'class' => '',
                'data' => [
                    'confirm' => 'Anda yakin mau hapus data ini?',
                    'method' => 'post',
                ],
              ],

          );
        ?>
        </li>

       
        </ul>
        </li>

      </ul>

      </div>