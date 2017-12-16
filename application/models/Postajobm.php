<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PostajobM extends MY_Model {

    protected $_table = 'post_job';
    protected $_primary_key = "id";
    protected $return_type = "array";   
    protected $before_create = array('prep_date');
   
    public function prep_date($student) {
        $student['date'] = date('Y-m-d');
        return $student;
    }

}
