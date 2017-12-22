<?php

class Userdata_model extends CI_Model {
        private $table_userdata;
        public function __construct($param=array())
        {
                $site_id = $param['site_id'];
                $this->table_userdata='user_message';
                $this->load->database();
        }
        
        
        public function get_userdata($array = NULL,$paginate=NULL){
            
                $this->db->select('*');
                $this->db->from($this->table_userdata);
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
                    $this->db->from($this->table_userdata);
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
        
        public function insert_userdata($data){
            $this->db->insert($this->table_userdata,$data);
        }
        
        public function update_userdata($data,$where){
            $this->db->update($this->table_userdata,$data,$where);
        }
       
}

