<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/manage-coupon.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/spectrum.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/need/laydate.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/' ?>css/need/laydate.css" id="LayDateSkin">
<div id="manager-coupon-card">
  <div class="manager-page coupon-list" style="display: block;">
    <div class="manager-page-header">
      <div class="header-left">
        <ul class="manager-page-tab">
          <li class="active">优惠券列表</li>
          <li class="goto-usage-page-btn">优惠券使用情况</li>
        </ul>
        <a class="teach" target="_blank" href="#">?</a>
      </div>
      <div class="header-right">
        <select class="coupon-search-type">
          <option value="id">ID</option>
          <option value="title">名称</option>
          <option value="type">类型</option>
        </select>
        <div class="search-box">
          <input class="search-box-input coupon-search-input" type="text" placeholder="优惠券ID/名称/类型">
          <span class="glyphicon glyphicon-search search-box-icon coupon-search-btn"></span>
        </div>
        <button class="btn btn-success add-coupon-card">
          <span class="glyphicon glyphicon-plus"></span>
          <span>新建优惠券</span>
        </button>
      </div>
    </div>
    <div class="manager-page-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>类型</th>
            <th>优惠券名称</th>
            <th>优惠方式</th>
            <th>有效期</th>
            <th>库存</th>
            <th>已领张数</th>
            <th>核销次数</th>
            <th>领取列表展示</th>
            <th>操作</th>
            <th>上架使用</th>
          </tr>
        </thead>
        <tbody id="coupon-list-tbody">
         </tbody>
      </table>
      <div id="coupon-list-toolbar" class="table-toolbar" style="display: none;"></div>
    </div>
  </div>
  <div class="manager-page coupon-setting" style="display: none;">
    <div class="manager-page-header">
      <div class="header-left">
        <span>添加数据 | 所属对象：优惠券</span>
      </div>
      <div class="header-right">
        <div class="btn btn-default cancel-btn">返回</div>
      </div>
    </div>
    <div class="manager-page-body">
      <div class="phone-preview-area">
        <div class="phone-preview-title">手机预览：</div>
        <div id="coupon-ticket" class="phone-preview-ticket">
          <div class="top-section">
            <div class="detail-info">
              <div class="name"></div>
              <div class="use-condition">使用条件：<span class="condition-text"></span></div>
            </div>
            <div class="background-word-area">
              <div class="background-circle"></div>
              <div class="background-word"></div>
            </div>
            <div class="function-btn">立即领取</div>
          </div>
          <div class="bottom-section">
            <div>
              <span class="date-duration"></span>
              <span class="other-case"></span>
              <span class="time-duration"></span>
            </div>
          </div>
        </div>
        <div class="phone-preview-content">
          <div class="phone-head"></div>
          <div class="phone-container">
            <div class="page" id="coupon-detail">
              <div class="coupon-detail-wrap">
                <div class="top-section">
                  <img class="logo" src="" alt="">
                  <div class="name">七嘴八舌</div>
                  <div class="share"></div>
                </div>
                <div class="middle-section">
                  <div class="title"></div>
                  <div class="sub-title"></div>
                  <div class="receive-btn">立即领取</div>
                  <div class="detail-item condition">
                    <div class="item-name">使用条件：</div>
                    <div class="item-content"></div>
                  </div>
                  <div class="detail-item time">
                    <div class="item-name">可用时间：</div>
                    <div class="item-content">
                      <div class="date-duration"></div>
                      <div class="other-case"></div>
                      <div class="time-duration"></div>
                    </div>
                  </div>
                </div>
                <div class="bottom-section">
                  <div class="detail-item address">
                    <div class="item-name">店铺地址：</div>
                    <div class="item-content"></div>
                  </div>
                  <div class="detail-item phone">
                    <div class="item-name">联系电话：</div>
                    <div class="item-content"></div>
                  </div>
                  <div class="goto-homepage">
                    <div class="goto-homepage-text">返回首页</div>
                    <div class="icon-rightarrow"></div>
                  </div>
                </div>
              </div>      
            </div>
          </div>
        </div>
      </div>
      <div class="info-edit-area">
        <div class="info-edit-title">优惠券基本信息</div>
        <div class="info-edit-content">
          <ul class="field-list">
            <li class="field-item" data-field="name">
              <label class="field-item-label">
                <span>名称</span>：
              </label>
              <div class="field-item-panel"></div>
            </li>
            <li class="field-item" data-field="logo">
              <label class="field-item-label">
                <span>logo</span>：
              </label>
              <div class="field-item-panel">
                <img src="" class="domain_img">
                <p>如需修改店铺logo，请在管理后台-设置</p>
              </div>
            </li>
            <li class="field-item" data-field="card_color" >
              <label class="field-item-label">
                <span>优惠券颜色</span>：
              </label>
              <div class="field-item-panel">
                <div>
                  <span>列表色</span>
                  <input class="card-list-color" >
                </div>
                <div>
                  <span>背景色</span>
                  <input class="card-background-color" >
                </div>
                <div>
                  <span>按钮色</span>
                  <input class="card-button-color" >
                </div>
              </div>
            </li>
            <li class="field-item necessary" data-field="title">
              <label class="field-item-label">
                <span>优惠券标题</span>：
              </label>
              <div class="field-item-panel">
                <input type="text" name="title">
                <p>建议填写“10元代金劵”、“买电脑送鼠标”等易于理解的具体优惠内容，限9个字以内</p>
              </div>
            </li>
            <li class="field-item" data-field="sub_title">
              <label class="field-item-label">
                <span>副标题</span>：
              </label>
              <div class="field-item-panel">
                <input type="text" name="sub_title">
              </div>
            </li>
            <li class="field-item necessary" data-field="coupon_type">
              <label class="field-item-label">
                <span>优惠券类型</span>：
              </label>
              <div class="field-item-panel">
                <div class="coupon-type-radio">
                  <div>
                    <input type="radio" name="coupon_type" value="0">
                    <span>满减券</span>
                  </div>
                  <div>
                    <input type="radio" name="coupon_type" value="1">
                    <span>折扣券</span>
                  </div>
                  <div>
                    <input type="radio" name="coupon_type" value="2">
                    <span>代金券</span>
                  </div>
                  <div>
                    <input type="radio" name="coupon_type" value="3">
                    <span>兑换券</span>
                  </div>
                  <div>
                    <input type="radio" name="coupon_type" value="4">
                    <span>储值券</span>
                  </div>
                  <div>
                    <input type="radio" name="coupon_type" value="5">
                    <span>通用券</span>
                  </div>
                </div>
                <div class="coupon-type-content">
                  <div data-type="0">
                    <span>优惠力度:</span>
                    <span>满</span>
                    <input type="text" name="condition">
                    <span>元，减</span>
                    <input type="text" name="value">
                    <span>元</span>
                  </div>
                  <div data-type="1">
                    <span>折扣力度:</span>
                    <span>打</span>
                    <input type="text" name="value">
                    <span>折</span>
                  </div>
                  <div data-type="2">
                    <span>使用条件:</span>
                    <span>面值</span>
                    <input type="text" name="value">
                    <span>元</span>
                  </div>
                  <div data-type="3">
                    <div class="exchange-type-block">
                      <div class="block-text">类型:</div>
                      <div class="block-content">
                        <div>
                          <input type="radio" name="exchange_type" value="0">
                          <span>直接兑换</span>
                        </div>
                        <div>
                          <input type="radio" name="exchange_type" value="1">
                          <span>消费满</span>
                          <input type="text" name="exchange_condition">
                          <span>元</span>
                        </div>
                        <div>
                          <input type="radio" name="exchange_type" value="2">
                          <span>购买指定商品</span>
                          <div class="select-goods select-goods-btn">选择商品</div>
                        </div>
                      </div>
                    </div>
                    <div class="exchange-goods-block">
                      <div class="block-text">兑换商品:</div>
                      <div class="select-goods select-exchange-btn">选择商品</div>
                    </div>
                  </div>
                  <div data-type="4">
                    <span>储值金额:</span>
                    <span>面值</span>
                    <input type="text" name="value">
                    <span>元</span>
                  </div>
                  <div data-type="5">
                    <span>使用条件:</span>
                    <input type="text" name="extra_condition">
                  </div>
                </div>
              </div>
            </li>
            <li class="field-item necessary" data-field="use_time">
              <label class="field-item-label">
                <span>可用时间</span>：
              </label>
              <div class="field-item-panel">
                <p>有效期</p>
                <div>
                  <span class="select-time laydate-icon" data-name="start_use_date">选择时间</span>
                  <span>-</span>
                  <span class="select-time laydate-icon" data-name="end_use_date">选择时间</span>
                </div>
                <div class="select-time-checkbox">
                  <input type="checkbox" name="exclude_holiday">
                  <span>除去法定节假日</span>
                </div>
                <div class="select-time-checkbox">
                  <input type="checkbox" name="exclude_weekend">
                  <span>周一至周五</span>
                </div>
                <p>时间段</p>
                <div>
                  <input type="text" name="start_use_time_h">
                  <span>:</span>
                  <input type="text" name="start_use_time_m">
                  <span>-</span>
                  <input type="text" name="end_use_time_h">
                  <span>:</span>
                  <input type="text" name="end_use_time_m">
                </div>
              </div>
            </li>
            <li class="field-item" data-field="address">
              <label class="field-item-label">
                <span>地址</span>：
              </label>
              <div class="field-item-panel">
                <textarea name="address"></textarea>
              </div>
            </li>
            <li class="field-item" data-field="phone">
              <label class="field-item-label">
                <span>电话</span>：
              </label>
              <div class="field-item-panel">
                <input type="text" name="phone">
              </div>
            </li>
            <li class="field-item necessary" data-field="stock">
              <label class="field-item-label">
                <span>库存</span>：
              </label>
              <div class="field-item-panel">
                <input type="text" name="stock">
                <span>份</span>
              </div>
            </li>
            <li class="field-item" data-field="limit_num">
              <label class="field-item-label">
                <span>领取限制</span>：
              </label>
              <div class="field-item-panel">
                <input type="text" name="limit_num">
                <span>张</span>
                <p>每个用户领取上限，如不填，则默认为1</p>
              </div>
            </li>
            <li class="field-item" data-field="in_show_list">
              <label class="field-item-label">
                <span>优惠券展示</span>：
              </label>
              <div class="field-item-panel">
                <input type="checkbox" name="in_show_list">
                <span>显示在优惠券领取列表中</span>
              </div>
            </li>
          </ul>
        </div>
        <div class="info-edit-btn-panel">
          <div class="btn btn-success save-btn">保存</div>
          <div class="btn btn-default cancel-btn">取消</div>
        </div>
      </div>
    </div>
  </div>
  <div class="manager-page coupon-usage" style="display: none;">
    <div class="manager-page-header">
      <div class="header-left">
        <ul class="manager-page-tab">
          <li class="goto-list-page-btn">优惠券列表</li>
          <li class="goto-usage-page-btn active">优惠券使用情况</li>
        </ul>
        <a class="teach" target="_blank" href="#">?</a>
      </div>
      <div class="header-right">
        <select class="usage-search-type">
          <option value="coupon_id">优惠券ID</option>
          <option value="coupon_title">优惠券名称</option>
          <option value="phone">手机号</option>
        </select>
        <div class="search-box">
          <input class="search-box-input usage-search-input" type="text" placeholder="优惠券ID/名称/手机号">
          <span class="glyphicon glyphicon-search search-box-icon usage-search-btn"></span>
        </div>
      </div>
    </div>
    <div class="manager-page-body">
      <div class="operation-panel">
        <span class="btn btn-default manual-verify">手动核销</span>
        <div class="verification-stauts-block">
          <span>核销情况:</span>
          <select name="verification_status">
            <option value="">全部</option>
            <option value="1">未核销</option>
            <option value="2">已核销</option>
            <option value="3">已失效</option>
          </select>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>名称</th>
            <th>姓名</th>
            <th>电话</th>
            <th>领取时间</th>
            <th>领取方式</th>
            <th>核销情况</th>
            <th>核销时间</th>
            <th>核销方式</th>
            <th>核销订单号</th>
          </tr>
        </thead>
        <tbody id="coupon-usage-tbody"></tbody>
      </table>
    <div id="coupon-usage-toolbar" class="table-toolbar"></div>
  </div>
  <div class="modal fade" id="verifyCodeInputModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">手动核销</h4>
        </div>
        <div class="modal-body">
          <div>
            <div class="field-label">请输入核销码</div>
            <div class="field-group">
              <input class="form-control verify-code-input" type="text">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary verify-code-confirm">确定</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="verifyDetailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">手动核销</h4>
        </div>
        <div class="modal-body">
          <div class="verify-order-section">
            <div class="goods-info-section"></div>
            <div goods-type="0">
              <span>买家信息:</span>
              <span class="address-info"></span>
            </div>
            <div goods-type="1">
              <div>
                <span>预约时间：</span>
                <span class="appointment-info"></span>
              </div>
              <div>
                <span>买家信息:</span>
                <span class="address-info"></span>
              </div>
            </div>
            <div goods-type="3"></div>
          </div>
          <div class="verify-coupon-section"></div>
        </div>
        <div class="modal-footer">
          <span style="color:red; margin-right:30px;">注意：确认核销后将无法恢复</span>
          <button type="button" class="btn btn-primary verify-detail-confirm">确认核销</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/spectrum.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/laydate.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/' ?>js/coupons.js"></script>

