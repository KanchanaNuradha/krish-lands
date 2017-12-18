<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blogpost extends MY_Controller {

    public function index($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Blogpostm');
        $data['blogposts'] = $this->Blogpostm->get_all();
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('blog/index', $data);
    }

    public function post_a_blog($id = null) {
        $this->load->model('Usersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['blogposts'] = null;
        if ($id) {
            $this->load->model('Blogpostm');
            $data['blogposts'] = $this->Blogpostm->get_by(array('id' => $id));
        }
        $this->load->view('blog/post_a_blog', $data);
    }

    public function save_blog() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_blog'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_blog') != false) {
            $this->load->model('Blogpostm');
            if ($id) {
                if ($this->Blogpostm->update($id, $data)) {
                    $message = 15;
                }
            } else {
                $this->Blogpostm->insert($data);
                $message = 16;
            }
        } else {
            //  print_r($this->form_validation->get_errors_as_array());
        }
        redirect('blogpost/index/' . $message);
    }

    public function publish_blog($id) {

        if ($id) {
            $data = array('stat' => '1');
            $this->load->model('Blogpostm');
            $this->Blogpostm->update($id, $data);
            redirect('blogpost/index/2');
        }
        redirect('blogpost/index/18');
    }

    public function unpublish_blog($id) {

        if ($id) {
            $data = array('stat' => '0');
            $this->load->model('Blogpostm');
            $this->Blogpostm->update($id, $data);
            redirect('blogpost/index/2');
        }
        redirect('blogpost/index/20');
    }

    public function delete_blog() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Blogpostm');
            $this->Blogpostm->delete($id);
            redirect('blog/index/2');
        }
        redirect('blogpost/index/22');
    }

}
