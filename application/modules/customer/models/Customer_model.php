<?php

class Customer_model extends CI_Model {
    private $table_customer;
    public function __construct($param=array())
    {
            $this->load->database();
            $site_id = $param['site_id'];
            $this->table_customer='wx_'.$site_id.'_customers';
    }
    public function create_customer($data=array())
    {   
        if(isset($data['weixin_id'])){
            $this->db->delete($this->table_customer,array('weixin_id'=>$data['weixin_id']));
        }
        $this->db->insert($this->table_customer,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function get_customers($paginate=NULL){
        $this->db->select('*');
        $this->db->from($this->table_customer);
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
            $this->db->from($this->table_customer);
            $query = $this->db->get();
            $data[1] = $query->num_rows();
            return $data;
        } else {
            return $query->result_array();
        }
    }
    public function get_customer_info($array=NULL){
        $this->db->select('*');
        $this->db->from($this->table_customer);
        if(null !=$array){
            $this->db->where($array);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_session($skey){
        $this->db->select('*');
        $this->db->from($this->table_customer);
        $this->db->where('user_token',$skey);
        $query = $this->db->get();
        $num = $query->num_rows();
        return $num;
    }
    public function update_session($array=array(),$openid){
        $this->db->update($this->table_customer,$array,array('weixin_id'=>$openid));
    }
    public function check_customer($openid){
        $this->db->select('*');
        $this->db->from($this->table_customer);
        $this->db->where('weixin_id',$openid);
        $query = $this->db->get();
        $num = $query->num_rows();
        return $num;
    }
}

