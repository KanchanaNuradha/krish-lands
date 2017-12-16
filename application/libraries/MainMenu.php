<?php

class MainMenu {

    private $ci;
    private $id_menu = '';
    private $class_menu = 'id="mws-navigation"';
    private $class_parent = 'class="parent"';
    private $class_last = 'class="last"';

    function __construct() {
        $this->ci = & get_instance();
    }

    function buildMenu($type , $gid = null) {
        $menu = array();
        $dropdown = null ;
        $query = $this->ci->db->query("select * from mainmenu where type = " . $type . " and parent_id = 0 order by position ");
        $html_out = "\t\t" . '<ul >' . "\n";

        foreach ($query->result() as $row) {
            $id = $row->id;
            $title = $row->title;
            $url = base_url() . '' . $row->url;
            $position = $row->position;
            $target = $row->target;
            $parent_id = $row->parent_id;
            $show_menu = $row->show_menu;
           // $target = $row->target;
            {
                if ($show_menu && $parent_id == 0) {
                    $dropdown = $this->chek_childs($id, $type);
                    if ($dropdown != 0) {
                        if($target == $gid)
                        $html_out .= "<li><a href='#' class='dropmenu' data-toggle='dropdown' title='".  $row->tooltip ."'> <i class=' " . $row->icon . "'></i> ". $title . " <span class='fa arrow'></span> </a>";
                        else
                          $html_out .= "<li class=''><a href='#' class='dropmenu' data-toggle='dropdown' title='".  $row->tooltip ."'> <i class=' " . $row->icon . "'></i> ". $title .  " <span class='fa arrow'></span> </a>";

                        $html_out .= $this->get_childs($id, $type);
                    } else {
                        $html_out .= "<li><a href='" . $url . "' title='".  $row->tooltip ."' > <i class='". $row->icon . "'></i> " . $title . "</a>";
                    }
                }
            }
        }

        if ($dropdown != 0) {
            $html_out .= "\t\t" . '</ul>' . "\n";
            $html_out .= '</li>' . "\n";
        }
        return $html_out;
    }

    function chek_childs($id, $type) {
        $query = $this->ci->db->query("select * from mainmenu where parent_id = " . $id . " and type = " . $type . "");
        $index = 0;
        foreach ($query->result() as $row) {
            $index++;
        }
        return $index;
    }

    function get_childs($id, $type) {
        $has_subcats = FALSE;
        $html_out = '';
        $html_out .= "\t\t\t\t\t" . "<ul >" . "\n";
        $query = $this->ci->db->query("select * from  mainmenu where parent_id = $id and  type = $type");

        foreach ($query->result() as $row) {
            $id = $row->id;
            $title = $row->title;
            $url = base_url() . "index.php/" . $row->url;
            $position = $row->position;
            $target = $row->target;
            $parent_id = $row->parent_id;
            $has_subcats = TRUE;
            $dropdown = $this->chek_childs($id, $type);
            if ($dropdown != 0) {
                $html_out .= "<li  ><a href='#' class='dropdown-toggle' data-toggle='dropdown' title='".  $row->tooltip ."'> <i class='" . $row->icon . "'></i>  " . $title . " <span class='fa arrow'></span> </a>";
            } else {
                $html_out .= "<li  ><a href='" . $url . "'> <i class='" . $row->icon . "'></i> " . $title . "</a>";
            }
            $html_out .= $this->get_childs($id, $type);
        }
        $html_out .= '</li>' . "\n";
        $html_out .= '</ul>' . "\n";
        return ($has_subcats) ? $html_out : FALSE;
    }

}

