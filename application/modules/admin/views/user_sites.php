<header class="content__title">
    <ul class="top-nav">
        <li>
            <?php 
                $base_url = $this->config->base_url();
                echo '<a href="'.$base_url.'auth/logout"><i class="zmdi zmdi-power zmdi-hc-fw">退出</i></a>';
            ?>
        </li>
     </ul>
    <h1>Sites Lists</h1>
    <small>In this page you can view all the sites that belongs to you.</small>
</header>
<!-- Vendor styles -->
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/animate.css/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
<!-- App styles -->
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/app.css">
<script src="<?php echo base_url().'assets/' ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/common.js"></script>

<div class="card">
    <div class="card-block">
        <?php if(isset($sites)&&!empty($sites)){ ?>
        
        <table class="table mb-0">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>INDUSTRY</th>
                <th>PHONE</th>
                <th>CONTACT</th>
                <th>CREATED AT</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($sites as $site){
                        echo '<tr><td >'. $site->id .'</td>';
                        echo '<td >'. $site->name .'</td>';
                        echo '<td >'. $site->industry .'</td>';
                        echo '<td >'. $site->phone .'</td>';
                        echo '<td >'. $site->contact .'</td>';
                        echo '<td >'. $site->created_at .'</td>';
                        echo '<td ><input type="button" onclick="enterSite('.$site->id.',\''.$site->name.'\')" value="Enter" /></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <?php } else{echo "You do not have any websites";}?>
    </div>
</div>


