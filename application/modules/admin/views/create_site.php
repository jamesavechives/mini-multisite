<header class="content__title">
    <h1>创建站点</h1>
    <small>在本页您可以创建站点.</small>
</header>

<div class="card">
      <div class="card-block d-flex justify-content-between">
            <button onclick="show_page_for_backend(\'' . $base_url . 'admin/index\')" class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-home"></i> Home</button>
            <button class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Back</button>
      </div>
</div>

<div class="card">
    <div class="card-header">
        <div id="infoMessage">
            <?php echo validation_errors(); ?>
        </div>
    </div>

    <div class="card-block">
        <form id="form-edit-site">
            <h3 class="card-block__title">Site default information</h3>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="input" class="form-control form-control-lg" name="name" value="" placeholder="名称" maxlength="125" required/>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="select">
                            <select class="form-control" name="industry">
                                <option value="eyeglasses">Industry</option>
                                <option value="eyeglasses" >Eyeglasses</option>
                                <option value="realestate" >Real Estate</option>
                                <option value="jisu" >JiSu</option>
                            </select>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="phone" class="form-control form-control-lg" placeholder="手机" name="phone" maxlength="11" value="" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="联系人" name="contact" maxlength="125" value="" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="地址" maxlength="250" value="" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="小程序APPID" name="appid" maxlength="125" value="" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" name="secret_key" class="form-control form-control-lg" placeholder="小程序密钥" maxlength="250" value="" />
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" rows="10" placeholder="描述" required></textarea>
                <i class="form-group__bar"></i>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="submit" name="submit" class="btn btn-outline-info waves-effect btn-lg btn-block" value="设置站点" />
                </div>
                <div class="col-sm-6">
                    <input type="button"  class="btn btn-secondary waves-effect btn-lg btn-block" onclick="show_page_for_backend('<?php echo base_url()?>admin/sites')" value="取消" />
                </div>
            </div>
        </form>
        <div id='new-input-file' hidden></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/items.js"></script>

