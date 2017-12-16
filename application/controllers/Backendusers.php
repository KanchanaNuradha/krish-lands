<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backendusers extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Backendusersm');
        $data['backenduser'] = $this->Backendusersm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('backendusers/index', $data);
    }

    public function approved_employer($id) {
          if ($id) {
            $data = array('status' => '2');
            $this->load->model('Backendusersm');
            $this->Backendusersm->update($id, $data);
            redirect('backendusers/index/2');
        }
        echo "not success ";
    }

    public function processing_employer($id) {
          if ($id) {
            $data = array('status' => '1');
            $this->load->model('Backendusersm');
            $this->Backendusersm->update($id, $data);
            redirect('backendusers/index/2');
        }
        echo "not success ";
    }
    public function delete_employer() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Backendusersm');
            $this->Backendusersm->delete($id);
            redirect('backendusers/index/39');
        }
        redirect('backendusers/index/40');
    }

}
