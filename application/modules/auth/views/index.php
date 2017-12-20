<header class="content__title">
    <h1><?php echo lang('index_heading');?></h1>
    <small><?php echo lang('index_subheading');?></small>
</header>

<div class="contact row"> 

    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div class="contacts__item contacts__add">
            <span class="contacts__img">
                <img src="<?php echo base_url(). 'assets/' ?>images/user-default.png">
            </span>

            <button type="button" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>auth/create_user')" class="btn btn-outline-info waves-effect"><i class="zmdi zmdi-plus"></i> 新增用户</button>
        </div>
    </div>

    <?php foreach ($users as $user):?>
    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div class="contacts__item">
            <span class="contacts__img">
                <img src="<?php echo base_url().'assets/' ?>images/profile.jpg">
            </span> 

            <div class="contacts__info">
                <strong><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></strong>
                <small><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></small>
            </div>

            <?php echo '<a onclick="show_page_for_backend(\'' . $this->config->base_url() . 'auth/edit_user/'.$user->id.'\')" ><button class="btn btn-outline-info waves-effect"><i class="zmdi zmdi-edit"></i> 编辑</button></a>';?>
        </div>
    </div>
    <?php endforeach;?>

</div>
