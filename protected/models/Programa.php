<?php

/**
 * This is the model class for table "programa".
 *
 * The followings are the available columns in table 'programa':
 * @property integer $id
 * @property string $nombre
 * @property integer $empresa_id
 * @property string $fecha
 * @property string $nombre_programa
 * @property integer $pais_id
 * @property integer $pax_min
 * @property integer $pax_max
 * @property integer $moneda_id
 */
class Programa extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'programa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('nombre, empresa_id, pais_id, pax_min, moneda_id', 'required'),
                array('empresa_id, pais_id, pax_min, pax_max, moneda_id', 'numerical', 'integerOnly'=>true),
                array('nombre, nombre_programa', 'length', 'max'=>100),
                array('fecha', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, nombre, empresa_id, fecha, nombre_programa, pais_id, pax_min, pax_max, moneda_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'serviciosPrograma' => array(self::HAS_MANY, 'ServicioPrograma', 'programa_id'),
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
                    'empresa_id' => 'Empresa',
                    'fecha' => 'Fecha',
                    'nombre_programa' => 'Nombre Programa',
                    'pais_id' => 'País',
                    'pax_min' => 'Pax Mín',
                    'pax_max' => 'Pax Máx',
                    'moneda_id' => 'Moneda',
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
            $criteria->compare('empresa_id',$this->empresa_id);
            $criteria->compare('fecha',$this->fecha,true);
            $criteria->compare('nombre_programa',$this->nombre_programa,true);
            $criteria->compare('pais_id',$this->pais_id);
            $criteria->compare('pax_min',$this->pax_min);
            $criteria->compare('pax_max',$this->pax_max);
            $criteria->compare('moneda_id',$this->moneda_id);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Programa the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
    
}
