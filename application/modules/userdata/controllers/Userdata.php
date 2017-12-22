<?php
class Userdata extends CI_Controller {
        protected $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):0;
                $this->load->model('userdata_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }
        
        public function add_data()
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
                    $form_data = $_POST['form_data'];
                    $data = [
                        'site_id' => $this->site_id,
                        'buyer_id' => $buyer_id,
                        'name' => $form_data[1],
                        'phone' => $form_data[2],
                        'topic' => $form_data[3],
                        'detail' => $form_data[4],
                        'add_time' => date('Y-m-d H:m:s')
                    ];
                    $this->userdata_model->insert_userdata($data);
                    $res['status']=0;
                    $res['data']="提交成功";
                    $this->output->set_output(json_encode($res));
            }
        }
        
 
}

