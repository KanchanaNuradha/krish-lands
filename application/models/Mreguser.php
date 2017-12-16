<?php

class Mreguser extends CI_Model {

    function getUser($id = null) {
        $this->load->database();
        $this->db->select('id,companyName,contactName,account,address1,address2,postal_code,city,phone,email,password,type,offer');
        $this->db->from('registration');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();  
        return $query->result_array();
    }
}