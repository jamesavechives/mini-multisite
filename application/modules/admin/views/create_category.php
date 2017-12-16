<header class="content__title">
    <h1>设置分类</h1>
    <small>本页您可以设置产品分类.</small>
</header>

<div class="card">
<?php echo validation_errors(); ?>
    <div class="card-block">
        <form id="form-edit-category">
            <?php
                if ( $cate['category_id'] >0 ) {
                    echo '<input type="hidden" id="c_id" name="category_id" value="' . $cate['category_id'] . '">';
                    echo '<input type="hidden" id="c_type" name="ctype" value="' . $cate['ctype'] . '">';
                    echo '<input type="hidden"  name="pid" value="' . $cate['pid'] . '">';
                }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <text>分类名称</text>
                        <input type="input" name="name" value="<?php  echo (isset($cate['name']) ? $cate['name']:''); ?>"  maxlength="125" required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <text>分类级别</text>
                        <input type="radio" name="ctype" value="0" <?php echo (!isset($cate['ctype'])||($cate['ctype']!=1))?"checked":"";  ?> />一级分类
                        <input type="radio" name="ctype" value="1" <?php echo (isset($cate['ctype'])&&($cate['ctype']==1))?"checked":""; ?>  />二级分类
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="subclass col-sm-12" style="display:none">
                    <div class="col-sm-6 form-group">
                        <text>请选择对应的一级分类</text>
                         <select class="form-control" id="cate_parent" name="pid" >
                             <?php
                             foreach($root_cates as $root_cate){
                                 $selected = ($cate['pid'] == $root_cate['category_id'])?"selected":'';
                                 echo '<option value="'.$root_cate['category_id'].'" '.$selected.'>'.$root_cate['name'].'</option>';
                             }
                             ?>
                        </select>
                        <i class="form-group__bar"></i>
                    </div>
                   <div class="col-sm-6" id="attachment">
                            <button id='btn-upload-picture'  type="button">
                                上传分类图片
                            </button>
                      
                       <div id="img-div">
                           <?php if(isset($cate['cover'])){ ?> 
                          <div class="image-preview img-preview-gallery d-flex flex-column">
                            <img style="width:100px;height:100px" src="<?php echo $cate['cover']; ?>">
                          </div>
                           <?php } ?>
                       </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
          <div class="row">
                <div class="col-sm-4">
                    <input type="submit" name="submit" class="btn btn-danger waves-effect btn-block" value="设置分类" />
                    <input type="button"  class="btn  btn-block" onclick="show_page_for_backend('<?php echo base_url()?>admin/products_categories')" value="取消" />
                </div>
            </div>
        </form>
        <div id='new-img-file' hidden><input type="file" name="cate-image" id="cate_image" multipe="false"/></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/category.js"></script>

