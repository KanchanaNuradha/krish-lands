<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function index() {
    
        $this->db->select('*');
        $this->db->from('registration');
        $query = $this->db->get();
        $user = $query->result_array();
        $data['userList'] = $user;
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('admin/index', $data);
    }

    public function users() {
        $data['session'] = $this->session->userdata('login_data');
        $this->load->model('Mreguser');
        $data['userList'] = $this->Mreguser->getUser();
        $data['userData'] = null;
        $this->load->view('admin/users', $data);
    }

    public function add_users($id = null) {
        $data['session'] = $this->session->userdata('login_data');
        $data['userList'] = -1;
        $data['userData'] = null;
        if ($id) {
            $this->load->model('Mreguser');
            $data['userData'] = $this->Mreguser->getUser($id);
        }
        $this->load->view('admin/users', $data);
    }

    public function save_users() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');

        if ($id == '') {
            if ($this->DataBase->insertQry('registration')) {
                $message = 3;
            }
        } else {
            $this->DataBase->updateQry('registration', $id);
            $message = 2;
        }
        redirect('admin/users/' . $message);
    }

    public function delete_users() {

        $this->load->model('DataBase');

        $number = $this->DataBase->deleteQry('registration', $this->input->post('id'));
        if ($number == 1) {
            $message = 5;
            redirect('admin/users' . $message);
        }
    }

    public function configurtion() {
        $this->load->model('Config');
        $data['session'] = $this->session->userdata('login_data');
        $this->db->select('*');
        $this->db->from('config');
        $this->db->where('id = 1');

        $query = $this->db->get();
        $user = $query->result_array();
        $data['userList'] = $user[0];

        $data['users'] = $this->Config->usersDd();
        //   print_r($user);
        $this->load->view('admin/configurtion', $data);
    }
    
    public function configSave() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');
        $this->DataBase->updateQry('config', $id);
        $message = 2;
        redirect('admin/configurtion');
    }

    public function news() {
        $data['session'] = $this->session->userdata('login_data');
        $this->load->model('Config');
        $data['newsData'] = null;
        $data['newsList'] = $this->Config->getNews();
        $this->load->view('admin/news', $data);
    }

    public function add_news($id = null) {
        $data['session'] = $this->session->userdata('login_data');
        $data['newsList'] = -1;
        $data['newsData'] = null;
        if ($id) {
            $this->load->model('Config');
            $data['newsData'] = $this->Config->getNews();
        }
        $this->load->view('admin/news', $data);
    }

    public function save_news() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');

        if ($id == '') {
            if ($this->DataBase->insertQry('news')) {
                $message = 3;
            }
        } else {
            $this->DataBase->updateQry('news', $id);
            $message = 2;
        }
        redirect('admin/news/' . $message);
    }

    public function delete_news() {
        $this->load->model('DataBase');
        $number = $this->DataBase->deleteQry('news', $this->input->post('id'));
        if ($number == 1) {
            $message = 5;
            redirect('admin/news');
        }
    }

    public function pramotions() {
        $data['session'] = $this->session->userdata('login_data');
        $this->load->model('Config');
        $data['pramoData'] = null;
        $data['pramoList'] = $this->Config->getPromotions();
        $this->load->view('admin/pramotions', $data);
    }

    public function add_pramotions($id = null) {
        $data['session'] = $this->session->userdata('login_data');
        $data['pramoList'] = -1;
        $data['pramoData'] = null;
        if ($id) {
            $this->load->model('Config');
            $data['pramoData'] = $this->Config->getPromotions();
        }
        $this->load->view('admin/pramotions', $data);
    }

    public function save_pramotions() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');

        if ($id == '') {
            if ($this->DataBase->insertQry('pramotions')) {
                $message = 3;
            }
        } else {
            $this->DataBase->updateQry('pramotions', $id);
            $message = 2;
        }
        redirect('admin/pramotions/' . $message);
    }

    public function delete_pramotions() {
        $this->load->model('DataBase');
        $number = $this->DataBase->deleteQry('pramotions', $this->input->post('id'));
        if ($number == 1) {
            $message = 5;
            redirect('admin/pramotions');
        }
    }

    public function chatting() {
        redirect('admin/chatting');
    }

}
