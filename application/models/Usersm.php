<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersM extends MY_Model {

    protected $_table = 'registration';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $before_create = array('prep_date');

    public function remote_sensitive_date($users) {
        unset($users['password']);
        return $users;
    }

    public function prep_date($users) {
        $users['created_at'] = date('Y-m-d');
        $users['status'] = 1;
        return $users;
    }

    function getLoginSession() {
        return $this->session->userdata('login_data');
    }

    function getSiteLoginSession() {
        return $this->session->userdata('login_site_data');
    }

}
