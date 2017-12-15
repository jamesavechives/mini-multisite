<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Site extends Admin {
        public function __construct()
        {
                parent::__construct();
                
        }
        
        public function view()
        {
            // paginate
            if($this->session->userdata('user_id')!=1){
                die("You do not have the permission!");
            }
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 15;
             $result = $this->admin_model->get_sites($paginate);
             $data['sites'] = $result[0];
             $paginate['records'] = $result[1];
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) ){
                 $data['next'] = $base_url."admin/customers?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."admin/customers?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."admin/customers?page=".$previous;
                 $data['next'] = $base_url."admin/customers?page=".$next;
             }
             $this->load->view('admin/sites',$data);
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

