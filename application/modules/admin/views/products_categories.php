<header class="content__title">
    <h1>分类列表</h1>
    <small>本页展示分类列表</small>
</header>

<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <h2 class="card-title">分类列表</h2>
        <button type="button" onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>admin/create_category')" class="btn btn-danger btn-sm waves-effect"><i class="zmdi zmdi-plus">增加分类</i></button>
    </div>

    <div class="card-block">
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>分组</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($cates as $cate){
                        $group_name = "";
                        switch($cate['ctype']){
                            case 0:
                                $group_name="一级分类";
                                break;
                            case 2:
                                $group_name="二级分类";
                                break;
                                break;
                            default:
                                $group_name="二级分类";
                                break;
                        }
                        echo '<tr bgcolor="#D3D3D3"><td >'. $cate['category_id'] .'</td>';
                        echo '<td >'. $cate['name'] .'</td>';
                        echo '<td >'. $group_name .'</td>';
                        echo '<td ><a onclick="show_page_for_backend(\'' . $this->config->base_url() . 'admin/create_category?cid='.$cate['category_id'].'\')" ><button class="btn btn-sm btn-outline-primary waves-effect" style="margin-right:10px;"><i class="zmdi zmdi-edit"></i> 编辑</button></a></td>';
                        echo '</tr>';
                        foreach($cate['subclass'] as $sub){
                            $group_name = "";
                            switch($sub['ctype']){
                                case 0:
                                    $group_name="一级分类";
                                    break;
                                case 2:
                                    $group_name="二级分类";
                                    break;
                                    break;
                                default:
                                    $group_name="二级分类";
                                    break;
                            }
                            echo '<tr ><td >'. $sub['category_id'] .'</td>';
                            echo '<td >'. $sub['name'] .'</td>';
                            echo '<td >'. $group_name .'</td>';
                            echo '<td ><a onclick="show_page_for_backend(\'' . $this->config->base_url() . 'admin/create_category?cid='.$sub['category_id'].'\')" ><button class="btn btn-sm btn-outline-primary waves-effect" style="margin-right:10px;"><i class="zmdi zmdi-edit"></i> 编辑</button></a></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
  <div>
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

