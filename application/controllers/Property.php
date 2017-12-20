<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Property extends MY_Controller 
{
       public function index() 
       {
       	$this->load->model('Landsm');
        $data['lands'] = $this->Landsm->get_all();
        $this->load->model('Categoriesm');
        $data['category'] = $this->Categoriesm->categoryDd();
        $this->load->model('Locationsm');
        $data['location'] = $this->Locationsm->locationDd();
        $this->load->model('Usersm');
        $this->load->model('Offersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('lands/Property', $data);
       }

}

?>
