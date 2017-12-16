<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LandsforsellM extends MY_Model {

    protected $_table = 'lands_for_sell';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $before_create = array('prep_date'); 

    public function prep_date($users) {
        $users['date'] = date('Y-m-d');
        return $users;
    }
}