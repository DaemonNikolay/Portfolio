<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointments;

/**
 * AppointmentsSearch represents the model behind the search form about `app\models\Appointments`.
 */
class AppointmentsSearch extends Appointments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'specialist_id'], 'integer'],
            [['date_of_admission', 'specialist'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Appointments::find();

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

        $query->joinWith('specialist');

        $dataProvider->sort->attributes['specialist'] = [
            'asc' => ['specialists.surname' => SORT_ASC],
            'desc' => ['specialists.surname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['specialty'] = [
            'asc' => ['specialists.specialty' => SORT_ASC],
            'desc' => ['specialists.specialty' => SORT_DESC],
        ];

        $query->andFilterWhere(['like', 'specialist.name', $this->specialist]);
        $query->andFilterWhere(['like', 'specialist.specialty', $this->specialist]);

//         grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'specialist_id' => $this->specialist_id,
        ]);

        $query->andFilterWhere(['like', 'date_of_admission', $this->date_of_admission]);

        return $dataProvider;
    }
}
