<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Clients extends Admin {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
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
             $result = $this->customer_model->get_customers($paginate);
             $data['customers'] = $result[0];
             $paginate['records'] = $result[1];
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) &&$paginate['records']>0 ){
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
             $this->load->view('admin/'.$this->industry.'/customers',$data);
        }
        
           
}

