<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/items.css">
<header class="content__title">
    <h1>设置产品</h1>
    <small>在本页设置产品信息.</small>
</header>

<div class="card">
<?php echo validation_errors(); ?>

    <div class="card-block">
        <form id="form-edit-mandate">
            <?php
                if ( $jisu['id'] >0 ) {
                    echo '<input type="hidden" name="id" value="' . $jisu['id'] . '">';
                }
            ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <text>标题</text>
                        <input type="input" name="title" value="<?php  echo (($jisu['id'] >0 ) ? $jisu['title']:''); ?>" class="form-control"  required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <text>价格</text>
                        <input type="number" class="form-control"  name="price" value="<?php  echo (($jisu['id'] >0 ) ? $jisu['price']:''); ?>" required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <text>库存</text>
                        <input type="number" class="form-control" name="stock" value="<?php  echo (($jisu['id'] >0 ) ? $jisu['stock']:''); ?>" required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <text>分类</text>
                        <table>
                                        <tbody>
                                                <?php
                                                    foreach($cates as $cate){
                                                        echo '<tr bgcolor="#D3D3D3">';
                                                        echo '<td >'. $cate['name'] .'</td>';
                                                        $checked = (in_array($cate['category_id'], $now_cates))?"checked":"";
                                                        echo '<td ><input class="pcate p'.$cate['category_id'].'" type="checkbox" name="category[]" data-id="'.$cate['category_id'].'"  value="'.$cate['category_id'].'_'.$cate['name'].'"  '.$checked.'/></td>';
                                                        echo '</tr>';
                                                        foreach($cate['subclass'] as $sub){
                                                            echo '<tr >';
                                                            echo '<td >'. $sub['name'] .'</td>';
                                                            $checked = (in_array($sub['category_id'], $now_cates))?"checked":"";
                                                            echo '<td ><input class="subcate sub'.$cate['category_id'].'" type="checkbox" name="category[]" data-pid="'.$cate['category_id'].'"  value="'.$sub['category_id'].'_'.$sub['name'].'"  '.$checked.'/></td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <text>发货重量</text>
                        <input type="input" name="weight" class="form-control"  value="<?php  echo (($jisu['id'] >0 ) ? $jisu['weight']:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <text>发货体积</text>
                        <input type="input" name="volume" class="form-control"  value="<?php  echo (($jisu['id'] >0 ) ? $jisu['volume']:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="field-group">
                      <input type="button" class="add-goods-specification" value="添加规格"/>
                            <div class="specification-detail-container">
                            <ul class="list-unstyled specification-selected-list"></ul>
                            <div class="specification-detail-table"></div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="express_rule_id" value="1" <?php  echo (($jisu['id'] >0 && $jisu['express_rule_id'] == 0) ? "checked":''); ?>/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">包邮</span>
                    </label>
                </div>
                <div class="col-sm-12">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="is_recommend"  value="1" <?php  echo (($jisu['id'] >0 && $jisu['is_recommend'] == 1) ? "checked":''); ?>/>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">是否推荐</span>
                    </label>
                </div>
            </div>
            <br>
            <br>

            <div class="col-sm-12">
                <textarea name="description" class="form-control" rows="10" placeholder="产品描述" required><?php  echo (($jisu['id'] >0 ) ? $jisu['description']:''); ?></textarea>
                <i class="form-group__bar"></i>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-sm-12">
                    <label>上传产品图片</label>
                    <div id="attachments">
                        <div id="sortable" class="d-flex flex-row align-content-wrap flex-wrap">
                            <button id='btn-add-picture' class='form-upload' type="button">
                                <img src="<?php echo base_url().'assets/' ?>images/img-upload.png">
                            </button>
                            <?php
                            if ( isset( $images ) && $images != null ) {
                                foreach ( $images as $image ) {
                                    echo '<div class="img-preview img-preview-gallery d-flex flex-column" data-image="' . $image['image_id'] . '">';
                                    echo '<img src="' . $image['image_url'] . '">';
                                    echo '<div class="del-attachment btn btn-sm" data-id="' . $image['image_id'] . '">Delete</div>';
                                    echo '<input type="hidden" name="sorts[]" value="' . $image['image_id'] . '" />';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <input type='hidden' id='delete-existing-file' name='delete-existing-file' value=''>
                </div>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" name="submit" class="btn btn-danger waves-effect btn-block" value="发布产品" />
                    <input type="button"  class="btn  btn-block" onclick="show_page_for_backend('<?php echo base_url()?>admin/products')" value="取消" />
                </div>
            </div>
        </form>
        <div id='new-input-file' hidden></div>
    </div>
</div>
<div class="modal small fade in" id="goodsSpecificationModal" tabindex="-1" role="dialog"  aria-labelledby="goodsSpecificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h5 class="modal-title">商品规格项目</h5>
      </div>
      <div class="modal-body">
        <div class="goods-modal-content">
          <h5>我的规格</h5>
          <div>
                        <!-- <span class="btn btn-sm btn-default goods-specification-input"><input class="form-control" type="text"><span class="glyphicon glyphicon-ok"></span></span> -->
            <button class="btn btn-sm btn-default add-custom-specification">
            <span class="glyphicon glyphicon-plus"></span> 添加标签</button>
          </div>
          <hr>
          <h5>常规规格</h5>
          <div>
            <span class="btn btn-sm btn-default goods-specification" data-index="1">尺码</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="2">颜色</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="3">口味</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="4">容量</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="5">套餐</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="6">种类</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="7">尺寸</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="8">重量</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="9">型号</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="10">款式</span>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn btn-primary goods-specification-confirm">确定</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/items.js"></script>

