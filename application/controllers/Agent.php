<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Usersm');
        $data['users'] = $this->Usersm->get_all();
        $data['type'] = array('' => '', 1 => 'Admin', 2 => 'Agent');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('agent/index', $data);
    }

    public function add_agent($id = null) {
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['user'] = null;
        if ($id) {
            $data['user'] = $this->Usersm->get_by(array('id' => $id));
        }
        $this->load->view('agent/add_agent', $data);
    }

    public function save_agent() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_agent'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_agent') != false) {
            $this->load->model('Usersm');
            if ($id) {
                if ($this->Usersm->update($id, $data)) {
                    $message = 19;
                }
            } else {

                $count = $this->Usersm->count_by('email', $data['email']);
                if ($count == 0) {
                    $id = $this->Usersm->insert($data);
                    $rand = substr(md5(microtime()), rand(0, 26), 20);
                    $data2 = array('password' => $rand);
                    $this->Usersm->update($id, $data2);
                    $this->load->library('email');
                    $this->email->from('info@dsquaretec.com', 'ALJ Email');
                    $this->email->to($data['email']);
                    $this->email->set_mailtype("html");
                    $this->email->subject('ALJ  New User Registration ');
                    $email_body = "Please use following username and password to login the system <br>";
                    $email_body .= " Username : " . $data['email'] . "<br>  Password " . $rand;
                    $this->email->message($email_body);
                    $this->email->send();
                    $message = 13;
                } else {
                    $message = 7;
                }
            }
        } else {
            //  print_r($this->form_validation->get_errors_as_array());
        }
        redirect('agent/index/' . $message);
    }

    public function publish_agent($id) {

        if ($id) {
            $data = array('status' => '1');
            $this->load->model('Usersm');
            $this->Usersm->update($id, $data);
            redirect('agent/index/15');
        }
        redirect('agent/index/36');
    }

    public function unpublish_agent($id) {

        if ($id) {
            $data = array('status' => '0');
            $this->load->model('Usersm');
            $this->Usersm->update($id, $data);
            redirect('agent/index/14');
        }
        redirect('agent/index/37');
    }

    public function delete_agent() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Countryzonem');
            $this->Countryzonem->delete($id);
            redirect('ratesheet/countryzone/');
        }
        redirect('agent/index/38');
    }

    public function change_password($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('agent/change_password', $data);
    }

    public function save_change_password() {
        $this->load->model('Usersm');
        $user_inf = $this->Usersm->getLoginSession();

        $userinf = $this->Usersm->get_by(array('id' => $user_inf['id'], 'password' => $this->input->post('password')));

        if ($userinf) {
            $data = array('password' => $this->input->post('pass1'));
            $this->Usersm->update($user_inf['id'], $data);
            redirect('admin/index/56');
        } else {
            redirect('admin/index/57');
        }
    }

    public function user_profile($msg = null) {
        if ($msg)
            $data['msg'] = $msg;

        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['userinf'] = $this->Usersm->get_by(array('id' => $data['session_data']['id'])); 
        $this->load->view('agent/user_profile', $data);
    }

    public function save_agent_inf() {

        if ($_FILES["picture"]["name"]) {
            $this->load->model('Usersm');
            $qFile_name = 'prof_' . $this->input->post('id');
            $userinf = $this->Usersm->get_by(array('id' => $this->input->post('id')));

            if (file_exists('files/prof/thumb/' . $userinf['image'])) {
                unlink('files/prof/thumb/' . $userinf['image']);
                unlink('files/prof/' . $userinf['image']);
            }
            $config['upload_path'] = 'files/prof';
            // $config['upload_path'] = 'files/profile/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $qFile_name = 'prof_' . $this->input->post('id');
            $type = $_FILES["picture"]["type"];
            $type = explode('/', $type);
            if ($type[1] == "jpeg")
                $type[1] = 'jpg';

            $qFile_name = $qFile_name . "." . $type[1];
            $config['file_name'] = $qFile_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('picture');
            // crop image
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'files/prof/' . $qFile_name;
            $config['new_image'] = 'files/prof/thumb/' . $qFile_name;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = "";
            $config['width'] = 200;
            $config['height'] = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                $this->upload_error = $this->image_lib->display_errors();
                $this->image_lib->clear();
                return false;
            }
            $data = array('image' => $qFile_name);
            $this->Usersm->update($this->input->post('id'), $data);
            redirect('agent/user_profile');
        }
    }

}
