<div class="login">
  <!-- Login -->
  <div class="login__block active" id="l-login">
    <div id="infoMessage" ><?php echo $message;?></div>
    <div class="login__block__header">
      <i class="zmdi zmdi-account-circle"></i>
      <div id="infoMessage"><?php echo $message;?></div>
      <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
    </div>

    <div class="login__block__body">
      <?php echo form_open("auth/forgot_password");?>
        <div  class="form-group form-group--float form-group--centered form-identity">
          <?php echo form_input($identity);?>
          <i class="form-group__bar"></i>
        </div>
        <?php echo form_submit('submit', lang('forgot_password_submit_btn'), array('class' => 'btn btn-submit-primary btn--icon-text waves-effect btn-block'));?>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>