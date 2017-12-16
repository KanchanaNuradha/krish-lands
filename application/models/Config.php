<?php

class Config extends CI_Model {

    function countryDd($id = null) {
        $this->load->database();
        $this->db->select('distinct(country) , code');
        $this->db->from('rate');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray = array();
        $ddarray[''] = 'Select';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['code']] = $row['country'];
        }
        return $ddarray;
    }

    function usersDd($id = null) {
        $this->load->database();
        $this->db->select('distinct(companyName) , id');
        $this->db->from('registration');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray = array();
        $ddarray[''] = 'Select';
        foreach ($query->result_array() as $row) {
            if($row['companyName']){
            $ddarray[$row['id']] = $row['companyName'];
            }
        }
        return $ddarray;
    }

    function getUser($id = null) {
        $this->load->database();
        $this->db->select('companyName ,contactName,account,address1,address2,postal_code,city,phone,email,type');
        $this->db->from('registration');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $user = $query->result_array();
        return $user['0'];
    }

    function getUserAddress($id = null) {
        $this->load->database();
        $this->db->select('id,uid,address');
        $this->db->from('address');
        if ($id) {
            $this->db->where('uid =' . $id);
        }
        $query = $this->db->get();
        $user = $query->result_array();
        return $user;
    }

    function getNews($id = null) {
        $this->load->database();
        $this->db->select('id,stat,news');
        $this->db->from('news');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPromotions($id = null) {
        $this->load->database();
        $this->db->select('id,title,description,stat,date');
        $this->db->from('pramotions');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

}
