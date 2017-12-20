<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Transactions extends Admin {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('orders/orders_model',NULL,FALSE,array('site_id'=>$this->site_id));
                
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
             $result = $this->orders_model->get_orders(null,null,$paginate);
             $transactions = $result[0];
             $paginate['records'] = $result[1];
             $orders = array();
             $i = 0;
             foreach($transactions as $transaction){
                 $orders[$i] = $transaction;
                 $cart_arr = unserialize($transaction['cart_arr']);
                 $products = array();
                 $j = 0;
                 foreach($cart_arr as $cart){
                     if(($get_products=$this->products_model->get_products(array('id'=>$cart['goods_id'])))!=null){
                         $products[$j] = $get_products[0];
                         if(($main_image=$this->products_model->get_main_image($cart['goods_id']))!=null){
                            $products[$j]['cover']= $main_image[0]['guid'];
                         }
                         $products[$j]['num']=$cart['num'];
                         $j++;
                     }
                 }
                 $orders[$i]['products'] = $products;
                 $orders[$i]['count'] = $j;
                 $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
                 $orders[$i]['buyer_name']=$this->customer_model->get_customer_info(array('weixin_id'=>$transaction['buyer_id']))[0]['nickname'];
                 $i++;
             }
             $data['orders'] = $orders;
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) && $paginate['records']>0  ){
                 $data['next'] = $base_url."transactions/view?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."transactions/view?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."transactions/view?page=".$previous;
                 $data['next'] = $base_url."transactions/view?page=".$next;
             }
            $this->load->view('admin/orders',$data);
        }
        
        public function details()
        {
            $data = array();
            $order_id = $_GET['order_id'];
            $transaction = $this->orders_model->get_orders(array('order_id'=>$order_id))[0];
            $order = $transaction;
             $cart_arr = unserialize($transaction['cart_arr']);
             $products = array();
             $j = 0;
             foreach($cart_arr as $cart){
                 if(($get_products=$this->products_model->get_products(array('id'=>$cart['goods_id'])))!=null){
                     $products[$j] = $get_products[0];
                     if(($main_image=$this->products_model->get_main_image($cart['goods_id']))!=null){
                        $products[$j]['cover']= $main_image[0]['guid'];
                     }
                     $products[$j]['num']=$cart['num'];
                     $j++;
                 }
             }
             $order['products'] = $products;
             $order['count'] = $j;
             $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
             $order['buyer_name']=$this->customer_model->get_customer_info(array('weixin_id'=>$transaction['buyer_id']))[0]['nickname'];
             $address = $this->orders_model->get_address(array('id'=>$order['address_id']))[0];
             $order['address'] = $address;
             $data['order']=$order;
            $this->load->view('admin/order_details',$data);
        }
           
}

