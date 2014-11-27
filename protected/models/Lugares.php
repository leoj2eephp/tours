<?php

/**
 * This is the model class for table "lugares".
 *
 * The followings are the available columns in table 'lugares':
 * @property integer $id
 * @property integer $lugares_id
 * @property integer $lugar_id
 * @property integer $primera
 * @property double $valor
 */
class Lugares extends CActiveRecord {
    
    public $nombre;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lugares';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('lugar_id, primera', 'required'),
            array('lugares_id, lugar_id, primera, valor', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, lugares_id, lugar_id, primera, valor', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'lugars' => array(self::BELONGS_TO, 'Lugar', 'lugar_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'lugares_id' => 'Lugares',
                    'lugar_id' => 'Lugar',
                    'primera' => 'Primera',
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

        /*$criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('lugares_id',$this->lugares_id);
        $criteria->compare('lugar_id',$this->lugar_id);
        $criteria->compare('primera',$this->primera);*/
        $criteria=new CDbCriteria;
        
        $criteria->compare('t.id',$this->id);
        $criteria->compare('nombre',$this->nombre);
        $criteria->compare('valor',$this->valor);
        
        $criteria->select = 't.id, concat_ws(" / ", ex.nombre, ex2.nombre, ex3.nombre, ex4.nombre, ex5.nombre) AS nombre, t.valor';
        $criteria->join = 'INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1 ';
        $criteria->join .= 'left join lugares AS t2 ON t.lugares_id = t2.id ';
        $criteria->join .= 'left join lugar AS ex2 ON t2.lugar_id = ex2.id ';
        $criteria->join .= 'left join lugares AS t3 ON t2.lugares_id = t3.id ';
        $criteria->join .= 'left join lugar AS ex3 ON t3.lugar_id = ex3.id ';
        $criteria->join .= 'left join lugares AS t4 ON t3.lugares_id = t4.id ';
        $criteria->join .= 'left join lugar AS ex4 ON t4.lugar_id = ex4.id ';
        $criteria->join .= 'left join lugares AS t5 ON t4.lugares_id = t5.id ';
        $criteria->join .= 'left join lugar AS ex5 ON t5.lugar_id = ex5.id ';
        $criteria->condition = 't.primera = 1';
        $criteria->order = 't.id';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Lugares the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public static function getFullName($tpId) {
        $criteria = new CDbCriteria;
        
        $criteria->select = 't.id, concat_ws(" / ", ex.nombre, ex2.nombre, ex3.nombre, ex4.nombre, ex5.nombre) AS nombre';
        $criteria->join = 'INNER JOIN lugar AS ex ON ex.id = t.lugar_id AND t.primera = 1 and ex.tipo_servicio_id = '.$tpId.' ';
        $criteria->join .= 'left join lugares AS t2 ON t.lugares_id = t2.id ';
        $criteria->join .= 'left join lugar AS ex2 ON t2.lugar_id = ex2.id ';
        $criteria->join .= 'left join lugares AS t3 ON t2.lugares_id = t3.id ';
        $criteria->join .= 'left join lugar AS ex3 ON t3.lugar_id = ex3.id ';
        $criteria->join .= 'left join lugares AS t4 ON t3.lugares_id = t4.id ';
        $criteria->join .= 'left join lugar AS ex4 ON t4.lugar_id = ex4.id ';
        $criteria->join .= 'left join lugares AS t5 ON t4.lugares_id = t5.id ';
        $criteria->join .= 'left join lugar AS ex5 ON t5.lugar_id = ex5.id ';
        $criteria->condition = 't.primera = 1';
        $criteria->order = 't.id';
        
        return Lugares::model()->findAll($criteria);
    }
}
