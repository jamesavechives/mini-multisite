<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <h2 class="card-title">订单列表</h2>
        <button type="button" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>')" class="btn btn-danger btn-sm waves-effect"><i class="zmdi zmdi-plus">全部订单</i></button>
 </div>

    <div class="card-block">
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th>产品</th>
                <th>数量</th>
                <th>单价</th>
                <th>小计</th>
                <th>买家</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($orders as $order){
                        echo '<tr bgcolor="#D3D3D3">';
                        echo '<td colspan="3">订单ID：'.$order['order_id'].' </td>';
                        echo '<td colspan="3">发起时间: '.$order['add_time'].'</td>';
                        echo '<td><a  onclick="show_page_for_backend(\''.$this->config->base_url().'transactions/details?order_id='.$order['order_id'].'\')">订单详情</a></td>';
                        echo '</tr>';
                        $i = 0;
                        foreach($order['products'] as $product){
                            $status = "";
                            switch(intval($order["status"])){
                                case 0:
                                    $status = "待付款";
                                    break;
                                case 1:
                                    $status = "待发货";
                                    break;
                                case 2:
                                    $status ="待收获";
                                    break;
                                case 3:
                                    $status ="待评价";
                                    break;
                                case 4:
                                    $status ="已完成";
                                    break;
                                case 7:
                                    $status ="已关闭";
                                    break;
                                default:
                                    $status="未知";
                                    break;
                            }
                            echo '<tr>';
                            echo '<td ><img style="width:50px;height:50px" src="'.$product['cover'].'" /> '.$product['title'].'</td>';
                            echo '<td >'. $product['num'] .'</td>';
                            echo '<td >'. $product['price'] .'元</td>';
                            if($i==0){
                                echo '<td rowspan="'.$order["count"].'" valign="middle">'. $order["total_price"] .'元</td>';
                                echo '<td rowspan="'.$order["count"].'" valign="middle">'. $order["buyer_name"] .'</td>';
                                echo '<td rowspan="'.$order["count"].'" valign="middle">'. $status .'</td>';
                                echo '<td rowspan="'.$order["count"].'"></td>';
                            }
                            $i++;
                            echo '</tr>';
                        }
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