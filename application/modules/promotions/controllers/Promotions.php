<?php
class Promotions extends CI_Controller {
        protected $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):0;
                $this->load->model('promotions_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }
        public function get_coupons()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                    $buyer=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0];
                    $buyer_id = $buyer['weixin_id'];
                    
                $where = [
                    'site_id' => $this->site_id, 
                    'enable_status' => isset($_GET['enable_status'])?$_GET['enable_status']:1,
                    'in_show_list'  => isset($_GET['in_show_list'])?$_GET['in_show_list']:1,
                    'is_deleted' => 0,
                    'end_use_date >'=>date("Y-m-d"),
                 ];
                $paginate=array();
                $paginate['each_page_count'] = isset($_POST['page_size'])?$_POST['page_size']:(isset($_GET['page_size'])?$_GET['page_size']:10);
                $paginate['each_page_count'] = ($paginate['each_page_count'] > 0)?$paginate['each_page_count']:10;
                $paginate['page'] = isset($_POST['page'])?$_POST['page']:(isset($_GET['page'])?$_GET['page']:1);
                $paginate['page'] = ($paginate['page'] >0 )?$paginate['page'] :1;
                $results = $this->promotions_model->get_coupons($where,$paginate);
                $data = array();
                $i = 0;
                foreach($results[0] as $result){
                    $user_coupons = $this->promotions_model->get_user_coupons(array('coupon_id'=>$result['id'],'user_token'=>$buyer_id));
                    $data[$i] = $result;
                    $data[$i]['type'] = $result['coupon_type'];
                    $data[$i]['condition']=$result['coupon_condition'];
                    $data[$i]['recv_status']=((intval($result['stock'])>0)&&(count($user_coupons)<intval($result['limit_num'])))?1:0;
                    $i++;
                }
                $res['data'] = $data;
                $res['status'] = 0;
                $res['count'] = count($results[0]);
                $res['current_page'] = intval($paginate['page']);
                $res['total_page']=ceil($results[1]/$paginate['each_page_count']);
                $res['is_more']=($res['total_page']>$res['current_page'])?1:0;
                $this->output->set_output(json_encode($res));
            }
        }
        public function get_coupon_info()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                    $buyer=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0];
                    $buyer_id = $buyer['weixin_id'];
                    
                    $where = [
                        'site_id' => $this->site_id, 
                        'id' => isset($_GET['coupon_id'])?$_GET['coupon_id']:0,
                     ];
                    $this->load->model('about/about_model');
                    $site = $this->about_model->get_site_detail($this->site_id);
                    $result = $this->promotions_model->get_coupons($where)[0];
                    $user_coupons = $this->promotions_model->get_user_coupons(array('coupon_id'=>$result['id'],'user_token'=>$buyer_id));
                    $data = $result;
                    $data['type'] = $result['coupon_type'];
                    $data['condition'] = $result['coupon_condition'];
                    $data['is_already_recv'] = (intval($result['stock'])>0)&&(count($user_coupons)<intval($result['limit_num']))?0:1;
                    $data['app_name'] = $site->name;
                    $data['logo'] = $site->app_logo;
                    $res['data'] = $data;
                    $res['status'] = 0;
                    $this->output->set_output(json_encode($res));
            }
        }
        public function recv_coupon()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0];
                $buyer_id = $buyer['weixin_id'];
                $coupon = $this->promotions_model->get_coupons(array('id'=>$_GET['coupon_id']))[0];
                $user_coupons = $this->promotions_model->get_user_coupons(array('coupon_id'=>$_GET['coupon_id'],'user_token'=>$buyer_id));
                if(intval($coupon['stock'])>0&&count($user_coupons)<intval($coupon['limit_num'])){
                    $data = [
                      'site_id' =>$this->site_id,
                        'user_token' => $buyer_id,
                        'coupon_id'=> $_GET['coupon_id'],
                        'recv_time'=> date("Y-m-d H:i:s"),
                        'expire_time' => strtotime($coupon['end_use_date'].' '.$coupon['end_use_time']),
                        'consume_time'=> 0,
                        'is_selected'=>1,
                        'expire'=>strtotime($coupon['end_use_date'])-strtotime(date("Y-m-d H:i:s")),
                        'verify_code'=>'cp'.(strtotime($coupon['end_use_date'])-strtotime(date("Y-m-d H:i:s")))
                    ];
                    $this->promotions_model->insert_user_coupon($data);
                    $data = [
                      'stock'=>(intval($coupon['stock'])-1),
                      'recv_num'=>(intval($coupon['recv_num'])+1),
                      
                    ];
                    $where = [
                      'id' => $_GET['coupon_id']  
                    ];
                    $this->promotions_model->update_coupon($data,$where);
                }
                $response = [
                        'limit_num'=>$coupon['limit_num'],
                        'stock'=>(intval($coupon['stock'])-1),
                        'recv_count'=>count($user_coupons)+1,
                        'is_already_recv'=>(intval($coupon['stock']-1)>0)&&(count($user_coupons)+1<intval($coupon['limit_num']))?0:1,
                        
                    ];
                    $res['status'] = 0;
                    $res['data']=$response;
                    $this->output->set_output(json_encode($res));
            }
        }
        
        public function get_user_coupons()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                $buyer=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0];
                $buyer_id = $buyer['weixin_id'];
                $user_info = [
                  'nickname' => $buyer['nickname'],
                    'phone' =>  $buyer['phone']
                ];
                $paginate=array();
                $paginate['each_page_count'] = isset($_POST['page_size'])?$_POST['page_size']:(isset($_GET['page_size'])?$_GET['page_size']:10);
                $paginate['each_page_count'] = ($paginate['each_page_count'] > 0)?$paginate['each_page_count']:10;
                $paginate['page'] = isset($_POST['page'])?$_POST['page']:(isset($_GET['page'])?$_GET['page']:1);
                $paginate['page'] = ($paginate['page'] >0 )?$paginate['page'] :1;
                $type = isset($_POST['type'])?$_POST['type']:(isset($_GET['type'])?$_GET['type']:0);
                if(isset($type)&&intval($type)>1&&intval($type)<3){
                    $where = [
                      'site_id'     =>  $this->site_id,
                      'user_token'  =>  $buyer_id,
                      'recv_type'    =>  $type,  
                    ];
                }
                else if(isset($type)&&intval($type)==1){
                    $where = [
                      'site_id'     =>  $this->site_id,
                      'user_token'  =>  $buyer_id,
                      'recv_type'    =>  $type,  
                      'expire_time >' =>  strtotime(date("Y-m-d"))  
                    ];
                }
                else if(isset($type)&&intval($type)==3){
                    $where = [
                      'site_id'     =>  $this->site_id,
                      'user_token'  =>  $buyer_id,
                      'expire_time <' =>  strtotime(date("Y-m-d"))  
                    ];
                }
                else{
                    $where = [
                      'site_id'     =>  $this->site_id,
                      'user_token'  =>  $buyer_id,
                    ];
                }
                $results = $this->promotions_model->get_user_coupons($where,$paginate);
                $data = array();
                $i = 0;
                foreach($results[0] as $result){
                    $data[$i] = $result;
                    $coupon = $this->promotions_model->get_coupons(array('id'=>$result['coupon_id']))[0];
                    foreach($coupon as $key => $v){ 
                        if($key=='coupon_condition'){
                            $data[$i]['condition'] = $v;
                        }
                        else if($key=='coupon_type'){
                            $data[$i]['type'] = $v;
                        }
                        else if($key=='expire'){
                            
                        }
                        else{
                            $data[$i][$key] = $v;
                        }
                    }
                    $data[$i]['user_info']['user_info'] = $user_info;
                    $i++;
                }
                $res['data'] = $data;
                $res['count'] = count($data);
                $res['current_page'] = intval($paginate['page']);
                $res['total_page']=ceil((intval($results[1]))/$paginate['each_page_count']);
                $res['is_more']=($res['total_page']>$res['current_page'])?1:0;
                $this->output->set_output(json_encode($res));
            }
        }
        
        public function get_user_coupon_info()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $num = $this->customer_model->check_session($skey);
            if($num==0){
                $data['status']=2;
                $data['data']="您未登陆";
                $this->output->set_output(json_encode($data));
            }
            else{
                    $buyer=$this->customer_model->get_customer_info(array('user_token'=>$skey))[0];
                    $buyer_id = $buyer['weixin_id'];
                    
                    $where = [
                        'id' => isset($_GET['user_coupon_id'])?$_GET['user_coupon_id']:0,
                     ];
                    $this->load->model('about/about_model');
                    $site = $this->about_model->get_site_detail($this->site_id);
                    $result = $this->promotions_model->get_coupons($where)[0];
                    $user_coupons = $this->promotions_model->get_user_coupons(array('coupon_id'=>$result['id'],'user_token'=>$buyer_id));
                    $data = $result;
                    $data['type'] = $result['coupon_type'];
                    $data['condition'] = $result['coupon_condition'];
                    $data['status'] = 1;
                    $data['app_name'] = $site->name;
                    $data['logo'] = $site->app_logo;
                    $res['data'][0] = $data;
                    $res['status'] = 0;
                    $this->output->set_output(json_encode($res));
            }
        }
        
 
}

