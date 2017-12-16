<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LocationsM extends MY_Model {

    protected $_table = 'locations';
    protected $_primary_key = "id";
    protected $return_type = "array";

    function locationDd($id = null) {
        $this->load->database();
        $this->db->select('location , id ');
        $this->db->from('locations');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray[''] = 'Select';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = $row['location'];
        }
        return $ddarray;
    }
    function locationFd($id = null) {
        $this->load->database();
        $this->db->select('location , id ');
        $this->db->from('locations');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray[''] = 'Location';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = $row['location'];
        }
        return $ddarray;
    }

}
