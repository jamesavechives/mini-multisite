<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Carousel extends Admin {
        public function __construct()
        {
                parent::__construct();
                
        }
        
        public function view()
        {
            $this->load->model('about/about_model');
            $photos = $this->about_model->get_carousel_photos($this->site_id );
            for($i=0;$i<5;$i++){
                if(isset($photos[$i]['goods-id'])){
                    if($photos[$i]['goods-id']>0){
                        $res = $this->products_model->get_main_image($photos[$i]['goods-id']);
                        if(is_array($res)){
                            $photos[$i]['item_cover']=$res[0]['guid'];
                        } else {
                            $photos[$i]['item_cover']='no-settings';
                        }
                    } else {
                        $photos[$i]['item_cover']='no-settings';
                    }
                }else{
                    $photos[$i]='no-settings';
                }
            }
            $data['photos']=$photos;
            $this->load->view('admin/carousel_photos',$data);
        }
        
        public function upload_carousel_photos()
        {
            $_FILES['file']['name'] = $_FILES['pictureFile']['name'];
            $_FILES['file']['type'] = $_FILES['pictureFile']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['pictureFile']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['pictureFile']['error'];
            $_FILES['file']['size'] = $_FILES['pictureFile']['size'];
            $uploadResults = json_decode($this->upload(),true);
            if($uploadResults['code'] == 0){
                $fileData = $uploadResults['data'];
                $uploadData['pid'] = $this->input->post('id');
                $uploadData['site_id'] = $this->site_id;
                $uploadData['pic'] = $fileData['imgUrl'];
                $uploadData['add_time'] = intval(now());
                $uploadData['groupName'] = 'group1';
                $uploadData['groupId'] = 1;
                $uploadData['actionText'] = 'goods detail';
                $uploadData['page-link'] = 'prePage';
                //Insert file information into the database
                $file_id = $this->admin_model->set_carousel_photo($uploadData);
                $this->output->set_output('successful!');
            }
        }
        
        public function bind_carousel_product()
        {
            $data=[
              'pid'=>$this->input->post('photo_id'),
              'goods-id'=>$this->input->post('product_id'),
              'goods-name'=>$this->input->post('product_name'),
              'site_id'=>$this->site_id  
            ];
            $this->admin_model->set_carousel_product($data);
            $this->output->set_output('successful!');
        }
           
}

