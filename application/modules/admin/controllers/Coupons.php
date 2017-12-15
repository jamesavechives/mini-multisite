<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Coupons extends Admin {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('promotions/promotions_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }
        
        public function view()
        {
            
            $where = [
               'site_id' => $this->site_id, 
                'is_deleted' => 0,
             ];
            $result = $this->promotions_model->get_coupons($where);
            $res['status'] =0;
            $res['data'] = $result;
            $res['total_page'] = 1;
            $res['current_page'] = 1;
            $this->output->set_output(json_encode($res));
        }
        public function getCouponDetail(){
            $where = [
               'site_id' => $this->site_id, 
                'id'    => $_GET['coupon_id'],
                'is_deleted' => 0,
             ];
            $result = $this->promotions_model->get_coupons($where)[0];
            $data = array();
            foreach($result as $key=>$v){
                if($key=='coupon_type'){
                    $data['type'] = $v;
                }
                else if($key =='coupon_condition'){
                    $data['condition'] = $v;
                }
                else{
                    $data[$key] = $v;
                }
            }
            $res['status'] =0;
            $res['data'] = $data;
            $res['total_page'] = 1;
            $res['current_page'] = 1;
            $this->output->set_output(json_encode($res));
        }
        public function create_coupon()
        {
            
            
            if ($this->input->post('title')==null)
            {
                $this->load->view('admin/create_coupon');

            }
            else
            {
                if(null!=$this->input->post('coupon_id')&&($this->input->post('coupon_id')>0)){
                   //update coupon
                     $data = [
                    'title' => $this->input->post('title'),
                    'end_use_date' => $this->input->post('end_use_date'),
                    'limit_num' => (null!=$this->input->post('limit_num'))?intval($this->input->post('limit_num')):1,
                    'add_time' => intval(now()),
                    'address' => (null!=$this->input->post('address')) ? $this->input->post('address') : "",
                    'sub_title' => (null!=$this->input->post('sub_title')) ? $this->input->post('sub_title') : "",
                    'phone' => (null!=$this->input->post('phone')) ? $this->input->post('phone') : "",
                    'in_show_list' => (null!=$this->input->post('in_show_list')) ? $this->input->post('in_show_list') : 1,
                    'button_color' => (null!=$this->input->post('button_color')) ? $this->input->post('button_color') : "rgb(204, 0, 0)",
                    'list_color' => (null!=$this->input->post('list_color')) ? $this->input->post('list_color') : "rgb(255, 153, 0)",
                    'background' => (null!=$this->input->post('background')) ? $this->input->post('background') : "rgb(234, 235, 237)",
                    ];
                    $res['data']=$this->promotions_model->update_coupon($data,array('id'=>$this->input->post('coupon_id')));
                    $res['status'] = 0;
                    $this->output->set_output(json_encode($res));
                         
                }
                else{
                 // create coupon
                    $data = [
                    'site_id' => $this->site_id,
                    'title' => $this->input->post('title'),
                    'coupon_type' => $this->input->post('type'),
                    'value' => (null!=$this->input->post('value'))?$this->input->post('value'):"",
                    'stock' => $this->input->post('stock'),
                    'start_use_date' => $this->input->post('start_use_date'),
                    'end_use_date' => $this->input->post('end_use_date'),
                    'limit_num' => (null!=$this->input->post('limit_num'))?intval($this->input->post('limit_num')):1,
                    'add_time' => intval(now()),
                    'address' => (null!=$this->input->post('address')) ? $this->input->post('address') : "",
                    'sub_title' => (null!=$this->input->post('sub_title')) ? $this->input->post('sub_title') : "",
                    'coupon_condition' => (null!=$this->input->post('condition')) ? $this->input->post('condition') : "",
                    'phone' => (null!=$this->input->post('phone')) ? $this->input->post('phone') : "",
                    'start_use_time' => (null!=$this->input->post('start_use_time')) ? $this->input->post('start_use_time') : "",
                    'end_use_time' => (null!=$this->input->post('end_use_time')) ? $this->input->post('end_use_time') : "",
                    'exclude_holiday' => (null!=$this->input->post('exclude_holiday')) ? $this->input->post('exclude_holiday') : 0,
                    'exclude_weekend' => (null!=$this->input->post('exclude_weekend')) ? $this->input->post('exclude_weekend') : 0,
                    'in_show_list' => (null!=$this->input->post('in_show_list')) ? $this->input->post('in_show_list') : 1,
                    'button_color' => (null!=$this->input->post('button_color')) ? $this->input->post('button_color') : "rgb(204, 0, 0)",
                    'list_color' => (null!=$this->input->post('list_color')) ? $this->input->post('list_color') : "rgb(255, 153, 0)",
                    'background' => (null!=$this->input->post('background')) ? $this->input->post('background') : "rgb(234, 235, 237)",
                    'extra_condition' => (null!=$this->input->post('extra_condition')) ? $this->input->post('extra_condition') : ""
                ];
                    $this->promotions_model->insert_coupon($data);
                    $res['status'] = 0;
                    $res['data'] = "successful";
                    $this->output->set_output(json_encode($res));
                }
            }
        }
        public function delete_coupon()
        {
            $data = [
              'is_deleted'=>1  
            ];
            $where = [
              'id' => $_GET['coupon_id']  
            ];
            $res['data']=$this->promotions_model->update_coupon($data,$where);
            $res['status'] = 0;
            $this->output->set_output(json_encode($res));
        }
        
        public function toggle_status(){
            $data = [
              'enable_status'=>$_GET['enable_status']  
            ];
            $where = [
              'id' => $_GET['coupon_id']  
            ];
            $res['data']=$this->promotions_model->update_coupon($data,$where);
            $res['status'] = 0;
            $this->output->set_output(json_encode($res));
        }
           
}

