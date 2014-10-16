<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $id
 * @property integer $cotizacion_id
 * @property string $fecha
 * @property string $dia_semana
 * @property string $hora
 * @property integer $n_personas
 * @property integer $tipo_servicio_id
 * @property integer $lugar_id
 * @property integer $entrada
 * @property integer $idioma_guia_id
 * @property double $valor
 *
 * The followings are the available model relations:
 * @property Extra[] $extras
 * @property Cotizacion $cotizacion
 * @property TipoServicio $tipoServicio
 * @property Lugar $lugar
 * @property Idioma $idiomaGuia
 */
class Servicio extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
            return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('cotizacion_id, fecha, n_personas, tipo_servicio_id, lugar_id, idioma_guia_id, valor', 'required'),
                array('cotizacion_id, n_personas, tipo_servicio_id, lugar_id, entrada, idioma_guia_id', 'numerical', 'integerOnly'=>true),
                array('valor', 'numerical'),
                array('dia_semana', 'length', 'max'=>2),
                array('hora', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, cotizacion_id, fecha, dia_semana, hora, n_personas, tipo_servicio_id, lugar_id, entrada, idioma_guia_id, valor', 'safe', 'on'=>'search'),
            );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                    'extras' => array(self::MANY_MANY, 'Extra', 'extra_servicio(servicio_id, extra_id)'),
                    'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'cotizacion_id'),
                    'tipoServicio' => array(self::BELONGS_TO, 'TipoServicio', 'tipo_servicio_id'),
                    'lugar' => array(self::BELONGS_TO, 'Lugar', 'lugar_id'),
                    'idiomaGuia' => array(self::BELONGS_TO, 'Idioma', 'idioma_guia_id'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
            return array(
                'id' => 'ID',
                'cotizacion_id' => 'N° Cotización',
                'fecha' => 'Fecha',
                'dia_semana' => 'Día Semana',
                'hora' => 'Hora',
                'n_personas' => 'N° Personas',
                'tipo_servicio_id' => 'Tipo Servicio',
                'lugar_id' => 'Lugar',
                'entrada' => 'Entrada',
                'idioma_guia_id' => 'Idioma/Guía',
                'valor' => 'Valor',
                'extras.extra_id' => 'Incluye Servicio',
            );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('dia_semana',$this->dia_semana,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('n_personas',$this->n_personas);
		$criteria->compare('tipo_servicio_id',$this->tipo_servicio_id);
		$criteria->compare('lugar_id',$this->lugar_id);
		$criteria->compare('entrada',$this->entrada);
		$criteria->compare('idioma_guia_id',$this->idioma_guia_id);
		$criteria->compare('valor',$this->valor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
