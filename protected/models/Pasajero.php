<?php

/**
 * This is the model class for table "pasajero".
 *
 * The followings are the available columns in table 'pasajero':
 * @property integer $id
 * @property string $nombre
 * @property integer $pais_id
 * @property string $fecha_nac
 * @property string $pasaporte
 * @property string $observaciones
 * @property integer $cotizacion_id
 */
class Pasajero extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pasajero';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, pais_id, fecha_nac, pasaporte, cotizacion_id', 'required'),
            array('pais_id, cotizacion_id', 'numerical', 'integerOnly'=>true),
            array('nombre', 'length', 'max'=>200),
            array('pasaporte', 'length', 'max'=>30),
            array('observaciones', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, pais_id, fecha_nac, pasaporte, observaciones, cotizacion_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'cotizacion_id'),
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'nombre' => 'Nombre',
                    'pais_id' => 'Pais',
                    'fecha_nac' => 'Fecha Nac',
                    'pasaporte' => 'Pasaporte',
                    'observaciones' => 'Observaciones',
                    'cotizacion_id' => 'Cotizacion',
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
            $criteria->compare('nombre',$this->nombre,true);
            $criteria->compare('pais_id',$this->pais_id);
            $criteria->compare('fecha_nac',$this->fecha_nac,true);
            $criteria->compare('pasaporte',$this->pasaporte,true);
            $criteria->compare('observaciones',$this->observaciones,true);
            $criteria->compare('cotizacion_id',$this->cotizacion_id);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pasajero the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}
