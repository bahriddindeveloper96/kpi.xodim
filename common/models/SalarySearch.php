<?php

namespace common\models;

use yii\base\Model;
use common\models\User;
use common\models\Company;
use yii\data\ActiveDataProvider;
use common\models\Salary;

/**
 * SalarySearch represents the model behind the search form of `common\models\Salary`.
 */
class SalarySearch extends Salary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'user_id'], 'integer'],
            [['money', 'money_date', 'comment'], 'safe'],
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
        $query = Salary::find()->joinWith('company')->joinWith('user');

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
            'company_id' => $this->company_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'money', $this->money])
            ->andFilterWhere(['like', 'money_date', $this->money_date])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
