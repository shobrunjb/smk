<?php
use yii\helpers\Url;
?>

<div class="pad" style="margin:2px;">
<?php
//for($i=1;$i<6;$i++){
    $count = 0;
    $members = \backend\models\ProjectMember::find()
                ->where(['id_project' => $model->id_project])
                ->all();
    foreach($members as $member){
        $label = "";
        if(isset($member->role)){
            $label = $member->role->color_style;
        }
        if(isset($member->pegawai)){
            echo '<span class="badge '.$label.'" style="margin:2px;">'.$member->pegawai->nama_lengkap.'</span> ';
        }
        $count++;
    }
    
//}
?>
</div>
<br>
*Keterangan dari <?= '<b>'.$count."</b> anggota tim" ?>:<Br>
<?php
    $roles = \backend\models\ProjectMstRole::find()
                ->all();
    foreach($roles as $role){
        echo '<span class="badge '.$role->color_style.'">'.$role->role_name.'</span> ';
    }
?>


