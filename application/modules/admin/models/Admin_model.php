<?php

class Admin_model extends CI_Model {
        static protected $table_products;
        static protected $table_media;
        static protected $table_products_media;
        public function __construct($param=array())
        {       if(isset($param['site_id'])){
                    $site_id = $param['site_id'];
                    self::$table_products='wx_'.$site_id.'_products';
                    self::$table_media='wx_'.$site_id.'_media';
                    self::$table_products_media='wx_'.$site_id.'_products_media';
            }
                $this->load->database();
        }
        public function get_backend_icons()
        {
            $query = $this->db->get_where('backend_icons');
            return $query->result_array();
        }
        
        public function insert_files($data = array()){
            $insert = $this->db->insert_batch(self::$table_media,$data);
            return $insert?true:false;
        }
        
        public function insert_single_file($data = array()){
            $this->db->insert(self::$table_media,$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        public function insert_products_media_batch($data = array()){
            $insert = $this->db->insert_batch(self::$table_products_media,$data);
            return $insert?true:false;
        }
        public function delete_products_media($data = array()){
            return $this->db->delete(self::$table_products_media,$data);
        }
        public function delete_media($id){
            $this->db->select('guid');
            $this->db->from(self::$table_media);
            $this->db->where('id',$id);
            $guid = $this->db->get()->row()->guid;
            $file_name = $guid;
            unlink($file_name);
            $this->db->delete(self::$table_media,array('id'=>$id));
        }
        public function delete_products_permanent($pid){
            $this->db->select('id_media');
            $this->db->from(self::$table_products_media);
            $this->db->where('id_product',$pid);
            $media_ids = $this->db->get()->result_array();
            foreach($media_ids as $media_id){
                $m_id = $media_id['id_media'];
                $this->delete_products_media( array('id_media'=>$m_id) );
                $this->delete_media($m_id);
            }
            $this->db->delete(self::$table_products, array('id'=>$pid));
        }
        public function delete_products($pid){
            $this->db->update(self::$table_products,array('is_deleted'=>1),array('id'=>$pid));
        }
        public function create_site($id=0){
            
            if($id==0){
                $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'industry' => $this->input->post('industry'),
                'phone' => $this->input->post('phone'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'appid' => $this->input->post('appid'),
                'app_logo' => $this->input->post('app-logo'),
                'secret_key' => $this->input->post('secret_key'),
                'created_at'=> date("Y-m-d H:i:s"),   
            );
                $this->db->insert('sites', $data);
                $result['site_id'] = $this->db->insert_id();
                $result['industry']=$this->input->post('industry');
                return $result;
            }
            else{
                $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'phone' => $this->input->post('phone'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'appid' => $this->input->post('appid'),
                'app_logo' => $this->input->post('app-logo'),
                'secret_key' => $this->input->post('secret_key'),
                'created_at'=> date("Y-m-d H:i:s"),   
            );
                $this->db->where('id',$id);
                $this->db->update('sites',$data);
                $result['site_id'] = $id;
                $result['industry']=$this->input->post('industry');
                return $result;
            }
        }
        public function get_sites($paginate=NULL){
            $this->db->select('*');
            $this->db->from('sites');
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
                $this->db->from('sites');
                $query = $this->db->get();
                $data[1] = $query->num_rows();
                return $data;
            } else {
                return $query->result_array();
            }
        }
        public function get_industry($site_id){
            $this->db->select('industry');
            $this->db->from('sites');
            $this->db->where('id',$site_id);
            $industry = $this->db->get()->row()->industry;
            return $industry;
        }
        public function get_user_sites($user_id,$type="id"){
            $this->db->select('site_id');
            $this->db->from('user_sites');
            $this->db->where('user_id',$user_id);
            $sites = $this->db->get()->result_array();
            if($type =="id"){
                $user_sites = array();
                foreach($sites as $site){
                    $user_sites[]=$site['site_id'];
                }
                return $user_sites;
            } else {
                $user_sites = array();
                $i=0;
                foreach($sites as $site){
                    $this->db->select('*');
                    $this->db->from('sites');
                    $this->db->where('id',$site['site_id']);
                    $user_sites[] = $this->db->get()->row();
                }
                return $user_sites;
            }
        }
        public function get_site_detail($site_id){
            $this->db->select('*');
            $this->db->from('sites');
            $this->db->where('id',$site_id);
            return $this->db->get()->row();
        }
        public function insert_user_sites($user_id,$site_ids){
            $this->db->delete('user_sites',array('user_id'=>$user_id));
            if(is_array($site_ids)){
                foreach($site_ids as $site_id){
                    $this->db->insert('user_sites',array('user_id'=>$user_id,'site_id'=>$site_id));
                }
            } elseif(is_numeric($site_ids)) {
                $this->db->insert('user_sites',array('user_id'=>$user_id,'site_id'=>$site_ids));
            }
        }
        public function set_category($site_id,$cate_id=0)
        {
            $pid = ($this->input->post('ctype')==1)?$this->input->post('pid'):0;
            $data = array(
                'group_id' => 1,
                'site_id' => $site_id,
                'name' => $this->input->post('name'),
                'ctype' => $this->input->post('ctype'),
                'pid' => $pid,
                'updated_at'=> date("Y-m-d H:i:s"),   
            );
            if($cate_id == 0 ){
                $this->db->insert('products_categories', $data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            } 
            else {
                $this->db->where('category_id',$cate_id);
                $this->db->update('products_categories', $data);
                return $cate_id;
            }
        }
        public function update_category($data,$update){
            $this->db->update('products_categories',$data,$update);
        }
        public function set_carousel_photo($data=array()){
            $where=[
              'pid'     =>  $data['pid'],
              'site_id' =>  $data['site_id']
            ];
            $this->db->select("*");
            $this->db->from('carouselPhotos');
            $this->db->where($where);
            $query = $this->db->get();
            $num = $query->num_rows();
            if($num == 0){
                $this->db->insert('carouselPhotos',$data);
            }
            else{
                $this->db->where($where);
                $this->db->update('carouselPhotos',$data);
            }
        }
        
        public function set_carousel_product($data=array()){
            $where=[
              'pid'     =>  $data['pid'],
              'site_id' =>  $data['site_id']
            ];
            $this->db->select("*");
            $this->db->from('carouselPhotos');
            $this->db->where($where);
            $query = $this->db->get();
            $num = $query->num_rows();
            if($num == 0){
                $this->db->insert('carouselPhotos',$data);
            }
            else{
                $new_data = $query->result_array()[0];
                $new_data['goods-id'] = $data['goods-id'];
                $new_data['goods-name']=$data['goods-name'];
                $this->db->where($where);
                $this->db->update('carouselPhotos',$new_data);
            }
        }
        
        
        
       
        
        
}

