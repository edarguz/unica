<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Despachada;

/**
 * DespachadaSearch represents the model behind the search form about `backend\models\Despachada`.
 */
class DespachadaSearch extends Despachada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_despachada', 'consecutivo', 'id_proceso'], 'integer'],
            [['fecha_envio', 'entidad', 'persona', 'asunto', 'anexos', 'devolucion', 'fecha_recibo', 'firma'], 'safe'],
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
        $query = Despachada::find();

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
            'id_despachada' => $this->id_despachada,
            'fecha_envio' => $this->fecha_envio,
            'consecutivo' => $this->consecutivo,
            'id_proceso' => $this->id_proceso,
            'fecha_recibo' => $this->fecha_recibo,
        ]);

        $query->andFilterWhere(['like', 'entidad', $this->entidad])
            ->andFilterWhere(['like', 'persona', $this->persona])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'anexos', $this->anexos])
            ->andFilterWhere(['like', 'devolucion', $this->devolucion])
            ->andFilterWhere(['like', 'firma', $this->firma]);

        return $dataProvider;
    }
}
