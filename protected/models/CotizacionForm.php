<?php
class CotizacionForm extends CFormModel {
    
    public $id;
    public $nombre;
    public $nombre_pasajero;
    public $fecha_inicio;
    public $fecha_termino;
    public $numero_pax;
    public $fecha;
    public $moneda_id;
    public $asunto_id;
    public $hotel_id;
    public $pais_id;
    
    //Otros objetos
    public $pais;
    public $tipoMoneda;
    public $asunto;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('nombre, nombre_pasajero, pais_id, moneda_id, asunto_id, hotel_id, fecha_inicio, fecha_termino', 'required'),
            array('numero_pax', 'numerical', 'integerOnly'=>true),
            array('numero_pax', 'length', 'max'=>2),
        );
    }
    
    public function attributeLabels() {
        return array(
            'fecha_termino'=>'Fecha Término',
            'pais'=>'País',
            'fecha'=>'Fecha Cotización',
            'nombre_pasajero'=>'Nombre Pasajero o Grupo',
            'nombre'=>'Nombre Cotizante'
        );
    }
    
}