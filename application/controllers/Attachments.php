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
class Attachments extends REST_Controller {

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

    public function attachments_get() {
        $this->load->model("Attachmentsm");
        $id = $this->get('id');
        $user = $this->Attachmentsm->get_all();

        if (!empty($user)) {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response($user, REST_Controller::HTTP_OK);
        }
    }

    
       public function attachmentsh_post() {
       
        $this->load->model("Attachmentsm");

        $send = $this->post('send');
        $recied = $this->post('recied');
        $users = $this->Attachmentsm->order_by('date','DESC')->get_many_by('(send = '.$send.' and  recied = '. $recied .' ) or (send = '. $recied .'  and  recied = '. $send .') ');

        
       // print_r($users);
        
        if ($users) {
            // Set the response and exit
            $this->response(array('success' => 'successdd', 'message' => $users));
        } else {
            // Set the response and exit
            $this->response(array('status' => 'failure', 'message' => 'Sometinghg ierrom')); // NOT_FOUND (404) being the HTTP response code
        }
        $this->response(array('status' => 'failure', 'message' => 'Sometinghg ierrom'));
        
    }
    
 

 

    public function attachments_post() {
        //$this->load->library('form_validation');
        $data = $this->post();

//        if ($this->form_validation->run('user_post') != false) {
            $this->load->model("Attachmentsm");
            $student = $data;
            $student_id = $this->Attachmentsm->insert($student);
            if (!$student_id) {
                $this->response(array('error' => 'failure', 'message' => 'Enter Input not correct '));
            } else {
                $this->response(array('success' => 'successdd', 'message' => 'successdd'));
            }
//        } else {
//            $this->response(array('error' => 'failure', 'message' => 'Input Error'));
//        }
    }

 

 

}
