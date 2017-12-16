<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Task extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('my_api');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['task_put']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['task_get']['limit'] = 100; // 100 requests per hour per user/key
    //    $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function task_put() {

        $this->load->library('form_validation');
        $data = remove_unknown_fields($this->put(), $this->form_validation->get_field_names('task_put'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('task_put') != false) {
            $this->load->model("Taskm");
            $student = $data;
            $student_id = $this->Taskm->insert($student);
            if (!$student_id) {
                $this->response(array('status' => 'failure', 'message', $this->form_validation->get_errors_as_array()), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                $this->response(array('success' => 'success', 'message' => 'success'));
            }
        } else {
            $this->response(array('status' => 'failure', 'message', $this->form_validation->get_errors_as_array()), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
        public function task_get() {

        $this->load->model("Taskm");

        $id = $this->get('id');
    //    $user = $this->Taskm->get_by(array('project' => $id));
         
           $user = $this->Taskm->order_by('c_date','DESC')->get_many_by('(project = '.$id.' )');


        if (!empty($user)) {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($user, REST_Controller::HTTP_OK);
        }
    }

    public function taskinf_get() {

        $this->load->model("Taskm");

        $id = $this->get('id');
        $user = $this->Taskm->get_by(array('id' => $id));
         
         //  $user = $this->Taskm->order_by('c_date','DESC')->get_many_by('(project = '.$id.' )');


        if (!empty($user)) {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($user, REST_Controller::HTTP_OK);
        }
    }


    
    
}