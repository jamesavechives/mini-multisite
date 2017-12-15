<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <h2 class="card-title">优惠券列表</h2>
        <button type="button" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>coupons/create_coupon')" class="btn btn-danger btn-sm waves-effect"><i class="zmdi zmdi-plus"> 增加优惠券</i></button>
    </div>
    <div class="card-block">
        <table class="table mb-0">
       <thead>
          <tr>
            <th>ID</th>
            <th>类型</th>
            <th>优惠券名称</th>
            <th>优惠方式</th>
            <th>有效期</th>
            <th>库存</th>
            <th>已领张数</th>
            <th>核销次数</th>
            <th>领取列表展示</th>
            <th>操作</th>
            <th>上架使用</th>
          </tr>
        </thead>
            <tbody>
                <?php
                    foreach($coupons as $coupon){
                        $type = 0;
                        $condition_text = "";
                        switch($coupon['coupon_type']){
                            case 0:
                                $type = "满减券";
                                $condition_text = "满".$coupon['condition'].",减".$coupon['value'];
                                break;
                            case 1:
                                $type = "打折券";
                                $condition_text = "打".$coupon['value']."折";
                                break;
                            case 2:
                                $type = "代金券";
                                $condition_text = "可抵扣".$coupon['value']."元";
                                break;
                            case 3:
                                $type = "兑换券";
                                $condition_text = "消费满".$coupon['condition'].",兑换指定商品";
                                break;
                            case 4:
                                $type = "储值券";
                                $condition_text = "面值".$coupon['value']."元";
                                break;
                            case 5:
                                $type = "通用券";
                                $condition_text = $coupon['extra_condition'];
                        }
                        echo '<tr data-id="'. $coupon['id'] .'"><td >'. $coupon['id'] .'</td>';
                        echo '<td >'. $type .'</td>';
                        echo '<td class="coupon-name-td">'. $coupon['title'] .'</td>';
                        echo '<td class="coupon-way-td">'. $condition_text .'</td>';
                        echo '<td class="user-date-td"><div>'. $coupon['start_use_date'] .'至'. $coupon['end_use_date'] .'</div>';
                        echo '<div>';
                        if($coupon['exclude_holiday']){
                            echo '除法定节假日 ';
                        }
                        if($coupon['exclude_holiday']){
                            echo '周一至周五';
                        }
                        echo '</div>';
                        if($coupon['start_use_time']!=""&&$coupon['end_use_time']!=""){
                            echo'<div>'.$coupon['start_use_time'].'-'.$coupon['end_use_time'].'</div>';
                        }
                        echo '</td>';
                        echo '<td >'. $coupon['stock'] .'</td>';
                        echo '<td >'. $coupon['recv_num'] .'</td>';
                        echo '<td >'. $coupon['consume_num'] .'</td>';
                        echo '<td >'. $coupon['in_show_list'] .'</td>';
                        echo '<td><input type="button" onclick="show_page_for_backend(\'' . $this->config->base_url() . 'coupons/view?id='.$coupon['id'].'\')" value="编辑" />';
                        echo '<input type="button" value="删除" />';
                        echo '<input type="button" value="使用情况" /></td>';
                        echo '<td><input type="checkbox" checked  /></td>';
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

