<?php

class Products_model extends CI_Model {
        static private $table_products;
        static private $table_media;
        static private $table_products_media;
        
        public function __construct($param=array())
        {
                $site_id = $param['site_id'];
                self::$table_products='wx_'.$site_id.'_products';
                self::$table_media='wx_'.$site_id.'_media';
                self::$table_products_media='wx_'.$site_id.'_products_media';
                $this->load->database();
        }
        
        public function get_recommend($limit=null){
            $this->db->select('*');
            $this->db->from(self::$table_products);
            $this->db->where(array('is_recommend'=>1,'is_deleted'=>0));
            $this->db->order_by('id','asc');
            if($limit =="no-limit" ){
            }
            else if($limit == null){
                $this->db->limit(6);
            }    
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_newest(){
            $this->db->select('*');
            $this->db->from(self::$table_products);
            $this->db->where(array('is_deleted'=>0));
            $this->db->order_by('updated_at','desc');
            $this->db->limit(6);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_products($array = NULL,$sort=NULL,$paginate=NULL){
            
                $this->db->select('*');
                $this->db->from(self::$table_products);
                if(null != $array ){
                    $this->db->where($array);
                }
                if(null != $sort){
                    $this->db->order_by('price',$sort);
                }
                else {
                   $this->db->order_by('updated_at','desc'); 
                }
                if(null !=$paginate ){
                    $index = intval($paginate['page']);
                    $row = intval($paginate['each_page_count']);
                    $this->db->limit($row,($index-1)*$row);
                }
                $query = $this->db->get();
                
                // get total records
                if(null !=$paginate ){
                    $data[0] = $query->result_array(); 
                    $this->db->select('*');
                    $this->db->from(self::$table_products);
                    if(null != $array ){
                        $this->db->where($array);
                    }
                    $query = $this->db->get();
                    $data[1] = $query->num_rows();
                    return $data;
                } else {
                    return $query->result_array();
                }
            
        }
        
        public function get_products_by_cate($cate_id,$array=null){
            $this->db->select('*');
            $this->db->from(self::$table_products);
            if(null != $array ){
                    $this->db->where($array);
            }
            $query = $this->db->get();
            $products = $query->result_array();
            $goods = array();
            foreach($products as $product){
                if(in_array($cate_id, unserialize($product['category_id']))){
                    $goods[]=$product;
                }
            }
            return $goods;
        }
        
        public function search_products($str = NULL,$sort=NULL,$paginate=NULL){
            $this->db->select('*');
            $this->db->from(self::$table_products);
            $this->db->where(array('is_deleted'=>0));
            $this->db->like('title',$str);
            $this->db->or_like('description',$str);
            if(null != $sort){
                $sort_key = $sort['sort_key'];
                $sort_direction = (isset($sort['sort_direction'])&&($sort['sort_direction']==0))?'desc':'asc';
                $this->db->order_by($sort_key,$sort_direction);
            }
            else {
               $this->db->order_by('updated_at','desc'); 
            }
            if(null !=$paginate ){
                    $index = intval($paginate['page']);
                    $row = intval($paginate['each_page_count']);
                    $this->db->limit($row,($index-1)*$row);
                }
            $query = $this->db->get();
            // get total records
            if(null !=$paginate ){
                $data[0] = $query->result_array(); 
                $this->db->select('*');
                $this->db->from(self::$table_products);
                $this->db->like('title',$str);
                $this->db->or_like('description',$str);
                $query = $this->db->get();
                $data[1] = $query->num_rows();
                return $data;
            }
            else {
                return $query->result_array();
            }
        }
        
        public function get_main_image($pid) {
            $this->db->select('id_media');
            $this->db->from(self::$table_products_media);
            $this->db->where('id_product',$pid);
            $this->db->order_by("id","asc");
            $this->db->limit(1);
            if(null!=($qe=$this->db->get()->row())){
                $media_id = $qe->id_media;
                if(is_numeric($media_id)&&$media_id>0){
                    $query = $this->db->query("select guid from ".self::$table_media." where id=".$media_id." order by id asc limit 1");
                    return $query->result_array();
                }
            }
             else {
                return false;
            }
        }
        
        public function get_images($pid) {
            $this->db->select('id_media');
            $this->db->from(self::$table_products_media);
            $this->db->where('id_product',$pid);
            $this->db->order_by("id","asc");
            $media_ids = $this->db->get()->result_array();
            $ids = array();
            $i = 0;
            foreach($media_ids as $media_id){
                $ids[$i]['image_id'] = $media_id['id_media'];
                $query = $this->db->query("select guid from ".self::$table_media." where id=".$media_id['id_media']." order by id asc limit 1");
                if(null != $query->result_array()){
                    $ids[$i]['image_url'] = $query->result_array()[0]['guid'];
                }
                $i = $i + 1;
            }
            return $ids;
        }
        
        public function get_brands(){
                $this->db->select('brand_name');
                $this->db->from(self::$table_products);
                $this->db->group_by("brand_name");
            $brands_array = $this->db->get()->result_array();
            $brands = array();
            foreach($brands_array as $brand){
                $brands[] = $brand['brand_name'];
            }
            return $brands;
        }
        
        public function get_categories($array = NULL,$sort=NULL,$paginate=NULL){
            $this->db->select('*');
            $this->db->from('products_categories');
            if(null != $array ){
                $this->db->where($array);
            }
            if(null != $sort){
            //    $this->db->order_by('price',$sort);
            }
            else {
               $this->db->order_by('group_id','asc'); 
            }
            if(null !=$paginate ){
                $index = intval($paginate['page']);
                $row = intval($paginate['each_page_count']);
                $this->db->limit($row,($index-1)*$row);
            }
            $query = $this->db->get();

            // get total records
            if(null !=$paginate ){
                $data[0] = $query->result_array(); 
                $this->db->select('*');
                $this->db->from('products_categories');
                if(null != $array ){
                    $this->db->where($array);
                }
                $query = $this->db->get();
                $data[1] = $query->num_rows();
                return $data;
            } else {
                return $query->result_array();
            }
        }
        
}

