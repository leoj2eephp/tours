<?php
class AsuntoEnum extends EnumType {
    
    private $ASUNTOS = array("1"=>'COTIZACION', "2"=>'CONFIRMACION');
    
    public function getFields() {
        return $this->ASUNTOS;
    }

}