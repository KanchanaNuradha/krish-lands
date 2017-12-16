<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiteusersM extends MY_Model {

    protected $_table = 'siteusers';
    protected $_primary_key = "id";
    protected $return_type = "array";

    function employeeDd($id = null) {
        $this->load->database();
        $this->db->select('id, first_name,email,telephone');
        $this->db->from('siteusers');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray[''] = 'Select';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = 'Name :'.$row['first_name'].'   <br>  Email '.$row['email'].' <br> Telephone'.$row['telephone'];
        }
        return $ddarray;
    }

}
