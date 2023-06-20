<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sprint_backlog".
 *
 * @property int $id_sprint_backlog
 * @property int $id_project
 * @property int $id_sprint
 * @property int $id_product_backlog
 * @property string|null $start_work
 * @property string|null $end_work
 * @property int|null $last_contribute_user
 * @property int|null $total_duration
 * @property int|null $id_time_metric
 * @property string|null $created_date
 * @property int|null $created_id_user
 * @property string|null $created_ip_address
 */
class SprintBacklog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sprint_backlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'id_sprint', 'id_product_backlog'], 'required'],
            [['id_project', 'id_sprint', 'id_product_backlog', 'last_contribute_user', 'total_duration', 'id_time_metric', 'created_id_user'], 'integer'],
            [['start_work', 'end_work', 'created_date'], 'safe'],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sprint_backlog' => 'Id Sprint Backlog',
            'id_project' => 'Id Project',
            'id_sprint' => 'Id Sprint',
            'id_product_backlog' => 'Id Product Backlog',
            'start_work' => 'Start Work',
            'end_work' => 'End Work',
            'last_contribute_user' => 'Last Contribute User',
            'total_duration' => 'Total Duration',
            'id_time_metric' => 'Id Time Metric',
            'created_date' => 'Created Date',
            'created_id_user' => 'Created Id User',
            'created_ip_address' => 'Created Ip Address',
        ];
    }

    public function getSprint()
    {
        return $this->hasOne(Sprint::className(), ['id_sprint' => 'id_sprint']);
    }

    public function getProductBacklog()
    {
        return $this->hasOne(ProductBacklog::className(), ['id_product_backlog' => 'id_product_backlog']);
    }

    public function checkDelete($id_sprint){
        $result['status'] = false;
        $result['error'] = "";
        $statusError = false;

        $sb = \backend\models\SprintBacklog::find()
            ->where([
                'id_sprint_backlog' => $this->id_sprint_backlog ,
            ])->one();

        //echo "Cek Delete".$this->id_sprint_backlog;

        if($sb != null)
        {
            $id_product_backlog = $sb->id_product_backlog;
            //1. Cek di For Now
            $now = \backend\models\ScrumDailyForNow::find()
                ->where([
                    'id_product_backlog' => $id_product_backlog ,
                    'id_sprint' => $id_sprint
                ])->count();

            if($now > 0){
                //echo 'Sudah ada hari ini'.$now;
                $statusError = true;
            }

            //2. Cek di For Yesterday
            $yesterday = \backend\models\ScrumDailyForYesterday::find()
                ->where([
                    'id_product_backlog' => $id_product_backlog ,
                    'id_sprint' => $id_sprint
                ])->count();

            if($yesterday > 0){
                //echo 'Sudah ada kemarin ini'.$yesterday;
                $statusError = true;
            }

            //3. Cek di total progres tidak nol
            if($sb->last_progres_by_team > 0){
                //echo 'Sudah ada progres team'.$sb->last_progres_by_team;
                $statusError = true;
            }
            if($sb->last_progres_by_owner > 0){
                $statusError = true;
            }

            if($statusError){
                $result['status'] = true;
                if(isset($sb->productBacklog)){
                    $result['error'] = "Product backlog no #".$sb->productBacklog->order_number." (".$sb->productBacklog->product_backlog.") tidak bisa diuncek karena sudah tercatat rekaman kegiatannya di sprint ini!";
                }else{
                    $result['error'] = "Product backlog no #1 (".$id_product_backlog.") tidak bisa diuncek karena sudah tercatat rekaman kegiatannya di sprint ini!";
                }
            }
            
        }

        return $result;
    }
}
