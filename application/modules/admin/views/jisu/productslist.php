        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <h2 class="card-title">设置第<?php echo $_GET['photo_id'] ?>张图片的产品</h2>
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
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($products as $product){
                                $recom = (intval($product['is_recommend'])==0)?"否":"是";
                                echo '<tr onclick="bindProduct('.$product['id'].','.$_GET['photo_id'].',\''.$product['title'].'\')"><td ><img style="width:50px;height:50px" src="'.$product['guid'].'" /></td>';
                                echo '<td >'. $product['title'] .'</td>';
                                echo '<td >'. $product['price'] .'</td>';
                                echo '<td >'. $product['category'] .'</td>';
                                echo '<td >'. $product['sales'] .'</td>';
                                echo '<td >'. $recom .'</td>';
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
               echo '<a onclick="show_page_for_modal(\''.$previous.'\')"> < </a> ';
           }
           if(isset($next)){
               echo '<a onclick="show_page_for_modal(\''.$next.'\')"> > </a> ';
           }
           ?>
           </div>

