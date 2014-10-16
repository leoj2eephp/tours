<?php

/**
 * This is the model class for table "cotizante".
 *
 * The followings are the available columns in table 'cotizante':
 * @property integer $id
 * @property string $nombre
 * @property integer $pais_id
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 * @property Pais $pais
 * @property UsuarioCotizante[] $usuarioCotizantes
 */
class Cotizante extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'cotizante';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('nombre, pais_id', 'required'),
                    array('pais_id', 'numerical', 'integerOnly'=>true),
                    array('nombre', 'length', 'max'=>200),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, nombre, pais_id', 'safe', 'on'=>'search'),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'cotizante_id'),
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
            'usuarioCotizantes' => array(self::HAS_MANY, 'UsuarioCotizante', 'cotizante_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'nombre' => 'Nombre Cotizante',
                    'pais_id' => 'Pais',
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

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cotizante the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}
