<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller {

    public function index($msg = null) {

        // Payment         
        $this->load->model('Paymentm');
        $payments = $this->Paymentm->get_many(array('stat' => 1));
        foreach ($payments as $pay) {
            $this->load->library('email');
            $this->email->from('info@dsquaretec.com', 'ALJ Email');
            $this->email->to('gayandusmantha@gmail.com,isuru@fedexlk.com ');
            $this->email->set_mailtype("html");
            $this->email->subject('ALJ Payment Information');
            $email_body = "Amount :  " . $pay['amount']."<br>";
            $email_body .= "Ref Number :  " . $pay['ref_number']."<br>";
            $email_body .= "Customer Name  :  " . $pay['name_cus']."<br>";
            $email_body .= "Company :  " . $pay['company']."<br>";
            $email_body .= "Address :  " . $pay['address']."<br>";
            $email_body .= "Postal Code  :  " . $pay['postal_code']."<br>";
            $email_body .= "City :  " . $pay['city']."<br>";
            $email_body .= "Phone :  " . $pay['phone']."<br>";
            $email_body .= "Email :  " . $pay['email']."<br>";
            $email_body .= "Date :  " . $pay['created_at']."<br>";
            $this->email->message($email_body);
            $this->email->send();
            $data = array('stat' => '2');
            $this->Paymentm->update($pay['id'], $data); 
        }

        //  Schedule Pickup
        $this->load->model('Schedulepickupm');
        $pickups = $this->Schedulepickupm->get_many(array('stat' => 1));
        foreach ($pickups as $pick) {
            $this->load->library('email');
            $this->email->from('info@dsquaretec.com', 'ALJ Email');
            $this->email->to('gayandusmantha@gmail.com,isuru@fedexlk.com ');
            $this->email->set_mailtype("html");
            $this->email->subject('ALJ Payment Information');
            $email_body = "Customer Name  :  " . $pick['name_cus']."<br>";
            $email_body .= "Company :  " . $pick['company']."<br>";
            $email_body .= "Address  :  " . $pick['address']."<br>";
            $email_body .= "Postal Code :  " . $pick['postal_code']."<br>";
            $email_body .= "City :  " . $pick['city']."<br>";
            $email_body .= "Phone  :  " . $pick['phone']."<br>";
            $email_body .= "Email:  " . $pick['email']."<br>";
            $email_body .= "Message :  " . $pick['message']."<br>";
            $email_body .= "Ship Date :  " . $pick['ship_date']."<br>";
            $email_body .= "Redy Time :  " . $pick['redy_time']."<br>";
            $email_body .= "Closing Time  :  " . $pick['closing_time']."<br>";     
            $this->email->message($email_body);
            $this->email->send();
            $data = array('stat' => '2');
            $this->Schedulepickupm->update($pick['id'], $data);
        }
    }

}
