<?php
require_once("Admin_model.php");
class Admin_jisu_model extends Admin_model {
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
            $cates = $this->input->post('category');
            foreach($cates as $cate){
                $cate_array = explode('_',$cate);
                $cate_id[] = $cate_array[0];
                $cate_name[] = $cate_array[1];
            }
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category' => serialize($cate_name),
                'category_id' => serialize($cate_id),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'specifications' => $this->input->post('specifications'),
                'weight' => $this->input->post('weight'),
                'volume' => $this->input->post('volume'),
                'express_rule_id' => $this->input->post('express_rule_id'),
                'is_recommend' => (null !==$this->input->post('is_recommend'))?$this->input->post('is_recommend'):0,
                'is_deleted'   => 0,
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
            $orders_table = 'wx_'.$site_id.'_orders';
            $cart_table = 'wx_'.$site_id.'_cart';
            $wxaddress_table = 'wx_'.$site_id.'_wxaddress';
            $this->load->dbforge();
            $this->create_customers_table($customers_table);
            $this->create_products_table($products_table);
            $this->create_media_table($media_table);
            $this->create_products_media_table($products_media_table);
            $this->create_cart_table($cart_table);
            $this->create_wxaddress_table($wxaddress_table);
            $this->create_orders_table($orders_table);
            
        }
        private function create_products_table($table_name){
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
                    'specifications' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'description' => array(
                            'type' => 'TEXT',
                    ),
                    'price' => array(
                            'type' => 'float',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'sale_price' => array(
                            'type' => 'float',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'weight' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'volume' => array(
                            'type' => 'float',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'stock' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'category' => array(
                            'type' => 'text',
                            'null'   => TRUE,
                    ),
                    'category_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 225,
                            'default'   => 0,
                    ),
                    'type' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'default'   => 0,
                    ),
                    'goods_type' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'default'   => 0,
                    ),
                    'sales' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'delivery_id' => array(
                            'type' => 'TINYINT',
                            'constraint' => 2,
                            'default'   => 0,
                    ),
                    'region_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default'   => 0,
                    ),
                    'express_rule_id' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'default'   => 0,
                            'null' => TRUE,
                    ),
                    'integral' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'default'   => -1,
                    ),
                    'max_can_use_integral' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'default'   => 0,
                    ),
                    'mass' => array(
                            'type' => 'float',
                            'default' => 1.00,
                    ),
                    'is_seckill' => array(
                            'type' => 'TINYINT',
                            'constraint' => 2,
                            'default'   => 2,
                    ),
                    'seckill_status' => array(
                            'type' => 'TINYINT',
                            'constraint' => 2,
                            'default'   => 2,
                    ),
                    'is_recommend' => array(
                            'type' => 'TINYINT',
                            'constraint' => 1,
                            'default' => 0,
                    ),
                    'is_group_buy_goods' => array(
                            'type' => 'TINYINT',
                            'constraint' => 1,
                            'default' => 0,
                    ),
                    'is_deleted' => array(
                            'type' => 'TINYINT',
                            'constraint' => 1,
                            'default' => 0,
                    ),
                    'server_time' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(now()),
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
            $this->dbforge->create_table($table_name);
        }
        
        private function create_customers_table($table_name){
            // generate customers table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'user_token' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'session_key' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'weixin_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'qq' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'nickname' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'cover_thumb' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '225',
                            'null' => TRUE,
                    ),
                    'subscribe' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'sex' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'last_time' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => intval(time()),
                    ),
                    'status' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'province' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'city' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'country' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'terminal' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'model' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'integral' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'model' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'default' => "",
                    ),
                    'is_update' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 1,
                    ),
                    'contact_status' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'null' => TRUE,
                    ),
                    'group' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'tags' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'remark_email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'remark_phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'remark_qq' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'company' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'weixin_code' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'remark_weixin_code' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'add_time' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(time()),
                    ),
                    'update_time' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(time()),
                    ),
                    'is_deleted' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'from_manual' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'type' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'extra_attr' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'can_use_integral' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'last_login_date' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(time()),
                    ),
                    'today_share_count' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'total_share_count' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => 0,
                    ),
                    'sns_banned_flag' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'sns_gagged_flag' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'sns_integral' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'balance' => array(
                            'type' => 'float',
                            'constraint' => '4',
                            'default' => 0.00,
                    ),
                
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($table_name);
        }
        private function create_media_table($table_name){
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
            $this->dbforge->create_table($table_name);
        }
        
        private function create_products_media_table($table_name){
            
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
            $this->dbforge->create_table($table_name);
        }
        
        private function create_cart_table($table_name){
            // generate cart table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'buyer_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'goods_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'model_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                    ),
                    'num' => array(
                            'type' => 'SMALLINT',
                            'constraint' => 4,
                            'unsigned' => TRUE,
                    ),
                    'add_time' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(time()),
                    ),
                
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($table_name);
        }
        private function create_wxaddress_table($table_name){
            // generate wxaddress table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'buyer_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'detailInfo' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),
                    'cityName' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'provinceName' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'UserName' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'district' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'telNumber' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'countyName' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'add_time' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'default' => intval(time()),
                    ),
                
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($table_name);
        }
        private function create_orders_table($table_name){
            // generate orders table
            $fields = array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'order_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'buyer_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'cart_arr' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '555',
                            'null' => TRUE,
                    ),
                    'form_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                            'null' => TRUE,
                    ),
                    'is_balance' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 1,
                    ),
                    'selected_benefit' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '225',
                            'null' => TRUE,
                    ),
                    'is_self_delivery' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 1,
                    ),
                    'remark' => array(
                            'type' => 'TEXT',
                            'null' => TRUE,
                    ),
                    'address_id' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE,
                    ),
                    'additional_info' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'voucher_coupon_goods_info' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'express_fee' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'can_use_benefit' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '125',
                            'null' => TRUE,
                    ),
                    'discount_cut_price' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'is_group_buy_order' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'is_self_delivery' => array(
                            'type' => 'TINYINT',
                            'constraint' => '1',
                            'default' => 0,
                    ),
                    'location_id' => array(
                            'type' => 'SMALLINT',
                            'constraint' => '4',
                            'default' => 0,
                    ),
                    'order_total_price' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'original_express_fee' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'original_price' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'pay_mode_id' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => 0,
                    ),
                    'payment_id' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => 0,
                    ),
                    'payment_time' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => 0,
                    ),
                    'refund_time' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'default' => 0,
                    ),
                    'status' => array(
                            'type' => 'TINYINT',
                            'constraint' => '2',
                            'default' => 0,
                    ),
                    'total_price' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'use_balance' => array(
                            'type' => 'float',
                            'default' => 0.00,
                    ),
                    'add_time' => array(
                            'type' => 'TIMESTAMP',
                            'default' => date("Y-m-d H:i:s"),
                    ),
                
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);
            $this->dbforge->create_table($table_name);
        }
}

