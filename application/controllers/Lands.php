<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lands extends MY_Controller {

    public function landlist($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('Landsm');
        $data['lands'] = $this->Landsm->get_all();
        $this->load->model('Categoriesm');
        $data['category'] = $this->Categoriesm->categoryDd();
        $this->load->model('Locationsm');
        $data['location'] = $this->Locationsm->locationDd();
        $this->load->model('Usersm');
        $this->load->model('Offersm');
        $data['session_data'] = $this->Usersm->getLoginSession();
        $this->load->view('lands/landlist', $data);
    }

    public function post_a_land($id = null) {
        $this->load->model('Usersm');
        $this->load->model('Categoriesm');
        $data['category'] = $this->Categoriesm->categoryDd();
        $this->load->model('Locationsm');
        $data['location'] = $this->Locationsm->locationDd();
        $data['session_data'] = $this->Usersm->getLoginSession();
        $data['lands'] = null;
        if ($id) {
            $this->load->model('Landsm');
            $data['lands'] = $this->Landsm->get_by(array('id' => $id));
        }
        $this->load->view('lands/post_a_land', $data);
    }

    public function save_land() {
        $num = 1;
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_land'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_land') != false) {
            $this->load->model('Landsm');
            $this->load->model('Categoriesm');
            $category_name = $this->Categoriesm->get_by('id', $category);
            $this->load->model('Locationsm');
            $location = $this->Locationsm->get_by('id', $location);
            if ($id) {
                if ($this->Landsm->update($id, $data)) {
                    $message = 5;

                    if ($_FILES["picture"]["name"]) {
                        $qFile_name = null;
                        $image = $this->Landsm->get_by(array('id' => $id));

                        if (file_exists('files/thumb/' . $image['documents'])) {
                            unlink('files/thumb/' . $image['documents']);
                            unlink('files/' . $image['documents']);
                        }
                        $config['upload_path'] = 'files';
                        // $config['upload_path'] = 'files/profile/';
                        $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                        $qFile_name = 'image_' . $id;
                        $type = $_FILES["picture"]["type"];
                        $type = explode('/', $type);
                        if ($type[1] == "jpeg")
                            $type[1] = 'jpg';
//
                        $qFile_name = $qFile_name . "." . $type[1];
                        $config['file_name'] = $qFile_name;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('picture');
//                        // crop image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'files/' . $qFile_name;
                        $config['new_image'] = 'files/thumb/' . $qFile_name;
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
                        $data = array(
                            'documents' => $qFile_name);
                        $this->Landsm->update($id, $data);
                    }
                }
            } else {
                $this->Landsm->insert($data);
                $message = 6;
            }
        } else {
            print_r($this->form_validation->get_errors_as_array());
        }
        redirect('lands/landlist/' . $message);
    }

    public function publish_land($id) {
        if ($id) {
            $data = array('stat' => '1');
            $this->load->model('Landsm');
            $this->Landsm->update($id, $data);
            redirect('lands/landlist/9');
        }
        redirect('lands/landlist/10');
    }

    public function unpublish_land($id) {

        if ($id) {
            $data = array('stat' => '0');
            $this->load->model('Landsm');
            $this->Landsm->update($id, $data);
            redirect('lands/landlist/11');
        }
        redirect('lands/landlist/12');
    }

    public function delete_land() {
        $id = $this->input->post('id');
        if ($id) {
            $this->load->model('Landsm');
            $this->Landsm->delete($id);
            redirect('lands/landlist/13');
        }
        redirect('lands/landlist/14');
    }

//    public function job_description($id) {
//
//        $this->load->model('Usersm');
//
//        $this->load->model('Offersm');
//        $data['documents'] = $this->Offersm->order_by('job_id', $id);
//
//        $this->db->select('*')
//                ->from('api_document_upload')
//                ->where('job_id', $id)
//                ->order_by('order_id');
//        $query = $this->db->get();       
//         $this->load->model('Siteusersm');
//       $data['employee'] = $this->Siteusersm->employeeDd();
//        
//        $data['documents'] = $query->result_array();
//        $this->load->model('Landsm');
//        $data['lands'] = $this->Landsm->get($id);
//        $data['session_data'] = $this->Usersm->getLoginSession();
//        $this->load->view('lands/job_description', $data);
//    }
//
//    public function update_inf() {
//        $this->load->model('Offersm');
//        for ($i = 0; $i < count($_POST["page_id_array"]); $i++) {
//            $update_id = $this->Offersm->update($_POST["page_id_array"][$i], array('order_id' => $i));
//            // echo $i;
//        }
//    }

}
