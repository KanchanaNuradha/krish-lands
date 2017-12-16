<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siteusers extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Siteusersm');
        $data['siteuser'] = $this->Siteusersm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('siteusers/index', $data);
    }

    public function approved_user($id) {
          if ($id) {
            $data = array('status' => '2');
            $this->load->model('Siteusersm');
            $this->Siteusersm->update($id, $data);
            redirect('siteusers/index/2');
        }
        echo "not success ";
    }

    public function blocked_user($id) {
          if ($id) {
            $data = array('status' => '1');
            $this->load->model('Siteusersm');
            $this->Siteusersm->update($id, $data);
            redirect('siteusers/index/2');
        }
        echo "not success ";
    }
    public function delete_user() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Siteusersm');
            $this->Siteusersm->delete($id);
            redirect('siteusers/index/39');
        }
        redirect('siteusers/index/40');
    }

}
