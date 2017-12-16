<header class="content__title">
    <h1>首页轮播图片</h1>
</header>

<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <h2 class="card-title">轮播图片</h2>
    </div>

    <div class="card-block">
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th>顺序</th>
                <th>轮播图片</th>
                <th>产品图片</th>
                <th>产品名称</th>
                <th>更改轮播图片</th>
                <th>更改产品</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    foreach($photos as $photo){
                        if(is_array($photo)){
                            echo '<tr>';
                            echo '<td >'. $i .'</td>';
                            echo '<td ><img style="width:50px;height:50px" src="'.$photo['pic'].'" /></td>';
                            if($photo['item_cover']!='no-settings'){
                                echo '<td ><img style="width:50px;height:50px" src="'.$photo['item_cover'].'" /></td>';
                                echo '<td >'. mb_substr($photo['goods-name'],0,10,"utf-8") .'</td>';
                            //    echo '<td data-id="'.$i.'"><input type="file" id="pictureInput'.$i.'" name="upfile"  value="更改图片" /></td>';
                                echo '<td data-id="'.$i.'"><input type="button" id="choosePic'.$i.'" name="pic"  value="更改图片" class="btn-change-media btn btn-primary" /></td>';
                                echo '<td ><input type="button" data-id="'.$i.'"  value="更改产品" class="btn-change-product btn btn-primary" /></td>';
                            } else {
                                echo '<td >未设置产品</td>';
                                echo '<td >无产品</td>';
                            //    echo '<td data-id="'.$i.'"><input type="file" id="pictureInput'.$i.'" name="upfile"  value="更改图片" /></td>';
                                echo '<td data-id="'.$i.'"><input type="button" id="choosePic'.$i.'" name="pic"  value="更改图片" class="btn-change-media btn btn-primary"/></td>';
                                echo '<td ><input type="button" data-id="'.$i.'" value="设置产品" class="btn-change-product btn btn-primary" /></td>';
                            }
                            
                            echo '</tr>';
                        } else {
                            echo '<tr>';
                            echo '<td >'. $i .'</td>';
                            echo '<td >未设置图片</td>';
                            echo '<td >未设置产品</td>';
                            echo '<td >无产品</td>';
                        //    echo '<td data-id="'.$i.'"><input type="file" id="pictureInput'.$i.'" name="upfile"  value="设置图片" /></td>';
                            echo '<td data-id="'.$i.'"><input type="button" id="choosePic'.$i.'" name="pic"  value="设置图片" class="btn-change-media btn btn-primary" /></td>';
                            echo '<td ><input type="button" data-id="'.$i.'" value="设置产品" class="btn-change-product btn btn-primary" /></td>';
                            echo '</tr>';
                        }
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!--Product Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">选择产品</h2>
        <button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      </div>
    </div>
  </div>
</div>
<!--Media Modal -->
<div class="modal fade bd-media-modal-lg" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="mediaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="mediaModalLabel">选择图片</h2>
        <button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/admin-carousel.js"></script>

