<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Userdata extends Admin {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('userdata/userdata_model',NULL,FALSE,array('site_id'=>$this->site_id));
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
             $paginate['each_page_count'] = 15;
             $where = [
               'site_id' => $this->site_id,  
             ];
             $result = $this->userdata_model->get_userdata($where,$paginate);
             $data['message'] = $result[0];
             $paginate['records'] = $result[1];
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count']))&&$paginate['records']>0 ){
                 $data['next'] = $base_url."userdata/view?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."userdata/view?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."userdata/view?page=".$previous;
                 $data['next'] = $base_url."userdata/view?page=".$next;
             }
             $this->load->view('admin/userdata',$data);
        }
        
        public function create_site()
        {
            if($this->session->userdata('user_id')!=1){
                die("You do not have the permission!");
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'industry', 'required');
            
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('admin/create_site');

            }
            else
            {
                 // insert site
                $result = $this->admin_model->create_site();
                
                if(isset($result['site_id'])&&($result['site_id']>0)){
                    $industry_model = 'admin_'.$result['industry'].'_model';
                    $this->load->model($industry_model);
                    $item_id = $this->{$industry_model}->generate_site_tables($result['site_id']);
                }
            }
        }
        
        public function update_site()
        {
            $this->admin_model->create_site($this->site_id);
        }
        
        public function about()
        {
            if($this->site_id==0){
                die("You do not have the permission!");
            }
            $data['mysite']=$this->admin_model->get_site_detail($this->site_id);
            $this->load->view('admin/about',$data);
        }
        public function site_detail()
        {
            $data['data']=$this->admin_model->get_site_detail($this->site_id);
            $data['status'] = 0;
            $this->output->set_output(json_encode($data));
        }
           
}

