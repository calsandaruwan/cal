<?php

abstract class post_data {

    protected $_string_to_post;
    private $_config;

    public function __construct() {
        $this->_string_to_post = urlencode('this is the sample status');
        $this->_config=$GLOBALS['config']['social'];
    }
    protected function get_config($key){
        return $this->_config[$key];
    }

    abstract public function send();
}

?>