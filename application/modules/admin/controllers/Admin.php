<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \QCloud_WeApp_SDK\Conf as Conf;
use \QCloud_WeApp_SDK\Cos\CosAPI as Cos;
use \QCloud_WeApp_SDK\Constants as Constants;

class Admin extends MX_Controller {
        protected $site_id =0 ;
        protected $industry='';
        protected $industry_model='';
        public function __construct()
        {
                parent::__construct();
                $this->load->library('ion_auth');

                if (!$this->ion_auth->logged_in()) {
                    redirect('/auth', 'refresh');
                }
                $this->load->model('admin_model');
                if(null!=$this->session->userdata('site')){
                    $this->site_id=$this->session->userdata('site')['id'];
                    $this->industry=(null!=($industry=$this->admin_model->get_industry($this->session->userdata('site')['id'])))?$industry:'eyeglasses';
                    $this->industry_model='admin_'.$this->industry.'_model';
                    $this->load->model('admin_'.$this->industry.'_model',NULL,FALSE,array('site_id'=>$this->site_id));
                }
                $this->load->model('media_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->model('products/products_model',NULL,FALSE,array('site_id'=>$this->site_id));
                $this->load->helper('url_helper');
        }
        public function add_session()
        {
            $site['id'] = intval($_GET['site_id']);
            $site['name'] = $_GET['site_name'];
            $this->session->set_userdata('site',$site);
        }
        public function index()
        {
            $data = array();
            $userid = $this->session->userdata('user_id');
            $data['user_id']=$userid;
            
            if($this->site_id==0&&$userid>1){
                 $data['sites'] = $this->admin_model->get_user_sites($userid,'all');
                 if(count($data['sites'])>1){
                    $this->load->view('admin/user_sites',$data);
                 }
                 elseif(count($data['sites'])==1){
                     $site['id']=$data['sites'][0]->id;
                     $site['name']=$data['sites'][0]->name;
                     $this->session->set_userdata('site',$site);
                     $data['site_name']=$site['name'];
                     $this->load->view('templates/header',$data);
                     $this->load->view('templates/footer');
                 }
            } else {
                if(null!=$this->session->userdata('site')){
                    $data['site_name']=$this->session->userdata('site')['name'];
                }
                $this->load->view('templates/header',$data);
                $this->load->view('templates/footer');
            }
        }

        public function view()
        {
            $data = array();
            $this->load->model('orders/orders_model',NULL,FALSE,array('site_id'=>$this->site_id));
            $where = [
              'status > ' =>3  
            ];
            $res = $this->orders_model->get_paid_amount($where);
            $data['total_amount'] = $res[0]->order_total_price;
            $this->load->model('customer/customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
            $where = [
              'add_time >'=>date('Y-m-d').' 00:00:00',  
            ];
            $data['today_order'] = $this->orders_model->get_orders_num($where);
             $where = [
              'status' =>4  
            ];
             $data['process_order'] = $this->orders_model->get_orders_num($where);
            $data['total_customers'] = $this->customer_model->get_customers_num();
            
            $this->load->view('admin/view',$data);
        }
        
        public function settings()
        {
            $base_url = $this->config->base_url();
            $data['base_url'] = $base_url;
            $this->load->view('admin/settings');
        }
        
        
        public function upload() {
            // 处理文件上传
            $file = $_FILES['file']; // 去除 field 值为 file 的文件

            ini_set('upload_max_filesize', '10M');
            ini_set('post_max_size', '10M');

            // 限制文件格式，支持图片上传
            if ($file['type'] !== 'image/jpeg' && $file['type'] !== 'image/png') {
                $this->json([
                    'code' => 1,
                    'data' => '不支持的上传图片类型：' . $file['type']
                ]);
                return;
            }

            // 限制文件大小：5M 以内
            if ($file['size'] > 5 * 1024 * 1024) {
                $this->json([
                    'code' => 1,
                    'data' => '上传图片过大，仅支持 5M 以内的图片上传'
                ]);
                return;
            }

            $cosClient = Cos::getInstance();
            $cosConfig = Conf::getCos();
            $bucketName = $cosConfig['fileBucket'];
            $folderName = $cosConfig['uploadFolder'];

            try {
                /**
                 * 列出 bucket 列表
                 * 检查要上传的 bucket 有没有创建
                 * 若没有则创建
                 */
                $bucketsDetail = $cosClient->listBuckets()->toArray()['Buckets'];
                $bucketNames = [];
                foreach ($bucketsDetail as $bucket) {
                    array_push($bucketNames, explode('-', $bucket['Name'])[0]);
                }

                // 若不存在 bucket 就创建 bucket
                if (count($bucketNames) === 0 || !in_array($bucketName, $bucketNames)) {
                    $cosClient->createBucket([
                        'Bucket' => $bucketName,
                        'ACL' => 'public-read'
                    ])->toArray();
                }

                // 上传文件
                $fileFolder = $folderName ? $folderName . '/' : '';
                $fileKey = $fileFolder . md5(mt_rand()) . '-' . $file['name'];
                $uploadStatus = $cosClient->upload(
                    $bucketName,
                    $fileKey,
                    file_get_contents($file['tmp_name'])
                )->toArray();

            return    (json_encode(array(
                    'code' => 0,
                    'data' => array(
                        'imgUrl' => $uploadStatus['ObjectURL'],
                        'size' => $file['size'],
                        'mimeType' => $file['type'],
                        'name' => $fileKey
                    )
                )));
            } catch (Exception $e) {
            return   (json_encode(array(
                    'code' => 1,
                    'error' => $e->__toString()
                )));
            }
        }
}

