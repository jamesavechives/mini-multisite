<?php

class Promotions_model extends CI_Model {
        private $table_coupons;
        private $table_user_coupons;
        public function __construct($param=array())
        {
                $site_id = $param['site_id'];
                $this->table_coupons='coupons';
                $this->table_user_coupons = 'user_coupons';
                $this->load->database();
        }
        
        
        public function get_coupons($array = NULL,$paginate=NULL){
            
                $this->db->select('*');
                $this->db->from($this->table_coupons);
                if(null != $array ){
                    $this->db->where($array);
                }
                $this->db->order_by('add_time','desc'); 
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
                    $this->db->from($this->table_coupons);
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
        
        public function insert_coupon($data){
            $this->db->insert($this->table_coupons,$data);
        }
        public function update_coupon($data,$where){
            $this->db->update($this->table_coupons,$data,$where);
        }
        
        public function get_user_coupons($array,$paginate=NULL){
            $this->db->select('*');
            $this->db->from($this->table_user_coupons);
            if(null != $array ){
                $this->db->where($array);
            }
            $this->db->order_by('recv_time','desc'); 
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
                $this->db->from($this->table_user_coupons);
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
        
        public function insert_user_coupon($data){
            $this->db->insert($this->table_user_coupons,$data);
        }
        
        public function update_user_coupon($data,$where){
            $this->db->update($this->table_user_coupons,$data,$where);
        }
        
        public function add_consume_num($coupon_id){
            $this->db->where('id',$coupon_id);
            $this->db->set('consume_num','consume_num+1',false);
            $this->db->update($this->table_coupons);
        }
}

