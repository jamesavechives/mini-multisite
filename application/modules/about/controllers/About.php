<?php
class About extends CI_Controller{
        private $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):2;
                $this->load->model('about_model');
        }
        
        public function home()
        {
            $this->load->view("about/home");
        }
        public function carouselPhotos(){
            $photos = $this->about_model->get_carousel_photos($this->site_id );
            $fdata = array();
            $i = 0;
            foreach($photos as $photo){
                $fdata[$i]['id']=$photo['id'];
                $fdata[$i]['app_id']=isset($_GET['app_id'])?$_GET['app_id']:'';
                $fdata[$i]['weight']=6-intval($photo['pid']);
                $fdata[$i]['type']=$photo['ltype'];
                $fdata[$i]['add_time']=$photo['add_time'];
                $form_data['groupName']=$photo['groupName'];
                $form_data['groupId']=$photo['groupId'];
                $form_data['pic']=$photo['pic'];
                $form_data['isShow']=$photo['isShow'];
                $form_data['action']=$photo['action'];
                $form_data['actionText']=$photo['actionText'];
                $form_data['goods-id']=$photo['goods-id'];
                $form_data['goods-name']=$photo['goods-name'];
                $form_data['goods-type']=$photo['goods-type'];
                $form_data['form_data']['page-link']=$photo['page-link'];
                $fdata[$i]['form_data'] = json_encode($form_data);
                $i++;
            }
            $data['status'] =0;
            $data['is_more'] =0;
            $data['current_page']=1;
            $data['count']=count($photos);
            $data['total_page']=1;
            $data['data']=$fdata;
            $this->output->set_output(json_encode($data));
        }
        
}
