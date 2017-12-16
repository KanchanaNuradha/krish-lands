<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Appointmentsm');
        $data['appointments'] = $this->Appointmentsm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('appointments/index', $data);
    }
}