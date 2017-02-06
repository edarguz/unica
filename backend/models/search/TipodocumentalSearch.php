<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tipodocumental;

/**
 * TipodocumentalSearch represents the model behind the search form about `backend\models\Tipodocumental`.
 */
class TipodocumentalSearch extends Tipodocumental
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipodocumental', 'codigo', 'id_subserie'], 'integer'],
            [['tipodocumental'], 'safe'],
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
        $query = Tipodocumental::find();

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
            'id_tipodocumental' => $this->id_tipodocumental,
            'codigo' => $this->codigo,
            'id_subserie' => $this->id_subserie,
        ]);

        $query->andFilterWhere(['like', 'tipodocumental', $this->tipodocumental]);

        return $dataProvider;
    }
}
