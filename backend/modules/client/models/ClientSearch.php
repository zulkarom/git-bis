<?php

namespace backend\modules\client\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Client;

/**
 * ClientSearch represents the model behind the search form of `backend\models\Client`.
 */
class ClientSearch extends Client
{
    public $name;
    public $email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'client_type', 'biz_capital'], 'integer'],
            [['biz_name', 'biz_address', 'biz_phone', 'biz_fax', 'biz_email', 'biz_type', 'biz_main_activity', 'biz_date_execution', 'biz_reg_no', 'profile_file', 'personal_updated_at', 'email', 'name'], 'safe'],
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
        $query = Client::find()
        ->joinWith(['user']);

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

        $query->andFilterWhere(['like', 'biz_name', $this->biz_name])
            ->andFilterWhere(['like', 'user.fullname', $this->name])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'biz_reg_no', $this->biz_reg_no]);

        return $dataProvider;
    }
}
