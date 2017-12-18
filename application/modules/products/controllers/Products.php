<?php

class Products extends CI_Controller {
        private $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):2;
                $this->load->model('products_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }

        public function index()
        {
            // Get brands
                $data['title']= "Eyeglasses Recommend";
                $this->load->view('templates/home/header');
                $this->load->view('index');
                $this->load->view('templates/home/footer');
        }
        
        public function home()
        {      
            // Get recommend items
                $egs=$this->products_model->get_recommend();
                $i = 0;
                $recommend = array();
                foreach($egs as $eg){
                        $recommend[$i]=$eg;
                        if(($main_image = $this->products_model->get_main_image($eg['id'])) != null){
                            $recommend[$i]['guid'] = $main_image[0]['guid'];
                            $i++;
                        }
                        
                }
                $data['recommend'] = $recommend;
            // Get lateat items
                $egs=$this->products_model->get_newest();
                $i = $j = 0;
                $newest = array();
                foreach($egs as $eg){
                        $newest[$i]=$eg;
                        if(($main_image = $this->products_model->get_main_image($eg['id'])) != null){
                            $newest[$i]['guid'] = $main_image[0]['guid'];
                        }
                        $i++;
                }
                $data['newest'] = $newest;
                $this->output->set_output(json_encode($data));
        }
        
        public function view()
        {
            $param = array('is_deleted'=>0);
            $keep = array();
            foreach($_GET as $key =>$v){
                if($key!="price"&&$key!="page"&&$v!="none"){
                    $keep[$key]=$v;
                    $param[$key]=str_replace('-',' ',$v);
                }
            }
             $sort = null;
             if(isset($_GET['price']) && $_GET['price']!="none"){
                 $sort = $_GET['price'];
             }
            
             // paginate
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 2;
             $result = $this->products_model->get_products($param,$sort,$paginate);
             $egs =$result[0];
             $paginate['records']= $result[1];
             $i = 0;
             foreach($egs as $eg){
                if(($main_image = $this->products_model->get_main_image($eg['id'])) != null){
                    $egs[$i]['guid'] = $main_image[0]['guid'];
                    $i++;
                }
                
             }
             $data['products'] = $egs;
             $keep_link = http_build_query($keep);
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count']))&&($paginate['records']!=0) ){
                 $data['next'] = "view?".$keep_link."&page=2&price=".$sort;
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = "view?".$keep_link."&page=".$previous."&price=".$sort;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = "view?".$keep_link."&page=".$previous."&price=".$sort;
                 $data['next'] = "view?".$keep_link."&page=".$next."&price=".$sort;
             }
             $keep_link=str_replace('&','@',$keep_link);
             $keep_link=str_replace('=','*',$keep_link);
             $data['now']="view~".$keep_link."@page*".$page."@price*".$sort;
             $data['paginate'] = $paginate;
             $this->output->set_output(json_encode($data));
        }
        
        public function search()
        {
            if(isset($_GET['keywords']) && $_GET['keywords']!=""){
                $keywords = str_replace('-', ' ', $_GET['keywords']);
                // paginate
                 $paginate = array();
                 $page = 1;
                 if(isset($_GET['page'])){
                     $page = $_GET['page'];
                 }
                 $paginate['page'] = $page;
                 $paginate['each_page_count'] = 2;
                 $result = $this->products_model->search_products($keywords,null,$paginate);
                 $egs = $result[0];
                 $paginate['records']= $result[1];
                 $i = 0;
                 foreach($egs as $eg){
                    if(($main_image = $this->products_model->get_main_image($eg['id'])) != null){
                        $egs[$i]['guid'] = $main_image[0]['guid'];
                        $i++;
                    }
                 }
                 $data['products'] = $egs;
                 $data['paginate'] = $paginate;
                 if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count']))&&($paginate['records']!=0)){
                     $data['next'] = "search?keywords=".$_GET['keywords']."&page=2";
                 }
                 else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
                 {
                     $previous = $page-1;
                     $data['previous'] = "search?keywords=".$_GET['keywords']."&page=".$previous;
                 }
                 else if($page > 1){
                     $previous = $page-1;
                     $next = $page+1;
                     $data['previous'] = "search?keywords=".$_GET['keywords']."&page=".$previous;
                     $data['next'] = "search?keywords=".$_GET['keywords']."&page=".$next;
                 }
                 $data['now']="search?keywords=".$_GET['keywords']."@page=".$page;
                 $data['brands'] = $this->products_model->get_brands();
                 $this->output->set_output(json_encode($data));
            }
        }
        
        public function details(){
          $data['products'] = $this->products_model->get_products(array('id'=>$_GET['pid']))[0];
          $imgs = $this->products_model->get_images($_GET['pid']);
          $images = array();
          foreach($imgs as $img){
              $images[]=$img['image_url'];
          }
          $data['images'] = $images;
          $this->output->set_output(json_encode($data));
        }
        // The following functions are only for Jisu
        public function goodsList(){
            if(isset($_POST['cate-type'])&&$_POST['cate-type']=='recommend'){
                $goods=$this->products_model->get_recommend();
                $data = $this->get_goodslist($goods);
            } else if(isset($_POST['cate-type'])&&$_POST['cate-type']=='newest'){
                $goods=$this->products_model->get_newest();
                $data = $this->get_goodslist($goods);
            } else if(isset($_POST['search_value'])&&$_POST['search_value']!=''){
                $paginate=array();
                $paginate['each_page_count'] = isset($_POST['page_size'])?$_POST['page_size']:(isset($_GET['page_size'])?$_GET['page_size']:10);
                $paginate['page'] = isset($_POST['page'])?$_POST['page']:(isset($_GET['page'])?$_GET['page']:1); 
                $sort=array();
                if(isset($_POST['sort_key'])&&isset($_POST['sort_direction'])){
                    $sort['sort_key']=$_POST['sort_key'];
                    $sort['sort_direction']=$_POST['sort_direction'];
                }
                $goods = $this->products_model->search_products($_POST['search_value'],$sort,$paginate);
                $data = $this->get_goodslist($goods[0]);
                $data['count'] = count($goods[0]);
                $data['current_page'] = intval($paginate['page']);
                $data['total_page']=ceil($goods[1]/$paginate['each_page_count']);
                $data['is_more']=($data['total_page']>$data['current_page'])?1:0;
            }else {
                $param['is_deleted']=0;
                $param['category'] = $_GET['cate_type'];
                $paginate['each_page_count'] = 10;
                $paginate['page'] = 1;
                $goods = $this->products_model->get_products($param,null,$paginate);
                $data = $this->get_goodslist($goods);
            }
            
            $this->output->set_output(json_encode($data));
        }
        public function formDataList(){
            $idx_arr = isset($_POST['idx_arr'])?$_POST['idx_arr']:$_GET['idx_arr'];
            $key = ($idx_arr['idx']=='category')?'category_id':$idx_arr['idx'];
            if($key!='category_id'){
            $where = [
                        'is_deleted'=>0,
                        $key=>$idx_arr['idx_value']
                    ];
            $goods = $this->products_model->get_products($where);
            }
            else if($idx_arr['idx_value']==0){
                $goods=$this->products_model->get_recommend("no-limit");
            }
            else {
                $where = [
                    'is_deleted'=>0
                ];
               $goods = $this->products_model->get_products_by_cate($idx_arr['idx_value'],$where); 
            }
            $data = $this->get_goodslist($goods);
            $this->output->set_output(json_encode($data));
        }
        public function goodsDetails(){
              $goods = $this->products_model->get_products(array('id'=>$_GET['data_id']))[0];
              $imgs = $this->products_model->get_images($_GET['data_id']);
              $images = array();
              foreach($imgs as $img){
                  $images[]=$img['image_url'];
              }
              $fdata = array();
              foreach($goods as $key=>$v){
                    if($key!='category'&&$key!='category_id'&&$key!='is_group_buy_goods'){
                        $fdata['form_data'][$key]=$v;
                            }
                }
                $fdata['form_data']['img_urls'] = $images; 
                $fdata['form_data']['cover'] = $images[0]; 
                $fdata['form_data']['model_items']=array();
                $fdata['form_data']['model_items']="";
                $fdata['form_data']['express_fee']="";
                $fdata['form_data']['is_group_buy']=$goods['is_group_buy_goods'];
                $fdata['form_data']['category'][0]=$goods['category'];
                $fdata['form_data']['category_id'][0]=$goods['category_id'];
                $fdata['weight'] = 0;
                $data['status'] =0;
                $data['is_more'] =0;
                $data['current_page']=1;
                $data['count']=1;
                $data['total_page']=1;
                $data['data'][0]=$fdata;
                $this->output->set_output(json_encode($data));
        }
        //reviews assess list
        public function getAssessList(){
            $json = json_decode('{"status":0,"data":[],"is_more":0,"total_page":0,"num":["0","0","0","0","0"]}');
            $this->output->set_output(json_encode($json));
        }
        // get category by group
        public function getCategoryByGroup(){
            $group_id = $_GET['group_id'];
            $where = [
              'ctype'  => 0,
              'group_id' => $group_id,
              'site_id'  => $this->site_id
            ];
            $cates = $this->products_model->get_categories($where);
            $items = array();
            $i =0;
            foreach($cates as $cate){
                $items[$i]=$cate;
                $sub_where = [
                  'ctype'           =>  1,
                  'pid'     => $cate['category_id'],
                    'site_id'       => $this->site_id,
                ];
                $items[$i]['subclass']= $this->products_model->get_categories($sub_where);
                $i++;
            }
            $fdata = array();
            $fdata['id']=$group_id;
            $fdata['name']="";
            $fdata['description']="";
            $fdata['form']="goods";
            $fdata['item']=$items;
            $data['status']=0;
            $data['data']=$fdata;
            $this->output->set_output(json_encode($data));
        }
        
        private function get_goodslist($goods=array()){
            $i = 0;
            $fdata = array();
            foreach($goods as $good){
                foreach($good as $key=>$v){
                    if($key!='category'&&$key!='category_id'&&$key!='is_group_buy_goods'){
                        $fdata[$i]['form_data'][$key]=$v;
                    }
                } 
                    if(($main_image = $this->products_model->get_main_image($good['id'])) != null){
                        $fdata[$i]['form_data']['img_urls'][0] = $main_image[0]['guid']; 
                        $fdata[$i]['form_data']['cover'] = $main_image[0]['guid']; 
                    }
                    $fdata[$i]['form_data']['is_group_buy']=$good['is_group_buy_goods'];
                    $fdata[$i]['form_data']['category']=unserialize($good['category']);
                    $fdata[$i]['form_data']['category_id']=unserialize($good['category_id']);
                    $i++;
            }
            $data['status'] =0;
            $data['is_more'] =0;
            $data['current_page']=1;
            $data['count']=count($goods);
            $data['total_page']=1;
            $data['data']=$fdata;
            return $data;
        }
        
}

