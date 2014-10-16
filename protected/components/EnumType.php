<?php

abstract class EnumType {
    private $val;
 
    public abstract function getFields();
 
    final function __construct( $str ) {
        if ( ! in_array( $str,  $this->getFields() ) ) { 
            throw new \Exception("unknown type value: $str");
        };
        $this->val = $str;
    }   
 
    public static function __callStatic( $func, $args ) { 
        return new static( $func ); 
    }
 
    public function value() {
        return $this->val;
    }   
 
    public function __toString() {
        return $this->value();
    }
}