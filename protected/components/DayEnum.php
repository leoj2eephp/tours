<?php
class DayEnum extends EnumType {
    
    private $DAYS = array("LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO");
    
    public function getFields() {
        return $this->DAYS;
    }

    public static function getArray() {
        $enum[1] = DayEnum::LUNES();
        $enum[2] = DayEnum::MARTES();
        $enum[3] = DayEnum::MIERCOLES();
        $enum[4] = DayEnum::JUEVES();
        $enum[5] = DayEnum::VIERNES();
        $enum[6] = DayEnum::SABADO();
        $enum[0] = DayEnum::DOMINGO();
        return $enum;
    }
    
    public static function getDayById($id) {
        $enum = DayEnum::getArray();
        return $enum[$id];
    }
}