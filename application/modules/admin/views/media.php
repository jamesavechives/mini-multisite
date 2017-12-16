<header class="content__title">
    <h1>图片银行</h1>
</header>

<div class="contacts customer__list row">
    <?php
        foreach($media as $m){
    ?>
    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div class="contacts__item">
            <a href="#">
                <img style="height:125px;width:125px" src="<?php echo $m['guid'] ?>" alt="">
            </a>
            <div class="contacts__info">
                <strong><a href="#">删除</a></strong>
            </div>
            <button class="contacts__btn" data-toggle="modal" data-target="#modal-guid<?php echo $m['id'] ?>">链接</button>
            <div class="modal fade show" id="modal-guid<?php echo $m['id'] ?>" tabindex="-1" style="display: none;">     
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title pull-left"><?php echo $m['guid'] ?> </h5>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg" value="<?php echo $m['guid'] ?>">
                            <small>复制链接</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">关闭</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

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

