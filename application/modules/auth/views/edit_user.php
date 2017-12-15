<header class="content__title">
    <h1><?php echo lang('edit_user_heading');?></h1>
    <small><?php echo lang('edit_user_subheading');?></small>
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
        <?php echo form_open(uri_string());?>
            <h3 class="card-block__title">Common edit information</h3>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo form_input($first_name);?>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($company);?>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($password);?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo form_input($last_name);?>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($phone);?>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($password_confirm);?>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
            </div>

            <?php if ($this->ion_auth->is_admin()): ?>
                <br>
                <h3 class="card-block__title"><?php echo lang('edit_user_groups_heading');?></h3>
                <br>
                
                <div class="form-group">
                    <?php foreach ($groups as $group):?>
                        <label class="custom-control custom-checkbox">
                            <?php
                                $gID=$group['id'];
                                $checked = null;
                                $item = null;
                                foreach($currentGroups as $grp) {
                                    if ($gID == $grp->id) {
                                        $checked= ' checked="checked"';
                                    break;
                                    }
                                }
                            ?>
                            <input type="checkbox" class="custom-control-input" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></span>
                        </label>
                    <?php endforeach?>
                </div>

                <br>
                <h3 class="card-block__title">Member of Sites</h3>
                <br>

                <div class="form-group">
                    <?php foreach ($sites as $site):?>
                        <label class="custom-control custom-checkbox">
                            <?php
                                $sID=$site['id'];
                                $checked = null;
                                $item = null;
                                    if (is_array($user_sites)&&in_array($sID, $user_sites)) {
                                        $checked= ' checked="checked"';
                                    }
                            ?>
                            <input type="checkbox" class="custom-control-input" name="sites[]" value="<?php echo $site['id'];?>"<?php echo $checked;?>>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?php echo htmlspecialchars($site['name'],ENT_QUOTES,'UTF-8');?></span>
                        </label>
                    <?php endforeach?>
                </div>
            <?php endif ?>

            <div class="form-group">
                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>
            </div>

            <div class="form-group">
                <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class' => 'btn btn-outline-info waves-effect btn-block btn-lg'));?>
            </div>
        <?php echo form_close();?>
    </div>
</div>

