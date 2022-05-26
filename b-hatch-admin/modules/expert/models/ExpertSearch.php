<?php

namespace backend\modules\expert\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\expert\models\Expert;

/**
 * ExpertSearch represents the model behind the search form of `backend\modules\expert\models\Expert`.
 */
class ExpertSearch extends Expert
{
    public $name;
    public $email;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'expert_type'], 'integer'],
            [['email', 'name'], 'string'],
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
        $query = Expert::find()
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
        $query->andFilterWhere([
            'expert_type' => $this->expert_type,
        ]);

        $query->andFilterWhere(['like', 'user.fullname', $this->name])
            ->andFilterWhere(['like', 'user.email', $this->email]);

        return $dataProvider;
    }
}
