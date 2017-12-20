<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <h2 class="card-title">产品列表</h2>
        <button type="button" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>admin/create_products')" class="btn btn-danger btn-sm waves-effect"><i class="zmdi zmdi-plus"> 新增产品</i></button>
    </div>

    <div class="card-block">
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th>图片</th>
                <th>标题</th>
                <th>价格</th>
                <th>类别</th>
                <th>销量</th>
                <th>推荐</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($products as $product){
                        $recom = (intval($product['is_recommend'])==0)?"否":"是";
                        echo '<tr><td ><img style="width:50px;height:50px" src="'.$product['guid'].'" /></td>';
                        echo '<td >'. $product['title'] .'</td>';
                        echo '<td >'. $product['price'] .'</td>';
                        echo '<td >'. $product['category'] .'</td>';
                        echo '<td >'. $product['sales'] .'</td>';
                        echo '<td >'. $recom .'</td>';
                        echo '<td ><a onclick="show_page_for_backend(\'' . $this->config->base_url() . 'admin/create_products?pid='.$product['id'].'\')" ><button class="btn btn-sm btn-outline-primary waves-effect" style="margin-right:10px;"><i class="zmdi zmdi-edit"></i> 编辑</button></a>';
                        echo '<a onclick="delete_item(\''.$product['id'].'\')" ><button class="btn btn-sm btn-outline-danger waves-effect"><i class="zmdi zmdi-delete"></i> 删除</button></a></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
  <div>
   <?php
   echo $paginate['page']." of ".ceil($paginate['records']/$paginate['each_page_count']);
   if(isset($previous)){
       echo '<a onclick="show_page_for_backend(\''.$previous.'\')"> < </a> ';
   }
   if(isset($next)){
       echo '<a onclick="show_page_for_backend(\''.$next.'\')"> > </a> ';
   }
   ?>
   </div>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/items.js"></script>