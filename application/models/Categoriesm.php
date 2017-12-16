<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriesM extends MY_Model {

    protected $_table = 'categories';
    protected $_primary_key = "id";
    protected $return_type = "array";

    function categoryDd($id = null) {
        $this->load->database();
        $this->db->select('category_name , id' );
        $this->db->from('categories');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray[''] = 'Select';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = $row['category_name'];
        }
        return $ddarray;
    }
    function categoryFD($id = null) {
        $this->load->database();
        $this->db->select('category_name , id' );
        $this->db->from('categories');
        if ($id) {
            $this->db->where('id =' . $id);
        }
        $query = $this->db->get();
        $ddarray[''] = 'Category';
        foreach ($query->result_array() as $row) {
            $ddarray[$row['id']] = $row['category_name'];
        }
        return $ddarray;
    }

}
