<?php

namespace frontend\modules\expert\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Client;
use Yii;
/**
 * ClientSearch represents the model behind the search form of `backend\models\Client`.
 */
class ClientSearch extends Client
{
    public $client_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'client_type', 'biz_capital'], 'integer'],
            [['client_name'], 'string'],
            [['biz_name', 'biz_address', 'biz_phone', 'biz_fax', 'biz_email', 'biz_type', 'biz_main_activity', 'biz_date_execution', 'biz_reg_no', 'profile_file', 'personal_updated_at'], 'safe'],
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
        ->joinWith(['clientExperts', 'user'])
        ->where(['expert_id' => Yii::$app->user->identity->expert->id]);

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'user_id' => $this->user_id,
        //     'client_type' => $this->client_type,
        //     'biz_date_execution' => $this->biz_date_execution,
        //     'biz_capital' => $this->biz_capital,
        //     'personal_updated_at' => $this->personal_updated_at,
        // ]);

        $query->andFilterWhere(['like', 'user.fullname', $this->client_name]);

        // $query->andFilterWhere(['like', 'biz_name', $this->biz_name])
        //     ->andFilterWhere(['like', 'biz_address', $this->biz_address])
        //     ->andFilterWhere(['like', 'biz_phone', $this->biz_phone])
        //     ->andFilterWhere(['like', 'biz_fax', $this->biz_fax])
        //     ->andFilterWhere(['like', 'biz_email', $this->biz_email])
        //     ->andFilterWhere(['like', 'biz_type', $this->biz_type])
        //     ->andFilterWhere(['like', 'biz_main_activity', $this->biz_main_activity])
        //     ->andFilterWhere(['like', 'biz_reg_no', $this->biz_reg_no])
        //     ->andFilterWhere(['like', 'profile_file', $this->profile_file]);

        return $dataProvider;
    }
}
