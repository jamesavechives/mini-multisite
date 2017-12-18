<?php

class Orders_model extends CI_Model {
        private $table_orders;
        private $table_cart;
        private $table_wxaddress;
        public function __construct($param=array())
        {
                $site_id = $param['site_id'];
                $this->table_orders='wx_'.$site_id.'_orders';
                $this->table_cart='wx_'.$site_id.'_cart';
                $this->table_wxaddress='wx_'.$site_id.'_wxaddress';
                $this->load->database();
        }
        
        
        public function get_orders($array = NULL,$sort=NULL,$paginate=NULL){
            
                $this->db->select('*');
                $this->db->from($this->table_orders);
                if(null != $array ){
                    $this->db->where($array);
                }
                if(null != $sort){
                 //   $this->db->order_by('',$sort);
                }
                else {
                   $this->db->order_by('add_time','desc'); 
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
                    $this->db->from($this->table_orders);
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
        
        public function search_orders($str = NULL,$paginate=NULL){
            $this->db->select('*');
            $this->db->from($this->table_orders);
            $this->db->like('title',$str);
            $this->db->or_like('model_number',$str);
            $this->db->or_like('description',$str);
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
                $this->db->from($this->table_orders);
                $this->db->like('title',$str);
                $this->db->or_like('model_number',$str);
                $this->db->or_like('description',$str);
                $query = $this->db->get();
                $data[1] = $query->num_rows();
                return $data;
            }
            else {
                return $query->result_array();
            }
        }
        public function create_cart($data=array())
        {   
            $where = [
                'buyer_id'=>$data['buyer_id'],
                'goods_id'=>$data['goods_id']
            ];
            $this->db->select('*');
            $this->db->from($this->table_cart);
            $this->db->where($where);
            $query=$this->db->get();
            $num = $query->num_rows();
            
            if($num == 0){
                $this->db->insert($this->table_cart,$data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
            else{
                $result = $query->result_array();
                $update_id = $result[0]['id'];
                $this->db->update($this->table_cart,$data,$where);
                return $update_id;
            }
        }
        public function delete_cart($ids=array())
        {
            $this->db->where_in('id',$ids);
            $this->db->delete($this->table_cart);
        }
        public function get_cart_list($data=array())
        {   
            $this->db->select('*');
            $this->db->from($this->table_cart);
            if(null !=$data){
                $this->db->where($data);
            }
            $query = $this->db->get();
            return $query->result_array();
        }
        public function add_address($data=array())
        {
            $where = [
                'buyer_id'=>$data['buyer_id'],
                'detailInfo'=>$data['detailInfo']
              ];
            $this->db->select('*');
            $this->db->from($this->table_wxaddress);
            $this->db->where($where);
            $query = $this->db->get();
            $num = $query->num_rows();
            if($num ==0 ){
                $this->db->insert($this->table_wxaddress,$data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
            else{
                $result = $query->result_array();
                $update_id = $result[0]['id'];
                return $update_id;
            }
        }
        public function get_address($array=NULL){
            $this->db->select('*');
            $this->db->from($this->table_wxaddress);
            if(null !=$array){
                $this->db->where($array);
            }
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function del_address($where=NULL){
            if($where!=null){
                $this->db->delete($this->table_wxaddress,$where);
            }
        }
        
        public function add_order($data,$cart_arr){
            $this->db->insert($this->table_orders,$data);
            $insert_id = $this->db->insert_id();
            if($insert_id>0){
                foreach($cart_arr as $cart){
                    $this->db->delete($this->table_cart,array('id'=>$cart['cart_id']));
                }
                return true;
            }
            else{
                return false;
            }
        }
        public function cancel_order($data=array()){
            $this->db->update($this->table_orders,array('status'=>7),$data);
        }
        public function update_order($data=array(),$where=array()){
            $this->db->update($this->table_orders,$data,$where);
        }
        
        //获取已付款订单金额
        public function get_paid_amount($array=NULL){
            $this->db->select_sum('order_total_price');
            $this->db->from($this->table_orders);
            if(null != $array ){
                    $this->db->where($array);
            }
            $query = $this->db->get();
            return $query->result();
        }
        
        //获取订单数量
        public function get_orders_num($array=NULL){
            $this->db->select('*');
            $this->db->from($this->table_orders);
            if(null != $array ){
                $this->db->where($array);
            }
            $query = $this->db->get();
            $data = $query->num_rows();
            return $data;
        }
        
}

