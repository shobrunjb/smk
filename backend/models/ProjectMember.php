<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project_member".
 *
 * @property int $id_project_member
 * @property int $id_project
 * @property int $id_pegawai
 * @property int $id_project_mst_role
 * @property string $start_date
 * @property string $end_date
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class ProjectMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_pegawai', 'id_project_mst_role', 'start_date', 'end_date'], 'required'],
            [['id_project', 'id_pegawai', 'id_project_mst_role', 'created_id_user'], 'integer'],
            [['start_date', 'end_date', 'created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project_member' => 'Id Project Member',
            'id_project' => 'Id Project',
            'id_pegawai' => 'Id Pegawai',
            'id_project_mst_role' => 'Id Project Mst Role',
            'start_date' => 'Tanggal Bergabung',
            'end_date' => 'Tanggal Expired',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_project']);
    }

    public function getPegawai()
    {
        return $this->hasOne(HrmPegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }

    public function getRole()
    {
        return $this->hasOne(ProjectMstRole::className(), ['id_project_mst_role' => 'id_project_mst_role']);
    }

    public static function getYourRole($id_project, $mode=1){
        //echo $id_project." + ".\backend\models\HrmPegawai::getIdPegawaiFromUserId();
        $role = \backend\models\ProjectMember::find()
                ->where([
                    'id_project' => $id_project,
                    'id_pegawai' => \backend\models\HrmPegawai::getIdPegawaiFromUserId()
                ])
                ->one();
        if($role != null){
            if(isset($role->role)){
                switch ($mode){
                    case 1:
                        return '<span class="badge '.$role->role->color_style.'">'.$role->role->role_name.'</span>';

                    case 2:
                        return $role->role->role_name;

                    default:
                        return $role->role->role_name;
                }
            }else{
                return "Belum Diset";
            }
        }else{
            return "Belum Diset";
        }
    }
}
