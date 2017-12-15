<div class="row settings">
    <div class="col col-lg-3">
        <a onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>/auth/change_password')">
            <div class="card text-center">
                <div class="card-header">
                    <div class="settings-icon"><i class="zmdi zmdi-shield-check zmdi-hc-4x"></i></div>
                    <h2 class="card-subtitle">修改密码</h2>
                </div>

                <div class="card-block">
                    <p>您可以更改自己的密码.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col col-lg-3">
        <a href="#">
            <div class="card text-center">
                <div class="card-header">
                    <div class="settings-icon"><i class="zmdi zmdi-flag zmdi-hc-4x"></i></div>
                    <h2 class="card-subtitle">选择语言</h2>
                </div>

                <div class="card-block">
                    <p>您可以选择后台的语言.</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col col-lg-3">
        <a onclick="show_page_for_backend('<?php echo $this->config->base_url(); ?>/admin/about')">
            <div class="card text-center">
                <div class="card-header">
                    <div class="settings-icon"><i class="zmdi zmdi-money-box zmdi-hc-4x"></i></div>
                    <h2 class="card-subtitle">设置小程序站点</h2>
                </div>

                <div class="card-block">
                    <p>在这里您可以设置小程序的后端站点信息</p>
                </div>
            </div>
        </a>
    </div>
</div>