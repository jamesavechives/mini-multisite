<header class="content__title">
    <h1>本站点</h1>
    <small>本页您可以设置本站点基本信息.</small>
</header>

<div class="card">

    <div class="card-block">
        <form id="form-edit-mysite">
            <?php
                if ( $mysite->id >0 ) {
                    echo '<input type="hidden" name="id" value="' . $mysite->id . '">';
                }
            ?>
            <div class="row">
                <div class="col-sm-2">
                    <h6> 站点名称: </h6>
                </div>
                <div class="form-group col-sm-8">
                        <input type="input" class="form-control" name="name" value="<?php echo (isset($mysite->name) ? $mysite->name : ''); ?>"  maxlength="125" required/>
                         <i class="form-group__bar"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <h6>站点类别:</h6>
                    <i class="form-group__bar"></i>
                </div>
                <div class="form-group col-sm-8">
                        <?php
                        switch ($mysite->industry) {
                            case 'eyeglasses':
                                echo '眼镜';
                                break;
                            case 'jisu':
                                echo '电商';
                                break;
                            default:
                                echo '其它';
                                break;
                        }
                        ?> 
                        <i class="form-group__bar"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <h6>手机号码:</h6>
                    <i class="form-group__bar"></i>
                </div>
                <div class="col-sm-4 form-group">
                        <input type="phone" class="form-control"  name="phone" maxlength="11" value="<?php  echo (isset($mysite->phone) ? $mysite->phone:''); ?>" />
                        <i class="form-group__bar"></i>
                </div>
                <div class="col-sm-2">
                    <h6>联系人:</h6>
                    <i class="form-group__bar"></i>
                </div>
                <div class="col-sm-4 form-group">
                        <input type="text" class="form-control"  name="contact" maxlength="125" value="<?php  echo (isset($mysite->contact ) ? $mysite->contact:''); ?>" />
                        <i class="form-group__bar"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <h6>地址:</h6>
                </div>
                <div class="col-sm-10 form-group">
                        <input type="text" name="address" class="form-control"  maxlength="250" value="<?php  echo (isset($mysite->address ) ? $mysite->address:''); ?>" />
                        <i class="form-group__bar"></i>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-sm-2">
                    <h6>小程序APPID:</h6>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="appid" maxlength="125" value="<?php  echo (isset($mysite->appid ) ? $mysite->appid:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h6>密钥:</h6>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" name="secret_key" class="form-control"  maxlength="250" value="<?php  echo (isset($mysite->secret_key ) ? $mysite->secret_key:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class="col-sm-2">
                                <h6>站点描述:</h6>
                            </div>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" rows="10"  required>
                                <?php  echo (isset($mysite->description ) ? $mysite->description:''); ?>
                            </textarea>
                            <i class="form-group__bar"></i>
                        </div>
            </div>
            <br>
            <br>
            <div class="col-sm-6" id="attachment">
                            <button id='btn-upload-logo' data-from="about"  type="button">
                                设置站点LOGO
                            </button>
                      
                       <div id="img-div">
                           <?php if(isset($mysite->app_logo)){ ?> 
                          <div class="image-preview img-preview-gallery d-flex flex-column">
                            <img style="width:100px;height:100px" src="<?php echo $mysite->app_logo; ?>">
                          </div>
                           <?php } ?>
                           <input type="hidden" name="app-logo" value="<?php echo $mysite->app_logo; ?>" />
                       </div>
             </div>
            <br>
            <br>
          <div class="row">
                <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-danger waves-effect btn-block" value="更新站点" />
                </div>
            </div>
        </form>
        <div id='new-input-file' hidden></div>
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
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/about.js"></script>

