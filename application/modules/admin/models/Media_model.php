<?php

class Media_model extends CI_Model {
        private $table_media;
        public function __construct($param=array())
        {       if(isset($param['site_id'])){
                    $site_id = $param['site_id'];
                    $this->table_media='wx_'.$site_id.'_media';
            }
                $this->load->database();
        }
        
        public function get_media_list($paginate=NULL){
            $this->db->select('*');
            $this->db->from($this->table_media);
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
                $this->db->from($this->table_media);
                $query = $this->db->get();
                $data[1] = $query->num_rows();
                return $data;
            } else {
                return $query->result_array();
            }
        }
        
        public function delete_media($id){
            $this->db->select('guid');
            $this->db->from($this->table_media);
            $this->db->where('id',$id);
            $guid = $this->db->get()->row()->guid;
            $file_name = $guid;
            unlink($file_name);
            $this->db->delete($this->table_media,array('id'=>$id));
        }
}

