<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Admin.php");

class Items extends Admin {
        public function __construct()
        {
                parent::__construct();
                
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
             $result = $this->products_model->get_products(array('is_deleted'=>0),null,$paginate);
             $egs = $result[0];
             $paginate['records'] = $result[1];
             $i = 0;
             foreach($egs as $eg){
                 $cate = unserialize($eg['category']);
                 if(is_array($cate)&&count($eg['category'])>0){
                    $egs[$i]['category']=implode(',',$cate);
                 }
                 else{
                     $egs[$i]['category']="";
                 }
               // if(($main_image = $this->products_model->get_main_image($eg['id'])) != null)
                {
                    $egs[$i]['guid'] =$this->products_model->get_main_image($eg['id'])[0]['guid'];
                    $i++;
                }
             }
             $data['products'] = $egs;
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) ){
                 $data['next'] = $base_url."admin/products?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."admin/products?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."admin/products?page=".$previous;
                 $data['next'] = $base_url."admin/products?page=".$next;
             }
            $this->load->view('admin/'.$this->industry.'/products', $data);
        }
        
        public function productslist()
        {
            $photo_id=1;
            if(isset($_GET['photo_id'])){
                $photo_id=$_GET['photo_id'];
            }
            // paginate
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 5;
             $result = $this->products_model->get_products(array('is_deleted'=>0),null,$paginate);
             $egs = $result[0];
             $paginate['records'] = $result[1];
             $i = 0;
             foreach($egs as $eg){
            //    if(($main_image = $this->products_model->get_main_image($eg['id'])) != null)
                {
                    $main_image = $this->products_model->get_main_image($eg['id']);
                    $egs[$i]['guid'] =$main_image[0]['guid'];
                    $i++;
                }
             }
             $data['products'] = $egs;
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count'])) ){
                 $data['next'] = $base_url."admin/productslist?photo_id=".$photo_id."&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."admin/productslist?photo_id=".$photo_id."&page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."admin/productslist?photo_id=".$photo_id."&page=".$previous;
                 $data['next'] = $base_url."admin/productslist?photo_id=".$photo_id."&page=".$next;
             }
            $this->load->view('admin/'.$this->industry.'/productslist', $data);
        }
        
        public function create_products()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a '.$this->industry.' item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $now_cates = array();
            if(isset($_GET['pid'])){
                $data[$this->industry] = $this->products_model->get_products(array('id' => $_GET['pid']))[0];
                $data['images'] = $this->products_model->get_images( $_GET['pid'] );
                $now_cates = unserialize($data[$this->industry]['category_id']);
                if(!is_array($now_cates)){
                    $now_cates = array();
                }
            }
            else{
                $data[$this->industry]['id'] = 0;
            }
            
            if ($this->form_validation->run() === FALSE)
            {
                $where = array(
                 'site_id'=>$this->site_id,
                 'ctype' => 0,
                );
                 
                 $data['now_cates'] = $now_cates;
                 $cates = $this->products_model->get_categories($where);
                 $class = array();
                 $i = 0;
                 foreach($cates as $cate){
                     $subclass = $this->products_model->get_categories(array('pid'=>$cate['category_id']));
                     $class[$i] = $cate;
                     $class[$i]['subclass'] = $subclass;
                     $i++;
                 }
                 $data['cates']=$class;
                $this->load->view('admin/'.$this->industry.'/create_products',$data);

            }
            else
            {
                 if(null!= $this->input->post('id')){
                    //update item
                    $item_id = $this->input->post('id');
                    $this->{$this->industry_model}->set_products($item_id);
                }
                else{
                // insert item
                    $item_id = $this->{$this->industry_model}->set_products();
                }
                // import images
                $this->handle_images($item_id,$this->input->post('sorts'));
            }
        }
        
        public function delete_products()
        {
            if(isset($_GET['pid'])){
                $this->{$this->industry_model}->delete_products($_GET['pid']);
            }
        }
        
        public function products_categories()
        {
            // paginate
             $paginate = array();
             $page = 1;
             if(isset($_GET['page'])){
                 $page = $_GET['page'];
             }
             $paginate['page'] = $page;
             $paginate['each_page_count'] = 15;
             $where = array(
                 'site_id'=>$this->site_id,
                 'ctype' => 0,
             );
             $result = $this->products_model->get_categories($where,null,$paginate);
             $cates = $result[0];
             $class = array();
             $i = 0;
             foreach($cates as $cate){
                 $subclass = $this->products_model->get_categories(array('pid'=>$cate['category_id']));
                 $class[$i] = $cate;
                 $class[$i]['subclass'] = $subclass;
                 $i++;
             }
             $paginate['records'] = $result[1];
             $data['cates'] = $class;
             $data['paginate'] = $paginate;
             $base_url = $this->config->base_url();
             if(($page == 1) &&($page!=ceil($paginate['records']/$paginate['each_page_count']))&&$paginate['records']>0 ){
                 $data['next'] = $base_url."admin/products_categories?&page=2";
             }
             else if(($page >1) && $page == ceil($paginate['records']/$paginate['each_page_count']))
             {
                 $previous = $page-1;
                 $data['previous'] = $base_url."admin/products_categories?page=".$previous;
             }
             else if($page > 1){
                 $previous = $page-1;
                 $next = $page+1;
                 $data['previous'] = $base_url."admin/products_categories?page=".$previous;
                 $data['next'] = $base_url."admin/products_categories?page=".$next;
             }
            $this->load->view('admin/products_categories', $data);
        }
        
        public function create_category()
        {
            $where = array(
                'site_id'=>$this->site_id,
                'ctype'  => 0,
            );
            $p_cate = $this->products_model->get_categories($where);
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a '.$this->industry.' category';

            $this->form_validation->set_rules('name', 'Name', 'required');
            
            if(isset($_GET['cid'])){
                $data['cate'] = $this->products_model->get_categories(array('category_id' => $_GET['cid']))[0];
            }
            else{
                $data['cate']['category_id'] = 0;
            }
            if ($this->form_validation->run() === FALSE)
            {
                $data['root_cates'] = $p_cate;
                $this->load->view('admin/create_category',$data);

            }
            else
            {
                $cate_id = 0;
                 if(null!= $this->input->post('category_id')){
                    //update item
                    $cate_id = $this->input->post('category_id');
                    $this->admin_model->set_category($this->site_id,$cate_id);
                }
                else{
                // insert item
                    $cate_id= $this->admin_model->set_category($this->site_id);
                    $p_cateid = $this->input->post('pid');
                    if(isset($p_cateid)&&($p_cateid>0)){
                        $where = array(
                                'site_id'=>$this->site_id,
                                'category_id'  => $p_cateid,
                            );
                            $p_cate = $this->products_model->get_categories($where)[0];
                            $subclass = unserialize($p_cate['subclass']);
                            array_push($subclass,$cate_id);
                            $p_cate['subclass'] = serialize($subclass);
                            $this->admin_model->update_category($p_cate,$where);
                    }
                }
                // upload image
                if(!empty($_FILES['cate_image']['name'])){
                    $_FILES['file']['name'] = $_FILES['cate_image']['name'];
                    $_FILES['file']['type'] = $_FILES['cate_image']['type'];
                    $_FILES['file']['tmp_name'] = $_FILES['cate_image']['tmp_name'];
                    $_FILES['file']['error'] = $_FILES['cate_image']['error'];
                    $_FILES['file']['size'] = $_FILES['cate_image']['size'];
                    $uploadResults = json_decode($this->upload(),true);
                    if($uploadResults['code'] == 0){
                        $fileData = $uploadResults['data'];
                        $cover = $fileData['imgUrl'];
                        $where = array(
                                'site_id'=>$this->site_id,
                                'category_id'  => $cate_id,
                            );
                        $data = array('cover'=>$cover);
                        $this->admin_model->update_category($data,$where);
                    }
                    $this->output->set_output('successfully');
                }else{
                    $this->output->set_output('no photo');
                }
            }
        }
        
        private function handle_images( $item_id , $sorts ){
            // If there is new uploads files, then upload them
            if(!empty($_FILES['images']['name'])){
                        $filesCount = count($_FILES['images']['name']);
                        $tmp = array();
                        for($i = 0; $i < $filesCount; $i++){
                            $_FILES['file']['name'] = $_FILES['images']['name'][$i];
                            $_FILES['file']['type'] = $_FILES['images']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['images']['error'][$i];
                            $_FILES['file']['size'] = $_FILES['images']['size'][$i];
                            $uploadResults = json_decode($this->upload(),true);
                            if($uploadResults['code'] == 0){
                                $fileData = $uploadResults['data'];
                                $uploadData['guid'] = $fileData['imgUrl'];
                                $uploadData['created_at'] = date("Y-m-d H:i:s");
                                $uploadData['updated_at'] = date("Y-m-d H:i:s");
                                //Insert file information into the database
                                $file_id = $this->{$this->industry_model}->insert_single_file($uploadData);
                                if (is_numeric( $file_id ) && $file_id > 0 ) {
                                    $tmp['raw_img_'.$_FILES['file']['name']] = $file_id ;
                                 }
                            }
                        }
                    }
                    $new_sorts = array();
                    $i = 0 ;
                    foreach ( $sorts as $sort ){
                        $new_sorts[$i]['id_product'] = $item_id;
                        if (is_numeric($sort)){
                            $new_sorts[$i]['id_media'] = $sort;
                        } else if(null!=$tmp && isset($tmp)) {
                            $new_sorts[$i]['id_media'] = $tmp[$sort];
                        }
                        $i = $i + 1;
                    }
                    $this->{$this->industry_model}->delete_products_media(array('id_product'=>$item_id));
                    $this->{$this->industry_model}->insert_products_media_batch($new_sorts);
                    // delete the existing images that no longer need
                    if ( (  $this->input->post('id') != null ) && ! empty( $this->input->post('delete-existing-file') ) ) {
				$delete_ids = explode( ',', $this->input->post('delete-existing-file')  );
				foreach ( $delete_ids as $id ) {
                                        
					$this->{$this->industry_model}->delete_media($id);
				}
			}
                
        }
           
}

