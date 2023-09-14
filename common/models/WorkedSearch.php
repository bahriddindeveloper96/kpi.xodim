<?php

namespace common\models;
use common\models\User;
use common\models\Company;
use common\models\Mission;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Worked;

/**
 * WorkedSearch represents the model behind the search form of `common\models\Worked`.
 */
class WorkedSearch extends Worked
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'mission_id', 'company_id'], 'integer'],
            [['date', 'mission_one', 'mission_two', 'mission_three'], 'safe'],
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
        $query = Worked::find()->joinWith('mission')->joinWith('user');

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
            'user_id' => $this->user_id,
            'mission_id' => $this->mission_id,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'mission_one', $this->mission_one])
            ->andFilterWhere(['like', 'mission_two', $this->mission_two])
            ->andFilterWhere(['like', 'mission_three', $this->mission_three]);

        return $dataProvider;
    }
}
