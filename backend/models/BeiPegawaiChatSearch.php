<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeiPegawaiChat;

/**
 * BeiPegawaiChatSearch represents the model behind the search form of `backend\models\BeiPegawaiChat`.
 */
class BeiPegawaiChatSearch extends BeiPegawaiChat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bei_pegawai_chat', 'id_pegawai', 'id_bei_interview_session', 'from_user_id', 'to_user_id', 'is_read', 'read_user_id', 'id_bei_interview_sequence', 'id_bei_sequence', 'id_reference'], 'integer'],
            [['message', 'time_log', 'ipaddress_log'], 'safe'],
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
        $query = BeiPegawaiChat::find();

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
            'id_bei_pegawai_chat' => $this->id_bei_pegawai_chat,
            'id_pegawai' => $this->id_pegawai,
            'id_bei_interview_session' => $this->id_bei_interview_session,
            'from_user_id' => $this->from_user_id,
            'to_user_id' => $this->to_user_id,
            'time_log' => $this->time_log,
            'is_read' => $this->is_read,
            'read_user_id' => $this->read_user_id,
            'id_bei_interview_sequence' => $this->id_bei_interview_sequence,
            'id_bei_sequence' => $this->id_bei_sequence,
            'id_reference' => $this->id_reference,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'ipaddress_log', $this->ipaddress_log]);

        return $dataProvider;
    }

    /*

    Ambil pertanyaan dari yang berasal dari admin saja.
    */
    public static function getLastChat($id_bei_interview_session, $id_pegawai){
        $chats = \backend\models\BeiPegawaiChat::find()->where([
            'id_bei_interview_session' => $id_bei_interview_session,
            'id_pegawai' => $id_pegawai,
            'from_user_id' => -1, //Ini ambil yang dari admin saja
        ])
        ->orderBy(['time_log' => SORT_DESC])->limit(1)
        ->all();
        foreach($chats as $chat){
            return $chat;
        }
    }
}
