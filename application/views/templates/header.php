<!DOCTYPE html>
<html lang="en">
<head>
    <title>蓝色理想开发 - 小程序数据服务</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/app.css">
    <script src="<?php echo base_url().'assets/' ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/jquery-ui.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/common.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/manager.js"></script>
</head>
<body data-ma-theme="blue">
    <main class="main">
        <div class="page-loader">
            <div class="page-loader__spinner">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>

        <header class="header">
            <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                <div class="navigation-trigger__inner">
                    <i class="navigation-trigger__line"></i>
                    <i class="navigation-trigger__line"></i>
                    <i class="navigation-trigger__line"></i>
                </div>
            </div>

            <div class="header__logo hidden-sm-down">
                <h1>
                    <a href="<?php echo base_url() . 'admin/index' ?>">
                        <img class="logo-admin" src="<?php echo base_url() . 'assets/images/logo-cn.png' ?>" />
                    </a>
                </h1>
            </div>

            <form class="search">
                <div class="search__inner">
                    <input type="text" class="search__text" placeholder="">
                    <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                </div>
            </form>

            <ul class="top-nav">
                <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>
                <li>
                    <?php 
                        $base_url = $this->config->base_url();
                        echo '<a href="'.$base_url.'auth/logout">退出</a>';
                    ?>
                </li>
                <li>
                    <?php  
                        $base_url = $this->config->base_url();
                        echo '<a href="'.$base_url.'auth/logout"><i class="zmdi zmdi-power zmdi-hc-fw"></i></a>';
                    ?>
                </li>
            </ul>
        </header>

        <aside class="sidebar">
            <div class="scrollbar-inner">
                <div class="user">
                    <div class="user__info" data-toggle="dropdown">
<!--                        <img class="user__img" src="<?php echo base_url().'assets/' ?>images/profile.jpg" alt="">-->
                        <div> 
                            <div class="user__name"><?php echo isset($site_name)?$site_name:'admin'; ?></div>
                        </div>
                    </div>

                </div>

                <ul class="navigation">
                    <li class="navigation__active">
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/view\')"><i class="zmdi zmdi-home"></i> 总览</a>';
                        ?>
                    </li>
                    <?php if(isset($user_id)&&is_numeric($user_id)&&$user_id>1) {?>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/carousel_photos\')"><i class="zmdi zmdi-collection-image"></i>轮播图片</a>';
                        ?>
                    </li>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'media/view\')"><i class="zmdi zmdi-collection-image"></i>图片银行</a>';
                        ?>
                    </li>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/products_categories\')"><i class="zmdi zmdi-label-alt"></i>分类</a>';
                        ?>
                    </li>
                    
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/products\')"><i class="zmdi zmdi-collection-item"></i> 产品</a>';
                        ?>
                    </li>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'transactions/view\')"><i class="zmdi zmdi-shopping-basket"></i> 订单</a>';
                        ?>
                    </li>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'coupons/create_coupon\')"><i class="zmdi zmdi-store"></i> 优惠券</a>';
                        ?>
                    </li>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/customers\')"><i class="zmdi zmdi-accounts-list-alt"></i> 客户</a>';
                        ?> 
                    </li>
                    <?php
                    } elseif(isset($user_id)&&is_numeric($user_id)&&$user_id==1){
                    ?>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/sites\')"><i class="zmdi zmdi-group-work"></i> 站点</a>';
                        ?>
                    </li>
                    <li class="li-users">
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'auth\')"><i class="zmdi zmdi-face"></i>用户</a>';
                        ?>
                    </li>
                    <?php
                    }else{
                        
                    }
                    ?>
                    <li>
                        <?php 
                            $base_url = $this->config->base_url();
                            echo '<a onclick="show_page_for_backend(\'' . $base_url . 'admin/settings\')"><i class="zmdi zmdi-settings"></i> 设置</a>';
                        ?>
                    </li>
                </ul>
            </div>
        </aside>

        <section class="content">
            <div class="dashboard-right" ></div>
            