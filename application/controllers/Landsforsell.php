<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Landsforsell extends MY_Controller {
    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Landsforsellm');
        $data['landsforsell'] = $this->Landsforsellm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('landsforsell/index', $data);
    }
    public function delete_request() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Landsforsellm');
            $this->Landsforsellm->delete($id);
            redirect('landsforsell/index/2');
        }
        redirect('landsforsell/index/2');
    }
}
