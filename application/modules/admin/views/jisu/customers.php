<header class="content__title">
    <h1>客户列表</h1>
    <small>本页展示所有的客户信息.</small>
</header>

<div class="contacts customer__list row">
    <?php
        foreach($customers as $customer){
        $gender = "";
        switch(intval($customer['sex']))
        {
            case 1:
                $gender="男";
                break;
            case 2:
                $gender="女";
                break;
            default:
                $gender="未知";
                break;
        }
    ?>
    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div class="contacts__item">
            <a href="" class="contacts__img">
                <img src="<?php echo $customer['cover_thumb'] ?>" alt="">
            </a>
            <div class="contacts__info">
                <strong><?php echo $customer['nickname'] ?></strong>
                <small><?php echo $gender ?></small>
            </div>
            <button class="contacts__btn" data-toggle="modal" data-target="#modal-weixin-id<?php echo $customer['id'] ?>">Weixin ID</button>
            <div class="modal fade show" id="modal-weixin-id<?php echo $customer['id'] ?>" tabindex="-1" style="display: none;">     
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title pull-left"><?php echo $customer['nickname'] ?> Weixin ID</h5>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-lg" value="<?php echo $customer['weixin_id'] ?>">
                            <small>Copy Weixin ID</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
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

