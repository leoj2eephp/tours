<?php

/**
 * This is the model class for table "excursion".
 *
 * The followings are the available columns in table 'excursion':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_servicio_id
 * @property double $valor
 */
class Excursion extends CActiveRecord {
    
    public $image = array();
    /*public $sigue_a = array();
    public $joinSeguidaPor;
    public $joinSigueA;
    public $idSeguidas;*/
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'excursion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, tipo_servicio_id', 'required'),
            array('tipo_servicio_id', 'numerical', 'integerOnly'=>true),
            array('nombre', 'length', 'max'=>100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, descripcion, image, tipo_servicio_id,', 'safe', 'on'=>'search'),//, sigue_a joinSeguidaPor, joinSigueA, idSeguidas', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'imagenes' => array(self::MANY_MANY, 'Imagen', 'imagen_excursion(imagen_id, excursion_id)'),
            'tours' => array(self::HAS_MANY, 'Tour', 'excursion_id'),
            'tipoServicio' => array(self::BELONGS_TO, 'TipoServicio', 'tipo_servicio_id'),
            //'sigueA' => array(self::HAS_MANY, 'SigueA', 'seguida_por_id'),
            //'seguidaPor' => array(self::HAS_ONE, 'SigueA', 'sigue_a_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            //'tipo_excursion_id' => 'Tipo Excursion',
            'ruta_imagen' => 'Ruta Imagen',
            //'sigue_a' => 'Sigue a..',
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
        $criteria->compare('descripcion',$this->descripcion,true);

        $criteria->with = array('tipoServicio');
        $criteria->compare('tipoServicio.id', $this->tipo_servicio_id, true);
        $criteria->together = true;
            
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Excursion the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}
