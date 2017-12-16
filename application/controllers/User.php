<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function sighIn() {
        $this->load->view('user/login');
    }

    public function newUserReg() {
        $this->load->view('user/newUserReg');
    }

    public function saveNewUser() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');
        if ($id == '') {
            if ($this->DataBase->insertQry('registration')) {
                $message = 3;

                $this->db->select_max('id');
                $query = $this->db->get('registration');
                $uid = $query->result_array();
                $newdata = array(
                    'username' => $this->input->post('contactName'),
                    'utype' => $this->input->post('type'),
                    'id' => $uid[0]['id'],
                    'image' => $uid[0]['image']
                );
                $this->session->set_userdata('login_data', $newdata);
            }
        } else {
            $this->DataBase->updateQry('registration', $id);
            $message = 2;
        }


        redirect('user/registerSuccess/' . $message);
    }

    public function registerSuccess() {
        $this->load->view('user/registerSuccess');
    }

    public function validatelogin() {
        $uname = '';
        $utype = '';
        if (($this->input->post('email') != '') and ( $this->input->post('password') != '')) {
            $this->db->select('id,contactName,type,image')
                    ->from('registration')
                    ->where('email', $this->input->post('email'))
                     ->where('status',1)
                    ->where('password', $this->input->post('password'));
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                foreach ($query->result_array() as $row) {
                    $this->load->library('session');
                    $uname = $row['contactName'];
                    $utype = $row['type'];
                    $id = $row['id'];
                    $image = $row['image'];
                }
            }
        }
        if ($uname == '') {
            $data['msg'] = 1;
            $this->load->view('user/login', $data);
        } else {
            $newdata = array(
                'username' => $uname,
                'utype' => $utype,
                'id' => $id,
                'image' => $image
            );
            $this->session->set_userdata('login_data', $newdata);
            if ($utype != 1) {
                redirect('admin');
            } else {
                redirect('admin');
            }
        }
    }

    public function logout() {
        $this->load->library(array('session'));
        $this->session->sess_destroy();
        $this->load->view('user/login');
    }

    public function forgetpassword($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $data["message"] = "";
        $this->load->view('user/forgetpassword', $data);
    }

    public function sendresetpw() {
        $rand = substr(md5(microtime()), rand(0, 26), 20);

        $this->load->model('Usersm');
        $users = $this->Usersm->get_by(array('email' => $this->input->post('username')));

        if (isset($users['id'])) {
            $data = array(
                'code' => $rand,
                'date' => date("Y-m-d H:i")
            );
            $this->Usersm->update($users['id'], $data);

            $this->load->library('email');

            $this->email->from('info@dsquaretec.com', 'ALJ Email');
            $this->email->to($this->input->post('username'));

            $this->email->set_mailtype("html");
            $this->email->subject('ALJ Admin Forget password ');
            $email_body = "Please Click Below link Link will expire within 2 hour  : <br><br>";
            $email_body .= "  <a href='" . base_url() . "index.php/user/update_new_pw/" . $rand . "' <br>";
            $this->email->message($email_body);
            $this->email->send();
            $this->load->view('user/email-msg', $data);
        } else {
            $message = 5;
            redirect('user/forgetpassword/' . $message);
        }
    }

    public function update_new_pw($temppw) {
        $this->load->model('Usersm');
        $users = $this->Usersm->get_by(array('code' => $temppw));

        $rand = date("Y-m-d H:i");
        $rand2 = $users['date'];

        $datetime1 = new DateTime($rand2);
        $datetime2 = new DateTime($rand);
        $interval = $datetime1->diff($datetime2);
        $number = $interval->format('%H');

        if (($users['id']) && ($number < 3)) {
            $data['id'] = $users['id'];
            $data['code'] = $users['code'];
            $this->load->view('user/update_new_pw', $data);
        } else {
            $message = 6;
            redirect('user/sighIn/' . $message);
        }
    }

    public function save_update_pw() {

        $this->load->model('Usersm');
        $users = $this->Usersm->get_by(array('id' => $this->input->post('id')));


        if ($users['code'] == $this->input->post('code')) {
            $data = array(
                'password' => $this->input->post('password1')
            );
            $this->Usersm->update($users['id'], $data);
            $message = 7;
            redirect('user/sighIn/' . $message);
        } else {
            $message = 8;
            redirect('user/sighIn/' . $message);
        }
    }

}

?>