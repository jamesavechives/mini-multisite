<?php
require_once  ('wxpay-lib/WxPay.Api.php'); 
class Orders extends CI_Controller {
        protected $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):0;
                $this->load->model('orders_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->model('products/products_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }
        public function add_cart()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $data = [
                    'buyer_id'  => $buyer_id,
                    'goods_id'  => isset($_GET['goods_id'])?$_GET['goods_id']:0,
                    'model_id'  => isset($_GET['model_id'])?$_GET['model_id']:0,
                    'num'       => isset($_GET['num'])?$_GET['num']:0,
                    'add_time'  =>  intval(now()),
                ];
                $insert_id = $this->orders_model->create_cart($data);
                $fdata['status']=0;
                $fdata['data']=$insert_id;
                $this->output->set_output(json_encode($fdata));
            }
        }
        
        public function delete_cart()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
            //    $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $data = $_POST['cart_id_arr'];
                $insert_id = $this->orders_model->delete_cart($data);
                $fdata['status']=0;
                $fdata['data']="";
                $this->output->set_output(json_encode($fdata));
            }
        }
        
        public function precheck_shoppingcart()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $fdata['status']=0;
                $fdata['data']="";
                $this->output->set_output(json_encode($fdata));
            }
        }
        
        public function cart_list()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $cart_list = $this->orders_model->get_cart_list(array('buyer_id'=>$buyer_id));
                $fdata = array();
                $i=0;
                foreach($cart_list as $cart){
                  $goods = $this->products_model->get_products(array('id'=>$cart['goods_id']))[0];
                  $imgs = $this->products_model->get_images($cart['goods_id']);
                  foreach($goods as $key=>$v){
                        if($key!='category'&&$key!='category_id'&&$key!='is_group_buy_goods'&&$key!='id'){
                                $fdata[$i][$key]=$v;
                            }
                    }
                    if(($main_image = $this->products_model->get_main_image($cart['goods_id'])) != null){
                        $fdata[$i]['cover'] = $main_image[0]['guid']; 
                    }
                    $fdata[$i]['id']=$cart['id'];
                    $fdata[$i]['buyer_id']=$buyer_id;
                    $fdata[$i]['goods_id']=$goods['id'];
                    $fdata[$i]['num']=$cart['num'];
                    $fdata[$i]['model_items']=array();
                    $fdata[$i]['model_items']="";
                    $fdata[$i]['express_fee']="";
                    $fdata[$i]['is_group_buy']=$goods['is_group_buy_goods'];
                    $i++;
                }
                $data['status'] =0;
                $data['is_more'] =0;
                $data['current_page']=1;
                $data['count']=count($cart_list);
                $data['total_page']=1;
                $data['data']=$fdata;
                $this->output->set_output(json_encode($data));
            }
        }
        
        public function shop_location()
        {
            $data['status'] =0;
            $location = [
                'id'               =>  1045093,
                'app_id'           =>  'cOk7u3oknp',
                'province_id'      =>  '0',
                'city_id'          =>  '0',
                'county_id'        =>  '0',
                'shop_location'    =>  '',
                'shop_contact'     =>  '',
                'is_self_delivery' =>  '0',
                'region_string'    =>  '',
            ];
            $data['data'] = $location;
            $this->output->set_output(json_encode($data));
        }
        
        public function add_wxaddress()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $data = [
                    'buyer_id'  => $buyer_id,
                    'detailInfo'         => isset($_POST['detailInfo'])?$_POST['detailInfo']:'',
                    'cityName'           => isset($_POST['cityName'])?$_POST['cityName']:'',
                    'provinceName'       => isset($_POST['provinceName'])?$_POST['provinceName']:'',
                    'UserName'           => isset($_POST['UserName'])?$_POST['UserName']:'',
                    'telNumber'          => isset($_POST['telNumber'])?$_POST['telNumber']:'',
                    'district'           => isset($_POST['district'])?$_POST['district']:'',
                    'countyName'         => isset($_POST['countyName'])?$_POST['countyName']:'',
                    'add_time'  =>  intval(now()),
                ];
                $insert_id = $this->orders_model->add_address($data);
                $fdata['status']=0;
                $fdata['data']=$insert_id;
                $this->output->set_output(json_encode($fdata));
            }
            
        }
        
        public function address_list()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                
                $address_list = $this->orders_model->get_address(array('buyer_id'=>$buyer_id));
                $address = array();
                $i=0;
                foreach($address_list as $add){
                    $address_info['name'] = $add['UserName'];
                    $address_info['contact'] = $add['telNumber'];
                    $address_info['detailAddress'] = $add['detailInfo'];
                    $address_info['province']['text'] = $add['provinceName'];
                    $address_info['province']['id'] = 0;
                    $address_info['city']['text'] = $add['cityName'];
                    $address_info['city']['id'] = 0;
                    $address_info['district']['text'] = $add['countyName'];
                    $address_info['district']['id'] = 0;
                    $address[$i]['id']=$add['id'];
                    $address[$i]['buyer_id']=$buyer_id;
                    $address[$i]['address_info']=$address_info;
                    $address[$i]['is_default']=0;
                    $address[$i]['add_time']=$add['add_time'];
                    $i++;
                }
                $fdata['status']=0;
                $fdata['data']=$address;
                $fdata['is_more'] =0;
                $fdata['current_page']=1;
                $fdata['count']=count($address);
                $fdata['total_page']=1;
                $this->output->set_output(json_encode($fdata));
            }
        }
        
        public function delete_wxaddress()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $where = [
                  'id'          =>  $_GET['address_id'],
                  'buyer_id'    =>  $buyer_id,
                ];
                $this->orders_model->del_address($where);
                $data['status']=0;
                $data['data']="";
                $this->output->set_output(json_encode($data));
            }
        }
        
        public function calculation_price()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $address_id = isset($_POST['address_id'])?$_POST['address_id']:(isset($_GET['address_id'])?$_GET['address_id']:0);
                $where = array();
                if(is_numeric($address_id)&&$address_id>0){
                    $where = array('id'=>$address_id);
                }
                else{
                    $where = array('buyer_id'=>$buyer_id);
                }
                $address_list = $this->orders_model->get_address($where);
                $address = array();
                if(isset($address_list[0])){
                    $add = $address_list[0];
                    $address_info['name'] = $add['UserName'];
                    $address_info['contact'] = $add['telNumber'];
                    $address_info['detailAddress'] = $add['detailInfo'];
                    $address_info['province']['text'] = $add['provinceName'];
                    $address_info['province']['id'] = 0;
                    $address_info['city']['text'] = $add['cityName'];
                    $address_info['city']['id'] = 0;
                    $address_info['district']['text'] = $add['countyName'];
                    $address_info['district']['id'] = 0;
                    $address['id']=$add['id'];
                    $address['buyer_id']=$buyer_id;
                    $address['address_info']=$address_info;
                    $address['is_default']=0;
                    $address['add_time']=$add['add_time'];
                }
                $cart_id_arr = isset($_POST['cart_id_arr'])?$_POST['cart_id_arr']:$_GET['cart_id_arr'];
            //    $cart_id = $cart_id_arr[0];
                $goods_info = array();
                $i=0;
                foreach($cart_id_arr as $cart_id){
                    $cart_info = $this->orders_model->get_cart_list(array('id'=>$cart_id))[0];

                    $goods_id =$cart_info['goods_id'];
                    $goods = $this->products_model->get_products(array('id'=>$goods_id))[0];
                      $imgs = $this->products_model->get_images($goods_id);
                      $images = array();
                      foreach($imgs as $img){
                          $images[]=$img['image_url'];
                      }
                      
                      foreach($goods as $key=>$v){
                            if($key!='category'&&$key!='category_id'&&$key!='is_group_buy_goods'){
                                $goods_info[$i][$key]=$v;
                                    }
                        }
                        $goods_info[$i]['img_urls'] = $images; 
                        $goods_info[$i]['cover'] = $images[0]; 
                        $goods_info[$i]['model_items']=array();
                        $goods_info[$i]['model_items']="";
                        $goods_info[$i]['express_fee']="";
                        $goods_info[$i]['is_group_buy']=$goods['is_group_buy_goods'];
                        $goods_info[$i]['category'][0]=$goods['category'];
                        $goods_info[$i]['category_id'][0]=$goods['category_id'];
                        $goods_info[$i]['num']=$cart_info['num'];
                        $i++;
                }
                    $price=0;
                    foreach($goods_info as $v){
                        $price=$price+intval($v['num'])*intval($v['price']);
                    }
                    $coupon_benefit = $this->user_coupons($buyer_id, $price);
                    $can_use_benefit=[
                        'status'=>0,
                        'vip_benefit'=>[],
                        'coupon_benefit'=>$coupon_benefit,
                        'integral_benefit'=>[],
                        'max_can_use_integral'=>0,
                        'user_integral'=>0,
                        'data'=>$coupon_benefit,
                        'selected_index'=>0
                    ];
                    if(is_array($coupon_benefit)&&count($coupon_benefit)>0){
                        $selected_benifit = (isset($_POST['selected_benefit'])&&$_POST['selected_benefit']!="")?$_POST['selected_benefit']:$coupon_benefit[0];
                        if(intval($selected_benifit['type'])==1){
                            $discount_cut_price = floatval($price)*(1-floatval($selected_benifit['value'])/10);
                        }
                        else{
                            $discount_cut_price = $selected_benifit['value'];
                        }
                    }
                    else{
                        $selected_benifit = array();
                        $discount_cut_price = 0.00;
                    }
                    $fdata = array();
                    $fdata['discount_cut_price']=$discount_cut_price;
                    $fdata['price']=floatval($price)-floatval($fdata['discount_cut_price']);
                    $fdata['original_price']=floatval($price);
                    $fdata['group_buy_discount_price']=0;
                    $fdata['is_take_deliver']=0;
                    $fdata['min_deliver_fee']=0;
                    $fdata['balance']=0;
                    $fdata['deliver_fee']=0;
                    $fdata['express_fee']=0;
                    $fdata['use_balance']=0;
                    $fdata['can_use_benefit']=$can_use_benefit;
                    $fdata['goods_info']=$goods_info;
                    $fdata['address']=$address;
                    $fdata['selected_benefit_info']=$selected_benifit;
                    $data['status']=0;
                    $data['data']=$fdata;
                    $this->output->set_output(json_encode($data));
            }
        }
        
        public function add_cartorder()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id = $this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                if(isset($_POST['selected_benefit'])&&is_array($_POST['selected_benefit'])){
                    $coupon_id = $_POST['selected_benefit']['coupon_id'];
                    $user_coupon_id = $_POST['selected_benefit']['user_coupon_id'];
                    $where = [
                      'id' => $user_coupon_id,
                    ];
                    $data = [
                      'recv_type'       =>2,
                      'consume_time'    =>1,
                    ];
                    $this->load->model('promotions/promotions_model',NULL,FALSE,array('site_id'=>$this->site_id));
                    $this->promotions_model->update_user_coupon($data,$where);
                    $this->promotions_model->add_consume_num($coupon_id);
                }
                $data=array();
                $cart_arr_array = $_POST['cart_arr'];
                $total_price = 0;
                foreach($cart_arr_array as $cart){
                    $goods = $this->products_model->get_products(array('id'=>$cart['goods_id']))[0];
                    $total_price = $total_price+intval($goods['price'])*intval($cart['num']);
                }
                $selected_benifit = (isset($_POST['selected_benefit'])&&$_POST['selected_benefit']!="")?$_POST['selected_benefit']:NULL;
                if(null!=$selected_benifit){
                    if(intval($selected_benifit['type'])==1){
                        $discount_cut_price = floatval($total_price)*(1-floatval($selected_benifit['value'])/10);
                    }
                    else{
                        $discount_cut_price = $selected_benifit['value'];
                    }
                }
                else{
                    $discount_cut_price=0;
                }
                $data['buyer_id']= $buyer_id;
                $data['order_id']=md5(time() . mt_rand(1,1000000));
                
                $data['cart_arr'] = serialize($cart_arr_array);
                $data['form_id'] = isset($_POST['form_id'])?$_POST['form_id']:'';
                $data['address_id'] = isset($_POST['address_id'])?$_POST['address_id']:0;
                $data['is_balance']=isset($_POST['is_balance'])?$_POST['is_balance']:1;
                $data['selected_benefit']=isset($_POST['selected_benefit'])?serialize($_POST['selected_benefit']):"";
                $data['is_self_delivery']=isset($_POST['is_self_delivery'])?$_POST['is_self_delivery']:0;
                $data['remark']=isset($_POST['remark'])?$_POST['remark']:"";
                $data['additional_info']=isset($_POST['additional_info'])?$_POST['additional_info']:"";
                $data['voucher_coupon_goods_info']=isset($_POST['voucher_coupon_goods_info'])?$_POST['voucher_coupon_goods_info']:"";
                $data['express_fee'] =0;
                $data['can_use_benefit']=isset($_POST['can_use_benefit'])?serialize($_POST['can_use_benefit']):"";
                $data['discount_cut_price']=$discount_cut_price;
                $data['is_group_buy_order']=isset($_POST['is_group_buy_order'])?$_POST['is_group_buy_order']:0;
                $data['location_id']=isset($_POST['location_id'])?$_POST['location_id']:0;
                $data['original_express_fee']=isset($_POST['original_express_fee'])?$_POST['original_express_fee']:0;
                $data['pay_mode_id']=0;
                $data['payment_id']=0;
                $data['payment_time']=0;
                $data['refund_time']=0;
                $data['status']=0;
                $data['use_balance']=0.00;
                $data['order_total_price']=$total_price-$discount_cut_price;
                $data['original_price']=$total_price;
                $data['total_price']=$total_price-$discount_cut_price;
                $data['add_time']=date("Y-m-d H:i:s");
                $this->orders_model->add_order($data,$cart_arr_array);
                $fdata['status']=0;
                $fdata['data']=$data['order_id'];
                $fdata['session_key']=$skey;
                $this->output->set_output(json_encode($fdata));
            }
            
        }
        
        public function get_order()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                
                if(isset($_GET['order_id'])||isset($_POST['order_id'])){
                    $order_id = isset($_GET['order_id'])?$_GET['order_id']:$_POST['order_id'];
                    $orders = $this->orders_model->get_orders(array('order_id'=>$order_id));
                }
                else{
                    $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                    $where = array('buyer_id'=>$buyer_id);
                    if(isset($_GET['idx_arr'])||isset($_POST['idx_arr'])){
                        $idx_arr = isset($_GET['idx_arr'])?$_GET['idx_arr']:$_POST['idx_arr'];
                        $where=array('buyer_id'=>$buyer_id,$idx_arr['idx']=>$idx_arr['idx_value']);
                    }
                    $orders = $this->orders_model->get_orders($where);
                }
                $fdata = array();
                $j=0;
                foreach($orders as $order){
                    $buyer_id=$order['buyer_id'];
                    $buyer_info = array();
                    $buyer=$this->customer_model->get_customer_info(array('weixin_id'=>$buyer_id))[0];
                    $buyer_info=[
                        'nickname'=>$buyer['nickname'],
                        'phone'   =>$buyer['phone'],
                        'message' =>''
                    ];
                    $order['buyer_info']=$buyer_info;
                    $this->load->model('admin/admin_model');
                    $site_info = $this->admin_model->get_site_detail($this->site_id);
                    $app_info=[
                      'app_name'=>$site_info->name,
                      'app_logo'=>$site_info->app_logo,  
                    ];
                    $order['app_info']=$app_info;
                    $address_id = $order['address_id'];
                    $where = array();
                    if(is_numeric($address_id)&&$address_id>0){
                        $where = array('id'=>$address_id);
                    }
                    else{
                        $where = array('buyer_id'=>$buyer_id);
                    }
                    $address_list = $this->orders_model->get_address($where);
                    $address_info = array();
                    if(isset($address_list[0])){
                        $add = $address_list[0];
                        $address_info['name'] = $add['UserName'];
                        $address_info['contact'] = $add['telNumber'];
                        $address_info['detailAddress'] = $add['detailInfo'];
                        $address_info['province']['text'] = $add['provinceName'];
                        $address_info['province']['id'] = 0;
                        $address_info['city']['text'] = $add['cityName'];
                        $address_info['city']['id'] = 0;
                        $address_info['district']['text'] = $add['countyName'];
                        $address_info['district']['id'] = 0;
                        $address_info['address_id']=$add['id'];
                    }
                    $order['address_info']=$address_info;
                    $cart_arr = unserialize($order['cart_arr']);
                    $goods_info = array();
                    $i=0;
                    foreach($cart_arr as $cart){
                        $goods_id =$cart['goods_id'];
                        $goods = $this->products_model->get_products(array('id'=>$goods_id))[0];
                          $imgs = $this->products_model->get_images($goods_id);
                          $images = array();
                          foreach($imgs as $img){
                              $images[]=$img['image_url'];
                          }

                          foreach($goods as $key=>$v){
                                if($key!='category'&&$key!='category_id'&&$key!='is_group_buy_goods'){
                                    $goods_info[$i][$key]=$v;
                                        }
                            } 
                            $goods_info[$i]['cover'] = $images[0]; 
                            $goods_info[$i]['model']="";
                            $goods_info[$i]['goods_name']=$goods['title'];
                            $goods_info[$i]['num']=$cart['num'];
                            $i++;
                    }
                    $order['goods_info']=$goods_info;
                        $can_use_benefit=[
                            'status'=>0,
                            'vip_benefit'=>[],
                            'coupon_benefit'=>[],
                            'integral_benefit'=>[],
                            'max_can_use_integral'=>0,
                            'user_integral'=>0,
                            'data'=>[],
                            'selected_index'=>0
                        ];
                        $order['can_use_benefit']=$can_use_benefit;
                        $order['selected_benefit']= unserialize($order['selected_benefit']);

                        $fdata[$j]['appointment_goods_id']=0;
                        $fdata[$j]['balance']=0.00;
                        $fdata[$j]['express_fee']=0.00;
                        $fdata[$j]['form_data']=$order;
                        $fdata[$j]['is_deleted']=0;
                        $fdata[$j]['is_distribution_order']=0;
                        $fdata[$j]['is_hide']=0;
                        $fdata[$j]['is_integral']=0;
                        $fdata[$j]['location_id']=0;
                        $fdata[$j]['related_shop_app_id']=0;
                        $fdata[$j]['reverted_sale']=0;
                        $fdata[$j]['time_long']=0;
                        $j++;
                    }
                    $data['status']=0;
                    $data['is_more']=0;
                    $data['current_page']=1;
                    $data['count']=count($fdata);
                    $data['total_page']=1;
                    $data['data']=$fdata;
                    $data['current_goods_type']="0";
                    $data['goods_type_list']=["0"];
                    $data['take_out_info']=[];
                    $this->output->set_output(json_encode($data));
            }
        }
        
        public function count_status_order(){
            $data['status'] =0;
            $data['data']=[];
            $this->output->set_output(json_encode($data));
        }
        
        public function cancel_order(){
            $order_id = isset($_GET['order_id'])?$_GET['order_id']:$_POST['order_id'];
            $this->orders_model->cancel_order(array('order_id'=>$order_id));
        }
        
        public function wxpay() {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer_id=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0]['weixin_id'];
                $myOrder = $this->orders_model->get_orders(array('order_id'=>$_GET['order_id']))[0];
                if($buyer_id != $myOrder['buyer_id']){
                    $data['status']=1;
                    $data['data']="用户身份不符";
                    $this->output->set_output(json_encode($data));
                }
                $this->load->model('admin/admin_model');
                $mySite = $this->admin_model->get_site_detail($this->site_id);
                //         初始化值对象  
                $input = new WxPayUnifiedOrder();  
                //         文档提及的参数规范：商家名称-销售商品类目  
                $input->SetBody($mySite->name);  
                //         订单号应该是由小程序端传给服务端的，在用户下单时即生成，demo中取值是一个生成的时间戳  
                $input->SetOut_trade_no($myOrder['order_id']);  
                //         费用应该是由小程序端传给服务端的，在用户下单时告知服务端应付金额，demo中取值是1，即1分钱  
                $input->SetTotal_fee($myOrder['total_price']*100);  
                $input->SetNotify_url("https://...com/notify.php");//需要自己写的notify.php  
                $input->SetTrade_type("JSAPI");  
                //         由小程序端传给后端或者后端自己获取，写自己获取到的，  
                $input->SetOpenid($buyer_id);  
                //$input->SetOpenid($this->getSession()->openid);  
                //         向微信统一下单，并返回order，它是一个array数组  
                $wxpayapi = new WxPayApi($mySite->appid,$mySite->mchid,$mySite->mchkey,$this->site_id);
                $order = $wxpayapi->unifiedOrder($input);  
                //         json化返回给小程序端  
                $res = $this->getJsApiParameters($order,$mySite->mchkey);
                $data['status']=0;
                $data['data']=json_decode($res);
                $this->output->set_output(json_encode($data));
            }
        }
        
        public function after_pay_order(){
            $myOrder = $this->orders_model->get_orders(array('order_id'=>$_GET['order_id']))[0];
            $myOrder['form_id'] = $_GET['formId'];
            $result = array();
            if($_GET['t_num']=='AT0010'){
                $myOrder['status'] = 0;
            } 
            else{
                $input = new WxPayUnifiedOrder(); 
                $input->SetOut_trade_no($myOrder['order_id']); 
                $this->load->model('admin/admin_model');
                $mySite = $this->admin_model->get_site_detail($this->site_id);
                $wxpayapi = new WxPayApi($mySite->appid,$mySite->mchid,$mySite->mchkey,$this->site_id);
                $result = $wxpayapi->orderQuery($input);
                if(($result['return_code']=='SUCCESS') && ($result['result_code']=='SUCCESS')){
                    $myOrder['form_id'] = $result['transaction_id'];
                    $myOrder['status'] = 1;
                }
            }
            $this->orders_model->update_order($myOrder,array('order_id'=>$_GET['order_id']));
            $data['status']=0;
            $data['data']=$result;
            $this->output->set_output(json_encode($data));
        }
        
        public function check_collectme_status(){
            $data['status']=0;
            $data['valid']=1;
            $this->output->set_output(json_encode($data));
        }
        
        public function wxRefund($order_id){  
            //查询订单,根据订单里边的数据进行退款  
            $order = $this->orders_model->get_orders(array('order_id'=>$_GET['order_id']))[0]; 
            $this->load->model('admin/admin_model');
            $mySite = $this->admin_model->get_site_detail($this->site_id);
            $merchid = $mySite->mchid;  

            if(!$order) return false;  
            
            $input = new WxPayRefund();  
            $input->SetOut_trade_no($order['order_id']);         //自己的订单号  
            $input->SetTransaction_id($order['form_id']);     //微信官方生成的订单流水号，在支付成功中有返回  
            $input->SetOut_refund_no(WxPayApi::getNonceStr());         //退款单号  
            $input->SetTotal_fee($order['total_price']*100);         //订单标价金额，单位为分  
            $input->SetRefund_fee($order['total_price']*100);            //退款总金额，订单总金额，单位为分，只能为整数  
            $input->SetOp_user_id($merchid);  
            $wxpayapi = new WxPayApi($mySite->appid,$mySite->mchid,$mySite->mchkey,$this->site_id);
            $result = $wxpayapi->refund($input); //退款操作  
            if(($result['return_code']=='SUCCESS') && ($result['result_code']=='SUCCESS')){  
                //退款成功  
                $order['status'] = 4;
                $this->orders_model->update_order($order,array('order_id'=>$_GET['order_id']));
            }else if(($result['return_code']=='FAIL') || ($result['result_code']=='FAIL')){  
                //退款失败  
                //原因  
                $reason = (empty($result['err_code_des'])?$result['return_msg']:$result['err_code_des']);  
            }else{  
                //失败  
            }  
            $data['status']=0;
            $data['data']=$result;
            $this->output->set_output(json_encode($data)); 
        }  

        private function getJsApiParameters($UnifiedOrderResult,$key)  
        {    //判断是否统一下单返回了prepay_id  
            if(!array_key_exists("appid", $UnifiedOrderResult)  
                || !array_key_exists("prepay_id", $UnifiedOrderResult)  
                || $UnifiedOrderResult['prepay_id'] == "")  
            {  
                throw new WxPayException("参数错误");  
            }  
            $jsapi = new WxPayJsApiPay();  
            $jsapi->SetAppid($UnifiedOrderResult["appid"]);  
            $timeStamp = time();  
            $jsapi->SetTimeStamp("$timeStamp");  
            $jsapi->SetNonceStr(WxPayApi::getNonceStr());  
            $jsapi->SetPackage("prepay_id=" . $UnifiedOrderResult['prepay_id']);  
            $jsapi->SetSignType("MD5");  
            $jsapi->SetPaySign($jsapi->MakeSignNew($key));  
            $parameters = json_encode($jsapi->GetValues());  
            return $parameters;  
        }
        
        private function user_coupons($buyer_id,$order_price)
        {
            $this->load->model('promotions/promotions_model',NULL,FALSE,array('site_id'=>$this->site_id));
            $where = [
                      'site_id'     =>  $this->site_id,
                      'user_token'  =>  $buyer_id,
                      'recv_type'    =>  1,  
                    ];
            $results = $this->promotions_model->get_user_coupons($where);
            $data = array();
            $i = 0;
            foreach($results as $result){
                $coupon = $this->promotions_model->get_coupons(array('id'=>$result['coupon_id']))[0];
                //是否已使用
                if(intval($result['recv_type'])!=1){
                    continue;
                }
                //是否满足满立减条件
                if($coupon['coupon_type']==0 && $order_price<$coupon['coupon_condition']){
                    continue;
                }
                //是否线下优惠
                if($coupon['coupon_type']==3||$coupon['coupon_type']==4||$coupon['coupon_type']==5){
                    continue;
                }
                //优惠额度是否超过订单总额
                if($order_price<$coupon['value']){
                    continue;
                }
                //是否过期
                if(strtotime($coupon['end_use_date'])<strtotime(date("y-m-d h:i:s"))){
                    continue;
                }
                //是否在当天指定时间内
                if($this->get_curr_time_section($coupon['start_use_time'],$coupon['end_use_time'])){
                    continue;
                }
                //判断是否在工作日
                if($coupon['exclude_weekend']==1&&date('w')==6||$coupon['exclude_weekend']==1&&date('w')==0){
                    continue;
                }
                //判断是否在法定节假日
                //该函数需要调用外部接口，因为安全因素暂时不提供
                $text = "";
                switch($coupon['coupon_type']){
                    case 0:
                        $text = "（满".$coupon['coupon_condition'].",减".floatval($coupon['value'])."元)";
                        break;
                    case 1:
                        $text = "（打".$coupon['value']."折)";
                        break;
                    case 2:
                        $text = "(可抵扣".$coupon['value']."元)";
                }
                $data[$i]['user_coupon_id'] = $result['id'];
                $data[$i]['coupon_id'] = $coupon['id'];
                $data[$i]['name'] = $coupon['title'];
                $data[$i]['type'] = $coupon['coupon_type'];
                $data[$i]['condition'] = $coupon['coupon_condition'];
                $data[$i]['value'] = floatval($coupon['value']);
                $data[$i]['discount_type'] = 'coupon';
                $data[$i]['title'] = $coupon['title'].$text;
                $i++;
            }
            return $data;
        }
        
        private function get_curr_time_section($begin_time,$end_time)  
        {  
            if($begin_time==""||$begin_time==null||$end_time==""||$end_time==null){
                return true;
            }
            $checkDayStr = date('Y-m-d ',time());  
            $timeBegin1 = strtotime($checkDayStr.$begin_time);  
            $timeEnd1 = strtotime($checkDayStr.$end_time);  

            $curr_time = time();  

            if($curr_time >= $timeBegin1 && $curr_time <= $timeEnd1)  
            {  
                return true;  
            }  

            return false;  
        }  
  
        
 
}

