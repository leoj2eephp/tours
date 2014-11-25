<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    
    /**
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $criteria = new CDbCriteria();
        $criteria->condition = "username = :username";
        $criteria->params = array(":username"=>$this->username);
        $usuario = Usuario::model()->find($criteria);
        if(!isset($usuario)) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } elseif (password_verify ($usuario->password, $this->password)) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            //$this->_id=$usuario->clientes[0]->nombre.' '.$usuario->clientes[0]->ape_paterno;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
}