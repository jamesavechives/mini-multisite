<hr>

        <table>
                <tr><td>Brand</td>
                    <td><input type="radio" name="brand" value="none" ><label>None</label></td>
                    <?php
                        foreach($brands as $brand){
                            echo '<td><input type="radio" name="brand" value="'.$brand.'"><label>'.$brand.'</label></td>';
                        }
                    ?>
                </tr>
        </table>

<hr>
<?php
foreach($eyeglasses as $eg ){

    echo    '<div class="card card-list-product">
                <a href="' . $this->config->base_url() . 'eyeglasses/details?pid='.$eg['id'].'&from=view&now='.$now.'">
                    <div class="card-list-product-left">
                        <div class="list-product-images">
                            <img src="'.$eg['guid'].'" />
                        </div>
                    </div>
                    <div class="card-list-product-right">
                        <div class="list-product-right-top">
                            <h3 class="list-product-title">
                                '.$eg['title'].'
                            </h3>
                        </div>
                        <div class="list-product-right-bottom">
                            <span class="list-product-price">
                                '.$eg['price'].'RMB
                            </span>
                            <span class="list-product-serial">
                                '.$eg['lens_width'].'<i class="zmdi zmdi-square-o"></i>'.$eg['nose_bridge'].'-'.$eg['temple'].'
                            </span>
                        </div>
                    </div>
                </a>
            </div>';
   }
   echo '<ul class="pagination pagination-front">';
            if(isset($previous)){
                    echo '<li class="page-item pagination-prev"><a class="page-link" onclick="loadView(\''.$previous.'\')"></a></li>';
                }
            echo '<li class="page-item page-item-record"><a class="page-link" href="#">' . $paginate['page']." of ".ceil($paginate['records']/$paginate['each_page_count']) . '</a></li>';
            if(isset($next)){
                echo '<li class="page-item pagination-next"><a class="page-link" onclick="loadView(\''.$next.'\')"></a></li>';
            }
        echo '</ul>';
?>

