<?php

class Messages {

    private $ci;
    private $id_menu = 'id="menu"';

    function __construct() {
        $this->ci = & get_instance();
    }

    function getMessage($id) {
        $menu = array();
        $query = $this->ci->db->query("select message_id,message,type from messages where message_id = " . $id . " ");
        $message = $query->result();
        $html_out = "";
        if ($message[0]->type == 3) {
            $html_out .= "<div class='text-center bg-danger' style='color:red'> <h3> " . $message[0]->message . " </h3> </div>";
        } else if ($message[0]->type == 2) {
            $html_out .= "<div class='text-center bg-warning' style='color:yellow'> <h3> " . $message[0]->message . " </h3> </div>";
        } else  if ($message[0]->type == 1) {
            $html_out .= "<div class='text-center bg-success' style='color:white'> <h3> " . $message[0]->message . " </h3> </div>";
        }
        return $html_out;
    }

    function getUserInf($id){
        $menu = array();
        $query = $this->ci->db->query("select * from registration where id = " . $id . " ");
        $message = $query->result();
        return  $message[0];
    }


}

