<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogpostM extends MY_Model {

    protected $_table = 'blog_posts';
    protected $_primary_key = "id";
    protected $return_type = "array";
    protected $before_create = array('created_at');
    
    public function created_at($blog_posts) {

        $blog_posts['created_at'] = date('Y-m-d');

        return $blog_posts;
    }
    
    public function count_posts($id){
        return $this->count_by('id',$id);        
    }

}
