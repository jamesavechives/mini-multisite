<header class="content__title">
    <h1>下单信息列表</h1>
    <small>本页展示所有的下单信息.</small>
</header>

<div class="contacts customer__list row">
    <?php
        foreach($message as $msg){
        
    ?>
    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div>
            <div class="contacts__info">
                <button class="contacts__btn" data-toggle="modal" data-target="#msg-id<?php echo $msg['id'] ?>"><a href="#"><?php echo $msg['topic'] ?></a></button>
                <strong>姓名： <?php echo $msg['name'] ?></strong>
                <small>电话：<?php echo $msg['phone'] ?></small>
                <small><?php echo $msg['add_time'] ?></small>
            </div>
           
            <div class="modal fade show" id="msg-id<?php echo $msg['id'] ?>" tabindex="-1" style="display: none;">     
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title pull-left"><?php echo $msg['topic'] ?> </h5>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg" value="<?php echo $msg['detail'] ?>">
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