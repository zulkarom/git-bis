<?php

namespace frontend\modules\client\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BcRevStream;

/**
 * BcRevStreamSearch represents the model behind the search form of `backend\models\BcRevStream`.
 */
class BcRevStreamSearch extends BcRevStream
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'biz_canvas_id'], 'integer'],
            [['description'], 'safe'],
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
        $query = BcRevStream::find();

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
            'id' => $this->id,
            'biz_canvas_id' => $this->biz_canvas_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
