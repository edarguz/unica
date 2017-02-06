<?php

namespace backend\models;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property string $id_funcionario
 * @property string $identificacion
 * @property string $nombres
 * @property string $apellidos
 *
 * @property Cargo[] $cargos
 * @property Motivoausencia[] $motivoausencias
 * @property Proceso[] $procesos
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
      public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identificacion', 'nombres', 'apellidos'], 'required'],
            [['identificacion'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_funcionario' => Yii::t('app', 'Id Funcionario'),
            'identificacion' => Yii::t('app', 'Identificacion'),
            'nombres' => Yii::t('app', 'Nombres'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'fullName' => Yii::t('app', 'Funcionario')
        ];
    }


     public function getFullName() {
      return $this->nombres . ' ' . $this->apellidos;
    }

     public static  function  get_funcionario(){
          $func = Funcionario::find()->all();
          $func = ArrayHelper::map($func, 'id_funcionario', 'identificacion');

          return $func;

    }

    public static  function  get_funcionarioName(){
          $nam = Funcionario::find()->all();
          $nam = ArrayHelper::map($nam, 'id_funcionario', 'nombres', 'apellidos');

          return $nam;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProceso()
    {
        return $this->hasMany(Proceso::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibidas()
    {
        return $this->hasMany(Recibidas::className(), ['id_funcionario' => 'id_funcionario']);
    }
}
