<?php

/**
 * This is the model class for table "sigue_a".
 *
 * The followings are the available columns in table 'sigue_a':
 * @property integer $id
 * @property integer $seguida_por_id
 * @property integer $sigue_a_id
 */
class SigueA extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sigue_a';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('seguida_por_id, sigue_a_id', 'required'),
            array('seguida_por_id, sigue_a_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, seguida_por_id, sigue_a_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'excursion' => array(self::BELONGS_TO, 'Excursion', 'seguida_por_id'),
            'excursion2' => array(self::HAS_ONE, 'Excursion', 'sigue_a_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'seguida_por_id' => 'Seguida Por',
            'sigue_a_id' => 'Sigue A',
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
            $criteria->compare('seguida_por_id',$this->seguida_por_id);
            $criteria->compare('sigue_a_id',$this->sigue_a_id);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SigueA the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}
