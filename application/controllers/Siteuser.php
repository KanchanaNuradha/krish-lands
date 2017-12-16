<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siteuser extends CI_Controller {

    public function signin() {
        
        $this->load->view('site/register_login');
    }

    public function saveuser() {
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_site_user'));
        $this->form_validation->set_data($data);
        $this->load->model('Siteusersm');
        if ($this->form_validation->run('save_site_user') != false) {
            $id = $this->Siteusersm->insert($data);
            $userinf = $this->Siteusersm->get($id);
            $newdata = array(
                'username' => $userinf['first_name'],
                'utype' => $userinf['status'],
                'id' => $userinf['id']
            );
            $this->session->set_userdata('login_site_data', $newdata);
        }
        redirect('welcome/index/' . 2);
    }

    public function loginuser() {
        //  $this->load->view('user/registerSuccess');
        $this->load->model('Siteusersm');
        $userinf = $this->Siteusersm->get_by(array('email' => $this->input->post('username'), 'password' => $this->input->post('pass')));
        if ($userinf['id']) {
            $newdata = array(
                'username' => $userinf['first_name'],
                'utype' => $userinf['status'],
                'id' => $userinf['id']
            );
            $this->session->set_userdata('login_site_data', $newdata);
            redirect('welcome/index/' . 2);
        }
        redirect('siteuser/signin/' . 2);
    }

    public function logout() {
        $this->load->library(array('session'));
        $this->session->sess_destroy();
         redirect('welcome/index/' . 2);
    }

}

?>