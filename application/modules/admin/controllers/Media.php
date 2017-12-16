<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Media extends Admin {
        public function __construct()
        {
                parent::__construct();
                
        }
        
        public function view()
        {
            // paginate
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 18;
             $result = $this->media_model->get_media_list($paginate);
             $data['media'] = $result[0];
             $paginate['records'] = $result[1];
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) ){
                 $data['next'] = $base_url."media/view?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."media/view?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."media/view?page=".$previous;
                 $data['next'] = $base_url."media/view?page=".$next;
             }
             $this->load->view('admin/media',$data);
        }
        
        public function photo_list()
        {
            $photo_id = "";
            if(isset($_GET['photo_id'])){
                $photo_id = "&photo_id=".$_GET['photo_id'];
            }
            if(isset($_GET['from'])){
                $data['from'] = $_GET['from'];
            }
            // paginate
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 18;
             $result = $this->media_model->get_media_list($paginate);
             $data['media'] = $result[0];
             $paginate['records'] = $result[1];
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) ){
                 $data['next'] = $base_url."media/photo_list?&page=2".$photo_id;
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."media/photo_list?page=".$previous.$photo_id;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."media/photo_list?page=".$previous.$photo_id;
                 $data['next'] = $base_url."media/photo_list?page=".$next.$photo_id;
             }
             $this->load->view('admin/photolist',$data);
        }
        
        public function upload_media()
        {
            $_FILES['file']['name'] = $_FILES['pictureFile']['name'];
            $_FILES['file']['type'] = $_FILES['pictureFile']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pictureFile']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['pictureFile']['error'];
            $_FILES['file']['size'] = $_FILES['pictureFile']['size'];
            $uploadResults = json_decode($this->upload(),true);
            if($uploadResults['code'] == 0){
                $fileData = $uploadResults['data'];
                $uploadData['created_at'] = date('Y-m-d H:m:s');
                $uploadData['updated_at'] = date('Y-m-d H:m:s');
                $uploadData['guid'] = $fileData['imgUrl'];
                //Insert file information into the database
                $file_id = $this->admin_model->insert_single_file($uploadData);
                $this->output->set_output('successful!');
            }
        }
        
        public function bind_carousel_photo()
        {
            $data=[
              'pid'=>$this->input->get('photo_id'),
              'pic'=>$this->input->get('guid'),
              'site_id'=>$this->site_id  
            ];
            $this->media_model->set_carousel_photo($data);
            $this->output->set_output('successful!');
        }
           
}

