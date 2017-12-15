<header class="content__title">
    <h1>Sites Lists</h1>
    <small>In this page you can view all the sites information.</small>
</header> 

<div class="site-list">
    <div class="card site-list-add" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>admin/create_site')">
        <i class="zmdi zmdi-plus"></i> Add New
    </div>
    <?php
        foreach($sites as $site){
    ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><?php echo $site['name'] ?> <span class="badge badge-warning"><?php echo $site['industry'] ?></span></h2>
            <small class="card-subtitle"><?php echo $site['description'] ?></small>
        </div>
        <div class="card-footer">
            <span class="card-link"><i class="zmdi zmdi-phone zmdi-hc-fw"></i> <?php echo $site['phone'] ?></span>
            <span class="card-link"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i> <?php echo $site['contact'] ?></span>
            <span class="card-link"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> <?php echo $site['created_at'] ?></span>
        </div>
    </div>
    <?php 
        }
    ?>

    <div class="card card-pagination">
        <div class="card-block">
        <?php
            echo $paginate['page']." of ".ceil($paginate['records']/$paginate['each_page_count']);
            if(isset($previous)){
                echo '<a onclick="show_page_for_backend(\''.$previous.'\')"> < </a> ';
            }
            if(isset($next)){
                echo '<a onclick="show_page_for_backend(\''.$next.'\')"> > </a> ';
            }
        ?>
        </div>
    </div>
</div>
