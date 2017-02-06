<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Recibidas;

/**
 * RecibidasSearch represents the model behind the search form about `backend\models\Recibidas`.
 */
class RecibidasSearch extends Recibidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_recibidas', 'id_proceso', 'id_funcionario', 'id_serie', 'id_subserie', 'id_tipo_doc'], 'integer'],
            [['fecha', 'entidad', 'persona', 'fecha_doc', 'asunto', 'anexos', 'archivado_TRD', 'documento', 'firma', 'archivo'], 'safe'],
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
        $query = Recibidas::find();

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
            'id_recibidas' => $this->id_recibidas,
            'fecha' => $this->fecha,
            'fecha_doc' => $this->fecha_doc,
            'id_proceso' => $this->id_proceso,
            'id_funcionario' => $this->id_funcionario,
            'id_serie' => $this->id_serie,
            'id_subserie' => $this->id_subserie,
            'id_tipo_doc' => $this->id_tipo_doc,
        ]);

        $query->andFilterWhere(['like', 'entidad', $this->entidad])
            ->andFilterWhere(['like', 'persona', $this->persona])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'anexos', $this->anexos])
            ->andFilterWhere(['like', 'archivado_TRD', $this->archivado_TRD])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'firma', $this->firma])
            ->andFilterWhere(['like', 'archivo', $this->archivo]);

        return $dataProvider;
    }
}
