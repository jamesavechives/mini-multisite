
<section id="recommend-home" class="recommend-home">
    <div class="home-title">
        <h3>Recommend</h3>
        <span></span>
    </div>
    <div class="home-content">
    <?php
        foreach($recommend as $eg ){
        echo '<div class="card card-home-product">
                <a href="' . $this->config->base_url() . 'eyeglasses/details?pid='.$eg['id'].'">
                    <div class="home-product-top">
                        <div class="product-top-title">
                            <h3>'.$eg['title'].'</h3>
                        </div>
                        <div class="product-top-images">
                            <img src="'.$eg['guid'].'" />
                        </div>
                    </div>
                    <div class="home-product-bottom">
                        <span class="product-bottom-price">
                            '.$eg['price'].'RMB
                        </span>
                        <span class="product-bottom-serial">
                            '.$eg['lens_width'].'<i class="zmdi zmdi-square-o"></i>'.$eg['nose_bridge'].'-'.$eg['temple'].'
                        </span>
                    </div>
                </a>
            </div>';
        }
    ?>
    </div>
</section>
        
<section id="recommend-home" class="recommend-home">
    <div class="home-title">
        <h3>Newest</h3>
        <span></span>
    </div>
    <div class="home-content">
    <?php
        foreach($newest as $eg ){
        echo '<div class="card card-home-product">
                <a href="' . $this->config->base_url() . 'eyeglasses/details?pid='.$eg['id'].'">
                    <div class="home-product-top">
                        <div class="product-top-title">
                            <h3>'.$eg['title'].'</h3>
                        </div>
                        <div class="product-top-images">
                            <img src="'.$eg['guid'].'" />
                        </div>
                    </div>
                    <div class="home-product-bottom">
                        <span class="product-bottom-price">
                            '.$eg['price'].'RMB
                        </span>
                        <span class="product-bottom-serial">
                            '.$eg['lens_width'].'<i class="zmdi zmdi-square-o"></i>'.$eg['nose_bridge'].'-'.$eg['temple'].'
                        </span>
                    </div>
                </a>
            </div>';
        }
    ?>
    </div>
</section>
