<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Offers extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Offersm');
        $data['offers'] = $this->Offersm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('offers/index', $data);
    }
    
    public function delete_offer() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Offersm');
            $this->Offersm->delete($id);
            redirect('offers/index/2');
        }
        redirect('offers/index/2');
    }
}