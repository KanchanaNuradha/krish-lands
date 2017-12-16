<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('site/index.php');
    }

    public function about() {
        $this->load->view('site/about.php');
    }

    public function properties() {
        $this->load->view('site/properties.php');
    }

    public function blog() {
        $this->load->view('site/blog.php');
    }

    public function contact() {
        $this->load->view('site/contact.php');
    }

    public function icons() {
        $this->load->view('site/icons.php');
    }

    public function property_details() {
        $this->load->view('site/property-details.php');
    }

    public function single() {
        $this->load->view('site/single.php');
    }

    public function typography() {
        $this->load->view('site/typography.php');
    }

//    public function find_job() {
//        $this->load->model('Usersm');
//        $this->load->model('Categoriesm');
//        $this->load->model('Locationsm');
//        $this->load->model('Jobsm');
//        $data['location'] = $this->Locationsm->locationFd();
//        $data['jobs'] = $this->Jobsm->get_all();
//        $data['category'] = $this->Categoriesm->categoryFd();
//        $data['session_data'] = $this->Usersm->getSiteLoginSession();
//        $this->load->view('site/find_job', $data);
//    }
//
//    public function post_job($num = null) {
//        $this->load->model('Usersm');
//        $data['num'] = $num;
//        $data['session_data'] = $this->Usersm->getSiteLoginSession();
//        $this->load->view('site/post_job', $data);
//    }
//
//    public function save_post_job() {
//        $this->load->model('Usersm');
//        $data['session_data'] = $this->Usersm->getSiteLoginSession();
//        $this->load->model('Postajobm');
//
//
//        $this->load->library('form_validation');
//        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_post_job'));
//        $this->form_validation->set_data($data);
//        if ($this->form_validation->run('save_post_job') != false) {
//            $jobid = $this->Postajobm->insert($data);
//            $config['upload_path'] = 'doc/';
//            // $config['upload_path'] = 'files/profile/';
//            $config['allowed_types'] = '*';
//            $type = array('application/pdf' => 'pdf',
//                'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx');
//            $config['max_size'] = 10000;
//            $qFile_name = 'doc_' . $jobid;
//            $type = $type[$_FILES["cv"]["type"]];
//
//            echo $_FILES["cv"]["type"];
//            $qFile_name = $qFile_name . "." . $type;
//            $config['file_name'] = $qFile_name;
//            $this->load->library('upload', $config);
//            $this->upload->initialize($config);
//            print_r($this->upload->do_upload('cv'));
//            $error = array('error' => $this->upload->display_errors());
//            print_r($error);
//            $data = array(
//                'documents' => $qFile_name);
//            $this->Postajobm->update($jobid, $data);
//        }
//        redirect('welcome/post_job/1');
//        // $this->load->view('site/post_job', $data);
//    }
//
//    public function service() {
//        $this->load->model('Usersm');
//        $data['session_data'] = $this->Usersm->getSiteLoginSession();
//        $this->load->view('site/service', $data);
//    }
//
//    public function contact1($num = null) {
//        $this->load->model('Usersm');
//        $data['num'] = $num;
//        $data['session_data'] = $this->Usersm->getSiteLoginSession();
//        $this->load->view('site/contact', $data);
//    }
//
//    public function save_contact() {
//        print_r($this->input->post());
//        $this->load->library('email');
//        $this->email->from('info@mobizz.lk', 'Mobizz Website Contect us ');
//        $this->email->to('info@mobizz.lk');
//        $this->email->set_mailtype("html");
//        $this->email->subject('Mobizz Website Contect us');
//        $email_body = "First Name :  " . $this->input->post('fname') . "<br>";
//        $email_body .= "Last Name :  " . $this->input->post('lname') . "<br>";
//        $email_body .= "Email  :  " . $this->input->post('email') . "<br>";
//        $email_body .= "Message:  " . $this->input->post('message') . "<br>";
//        $this->email->message($email_body);
//        $this->email->send();
//        redirect('welcome/contact/1');
//    }
//
//    public function cvupload() {
//        $userid = $this->input->post('user');
//        $this->load->model('Siteusersm');
//
//        if (!$userid) {
//            $this->load->library('form_validation');
//            $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('cv_upload_user'));
//            $this->form_validation->set_data($data);
//            $this->load->model('Siteusersm');
//            if ($this->form_validation->run('cv_upload_user') != false) {
//                $userid = $this->Siteusersm->insert($data);
//            }
//        }
//        // upload document function
//
//        $this->load->model('Documentm');
//        $docid = $this->Documentm->insert(array('user' => $userid, 'job_id' => $this->input->post('job_id')));
//
//        $config['upload_path'] = 'cv/';
//        // $config['upload_path'] = 'files/profile/';
//        $config['allowed_types'] = '*';
//        $type = array('application/pdf' => 'pdf',
//            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx');
//        $config['max_size'] = 10000;
//        $qFile_name = 'cv_' . $docid;
//        $type = $type[$_FILES["cv"]["type"]];
//
//
//        $qFile_name = $qFile_name . "." . $type;
//        $config['file_name'] = $qFile_name;
//        $this->load->library('upload', $config);
//        $this->upload->initialize($config);
//        $this->upload->do_upload('cv');
////        $error = array('error' => $this->upload->display_errors());
////        print_r($error);
//        $data = array(
//            'document' => $qFile_name);
//        $this->Documentm->update($docid, $data);
//        redirect('welcome/index');
//    }
//
//    public function docupload() {
//        $userid = $this->input->post('user');
//        $this->load->model('Siteusersm');
//
//        if (!$userid) {
//            $this->load->library('form_validation');
//            $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('cv_upload_user'));
//            $this->form_validation->set_data($data);
//            $this->load->model('Siteusersm');
//            if ($this->form_validation->run('cv_upload_user') != false) {
//                $userid = $this->Siteusersm->insert($data);
//            }
//        }
//        // upload document function
//
//        $this->load->model('Documentm');
//        $docid = $this->Documentm->insert(array('user' => $userid, 'job_id' => $this->input->post('job_id')));
//
//        $config['upload_path'] = 'cv/';
//        // $config['upload_path'] = 'files/profile/';
//        $config['allowed_types'] = '*';
//        $type = array('application/pdf' => 'pdf',
//            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx');
//        $config['max_size'] = 10000;
//        $qFile_name = 'cv_' . $docid;
//        $type = $type[$_FILES["cv"]["type"]];
//
//
//        $qFile_name = $qFile_name . "." . $type;
//        $config['file_name'] = $qFile_name;
//        $this->load->library('upload', $config);
//        $this->upload->initialize($config);
////        print_r($this->upload->do_upload('cv'));
////        $error = array('error' => $this->upload->display_errors());
////        print_r($error);
//        $data = array(
//            'document' => $qFile_name);
//        $this->Documentm->update($docid, $data);
//        redirect('welcome/index');
//    }

}
