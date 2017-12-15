<?php

class About_model extends CI_Model{
    
        public function __construct()
        {
                $this->load->database();
        }
        public function get_carousel_photos($site_id){
            $this->db->select('*');
            $this->db->from('carouselPhotos');
            $this->db->where('site_id',$site_id);
            return $this->db->get()->result_array();
        }
        public function get_site_detail($site_id){
            $this->db->select('*');
            $this->db->from('sites');
            $this->db->where('id',$site_id);
            return $this->db->get()->row();
        }
}
