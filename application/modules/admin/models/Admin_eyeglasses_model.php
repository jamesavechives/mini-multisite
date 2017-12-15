<?php
require_once("Admin_model.php");
class Admin_eyeglasses_model extends Admin_model {
        static protected $table_products;
        public function __construct($param=array())
        {
            $args = func_get_args();
            call_user_func_array(array($this, 'parent::__construct'), $args);
            self::$table_products= parent::$table_products;
            $this->load->database();
                
        }
        public function get_backend_icons()
        {
            $query = $this->db->get_where('backend_icons');
            return $query->result_array();
        }
        
        public function set_products($id=0)
        {
            
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'category' => $this->input->post('category'),
                'brand_name' => $this->input->post('brand_name'),
                'model_number' => $this->input->post('model_number'),
                'material' => $this->input->post('material'),
                'gender' => $this->input->post('gender'),
                'frame_color' => $this->input->post('frame_color'),
                'lens_color' => $this->input->post('lens_color'),
                'lens_width' => $this->input->post('lens_width'),
                'nose_bridge' => $this->input->post('nose_bridge'),
                'temple' => $this->input->post('temple'),
                'total_width' => $this->input->post('total_width'),
                'vertical' => $this->input->post('vertical'),
                'lens_index' => $this->input->post('lens_index'),
                'is_recommend' => (null !==$this->input->post('is_recommend'))?$this->input->post('is_recommend'):0,
                'is_private' => (null !==$this->input->post('is_private'))?$this->input->post('is_private'):0,
                 'updated_at'=> date("Y-m-d H:i:s"),   
            );
            if($id == 0 ){
                $data['created_at'] = date("Y-m-d H:i:s");
                $this->db->insert(self::$table_products, $data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            } 
            else {
                $this->db->where('id',$id);
                $this->db->update(self::$table_products, $data);
                return $id;
            }
        }
        public function generate_site_tables($site_id){
            $customers_table = 'wx_'.$site_id.'_customers';
            $products_table = 'wx_'.$site_id.'_products';
            $media_table = 'wx_'.$site_id.'_media';
            $products_media_table = 'wx_'.$site_id.'_products_media';
            $this->load->dbforge();
            // generate customers table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'od_sph' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'os_sph' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'od_cyl' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'os_cyl' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'od_axis' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'os_axis' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'od_add' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'os_add' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'od_pd' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'os_pd' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'pd' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'lens_index' => array(
                            'type' => 'FLOAT',
                            'null' => TRUE,
                    ),
                    'lens_detail' => array(
                            'type' => 'TEXT',
                            'null' => TRUE,
                    ),
                    'frame_style' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'frame_material' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'frame_detail' => array(
                            'type' => 'TEXT',
                            'null' => TRUE,
                    ),
                    'created_at' => array(
                            'type' =>'DATE',
                    ),
                    'updated_at' => array(
                            'type' =>'DATE',
                    ),
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($customers_table);
            
            // generate products table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'title' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'description' => array(
                            'type' => 'TEXT',
                    ),
                    'price' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'stock' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'category' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 255,
                    ),
                    'brand_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 255,
                    ),
                    'model_number' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 255,
                    ),
                    'material' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                    ),
                    'gender' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                    ),
                    'frame_color' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                    ),
                    'lens_color' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                    ),
                    'lens_width' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'nose_bridge' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'temple' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'total_width' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'vertical' => array(
                           'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'lens_index' => array(
                            'type' => 'DOUBLE',
                    ),
                    'is_recommend' => array(
                            'type' => 'TINYINT',
                            'constraint' => 1,
                            'default' => 0,
                    ),
                    'is_private' => array(
                            'type' => 'TINYINT',
                            'constraint' => 1,
                            'default' => 0,
                    ),
                    'created_at' => array(
                            'type' =>'DATE',
                    ),
                    'updated_at' => array(
                            'type' =>'DATE',
                    ),
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($products_table);
            // generate media table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'title' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'guid' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'created_at' => array(
                            'type' =>'DATE',
                    ),
                    'updated_at' => array(
                            'type' =>'DATE',
                    ),
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($media_table);
            // generate products media table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'id_product' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'id_media' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                   
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($products_media_table);
            
        }
        
}

