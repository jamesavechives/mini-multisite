<header class="content__title">
    <h1><?php echo lang('create_user_heading');?></h1>
    <small><?php echo lang('create_user_subheading');?></small>
</header>

<div class="card">
      <div class="card-block d-flex justify-content-between">
            <button onclick="show_page_for_backend(\'' . $base_url . 'admin/index\')" class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-home"></i> Home</button>
            <button onclick="show_page_for_backend(\'' . $base_url . 'auth\')" class="btn btn-secondary btn--icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Back</button>
      </div>
</div>

<div class="card">
      <div class="card-header">
            <div id="infoMessage">
                  <?php echo $message;?>
            </div>
      </div>
      <div class="card-block">
            <?php echo form_open("auth/create_user"); ?>
                  <h3 class="card-block__title">Common edit information</h3>
                  <br>
                  <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                                    <?php echo form_input($first_name);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                        <div class="col-sm-6">
                              <div class="form-group">
                                    <?php echo form_input($last_name);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                  </div>
                  <?php
                        if($identity_column!=='email') {
                        echo '<p class="alert alert-warning">';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                        }
                  ?>
                  <div class="row">
                        <div class="col-sm-4">
                              <div class="form-group">
                                    <?php echo form_input($company);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                        <div class="col-sm-4">
                              <div class="form-group">
                                    <?php echo form_input($email);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                        <div class="col-sm-4">
                              <div class="form-group">
                                    <?php echo form_input($phone);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                                    <?php echo form_input($password);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                        <div class="col-sm-6">
                              <div class="form-group">
                                    <?php echo form_input($password_confirm);?>
                                    <i class="form-group__bar"></i>
                              </div>
                        </div>
                  </div>
                  <div class="form-group">
                        <?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-outline-info waves-effect btn-block btn-lg'));?>
                  </div>
            <?php echo form_close();?>
      </div>
</div>
