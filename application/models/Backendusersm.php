<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BackendusersM extends MY_Model {

    protected $_table = 'registration';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $before_create = array('prep_date');

    public function remote_sensitive_date($backenduser) {
        unset($backenduser['password']);
        return $backenduser;
    }

    public function prep_date($backenduser) {
        $backenduser['created_at'] = date('Y-m-d');
        return $backenduser;
    }

    function employerDd($id = null) {
        $this->load->database();
        $this->db->select('id, first_name');
        $this->db->from('employers');
        $this->db->where('status = 1');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray['-1'] = 'All';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = $row['first_name'];
        }
        return $ddarray;
    }

}