<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends MY_Model {

    protected $_table = 'users';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $after_get = array('remote_sensitive_date');
    protected $before_create = array('prep_date');

    public function remote_sensitive_date($student) {
        unset($student['address']);
        return $student;
    }

    public function prep_date($student) {
        $student['created_at'] = date('Y-m-d');
        return $student;
    }

}
