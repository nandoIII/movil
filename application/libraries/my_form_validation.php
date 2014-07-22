<?php

/**
 * Description of my_form_validation
 *
 * @author Hernando Penha <hernando.pena at elheraldo.co>
 */
class MY_Form_validation extends CI_Form_validation {

    public function __construct($config = array()) {
        parent::__construct($config);
    }

    public function error_array() {
        if (count($this->_error_array > 0)) {
            return $this->_error_array;
        }
        
    }

}
