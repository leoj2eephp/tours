<?php

/**
 * This is the model class for table "servicio_programa".
 *
 * The followings are the available columns in table 'servicio_programa':
 * @property integer $id
 * @property integer $programa_id
 * @property string $fecha
 * @property integer $dia_semana
 * @property string $hora
 * @property integer $tipo_servicio_id
 * @property integer $excursion_id
 * @property integer $entrada
 * @property integer $idioma_guia_id
 */
class ServicioPrograma extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'servicio_programa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('programa_id, dia_semana, hora, tipo_servicio_id, excursion_id, entrada, idioma_guia_id', 'required'),
            array('programa_id, dia_semana, tipo_servicio_id, excursion_id, entrada, idioma_guia_id', 'numerical', 'integerOnly'=>true),
            array('fecha', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, programa_id, fecha, dia_semana, hora, tipo_servicio_id, excursion_id, entrada, idioma_guia_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'extras' => array(self::MANY_MANY, 'Extra', 'extra_servicio(servicio_id, extra_id)'),
            'programa' => array(self::BELONGS_TO, 'Programa', 'programa_id'),
            'tipoServicio' => array(self::BELONGS_TO, 'TipoServicio', 'tipo_servicio_id'),
            //'lugar' => array(self::BELONGS_TO, 'Lugar', 'lugar_id'),
            'idiomaGuia' => array(self::BELONGS_TO, 'Idioma', 'idioma_guia_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'programa_id' => 'Programa',
                    'fecha' => 'Fecha',
                    'dia_semana' => 'Dia Semana',
                    'hora' => 'Hora',
                    'tipo_servicio_id' => 'Tipo Servicio',
                    'excursion_id' => 'Excursion',
                    'entrada' => 'Entrada',
                    'idioma_guia_id' => 'Idioma Guia',
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
            $criteria->compare('programa_id',$this->programa_id);
            $criteria->compare('fecha',$this->fecha,true);
            $criteria->compare('dia_semana',$this->dia_semana);
            $criteria->compare('hora',$this->hora,true);
            $criteria->compare('tipo_servicio_id',$this->tipo_servicio_id);
            $criteria->compare('excursion_id',$this->excursion_id);
            $criteria->compare('entrada',$this->entrada);
            $criteria->compare('idioma_guia_id',$this->idioma_guia_id);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ServicioPrograma the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
}
