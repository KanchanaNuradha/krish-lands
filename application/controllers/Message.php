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
class Message extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('my_api');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function message_get() {

        $this->load->model("Messagem");

        $id = $this->get('id');
        $user = $this->Messagem->get_all();

        if (!empty($user)) {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($user, REST_Controller::HTTP_OK);
        }
    }

 
 public function messageh_post() {
       
        $this->load->model("Messagem");

        $send = $this->post('send');
        $recied = $this->post('recied');
           $users = $this->Messagem->order_by('date','DESC')->get_many_by('(send = '.$send.' and  recied = '. $recied .' ) or (send = '. $recied .'  and  recied = '. $send .') ');

        
        //print_r($users);
        
        if ($users) {
            // Set the response and exit
            $this->response(array('success' => 'successdd', 'message' => $users));
        } else {
            // Set the response and exit
            $this->response(array('status' => 'failure', 'message' => 'Sometinghg ierrom')); // NOT_FOUND (404) being the HTTP response code
        }
        $this->response(array('status' => 'failure', 'message' => 'Sometinghg ierrom'));
        
    }


    public function message_put() {
        $this->load->library('form_validation');
        $data = remove_unknown_fields($this->put(), $this->form_validation->get_field_names('user_put'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('user_put') != false) {
            $this->load->model("Model");
            $student = $data;
            $student_id = $this->Model->insert($student);
            if (!$student_id) {
                $this->response(array('status' => 'failure', 'message', $this->form_validation->get_errors_as_array()), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                $this->response(array('success' => 'successdd', 'message' => 'successdd'));
            }
        } else {
            $this->response(array('status' => 'failure', 'message', $this->form_validation->get_errors_as_array()), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function message_post() {
        //$this->load->library('form_validation');
        $data = $this->post();

//        if ($this->form_validation->run('user_post') != false) {
            $this->load->model("Messagem");
            $student = $data;
            $student_id = $this->Messagem->insert($student);
            if (!$student_id) {
                $this->response(array('error' => 'failure', 'message' => 'Enter Input not correct '));
            } else {
                $this->response(array('success' => 'successdd', 'message' => 'successdd'));
            }
//        } else {
//            $this->response(array('error' => 'failure', 'message' => 'Input Error'));
//        }
    }

 

    public function message_delete() {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0) {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}
