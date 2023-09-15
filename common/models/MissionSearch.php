<?php

namespace common\models;

use yii\base\Model;
use common\models\Division;
use yii\data\ActiveDataProvider;
use common\models\Mission;

/**
 * MissionSearch represents the model behind the search form of `common\models\Mission`.
 */
class MissionSearch extends Mission
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'division_id', 'company_id'], 'integer'],
            [['mission_one', 'mission_two', 'mission_three', 'one_ball', 'two_ball', 'three_ball'], 'safe'],
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
        $query = Mission::find()->joinWith('division')->joinWith('company');

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
            'division_id' => $this->division_id,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'mission_one', $this->mission_one])
            ->andFilterWhere(['like', 'mission_two', $this->mission_two])
            ->andFilterWhere(['like', 'mission_three', $this->mission_three])
            ->andFilterWhere(['like', 'one_ball', $this->one_ball])
            ->andFilterWhere(['like', 'two_ball', $this->two_ball])
            ->andFilterWhere(['like', 'three_ball', $this->three_ball]);

        return $dataProvider;
    }
}
