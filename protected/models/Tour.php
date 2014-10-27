<?php

/**
 * This is the model class for table "tour".
 *
 * The followings are the available columns in table 'tour':
 * @property integer $id
 * @property integer $tour_id
 * @property integer $excursion_id
 * @property integer $primera
 * @property integer $tipo_excursion_id
 */
class Tour extends CActiveRecord {
    
    public $nombre;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tour';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('primera, tipo_excursion_id', 'required'),
            array('tour_id, excursion_id, primera, tipo_excursion_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tour_id, excursion_id, primera, tipo_excursion_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'excursions' => array(self::BELONGS_TO, 'Excursion', 'excursion_id'),
            'tipoExcursion' => array(self::BELONGS_TO, 'TipoExcursion', 'tipo_excursion_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tour_id' => 'Tour',
            'excursion_id' => 'Excursion',
            'primera' => 'Primera',
            'nombre' => 'Tours',
            'tipo_excursion_id' => 'Tipo Excursión',
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
            //$criteria->with = array('excursions');
            $criteria->compare('t.id',$this->id);
            $criteria->compare('nombre',$this->nombre);
            //$criteria->compare('tipo_excursion_id',$this->tipo_excursion_id);
            /*$criteria->compare('tour_id',$this->tour_id);
            $criteria->compare('excursion_id',$this->excursion_id);
            $criteria->compare('primera',$this->primera);*/
            //$criteria->together = true;
            
            $criteria->select = 't.id, concat_ws(" / ", ex.nombre, ex2.nombre, ex3.nombre, ex4.nombre, ex5.nombre) AS nombre';
            $criteria->join = 'INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1 ';
            $criteria->join .= 'left join tour AS t2 ON t.tour_id = t2.id ';
            $criteria->join .= 'left join excursion AS ex2 ON t2.excursion_id = ex2.id ';
            $criteria->join .= 'left join tour AS t3 ON t2.tour_id = t3.id ';
            $criteria->join .= 'left join excursion AS ex3 ON t3.excursion_id = ex3.id ';
            $criteria->join .= 'left join tour AS t4 ON t3.tour_id = t4.id ';
            $criteria->join .= 'left join excursion AS ex4 ON t4.excursion_id = ex4.id ';
            $criteria->join .= 'left join tour AS t5 ON t4.tour_id = t5.id ';
            $criteria->join .= 'left join excursion AS ex5 ON t5.excursion_id = ex5.id ';
            $criteria->condition = 't.primera = 1';
            $criteria->order = 't.id';
            
            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tour the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public static function getFullName($id) {
        $criteria = new CDbCriteria;
        
        $criteria->select = 't.id, concat_ws(" / ", ex.nombre, ex2.nombre, ex3.nombre, ex4.nombre, ex5.nombre) AS nombre';
        $criteria->join = 'INNER JOIN excursion AS ex ON ex.id = t.excursion_id AND t.primera = 1 ';
        $criteria->join .= 'left join tour AS t2 ON t.tour_id = t2.id ';
        $criteria->join .= 'left join excursion AS ex2 ON t2.excursion_id = ex2.id ';
        $criteria->join .= 'left join tour AS t3 ON t2.tour_id = t3.id ';
        $criteria->join .= 'left join excursion AS ex3 ON t3.excursion_id = ex3.id ';
        $criteria->join .= 'left join tour AS t4 ON t3.tour_id = t4.id ';
        $criteria->join .= 'left join excursion AS ex4 ON t4.excursion_id = ex4.id ';
        $criteria->join .= 'left join tour AS t5 ON t4.tour_id = t5.id ';
        $criteria->join .= 'left join excursion AS ex5 ON t5.excursion_id = ex5.id ';
        $criteria->condition = 't.primera = 1';
        $criteria->order = 't.id';
        
        return Tour::model()->findByPk($id, $criteria);
    }
    
}