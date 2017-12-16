<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LandsM extends MY_Model {

    protected $_table = 'land_list';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $before_create = array('created_at');

//    public function remote_sensitive_date($users) {
//        unset($users['address']);
//        return $users;
//    }

    public function created_at($land_list) {

        $land_list['created_at'] = date('Y-m-d');

        return $land_list;
    }
    public function count_lands($id){
        return $this->count_by('id',$id);        
    }
}
