<?php

/**
 * This is the model class for table "tipo_servicio".
 *
 * The followings are the available columns in table 'tipo_servicio':
 * @property integer $id
 * @property string $nombre
 * @property boolean $sigueA
 * @property boolean $esLugar
 *
 * The followings are the available model relations:
 * @property Servicio[] $servicios
 */
class TipoServicio extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
            return 'tipo_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('nombre, sigueA, esLugar', 'required'),
                    array('nombre', 'length', 'max'=>100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, nombre, sigueA, esLugar', 'safe', 'on'=>'search'),
            );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                'servicios' => array(self::HAS_MANY, 'Servicio', 'tipo_servicio_id'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
            return array(
                'id' => 'ID',
                'nombre' => 'Servicio',
                'sigueA' => 'Sigue a otro ítem?',
                'esLugar' => 'Es un lugar?',
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
            $criteria->compare('sigueA',$this->sigueA,true);
            $criteria->compare('esLugar',$this->esLugar,true);

            return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
            ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoServicio the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
        
        public static function getDataForDropDownList() {
            $tipoServicioData = array();
            $criteria = new CDbCriteria();
            $criteria->select = array("id", "nombre");
            $tipoServicios = TipoServicio::model()->findAll($criteria);
            foreach($tipoServicios as $datos) {
                $tipoServicioData[$datos->id] = $datos->nombre;
            }

            return $tipoServicioData;
        }
}
