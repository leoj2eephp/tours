<?php

/**
 * This is the model class for table "pais".
 *
 * The followings are the available columns in table 'pais':
 * @property integer $id
 * @property string $nombre
 * @property string $nacionalidad
 *
 * The followings are the available model relations:
 * @property Cotizante[] $cotizantes
 * @property Pasajero[] $pasajeros
 */
class Pais extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pais';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre', 'required'),
            array('nombre', 'length', 'max'=>200),
            array('nacionalidad', 'length', 'max'=>10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, nacionalidad', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'cotizantes' => array(self::HAS_MANY, 'Cotizante', 'pais_id'),
                'pasajeros' => array(self::HAS_MANY, 'Pasajero', 'pais_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nombre' => 'País',
            'nacionalidad' => 'Nacionalidad',
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
    public function search() {
            // @todo Please modify the following code to remove attributes that should not be searched.

            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('nombre',$this->nombre,true);
            $criteria->compare('nacionalidad',$this->nacionalidad,true);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pais the static model class
     */
    public static function model($className=__CLASS__) {
            return parent::model($className);
    }

    public static function getDataForDropDownList() {
        $paisesData = array();
        $criteria = new CDbCriteria();
        $criteria->select = array("id", "nombre");
        $paises = Pais::model()->findAll($criteria);
        foreach($paises as $datos) {
            $paisesData[$datos->id] = $datos->nombre;
        }

        return $paisesData;
    }
}