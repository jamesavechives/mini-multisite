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
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="input" name="name" value="<?php  echo (isset($mysite->name) ? $mysite->name:''); ?>" placeholder="Name" maxlength="125" required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                         <?php  
                           switch($mysite->industry){
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
            </div>
            <br>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="phone" class="form-control" placeholder="手机号码" name="phone" maxlength="11" value="<?php  echo (isset($mysite->phone) ? $mysite->phone:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="联系人" name="contact" maxlength="125" value="<?php  echo (isset($mysite->contact ) ? $mysite->contact:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" maxlength="250" value="<?php  echo (isset($mysite->address ) ? $mysite->address:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="小程序APPID" name="appid" maxlength="125" value="<?php  echo (isset($mysite->appid ) ? $mysite->appid:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="secret_key" class="form-control" placeholder="小程序密钥" maxlength="250" value="<?php  echo (isset($mysite->secret_key ) ? $mysite->secret_key:''); ?>" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <textarea name="description" class="form-control" rows="10" placeholder="站点描述" required>
                    <?php  echo (isset($mysite->description ) ? $mysite->description:''); ?>
                </textarea>
                <i class="form-group__bar"></i>
            </div>
            <br>
            <br>
          <div class="row">
                <div class="col-sm-12">
                    <input type="submit" name="submit" class="btn btn-danger waves-effect btn-block" value="更新站点" />
                </div>
            </div>
        </form>
        <div id='new-input-file' hidden></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/items.js"></script>

