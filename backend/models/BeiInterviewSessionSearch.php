<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiInterviewSession;

/**
 * BeiInterviewSessionSearch represents the model behind the search form of `backend\models\BeiInterviewSession`.
 */
class BeiInterviewSessionSearch extends BeiInterviewSession
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_interview_session', 'id_pegawai', 'last_position', 'last_hit', 'durasi', 'stat_total_number_question'], 'integer'],
            [['session_date', 'last_question', 'actual_start', 'actual_end', 'status', 'last_submit', 'created_date', 'created_user', 'created_ip_address', 'modified_date', 'modified_user', 'modified_ip_address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BeiInterviewSession::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_bei_interview_session' => $this->id_bei_interview_session,
            'id_pegawai' => $this->id_pegawai,
            'session_date' => $this->session_date,
            'last_position' => $this->last_position,
            'last_hit' => $this->last_hit,
            'actual_start' => $this->actual_start,
            'actual_end' => $this->actual_end,
            'durasi' => $this->durasi,
            'last_submit' => $this->last_submit,
            'stat_total_number_question' => $this->stat_total_number_question,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'last_question', $this->last_question])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'created_ip_address', $this->created_ip_address])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'modified_ip_address', $this->modified_ip_address]);

        return $dataProvider;
    }

    public static function getCurrentSequence($id_session, $id_batch, $id_pegawai){
        $session = BeiInterviewSession::find()->where([
            'id_bei_interview_session' => $id_session,
        ])->one();

        if($session != null){
            echo "beis".$session->id_bei_interview_sequence."beis";
            //echo $id_batch; 
            
            //Jika nilai masih 0 berarti baru pertama
            if($session->id_bei_interview_sequence == 0){
                $id_bei_interview_sequence = BeiInterviewSequenceSearch::getFirstSequenceIdBatch($id_batch);
                echo "seq".$id_bei_interview_sequence."seq";
                //create null last chat
                $lastchat = new \backend\models\BeiPegawaiChat();
                exit();
                $test = BeiInterviewSequenceSearch::getQuestion($id_bei_interview_sequence, $session, $lastchat);
                
                return "ai";
            }else{
                $lastchat = \backend\models\BeiPegawaiChatSearch::getLastChat($id_session, $id_pegawai);
                if($lastchat != null){
                    $id_bei_interview_sequence = $lastchat->id_bei_interview_sequence;
                    if($lastchat->is_finish_sequence == 1){
                        $next_id_bei_interview_sequence = BeiInterviewSequenceSearch::getNextSequenceFromLast($id_bei_interview_sequence, $id_batch);
                    }else{
                        //Jika belum selesai maka interview sequencenya dibuat sama
                        $next_id_bei_interview_sequence = $id_bei_interview_sequence;
                    }
                    //echo "next:".$next_id_bei_interview_sequence;
                    return BeiInterviewSequenceSearch::getQuestion($next_id_bei_interview_sequence, $session, $lastchat);
                }else{
                    $respon = new \backend\models\ObjBeiResponChat();
                    $respon->message = "Masuk ke pertanyaan selanjutnya";
                    return $respon;
                }
            }
            $respon = new \backend\models\ObjBeiResponChat();
            return $respon;
        }else{
            echo "Sesi tidak dikenali!";
            $respon = new \backend\models\ObjBeiResponChat();
            $respon->message = "Sesi ini tidak dikenali [".$id_session."]. Silakan kontak administrator anda!";
            return $respon;
        }
    }

    public static function updateWithNewPosition($id_session, $chat){
        $session = BeiInterviewSession::find()->where([
            'id_bei_interview_session' => $id_session,
        ])->one();
        if($session != null){
            $session->id_bei_interview_sequence = $chat->id_bei_interview_sequence;
            $session->last_position = $chat->id_bei_interview_sequence;
            $session->last_hit = $session->last_hit + 1;
            $session->save(false);
            //echo "Update done". $chat->id_bei_interview_sequence." ".$chat->id_bei_interview_sequence;
        }
    }


}
