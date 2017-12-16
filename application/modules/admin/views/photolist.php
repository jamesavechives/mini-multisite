<input type="button" onclick="gotomedia()"  value="上传图片" class="btn btn-primary" />
<hr>
<div class="contacts customer__list row">
    <div class="card-header d-flex flex-row justify-content-between">
        
    </div>
    <?php
        foreach($media as $m){
    ?>
    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
        <div class="media__item">
            <a href="#" <?php echo 'onclick="bindPhoto(\''.$m['guid'].'\','.$_GET['photo_id'].')"' ?> >
                <img style="width:100px;height: 100px" src="<?php echo $m['guid'] ?>" alt="">
            </a>
        </div>
    </div>
    <?php } ?>
</div>

<div class="card card-pagination">
    <div class="card-block">
    <?php
        echo $paginate['page']." of ".ceil($paginate['records']/$paginate['each_page_count']);
            if(isset($previous)){
                echo '<a onclick="show_page_for_modal(\''.$previous.'\')"> < </a> ';
            }
            if(isset($next)){
                echo '<a onclick="show_page_for_modal(\''.$next.'\')"> > </a> ';
            }
       
    ?>
    </div>
</div>

