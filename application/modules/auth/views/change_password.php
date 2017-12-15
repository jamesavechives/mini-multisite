<header class="content__title">
    <h1>设置| 修改密码</h1>
    <small>本页您可以将自己的旧密码修改成新密码.</small>
</header>

<div class="card">
      <div class="card-block d-flex justify-content-between">
            <button onclick="show_page_for_backend(\'' . $base_url . 'admin/index\')" class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-home"></i> Home</button>
            <button class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Back</button>
      </div>
</div>

<div class="card">
      <div class="card-header">
            <h2 class="card-title">修改密码</h2>
            <div id="infoMessage"><?php echo $message;?></div>
      </div>
      <div class="card-block">
      <?php echo form_open("auth/change_password");?>
            <div class="form-group">
                  <?php echo form_input($old_password);?>
                  <i class="form-group__bar"></i>
            </div>
            <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group">
                              <?php echo form_input($new_password);?>
                              <i class="form-group__bar"></i>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group">
                              <?php echo form_input($new_password_confirm);?>
                              <i class="form-group__bar"></i>
                        </div>
                  </div>
            </div>
            <div class="form-group">
                  <?php echo form_input($user_id);?>
                  <?php echo form_submit('submit', lang('change_password_submit_btn'), array('class' => 'btn btn-outline-info waves-effect btn-lg btn-block'));?>
            </div>
      <?php echo form_close();?>
      </div>
</div>
