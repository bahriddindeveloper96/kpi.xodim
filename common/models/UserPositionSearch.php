<?php

namespace common\models;
use common\models\Company;
use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserPosition;

/**
 * UserPositionSearch represents the model behind the search form of `common\models\UserPosition`.
 */
class UserPositionSearch extends UserPosition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'xodim_id', 'created_by', 'updated_by', 'company_id'], 'integer'],
            [['lavozimi', 'begin_date', 'buyruq_file'], 'safe'],
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
        $query = UserPosition::find()->joinWith('company')->joinWith('user');

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
            'xodim_id' => $this->xodim_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'lavozimi', $this->lavozimi])
            ->andFilterWhere(['like', 'begin_date', $this->begin_date])
            ->andFilterWhere(['like', 'buyruq_file', $this->buyruq_file]);

        return $dataProvider;
    }
}
