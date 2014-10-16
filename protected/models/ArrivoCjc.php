<?php

/**
 * This is the model class for table "arrivo_cjc".
 *
 * The followings are the available columns in table 'arrivo_cjc':
 * @property integer $id
 * @property string $fecha
 * @property string $hora_vuelo
 * @property string $num_vuelo
 * @property integer $linea_aerea_id
 * @property string $hora_pickup
 * @property integer $idioma_id
 * @property integer $detalle_servicio_id
 * @property double $valor
 *
 * The followings are the available model relations:
 * @property DetalleServicio $detalleServicio
 * @property Idioma $idioma
 * @property LineaAerea $lineaAerea
 * @property Cotizacion[] $cotizacions
 * @property Extra[] $extras
 */
class ArrivoCjc extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'arrivo_cjc';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha, linea_aerea_id, idioma_id, detalle_servicio_id', 'required'),
            array('linea_aerea_id, idioma_id, detalle_servicio_id', 'numerical', 'integerOnly'=>true),
            array('valor', 'numerical'),
            array('num_vuelo', 'length', 'max'=>40),
            array('hora_vuelo, hora_pickup', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, fecha, hora_vuelo, num_vuelo, linea_aerea_id, hora_pickup, idioma_id, detalle_servicio_id, valor', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'detalleServicio' => array(self::BELONGS_TO, 'DetalleServicio', 'detalle_servicio_id'),
            'idioma' => array(self::BELONGS_TO, 'Idioma', 'idioma_id'),
            'lineaAerea' => array(self::BELONGS_TO, 'LineaAerea', 'linea_aerea_id'),
            'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'arrivo_cjc_id'),
            'extras' => array(self::MANY_MANY, 'Extra', 'extra_arrivo(arrivo_cjc_id, extra_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'fecha' => 'Fecha arrivo CJC',
            'hora_vuelo' => 'Hora Vuelo',
            'num_vuelo' => 'N° Vuelo',
            'linea_aerea_id' => 'Línea Aerea',
            'hora_pickup' => 'Hora Pick Up',
            'idioma_id' => 'Idioma',
            'detalle_servicio_id' => 'Incluye',
            'valor' => 'Valor',
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
            $criteria->compare('fecha',$this->fecha,true);
            $criteria->compare('hora_vuelo',$this->hora_vuelo,true);
            $criteria->compare('num_vuelo',$this->num_vuelo,true);
            $criteria->compare('linea_aerea_id',$this->linea_aerea_id);
            $criteria->compare('hora_pickup',$this->hora_pickup,true);
            $criteria->compare('idioma_id',$this->idioma_id);
            $criteria->compare('detalle_servicio_id',$this->detalle_servicio_id);
            $criteria->compare('valor',$this->valor);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ArrivoCjc the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}