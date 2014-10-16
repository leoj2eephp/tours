<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $id
 * @property integer $cotizante_id
 * @property integer $moneda_id
 * @property integer $asunto_id
 * @property string $fecha
 * @property string $nombre_pasajero
 * @property integer $numero_pax
 * @property integer $hotel_id
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property integer $arrivo_cjc_id
 * @property integer $salida_cjc_id
 *
 * The followings are the available model relations:
 * @property Cotizante $cotizante
 * @property Moneda $moneda
 * @property Asunto $asunto
 * @property Hotel $hotel
 * @property Pasajero[] $pasajeros
 * @property Servicio[] $servicios
 */
class Cotizacion extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cotizacion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cotizante_id, moneda_id, asunto_id, fecha, nombre_pasajero, numero_pax, hotel_id, fecha_inicio, fecha_termino', 'required'),
            array('cotizante_id, moneda_id, asunto_id, numero_pax, hotel_id', 'numerical', 'integerOnly'=>true),
            array('nombre_pasajero', 'length', 'max'=>200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, cotizante_id, moneda_id, asunto_id, fecha, nombre_pasajero, numero_pax, hotel_id, fecha_inicio, fecha_termino, arrivo_cjc_id, salida_cjc_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'arrivoCjc' => array(self::BELONGS_TO, 'ArrivoCjc', 'arrivo_cjc_id'),
            'cotizante' => array(self::BELONGS_TO, 'Cotizante', 'cotizante_id'),
            'moneda' => array(self::BELONGS_TO, 'Moneda', 'moneda_id'),
            'asunto' => array(self::BELONGS_TO, 'Asunto', 'asunto_id'),
            'hotel' => array(self::BELONGS_TO, 'Hotel', 'hotel_id'),
            'salidaCjc' => array(self::BELONGS_TO, 'SalidaCjc', 'salida_cjc_id'),
            'pasajeros' => array(self::HAS_MANY, 'Pasajero', 'cotizacion_id'),
            'servicios' => array(self::HAS_MANY, 'Servicio', 'cotizacion_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'cotizante_id' => 'Cotizante',
                    'moneda_id' => 'Moneda',
                    'asunto_id' => 'Asunto',
                    'fecha' => 'Fecha',
                    'nombre_pasajero' => 'Nombre Pasajero',
                    'numero_pax' => 'Numero Pax',
                    'hotel_id' => 'Hotel',
                    'fecha_inicio' => 'Fecha Inicio',
                    'fecha_termino' => 'Fecha Termino',
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
            $criteria->compare('cotizante_id',$this->cotizante_id);
            $criteria->compare('moneda_id',$this->moneda_id);
            $criteria->compare('asunto_id',$this->asunto_id);
            $criteria->compare('fecha',$this->fecha,true);
            $criteria->compare('nombre_pasajero',$this->nombre_pasajero,true);
            $criteria->compare('numero_pax',$this->numero_pax);
            $criteria->compare('hotel_id',$this->hotel_id);
            $criteria->compare('fecha_inicio',$this->fecha_inicio,true);
            $criteria->compare('fecha_termino',$this->fecha_termino,true);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cotizacion the static model class
     */
    public static function model($className=__CLASS__) {
            return parent::model($className);
    }
}
