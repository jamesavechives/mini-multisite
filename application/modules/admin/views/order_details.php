<div class="card">
      <div class="card-block d-flex justify-content-between">
            <button onclick="show_page_for_backend(\'' . $base_url . 'admin/index\')" class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-home"></i> Home</button>
            <button class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Back</button>
      </div>
</div>

<div class="card order__details">
    <div class="card-block">
        <div class="order__invoice-heading">
            <h3>Invoice to</h3>
            <ul>
                <li><?php echo $order['buyer_name'];?></li>
                <li><span class="badge badge-info"><?php echo $order['address']['UserName'];?></span></li>
                <li>地址: <?php echo $order['address']['provinceName'].$order['address']['cityName'].$order['address']['countyName'].$order['address']['detailInfo'];?></li>
                <li>电话: <?php echo $order['address']['telNumber'];?></li>
            </ul>
        </div>
        <ul class="order__invoice-second">
            <li>
                <span>订单号</span>
                <span><?php echo $order['order_id'];?></span>
            </li>
            <li>
                <span>订单状态</span>
                <span>
                <?php 
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
                    echo $status;
                ?>
                </span>
            </li>
            <li>
                <input type="button" class="btn btn-outline-info waves-effect" text="立即发货" value="现在发货" />
            </li>
        </ul>

        <table class="table table-bordered mb-0">
            <tbody>
                <?php
                    $i = 0;
                    foreach($order['products'] as $product){
                        echo '<tr>';
                        echo '<td ><img style="width:50px;height:50px;margin-right: 15px;" src="'.$product['cover'].'" /> '.$product['title'].'</td>';
                        echo '<td >'. $product['num'] .'</td>';
                        echo '<td >'. $product['price'] .'元</td>';
                        if($i==0){
                            echo '<td rowspan="'.$order["count"].'" valign="middle">'. $order["total_price"] .'元</td>';
                            echo '<td rowspan="'.$order["count"].'"><input type="button" class="btn btn-outline-info btn-block waves-effect" value="操作" /></td>';
                        }
                        $i++;
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
