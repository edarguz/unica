<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proceso".
 *
 * @property string $id_proceso
 * @property string $proceso
 * @property string $id_funcionario
 *
 * @property Despachada[] $despachadas
 * @property Funcionario $idFuncionario
 * @property Recibidas[] $recibidas
 */
class Proceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proceso', 'id_funcionario'], 'required'],
            [['id_funcionario'], 'integer'],
            [['proceso'], 'string', 'max' => 40],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proceso' => Yii::t('app', 'Id Proceso'),
            'proceso' => Yii::t('app', 'Proceso'),
            'id_funcionario' => Yii::t('app', 'Id Funcionario'),
        ];
    }


    public static  function  get_proceso(){
          $pr = Proceso::find()->all();

          $pr = ArrayHelper::map($pr, 'id_proceso', 'proceso');

          return $pr;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDespachada()
    {
        return $this->hasMany(Despachada::className(), ['id_proceso' => 'id_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_proceso' => 'id_proceso']);
    }
}
