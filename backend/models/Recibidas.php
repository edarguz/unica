<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recibidas".
 *
 * @property integer $id_recibidas
 * @property string $fecha
 * @property string $entidad
 * @property string $persona
 * @property string $fecha_doc
 * @property string $asunto
 * @property string $anexos
 * @property string $id_proceso
 * @property string $id_funcionario
 * @property string $id_serie
 * @property string $id_subserie
 * @property string $id_tipo_doc
 * @property string $archivado_TRD
 * @property string $documento
 * @property string $firma
 * @property string $archivo
 *
 * @property Funcionario $idFuncionario
 * @property Proceso $idProceso
 * @property Serie $idSerie
 * @property Subserie $idSubserie
 * @property Tipodocumental $idTipoDoc
 */
class Recibidas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'recibidas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_recibidas', 'entidad', 'persona', 'fecha_doc', 'asunto', 'anexos', 'id_proceso', 'id_funcionario', 'documento'], 'required','message' => 'Campo requerido'],
            [['id_recibidas', 'id_proceso', 'id_funcionario', 'id_serie', 'id_subserie', 'id_tipo_doc'], 'integer'],
            [['fecha', 'fecha_doc'], 'safe'],
            [['asunto'], 'string'],
            [['entidad', 'archivado_TRD'], 'string', 'max' => 50],
            [['persona', 'anexos'], 'string', 'max' => 60],
            [['documento'], 'string', 'max' => 250],
            [['firma'], 'string', 'max' => 40],
            //[['archivo'], 'string', 'max' => 255],

            [['file'], 'safe'],
            [['file'], 'file', 'extensions'=>'pdf'],

            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Proceso::className(), 'targetAttribute' => ['id_proceso' => 'id_proceso']],
            [['id_serie'], 'exist', 'skipOnError' => true, 'targetClass' => Serie::className(), 'targetAttribute' => ['id_serie' => 'id_serie']],
            [['id_subserie'], 'exist', 'skipOnError' => true, 'targetClass' => Subserie::className(), 'targetAttribute' => ['id_subserie' => 'id_subserie']],
            [['id_tipo_doc'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodocumental::className(), 'targetAttribute' => ['id_tipo_doc' => 'id_tipodocumental']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_recibidas' => Yii::t('app', 'Id Recibidas'),
            'fecha' => Yii::t('app', 'Fecha'),
            'entidad' => Yii::t('app', 'Entidad'),
            'persona' => Yii::t('app', 'Persona'),
            'fecha_doc' => Yii::t('app', 'Fecha Documento'),
            'asunto' => Yii::t('app', 'Asunto'),
            'anexos' => Yii::t('app', 'Anexos'),
            'id_proceso' => Yii::t('app', 'Proceso'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'id_serie' => Yii::t('app', 'Serie'),
            'id_subserie' => Yii::t('app', 'Subserie'),
            'id_tipo_doc' => Yii::t('app', 'Tipo Documental'),
            'archivado_TRD' => Yii::t('app', 'Archivado TRD'),
            'documento' => Yii::t('app', 'Documento'),
            'firma' => Yii::t('app', 'Firma'),
            //'archivo' => Yii::t('app', 'Archivo'),
            'file' => Yii::t('app', 'Archivo pdf'),
        ];
    }


    public function beforeSave($insert)
    {
         $this->fecha =  date('Y-m-d h:m:s');
        
         $this->archivado_TRD = $this->id_serie . $this->id_subserie . $this->id_tipo_doc;
       

         return true;
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
    public function getProceso()
    {
        return $this->hasOne(Proceso::className(), ['id_proceso' => 'id_proceso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSerie()
    {
        return $this->hasOne(Serie::className(), ['id_serie' => 'id_serie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubserie()
    {
        return $this->hasOne(Subserie::className(), ['id_subserie' => 'id_subserie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDoc()
    {
        return $this->hasOne(Tipodocumental::className(), ['id_tipodocumental' => 'id_tipo_doc']);
    }
}
