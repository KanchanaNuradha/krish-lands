<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function mailsettings($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Usersm');
        $this->load->model('Settingsm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['settings'] = null;
        $data['sender'] = $this->Settingsm->get_by(array('key' => 'sender'));
        $data['reciever'] = $this->Settingsm->get_by(array('key' => 'reciever'));
        $this->load->view('settings/mailsettings', $data);
    }

    public function save_mail() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->model('Settingsm');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_mail'));
        $this->form_validation->set_data($data);
        $data1 = array('val' => $this->input->post('sender_mail'));
        $data2 = array('val' => $this->input->post('reciever_mail'));
        $this->Settingsm->update(1, $data1);
        $this->Settingsm->update(2, $data2);
        redirect('settings/mailsettings/2');
    }
    
    public function categories($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Categoriesm');
        $data['categories'] = $this->Categoriesm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('settings/categories', $data);
    }

    public function add_category($id = null) {
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['categories'] = null;
        if ($id) {
            $this->load->model('Categoriesm');
            $data['categories'] = $this->Categoriesm->get_by(array('id' => $id));
        }
        $this->load->view('settings/add_category', $data);
    }

    public function save_category() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_category'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_category') != false) {
            $this->load->model('Categoriesm');
            if ($id) {
                if ($this->Categoriesm->update($id, $data)) {
                    $message = 15;
                }
            } else {
                $this->Categoriesm->insert($data);
                $message = 16;
            }
        } else {
            //  print_r($this->form_validation->get_errors_as_array());
        }
        redirect('settings/categories/' . $message);
    }

    public function publish_category($id) {

        if ($id) {
            $data = array('stat' => '1');
            $this->load->model('Categoriesm');
            $this->Categoriesm->update($id, $data);
            redirect('settings/categories/17');
        }
        redirect('settings/categories/18');
    }

    public function unpublish_category($id) {

        if ($id) {
            $data = array('stat' => '0');
            $this->load->model('Categoriesm');
            $this->Categoriesm->update($id, $data);
            redirect('settings/categories/19');
        }
        redirect('settings/categories/20');
    }

    public function delete_category() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Categoriesm');
            $this->Categoriesm->delete($id);
            redirect('settings/categories/21');
        }
        redirect('settings/categories/22');
    }
    public function locations($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Locationsm');
        $data['locations'] = $this->Locationsm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('settings/locations', $data);
    }

    public function add_location($id = null) {
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['locations'] = null;
        if ($id) {
            $this->load->model('Locationsm');
            $data['locations'] = $this->Locationsm->get_by(array('id' => $id));
        }
        $this->load->view('settings/add_location', $data);
    }

    public function save_location() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_location'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_location') != false) {
            $this->load->model('Locationsm');
            if ($id) {
                if ($this->Locationsm->update($id, $data)) {
                    $message = 23;
                }
            } else {
                $this->Locationsm->insert($data);
                $message = 24;
            }
        } else {
            //  print_r($this->form_validation->get_errors_as_array());
        }
        redirect('settings/locations/' . $message);
    }

    public function publish_location($id) {

        if ($id) {
            $data = array('stat' => '1');
            $this->load->model('Locationsm');
            $this->Locationsm->update($id, $data);
            redirect('settings/locations/25');
        }
        redirect('settings/locations/26');
    }

    public function unpublish_location($id) {

        if ($id) {
            $data = array('stat' => '0');
            $this->load->model('Locationsm');
            $this->Locationsm->update($id, $data);
            redirect('settings/locations/27');
        }
        redirect('settings/locations/28');
    }

    public function delete_location() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Locationsm');
            $this->Locationsm->delete($id);
            redirect('settings/locations/29');
        }
        redirect('settings/locations/40');
    }

}
