<html lang="zh-CN"><head>
  <title>应用后台管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta charset="UTF-8" name="description" content="深圳市咫尺网络科技开发有限公司，专注于移动互联网营销解决方案，拥有微信服务号活动汇，微社区微活动应用，及酷炫的邀请函微页等产品，提供快捷方便活动管理，分享、报名统计，营销推广等服务。精彩活动，尽在咫尺！丰富您的活动，精彩您的人生，快来发起属于您的活动吧！">
  <meta name="keywords" content="活动汇,微活动,咫尺活动,微页,咫尺网络,微杂志,微邀请函,喜帖,电子邀请函,H5应用,APP,微场景,场景应用,微场景制作,场景应用制作">
  <link rel="shortcut icon" href="http://cdn.jisuapp.cn/zhichi_frontend/static/common/images/favicon.ico" type="image/x-icon">
  <!-- <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/lib/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="//jcrop-cdn.tapmodo.com/v0.9.12/css/jquery.Jcrop.css"> -->
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/common/css/jquery.Jcrop.min.css">
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/pc/invitation/spectrum/spectrum.css">
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/css/library/webuploader.css">
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/css/just-tip.min.css">
  <!-- <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/css/library/jquery.Jcrop.min.css"> -->
  <link rel="stylesheet" href="/zhichi_frontend/static/webapp/css/pc_icomoon.css">
  <link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/css/manager.css?version=10470">
  <style>
    @font-face {
      font-family: 'Glyphicons Halflings';
      src: url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.eot);
      src: url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'),url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.woff2) format('woff2'),url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.woff) format('woff'),url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.ttf) format('truetype'),url(/zhichi_frontend/static/lib/bootstrap/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg')
    }
  </style>
 <!-- jisuapp百度统计代码 -->
<script charset="utf-8" src="https://tag.baidu.com/vcard/v.js?siteid=10881988&amp;url=http%3A%2F%2Fwww.jisuapp.cn%2Findex.php%3Fr%3Dpc%2FAppMgr%2Fmanager%26_app_id%3Dt5vmkzvMTZ&amp;source=&amp;rnd=724873024&amp;hm=1"></script><script type="text/javascript" async="" src="http://assets.growingio.com/vds.js"></script><script src="https://hm.baidu.com/hm.js?dbc2f06ada4968aa325cbb4e8932d648"></script><script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?dbc2f06ada4968aa325cbb4e8932d648";
var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
})();
</script>
<!--  M版 百度推广统计代码  -->

<!-- growingio代码 -->
<script type="text/javascript">
    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"),
            r = window.location.search.substr(1).match(reg);

        if (r != null) {
            return decodeURIComponent(r[2]);
        }
        return null;
    }
    var _vds = _vds || [];
    window._vds = _vds;
    (function(){
    _vds.push(['setAccountId', '9fd21c28eb55d8a5']);
    if (GetQueryString('_app_id') || GetQueryString('app_id')) {
        _vds.push(['setCS2', 'appid', GetQueryString('_app_id') || GetQueryString('app_id')]);
    }
    if ('a9f029aa6783f0d878040a04c0a191ac' != '') {
        _vds.push(['setCS1', 'user_token', 'a9f029aa6783f0d878040a04c0a191ac']);
    }
    (function() {
        var vds = document.createElement('script');
            vds.type='text/javascript';
            vds.async = true;
            vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'assets.growingio.com/vds.js';
        var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(vds, s);
    })();
    })();
</script>
 <!-- alipay.jisuapp.cn百度统计代码 -->
  
<link type="text/css" rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/laydate/need/laydate.css"><link type="text/css" rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/laydate/skins/default/laydate.css" id="LayDateSkin"><link href="http://www.jisuapp.cn/zhichi_frontend/static/webapp/js/library/kindeditor/themes/default/default.css" rel="stylesheet"></head>
<body data-admin="" vip_group="0" is_login="2" data-expire="0" data-paid="0" creater="a9f029aa6783f0d878040a04c0a191ac" is-designer="-1" is_admin="" vend_status="0" vend_price="" is_domain="" cover="" qrcode="" yidou="" logo="" is_om="" is_subshop="0" is_tplm="" class="modal-open">
<div class="page-holder" id="page-holder">
  <div class="container-fluid">
    <div class="row" id="page-header">
      <div class="container-fluid page-header">
        <div class="col-md-2 page-header-left">
                    <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/nav_logo.png" alt=""><a href="/"><span>即速应用</span></a>
                  </div>
        <div class="col-md-10 page-header-right">
          <div class="col-md-12">

          <div class="pull-left" preview="" edit="">
              <!-- <span class="app-nav-copy" style="margin-right:20px; cursor:pointer;"><i class="glyphicon glyphicon-copy"></i> 复制</span> -->
              <!--span class="app-nav-transfer" style="margin-right:20px; cursor:pointer;"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/transfer.png" style="    width:16px; vertical-align:middle; margin-bottom:4px;"> 转让</span-->
                            <div style="float:left;margin-right: 20px;cursor: pointer;" class="app-nav-transfer">
                  <span>
                    <i class="transfer_let"></i>
                  </span>
                  <span>转让</span>
              </div>
                                          <span class="app-nav-preview" style="margin-right:20px; cursor:pointer;"><i class="glyphicon glyphicon-play-circle"></i>预览</span>
                                                        <span class="app-nav-edit" style="margin-right:20px; cursor:pointer;"><i class="glyphicon glyphicon-edit"></i> 编辑</span>
                            <span class="app-nav-delete" style="margin-right:20px; cursor:pointer;display: none;"><i class="glyphicon glyphicon-trash"></i> 删除</span>
              <span class="app-nav-set" style="margin-right:20px; cursor:pointer;"><i class="glyphicon glyphicon-cog"></i> 设置</span>
                                          <!--<div style="display: inline-block; margin-right: 20px;cursor: pointer;" class="app-nav-sale" data-vend_status="0" data-vend_price="">
                  <span class="app-nav-sale-icon">
                    i class="app-nav-sale-icon"></i
                  </span>
                  <span>出售</span>
              </div>-->
                            <span class="advanced-label-btn" style="margin-right:20px; cursor:pointer;"><i class="icon-v"></i>高级版试用</span>
                                                                       <!--div style="float:right;margin-right: 20px;cursor: pointer;" class="app-nav-manage">
                  <span>
                    <i class="app-nav-manage-icon"></i>
                  </span>
                  <span>管理</span>
              </div -->
                          </div>
             <div class="pull-right">
                <!-- <span>切换App: </span> -->
                <div class="field-group"><select class="form-control app-switch"><option value="vZg9b296FV">好爹地</option><option value="t5vmkzvMTZ">七嘴八舌</option></select></div>
                    <img class="app-cover" src="http://img.weiye.me/zcimgdir/album/file_58a2c80bbfda4.png"><span class="app-name">七嘴八舌</span>

            </div>

          </div>

          <!-- <div class="col-md-3 top_img_head">
             <img class="app-cover"><span style="margin-left:10px"></span>
          </div> -->
        </div>
      </div>
    </div>
    <div class="row page-content">
      <!-- 左侧导航 -->
      <div class="sidebar col-md-2" id="sidebar" name="sidebar">
        <div class="collapse-content" id="userManagerLook">
          <ul class="list-unstyled">
                        <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-overview"></span>
                <span class="slider-menu-div-span">数据总览</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_statistics" data-href="&amp;h=manager_statistics"><div class="sidebar-menu-title">数据总览</div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_visitor_analysis" data-href="&amp;h=manager_visitor_analysis"><div class="sidebar-menu-title">访客分析
                  <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                </div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_spread_data" data-href="&amp;h=manager_spread_data"><div class="sidebar-menu-title">传播数据
                  <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                </div></li></ul>
            </li>
                                    <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_default_share" data-href="&amp;h=manager_default_share">
               <div class="sidebar-menu-title">
                <!-- <img class="user-manager-shareIcon" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/share.png"/> -->
                <span class="sidebar-menu-icon icon-share"></span>
                <span class="slider-menu-div-span">分享设置</span>
               </div>
            </li>
                                    <li class="sidebar-menu">
              <div id="" class="slider-menu-div sidebar-menu-title">
                <!-- <span class="user-manager-userIcon"></span> -->
                <span class="sidebar-menu-icon icon-user"></span>
                <span class="slider-menu-div-span">用户管理</span>
                <span class="caret"></span>
              </div>
               <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                 <!-- <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_statistics" data-href="&h=manager_statistics"><div class="sidebar-menu-title">用户统计</div></li> -->
                 <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_user_manage" data-href="&amp;h=manager_user_manage"><div class="sidebar-menu-title">用户列表</div></li>
                 <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_user_frommanual" data-href="&amp;h=manager_user_frommanual"><div class="sidebar-menu-title">手动添加</div></li>
              </ul>
            </li>
            <!-- <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_obj_manage" data-href="&h=manager_obj_manage">
                <div class="sidebar-menu-title">
                  <span class="icon-data"></span>
                  <span class="slider-menu-div-span">应用数据</span>
                </div>
            </li> -->
            <li class="sidebar-menu">
              <div id="" class="slider-menu-div sidebar-menu-title">
                <span class="sidebar-menu-icon icon-data"></span>
                <span class="slider-menu-div-span">应用数据</span>
                <span class="caret"></span>
              </div>
               <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                 <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_obj_manage" data-href="&amp;h=manager_obj_manage"><div class="sidebar-menu-title">数据管理</div></li>
                                  <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_behavior" data-href="&amp;h=manager_behavior"><div class="sidebar-menu-title">行为事件</div></li>
                               </ul>
            </li>
            <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_carousel_manage" data-href="&amp;h=manager_carousel_manage">
               <div class="sidebar-menu-title">
                <span class="glyphicon glyphicon-picture"></span>
                <span class="slider-menu-div-span">轮播管理</span>
               </div>
            </li>
            <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_category" data-href="&amp;h=manager_category">
              <div class="sidebar-menu-title">
                <span class="glyphicon icon-classification"></span>
                <span class="slider-menu-div-span">分类管理</span>
              </div>
            </li>
            <li class="sidebar-menu" style="height:0 !important;">
              <ul class="sidebar-obj-ul"><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="goods" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=goods">商品</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="dc" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=dc">订餐</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="cp" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=cp">菜谱</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="bbs" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=bbs">讨论区</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="cxms" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=cxms">畅享美食</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="jm" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=jm">加盟</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="appointment" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=appointment">预约</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="tostore" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=tostore">到店</li><li class="sidebar-nav sidebar-sub-menu" data-pjax="1" obj-component="app_shop" data-page="manager_obj" data-href="&amp;h=manager_obj&amp;o=app_shop">多商家店铺</li></ul>
            </li>
            <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_extension_setting" data-href="&amp;h=manager_extension_setting">
               <div class="sidebar-menu-title">
                <span class="sidebar-menu-icon icon-scan-extension"></span>
                <span class="slider-menu-div-span">门店单页</span>
               </div>
            </li>
                        <li class="sidebar-menu unfold active">
                <div class="sidebar-menu-title slider-menu-div">
                    <!-- <img class="user-manager-goodsIcon" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/goods.png"/> -->
                    <span class="sidebar-menu-icon icon-goodslist"></span>
                    <span class="slider-menu-div-span">商品管理</span>
                    <span class="caret"></span>
                </div>
                <ul class="list-unstyled sidebar-ul sidebar-gzh-ul" data-data="goods" a="1">

                      <li class="sidebar-nav sidebar-sub-menu unfold active" data-pjax="1" data-page="manager_goods_manage" data-href="&amp;h=manager_goods_manage" obj-component="goods">
                         <div class="sidebar-menu-title">商品列表
                           <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png" style="display: none;">
                           <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: inline;">
                         </div>
                      </li>
                                            <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_points_goods_manage" data-href="&amp;h=manager_points_goods_manage" obj-component="points_goods">
                         <div class="sidebar-menu-title">积分商品
                           <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                         </div>
                      </li>
                      <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_location_tostore_manage" data-href="&amp;h=manager_location_tostore_manage" obj-component="tostore_location">
                          <div class="sidebar-menu-title">位置管理
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                                                                  <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_payment" data-href="&amp;h=manager_payment">
                          <div class="sidebar-menu-title">支付方式
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                                            <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_order_manage" data-href="&amp;h=manager_order_manage">
                          <div class="sidebar-menu-title">订单管理
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                                            <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_order_groupbuy_manage" data-href="&amp;h=manager_order_groupbuy_manage">
                          <div class="sidebar-menu-title">拼团订单管理
                            <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                          </div>
                      </li>
                                            <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_order_statistics" data-href="&amp;h=manager_order_statistics">
                          <div class="sidebar-menu-title">订单统计
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                                            <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_bill_detail" data-href="&amp;h=manager_bill_detail">
                          <div class="sidebar-menu-title">账单明细
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                      <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_freight_manage" data-href="&amp;h=manager_freight_manage">
                          <div class="sidebar-menu-title">运费管理
                                <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                      <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_assess_manage" data-href="&amp;h=manager_assess_manage">
                          <div class="sidebar-menu-title">评价管理
                            <img class="sidebar-vip vip1" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip.png">
                            <img class="sidebar-vip vip2" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/vip2.png" style="display: none;">
                          </div>
                      </li>
                                        </ul>
            </li>
                        <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-community"></span>
                <span class="slider-menu-div-span">社区管理</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_plate_list" data-href="&amp;h=manager_plate_list"><div class="sidebar-menu-title">版块列表<img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png"></div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_topic_management" data-href="&amp;h=manager_topic_management"><div class="sidebar-menu-title">话题管理<img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png"></div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_community_associator" data-href="&amp;h=manager_community_associator"><div class="sidebar-menu-title">会员管理<img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png"></div></li>
              </ul>
            </li>
                                    <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-operate"></span>
                <span class="slider-menu-div-span">经营管理</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul">
                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_child_account" data-href="&amp;h=manager_child_account">
                  <div class="sidebar-menu-title">子帐号管理</div>
                </li>
                                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_seller_crm" data-href="&amp;h=manager_seller_crm">
                  <div class="sidebar-menu-title">手机端CRM管理</div>
                </li>
                                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_short_msg" data-href="&amp;h=manager_short_msg">
                  <div class="sidebar-menu-title">短信接收管理</div>
                </li>
                              </ul>
            </li>
                        

            <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-vip"></span>
                <span class="slider-menu-div-span">营销工具</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul">
                              <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_membership_card" data-href="&amp;h=manager_membership_card">
                  <div class="sidebar-menu-title">会员卡
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_coupon_card" data-href="&amp;h=manager_coupon_card">
                  <div class="sidebar-menu-title">优惠券
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_points" data-href="&amp;h=manager_points">
                  <div class="sidebar-menu-title">积分
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_stored_value" data-href="&amp;h=manager_stored_value">
                  <div class="sidebar-menu-title">储值
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_promotion" data-href="&amp;h=manager_promotion">
                  <div class="sidebar-menu-title">推广（公测中）
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_seckill" data-href="&amp;h=manager_seckill">
                  <div class="sidebar-menu-title">秒杀
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_collect_benefit" data-href="&amp;h=manager_collect_benefit">
                  <div class="sidebar-menu-title">集集乐
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_group_buy" data-href="&amp;h=manager_group_buy">
                  <div class="sidebar-menu-title">拼团活动
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                 <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_luckyWheel" data-href="&amp;h=manager_luckyWheel">
                  <div class="sidebar-menu-title">大转盘
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                 <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_golden_eggs" data-href="&amp;h=manager_golden_eggs">
                  <div class="sidebar-menu-title">砸金蛋
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_scratch" data-href="&amp;h=manager_scratch">
                  <div class="sidebar-menu-title">刮刮乐
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                              </ul>
            </li>
            
                        <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_template_message" data-href="&amp;h=manager_template_message">
              <div class="sidebar-menu-title">
                <span class="sidebar-menu-icon icon-templatemessage"></span>
                <span class="slider-menu-div-span">模板消息</span>
              </div>
            </li>
                        <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-franchisee-list"></span>
                <span class="slider-menu-div-span">多商家管理</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_franchisee_list" data-href="&amp;h=manager_franchisee_list"><div class="sidebar-menu-title">店铺列表</div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_franchisee_order_analysis" data-href="&amp;h=manager_franchisee_order_analysis"><div class="sidebar-menu-title">订单分析</div></li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_franchisee_profit_analysis" data-href="&amp;h=manager_franchisee_profit_analysis"><div class="sidebar-menu-title">收益分析</div></li>
                
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_franchisee_enter_analysis" data-href="&amp;h=manager_franchisee_enter_analysis"><div class="sidebar-menu-title">我要入驻</div></li>
              </ul>
            </li>
                        <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <span class="sidebar-menu-icon icon-video-manage"></span>
                <span class="slider-menu-div-span">视频管理</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul">
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_video_list" data-href="&amp;h=manager_video_list">
                  <div class="sidebar-menu-title">视频列表
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_video_order" data-href="&amp;h=manager_video_order">
                  <div class="sidebar-menu-title">订单管理
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_video_comment" data-href="&amp;h=manager_video_comment">
                  <div class="sidebar-menu-title">评价管理
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
                <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_video_project" data-href="&amp;h=manager_video_project">
                  <div class="sidebar-menu-title">视频项目
                    <img class="sidebar-vip svip" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/svip.png">
                  </div>
                </li>
              </ul>
            </li>
                                    <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_business_payment" data-href="&amp;h=manager_business_payment">
               <div class="sidebar-menu-title">
                <!-- <img class="user-manager-shareIcon" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/share.png"/> -->
                <span class="sidebar-menu-icon icon-business-payment"></span>
                <span class="slider-menu-div-span">企业付款</span>
               </div>
            </li>
			                                    <!--<li class="sidebar-menu">-->
              <!--<div class="sidebar-menu-title slider-menu-div">-->
                <!--<span class="sidebar-menu-icon icon-app-authorized"></span>-->
                <!--<span class="slider-menu-div-span">小程序管理</span>-->
                <!--<span class="caret"></span>-->
              <!--</div>-->
              <!--<ul class="list-unstyled sidebar-ul sidebar-gzh-ul">-->
                <!--<li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_applet_authorization" data-href="&h=manager_applet_authorization"><div class="sidebar-menu-title">小程序授权</div></li>-->
              <!--</ul>-->
            <!--</li>-->

            <li class="sidebar-menu">
              <div class="sidebar-menu-title slider-menu-div">
                <!-- <img class="user-manager-pubNumberIcon" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/publicNumber.png"/> -->
                <span class="sidebar-menu-icon icon-public"></span>
                <span class="slider-menu-div-span">公众号管理</span>
                <span class="caret"></span>
              </div>
              <ul class="list-unstyled sidebar-ul sidebar-gzh-ul">
                  <li class="sidebar-nav sidebar-sub-menu" data-pjax="1" data-page="manager_authorize" data-href="&amp;h=manager_authorize">
                    <div class="sidebar-menu-title">绑定公众号</div>
                  </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_follow_reply" data-href="&amp;h=manager_follow_reply">
                    <div class="sidebar-menu-title">关注回复</div>
                  </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_default_reply" data-href="&amp;h=manager_default_reply">
                    <div class="sidebar-menu-title">默认回复</div>
                  </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_keyword_reply" data-href="&amp;h=manager_keyword_reply">
                    <div class="sidebar-menu-title">关键词回复</div>
                  </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_template" data-href="&amp;h=manager_template">
                    <div class="sidebar-menu-title">模板消息</div>
                    </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_custom_menu" data-href="&amp;h=manager_custom_menu">
                    <div class="sidebar-menu-title">自定义菜单</div>
                  </li>
                  <li class="sidebar-nav sidebar-sub-menu disabled" data-pjax="1" data-page="manager_material" data-href="&amp;h=manager_material">
                    <div class="sidebar-menu-title">素材管理</div>
                  </li>
              </ul>
            </li>            <li class="sidebar-nav sidebar-menu slider-menu-div" data-pjax="1" data-page="manager_citylocation" data-href="&amp;h=manager_citylocation">
               <div class="sidebar-menu-title">
                <span class="sidebar-menu-icon icon-citylocation"></span>
                <span class="slider-menu-div-span">城市定位</span>
               </div>
            </li>
                      </ul>
        </div>
      </div>
      <!--div id="userGroup"-->
      <div class="userGroupContent" style="display: none;">
           <div class="user-group-header container-fluid">
                 <div class="row all-nogroup-user" id="group_name-1">
                   <div class="col-md-2"></div>
                   <div class="col-md-6">全部客户</div>
                   <div class="col-md-4"><span id="allClient"></span></div>
                 </div>
                 <div class="row all-nogroup-user" id="group_name0">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">未分组客户</div>
                    <div class="col-md-4"><span id="noGroupClient">0</span></div>
                 </div>
                </div>
                <div class="user-group-middle container-fluid">
                  <div class="row" id="addnewgroupBtn">
                    <div class="addnewGroupDIV">+添加分组</div>
                  </div>
                  <div class="row" id="addnewGroupinput">
                   <div class="col-md-8">
                     <input type="text" name="addnewGroupName">
                   </div>
                   <div class="col-md-4">
                   <i class="glyphicon glyphicon-ok glyphicon-ok-2"></i>
                   <i class="glyphicon glyphicon-remove glyphicon-remove-2"></i>
                   </div>
                  </div>

                </div>
                <div class="user-group-bottom">
                  <button type="button" class="groupeditbtn groupedit_common">编辑分组</button>
                  <button type="button" class="cancleGroupeditbtn groupedit_common">取消编辑</button>
                </div>
      </div>
      <!--/div-->
      <div class="userGroupClick" style="display: none;">
        <span class="rightTrangle"></span>
      </div>
      <!-- 页面内容 -->
      <div class="col-md-10 content" id="content"><style rel="stylesheet">
a:visited,
a:focus {
  text-decoration: none;
}
.goods-content-body {
  position: absolute;
  top: 100px;
  bottom: 0;
  left: 0;
  right: 0;
    /*padding: 10px 15px;*/
  overflow: auto;
}

.goods-list-table td,
.goods-list-table th {
  max-width: 150px;
  overflow: hidden;
  text-overflow: ellipsis;
}

.goods-edit-wrap,
.goods-show-wrap,
.booking-edit-wrap {
  height: 100%;
  padding-bottom: 15px;
}

.goods-edit-wrap,
.booking-edit-wrap {
  display: none;
}

.booking-edit-wrap .page-content-header,
.goods-edit-wrap .page-content-header {
  padding-left: 15px;
  padding-right: 15px;
}

.goods-content-footer {
  margin-top: 20px;
  text-align: center;
}

.thumbnail:hover .broadcast-img-dele {
  display: block;
}

.broadcast-img-dele {
  display: none;
  position: absolute;
  margin-left: 97px;
  margin-top: -120px;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  color: #fff;
  font-size: 23px;
  line-height: 24px;
  background-color: #d9534f;
}

#goodsSpecificationModal .btn-sm {
  margin: 4px 2px;
}

#goodsSpecificationModal .btn-sm:hover {
  background-color: #fff;
}

#goodsSpecificationModal .btn-sm:active,
#goodsSpecificationModal .btn-sm:focus {
  background-color: #fff;
  box-shadow: none;
}

#goodsSpecificationModal .form-control {
  width: 50px;
  height: 22px;
  padding: 3px;
  display: inline-block;
}

#goodsSpecificationModal .glyphicon-ok {
  margin-left: 5px;
  color: rgb(87, 87, 232);
}

#goodsSpecificationModal .goods-specification.active {
  color: #fff;
  background-color: #337ab7;
}

.specification-case {
  margin-right: 20px;
  padding: 18px 24px;
  display: inline-block;
  border: 1px solid #b3b3b3;
  color: #585858;
  border-radius: 4px;
}

.sub-specification-list .specification-case {
  padding: 6px;
}

.specification-case .glyphicon {
  margin-left: 8px;
  color: #1991da;
  cursor: pointer;
}

.sub-specification-list {
  padding: 11px 13px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.sub-specification-list .add-sub-specification {
  color: #1991da;
  border-color: #1991da;
}

.specification-case input.form-control {
  width: 50px;
  height: 25px;
  padding: 3px;
}

.specification-selected-list li {
  margin-top: 15px;
}

.specification-detail-table {
  margin: 20px 0;
}

.specification-detail-table span {
  display: inline-block;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  white-space: nowrap;
  min-width: 110px;
}

.specification-detail-tbody {
  border: 1px solid #a8adac;
  border-top: none;
}

.specification-detail-thead,
.specification-detail-tbody > div {
  height: 50px;
  line-height: 50px;
  padding-left: 20px;
  border-bottom: 1px solid #f7f7f7;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}

.specification-detail-table input.form-control {
  display: inline-block;
  width: 63px;
  padding-left: 5px;
  padding-right: 5px;
}

.specification-detail-table .specification-detail-thead {
  height: 42px;
  line-height: 39px;
  border: 1px solid #a8adac;
  background-color: #f7f7f7;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
}

.specification-detail-container {
  min-width: 500px;
}

.specification-detail-container .specification-case label {
  font-weight: normal;
  margin: 0 5px;
  color: #5a5a5a;
}
.goods-edit-wrap .specification-img-wrap{
  display: inline-block;
  width: 49px;
  height: 49px;
  border: 1px solid #eee;
  vertical-align: top;
  padding: 0;
  margin-right: 10px;
}
.specification-img-wrap > img{
  width: 100%;
  height: 100%;
}
.specification-img-change{
  vertical-align: top;
  cursor: pointer;
  display: inline-block;
  color: #1991da;
}

.specification-case input.form-control,
.specification-case .glyphicon-ok {
  display: none;
}

.specification-case.editing input,
.specification-case.editing .glyphicon-ok {
  display: inline-block;
}

.specification-case.editing label,
.specification-case.editing .glyphicon-pencil {
  display: none;
}

.receiving_info,
.goods_info,
#province-select,
#city-select,
#area-select {
  width: 100px;
  height: 30px;
  text-indent: 10px;
  margin-right: 10px;
}

.receiving_info+span {
  border: 1px solid;
  padding: 5px 17px;
  margin-left: 30px;
  letter-spacing: 2px;
  font-size: 15px;
  color: #FEBC27;
  cursor: pointer;
}

.newReceiveInfo-dialog{
  z-index: 10;
  background-color: rgba(0, 0, 0, 0.5);
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: none;
}

.newReceiveInfo-content,
.newReceiveInfo-content-already,
.newReceiveInfo-content-edit {
  position: relative;
  background-color: white;
  width: 800px;
  height: 500px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  border-radius: 4px;
}

.newReceiveInfo-content-edit,
.newReceiveInfo-content-already {
  display: none;
}

.importGoodsData-dialog {
  z-index: 10;
  background-color: rgba(0, 0, 0, 0.5);
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: none;
}

.importGoodsData-content {
  position: relative;
  background-color: white;
  width: 400px;
  height: 300px;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  border-radius: 4px;
}

.header-info {
  height: 50px;
  background-color: #F0F0F0;
  border-radius: 4px;
}

.header-info-title {
  font-size: 20px;
  font-weight: normal;
  letter-spacing: 1px;
  height: 50px;
  width: 200px;
  line-height: 50px;
  margin-left: 30px;
  color: #272727;
}

.close-obj,
.close-obj-edit,
.close-obj-already {
  position: absolute;
  right: 20px;
  top: 10px;
  font-size: 20px;
  cursor: pointer;
}

.middle-info,
.edit-address,
.already-exits-address-list {
  height: 305px;
  overflow: auto;
  width: 95%;
  margin: 0px auto 20px;
}

.already-exits-address-list {
  height: 380px;
}

.edit-address table,
.already-exits-address-list table,
.middle-info table {
  width: 100%;
}

.footer-info,
.footer-info-edit {
  width: 95%;
  margin: 10px auto 20px;
}

.footer-info span>span {
  color: red;
}

.footer-info div>span {
  margin-left: 20px;
}

.footer-info-edit button,
.footer-info button {
  width: 100px;
  height: 40px;
  border-radius: 4px;
  border: none;
  font-size: 15px;
  letter-spacing: 1px;
  outline: none;
}

.footer-info-edit button:nth-of-type(1),
.footer-info button:nth-of-type(1) {
  background-color: #EEE;
  color: black;
  margin-left: 80px;
}

.footer-info-edit button:nth-of-type(2),
.footer-info button:nth-of-type(2) {
  background-color: #FDB400;
  color: white;
  text-align: center;
  cursor: pointer;
  margin-left: 15px;
}

.add-new-pro {
  text-align: center;
  margin: 15px auto;
}

.add-new-pro button {
  height: 30px;
  width: 100px;
  border: 1px solid;
  background: white;
  color: #FDB400;
  font-size: 15px;
  letter-spacing: 2px;
  border-radius: 4px;
  outline: none;
}

.add-new-pro button:last-child {
  margin-left: 20px;
}

.trangle {
  display: inline-block;
  width: 20px;
  height: 10px;
  transform: rotate(90deg);
  --webkit-transform: rotate(90deg);
  --moz-transform: rotate(90deg);
}

.trangle-top {
  width: 0;
  height: 0;
  border-top: 4px solid transparent;
  border-right: 8px solid #909090;
  border-bottom: 4px solid transparent;
  float: left;
}

.trangle-bottom {
  width: 0;
  height: 0;
  border-top: 4px solid transparent;
  border-left: 8px solid #909090;
  border-bottom: 4px solid transparent;
  float: right;
}

.edit-receiveAddr {
  margin-left: 20px;
  cursor: pointer;
}

.edit-receiveAddr img {
  width: 20px;
  height: 20px;
  cursor: pointer;
}

.delete-receiveAddr {
  margin-left: 20px;
  cursor: pointer;
}

.delete-receiveAddr img {
  width: 20px;
  height: 20px;
  cursor: pointer;
}

.tooltip-container {
  position: relative;
  display: inline-block;
  height: 15px;
  line-height: 15px;
  width: 15px;
  top: -5px;
  border-radius: 50%;
  color: #fff;
  font-size: 10px;
  margin: 0 0 0 2px;
  border: 1px solid black;
  color: black;
}

.tooltip-content {
  display: none;
  font-weight: normal;
  position: absolute;
  z-index: 999999;
  margin: 0;
  top: -15px;
  width: 87px;
  background: #FCF9E3;
  text-align: left;
  left: 20px;
  letter-spacing: 1px;
  padding: 4px;
  box-shadow: 0px 0px 6px #746e6e;
  border-radius: 2px;
}

.tooltip-content:before {
  content: '';
  display: inline-block;
  border-top: 5px solid transparent;
  border-left: 5px solid transparent;
  border-right: 5px solid #FCF9E3;
  border-bottom: 5px solid transparent;
  position: absolute;
  left: -10px;
  top: 15px;
}

.goods-list-table thead th {
  overflow: visible;
}

.goodsWeight {
  width: 100px;
  height: 30px;
  text-indent: 10px;
  border-radius: 3px;
  border: 1px solid #DDD;
}

.field-info-ingoods {
  height: 30px;
  width: 120px;
  border: 1px solid #DDD;
  text-indent: 10px;
}

.info-type-ingoods {
  height: 30px;
  width: 80px;
  border: 1px solid #DDD;
  text-indent: 10px;
}

.project-info,
.project-info-addNew,
.project-edit-info {
  width: 95%;
  margin: 0px auto;
  height: 50px;
}

.project-info-addNew button {
  height: 30px;
  width: 110px;
  border: 1px solid;
  border-radius: 4px;
  color: #FDB400;
  background: white;
  letter-spacing: 2px;
  font-size: 15px;
  margin-top: 10px;
  margin-left: 30px;
  outline: none;
}

.project-edit-info div,
.project-info div {
  float: left;
  margin-top: 10px;
  margin-left: 20px;
}

.project-edit-info div span,
.project-info div span {
  font-size: 15px;
  letter-spacing: 1px;
}

#infoName-add,
#infoDescribe-add,
#infoDescribe-ingoods,
#infoName-ingoods {
  height: 30px;
  width: 150px;
  text-indent: 10px;
  border: 1px solid #DDD;
  border-radius: 4px;
  margin-left: 5px;
}

.goods-list-table tbody span>img {
  width: 20px;
  height: 20px;
  margin-left: 20px;
  cursor: pointer;
}
/*
.goods-category-ul>li.active>a,
.goods-category-ul>li.active>a:hover,
.goods-category-ul>li.active>a:active:focus {
    background: #ED9C27;
}*/

.goods-show-wrap .goods-search-btn {
  background: #ED9C27;
  border-color: #ED9C27;
}

.goods-show-wrap .add-goods,
.goods-show-wrap .add-goods:active:focus {
  background: #5DB75D;
  border-color: #5DB75D;
}

.goods-show-wrap .copy-goods,
.goods-show-wrap .copy-goods:active:focus {
  background: #FFF;
  border-color: #333;
  color: #333;
}

.goods-show-wrap .export-goods-list,
.goods-show-wrap .export-goods-list:active:focus {
  background: #5DB75D;
  border-color: #5DB75D;
}

td div {
  max-width: none;
}

.left-separator {
  border: none;
  border-left: 1px solid #DDD;
  float: left;
  height: 30px;
}

.right-separator {
  border: none;
  float: right;
  border-right: 1px solid #DDD;
  height: 30px;
}

#editAddress input[type="text"] {
  height: 30px;
  width: 120px;
  border: 1px solid #DDD;
  text-indent: 10px;
}

#editAddress select {
  height: 30px;
  width: 80px;
  border: 1px solid #DDD;
  text-indent: 10px;
}

.footer-info-edit>div {
  width: 300px;
  margin: 0 auto;
}
.goodsList{
  margin-left: 20px;
}
.goodsList:before{
  position: absolute;
  content: '';
  width: 5px;
  height: 20px;
  display: block;
  background: #FEBC2D;
  left: 20px;
  top: 9px;
}
.page-content-header-goods{
  background-color: #fff;
  padding-bottom: 5px;
}
.header-form-control-goods{
  position: relative;
}
.manage-category,
.goods-search-input {
  border: 1px solid #333;
}
.goods-searchBtn{
  position: absolute;
  right: 5px;
  top: 10px;
  cursor: pointer;
}
.addGoodsIngoodsList{
  border: 1px solid;
  background: white!important;
  border-radius: 4px;
  height: 34px;
  width: 120px;
  color: #22b524;
  margin-left: 15px;
  letter-spacing: 2px;
}
.addGoodsIngoodsList:hover,
.addGoodsIngoodsList:focus {
  color: #5DB75D;
}
.goods-show-wrap .export-goods-list{
  background: white!important;
  color: #333;
  letter-spacing: 2px;
  border: 1px solid;
  margin-left: 6px;
}
.goodstype{
  background-color: #EEE!important;
}
.goodstype-title {
  display: inline-block;
  float: left;
  line-height: 40px;
  text-align: center;
  font-weight: 600;
}
.goodstype .nav>li>a{
  /*border: 1px solid;*/
  text-align: center;
  padding: 3px 10px;
  margin-top: 8px;
  letter-spacing: 2px;
  color: #393939;
  font-weight: 600;
}
.select-goods-class .nav>li>a{
  border: 1px solid;
  text-align: center;
  padding: 3px 10px;
  margin-top: 3px;
  letter-spacing: 2px;
  color: #393939;
  font-weight: 600;
}
.goods-category-ul>li.active>a{
  color: white;
  background-color:#383838;
}
.nav-pills>li.active>a,
.nav-pills>li.active>a:focus,
.nav-pills>li.active>a:hover{
  color: white;
  border-color: #383838;
  background-color:#383838;
}
.manage-goodsList-header-common{
  float: right;
  margin-top: 3px;
  margin-left: 6px;
}
.nav-pills>li+li{
  margin-left: 10px;
}
.select-goods-class{
  background-color: #EEE;
}
.select-goods-class-title{
  padding-top: 5px;
  letter-spacing: 2px;
  font-size: 15px;
}
.booking-edit-wrap .page-content-header,
.goods-edit-wrap .page-content-header {
  background-color: white;
}
.addNewGoods-title{
  margin-left: 20px;
}
.addNewGoods-title:before{
  position: absolute;
  content: '';
  width: 5px;
  height: 20px;
  display: block;
  background: #FEBC2D;
  left: 20px;
  top: 14px;
}
.save-right-corner{
  color: #22b524;
  border: 1px solid;
  background-color: #FFF;
}
.right-corner-common{
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border-radius: 4px;
}
.return-right-corner{
  background-color: white;
  border: 1px solid #DDD;
  color: #333;
  margin-left: 15px;
}
.nav span{
  display: inline-block;
  padding: 5px 10px;
  font-size: 15px;
}
/*.goods-type-tab {
  height: 45px;
  line-height: 45px;
}
.goods-type-tab .tab-text {
  display: inline-block;
  margin-left: 12px;
  margin-right: 6px;
}
.goods-type-tab .goods-type-list {
  display: inline-block;
  margin: 0;
  padding: 0;
}
.goods-type-tab .goods-type-list li {
  display: inline-block;
  width: 60px;
  height: 25px;
  line-height: 25px;
  text-align: center;
  margin: 10px 5px 0;
  vertical-align: top;
  cursor: pointer;
}
.goods-type-tab .goods-type-list li.active {
  border-bottom: 1px solid #F2B302;
  color: #F2B302;
}*/
.open-location {
  position: relative;
  display: inline-block;
  vertical-align: middle;
  width: 40px;
  height: 20px;
  border-radius: 50px;
  position: relative;
  border: 1px solid rgba(0,0,0,.2);
  overflow: hidden;
}
.open-location .location-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  border-radius: 50px;
}
.open-location input {
  z-index: 3;
  opacity: 0;
  position: absolute;
  height: 100%;
  width: 100%;
  margin: 0;
}
.open-location label{
  cursor: pointer;
  top: 0px;
  left: 0;
  width: 17px;
  height: 17px;
  cursor: pointer;
  border-radius: 50px;
  position: absolute;
  background: white;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px rgba(0,0,0,0.4);
  z-index: 2;
}
.open-location input + label + .location-background {
  background: rgb(255, 255, 255);
  transition: all 0.3s linear;
}
.open-location input + label {
  left: 0px;
  transition: all 0.3s linear;
}
.field-group .open-location input:checked + label + .location-background {
  background: rgb(239, 191, 31);
  transition: all 0.3s linear;
}
.field-group .open-location input:checked + label {
  left: 21px;
  transition: all 0.3s linear;
}
#tencent-map {
  width: 600px;
  height: 500px;
}
#pre-address {
  position: absolute;
  bottom: 35px;
  left: 0;
  width: 100%;
  height: 300px;
  overflow-y: auto;
  background-color: #f7f7f7;
  border-radius: 4px;
}
/*运费*/
#express,#freeExpress{
  margin: 0 10px 0 5px;
  vertical-align: middle;
}
.express-select {
  display: none;
  margin-left: 180px;
  margin-top: 10px;
}
.express-select select {
  margin-right: 10px;
  height: 28px;
}
.fregiht-input {
  width: 70px;
  display: inline-block;
  margin: 2px 7px;
}
.add-express-btn {
  border: 1px solid #FEBC27;
  padding: 0 10px;
  cursor: pointer;
  color: #FEBC27;
  line-height: 26px;
}
/*----------------批量复制商品--------------------*/
.batchCopyGoods{
  position:relative;
}
.batchCopyGoods ul{
  list-style: none;
  display: none;
  position: absolute;
  background: #FFF;
  box-shadow: 0px 0px 10px #777;
  top: 37px;
  width: 130px;
  left: 0;
  letter-spacing: 1px;
  color: #333;
  cursor: pointer;
  z-index: 10;
  border-radius: 4px;
}
.batchCopyGoods ul li{
  list-style: none;
  height: 35px;
  line-height: 35px;
  cursor: pointer;
  padding-left: 20px;
  text-align: left;
}
.batchCopyGoods ul li:hover{
  background-color: #f5f5f5;
}
.batchCopyGoods ul li:nth-child(1), .batchCopyGoods ul li:nth-child(2){
  border-bottom: 1px solid #DDD;
}
.theadBox{
  display: none;
}
.goods-list-table tbody tr td:first-child{
  display: none;
}
.pagination-copygoods-wrap{
  overflow: hidden;
  zoom: 1;
}
.copyGoods-btn-wrap{
 width: 50%;
 float: left;
 text-align: left;
 visibility: hidden;
}
.copyGoods-btn-wrap button{
  height: 30px;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  margin-top: 20px;
  line-height: 1;
  letter-spacing: 1px;
  outline: none;
}
.copyGoods-btn-wrap button:first-child{
  margin-left: 20px;
  background-color: #5DB75D;
  color: #FFF;
}
.copyGoods-btn-wrap button:last-child{
  background-color: #BBB;
  color: #333;
  margin-left: 10px;
}
#goods-table-toolbar{
  width: 50%;
 float: left;
 text-align: right;
}
.copy-modal,
.tip-modal{
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  background-color: rgba(0,0,0,0.5);
  z-index: 100000;
  display: none;
}
.copy-modal-wrap{
  position: relative;
  top: 50%;
  left: 50%;
  width: 480px;
  height: 250px;
  background-color: #fff;
  transform: translate(-50%,-50%);
  border-radius: 4px;
}
.copy-modal-title{
  position: relative;
  height: 40px;
  background-color: #EEE;
  border-radius: 4px 4px 0px 0px;
}
.copy-modal-title > span:first-child{
 line-height: 40px;
 color: #333;
 text-align: center;
 padding-left: 15px;
 font-size: 15px;
 letter-spacing: 1px;
}
.copy-modal-title > span:last-child{
  position: absolute;
  right: 20px;
  top: 2px;
  width: 10px;
  text-align: center;
  cursor: pointer;
  font-size: 25px;
}
.copy-modal-content{
  height: 150px;
}
.copy-modal-content >div{
  text-align: center;
  padding-top: 48px;
}
.copy-modal-content >div p:first-child input{
  height: 30px;
  border: 1px solid #DDD;
  border-radius: 4px;
  text-indent: 10px;
}
#not-checkCode .copy-modal-content >div p:last-child{
  width: 185px;
  margin-left: 172px;
  color: #AAA;
  letter-spacing: 1px;
  font-size: 13px;
}
#need-checkCode .copy-modal-content >div p:last-child{
  width: 319px;
  margin-left: 130px;
  color: #AAA;
  letter-spacing: 1px;
  font-size: 13px;
}
.how-get-wrap{
  margin-left: 10px;
  color: #F2B302;
  cursor: pointer;
}
.how-get{
  display: inline-block;
  text-align: center;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 1px solid;
  margin-right: 5px;
}
.copy-modal-footer{
  height: 60px;
  text-align: center;
}
.copy-modal-footer button{
  text-align: center;
  height: 30px;
  padding: 6px 12px;
  border: none;
  letter-spacing: 1px;
  border-radius: 4px;
  line-height: 1;
  outline: none;
}
.copy-modal-footer button:first-child{
  background-color:#EEE;
  color: #333;
}
.copy-modal-footer button:last-child{
 background-color: #F2B302;
 color: #FFF;
 margin-left: 10px;
}
#need-checkCode .copy-modal-wrap{
  height: 300px;
}
#need-checkCode .copy-modal-content{
  height: 200px;
}
#need-checkCode .copy-modal-content > p{
  padding-left: 115px;
  margin-top: 20px;
}
#need-checkCode .copy-modal-content > p input{
  height: 30px;
  border: 1px solid #DDD;
  border-radius: 4px;
  text-indent: 10px;
}
.tip-modal-wrap{
  position: relative;
  width: 300px;
  height: 180px;
  top: 50%;
  left: 50%;
  background-color: #fff;
  transform: translate(-50%,-50%);
  border-radius: 4px;
}
.tip-modal-header{
  position: relative;
  height: 40px;
  line-height: 40px;
  background-color: #EEE;
  border-radius: 4px 4px 0px 0px
}
.tip-modal-header span:first-child{
  margin-left: 10px;
  color: #333;
}
.tip-modal-header span:last-child{
  position: absolute;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
  width: 20px;
  height: 20px;
  text-align: center;
  top: 0px;
}
.tip-modal-content{
  height: 80px;
  text-align: center;
  letter-spacing: 1px;
  color: #333;
  line-height: 80px;
}
.img-batchCopy{
  width: 16px;
  height: 16px;
}
.copy-modal-content a:hover,
.copy-modal-content a:focus,
.copy-modal-content a:active,
.copy-modal-content a:visited{
  color: inherit;
  text-decoration: none;
  display: inline-block;
}
.tip-modal-footer{
  height: 60px;
  text-align: center;
  line-height: 60px;

}
.tip-modal-footer button{
  margin-left: 15px;
  border: none;
  outline: none;
  height: 30px;
  text-align: center;
  line-height: 30px;
  color: #FFF;
  letter-spacing: 1px;
  border-radius: 4px;
  background-color: #F2B302;
  padding: 0px 12px;
  cursor: pointer;
}
.tip-modal-footer input[type='checkbox']{
  display: none;
}
.tip-modal-footer #forCheckBox{
  display: inline-block;
  height: 20px;
  width: 20px;
  border: 1px solid #DDD;
  text-align: center;
  vertical-align: middle;
}
.tip-modal-footer input[type='checkbox']:checked+#forCheckBox{
  position: relative;
}
.tip-modal-footer input[type='checkbox']:checked+#forCheckBox:after{
  content: '\2714';
  position: absolute;
  top: -21px;
  left: 3px;

}
.tip-modal-footer span{
  margin-left: 5px;
}
li[data-necessary='1'][data-field="volume"] .field-label:before {
  content: '';
}

.goods-list-menu h3 {
  height: 50px;
  line-height: 50px;
  background: #eeeeee;
  font-size: 16px;
  padding-left: 15px;
  margin-bottom: 0;
}
.goods-list-menu .goods-all {
  display: block;
  height: 40px;
  line-height: 40px;
  padding-left: 15px;
  background: #f9f9f9;
  font-size: 16px;
  font-weight: bold;
}
.goods-list-menu .panel-default {
  border-color: #f9f9f9;
}
.goods-list-menu .panel-title > a[data-hassubclass="true"] {
  display: block;
  position: relative;
} 
.goods-list-menu .panel-title > a[data-hassubclass="true"]::after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  top: 50%;
  -webkit-transform-origin: 25% 50%;
  transform-origin: 25% 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  width: 0;
  height: 0;
  border: 5px solid #cdcdcd;
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  -webkit-transition: .5s;
  transition: .5s;
}
.goods-list-menu .panel-title > a[aria-expanded="true"]::after {
  -webkit-transform: translateY(-50%) rotateZ(90deg);
  transform: translateY(-50%) rotateZ(90deg);
}
.goods-list-menu .panel-body {
  border-top-color: #f9f9f9 !important;
  padding: 0 0 0 35px;
}
.goods-list-menu .panel-body a {
  display: block;
  height: 40px;
  line-height: 40px;
}

.goods-list-menu .active,
.goods-list-menu .turnColor {
  color: #F2B302;
}
.panel-default > .panel-heading, 
.panel-collapse {
  background: #f9f9f9;
}
.panel-group .panel  {
  border: none;
}
.panel-group .panel + .panel {
  margin-top: 0;
}
.sort-manage-wrap {
  display: none;
}
.sort-manage-list .open-folder-btn {
  display: inline-block;
  width: 20px;
  height: 20px;
  text-align: center;
  line-height: 20px;
  color: #ccc;
  border: 1px solid #ccc;
  vertical-align: middle;
  margin-right: 5px;
  cursor: pointer;
}
.sort-manage-list .no-open-folder-btn {
  visibility: hidden;
}
.sort-manage-list tr[data-parent-id] {
  display: none;
}
.sort-manage-list tr th:nth-child(2),
.sort-manage-list tr td:nth-child(2) {
  text-align: left;
}
.sort-manage-list a {
  color: #febb2c;
  text-decoration: underline;
}
.sort-manage-list .subcategory {
  padding-left: 95px;
}
.sort-manage-list tr[data-parent-id] input[type="checkbox"] {
  margin-left: 40px;
}
.add-sort-manage-wrap {
  display: none;
}
.add-group-manager li {
  padding: 10px 0;
}
.add-group-manager li:nth-child(3),
.add-group-manager li:nth-child(5),
.operation-btn-group {
  margin-left: calc(10em + 40px);
}
.add-group-manager .correlation {
  display: none;
}
.add-group-manager .add-group-text span {
  color: red;
}
.add-group-manager .add-group-text a {
  display: inline-block;
  width: 20px;
  height: 20px;
  line-height: 20px;
  text-align: center;
  border: 1px solid #000000;
  color: #000000;
  border-radius: 50%;
}
.add-group-manager input[type="radio"] {
  vertical-align: top;
  margin-right: 20px;
  margin-bottom: 15px;
}
.add-group-manager .field-group {
  width: 300px;
}
.add-group-manager .classify-wrap {
  display: block;
}
.goods-field-group .goods-field-list {
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  min-height: 34px;
  padding: 6px 12px;
  cursor: pointer;
}
/*.goods-field-group:active {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}*/
.goods-field-group .goods-field-list li {
  float: left;
  height: 25px;
  line-height: 25px;
  padding-left: 10px;
  padding-right: 25px;
  color: #686669;
  background: #f3f3f3;
  position: relative;
  margin-right: 5px;
  margin-bottom: 5px;
  border-radius: 4px;
}
.goods-field-group li span {
  width: 25px;
  height: 25px;
  text-align: center;
  position: absolute;
  right: 0;
  top: 0;
  cursor: pointer;
}
.goods-field-menu {
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  margin-top: 10px;
  position: relative;
  display: none;
}
.goods-field-menu .pack-up-btn {
  position: absolute;
  width: 25px;
  height: 25px;
  line-height: 25px;
  color: #ccc;
  bottom: 5px;
  top: auto;
  right: 5px;
  cursor: pointer;
  text-align: center;
}
.goods-field-menu .panel-heading {
  padding: 10px 30px;
}
.goods-field-menu .panel-heading,
.goods-field-menu .panel-collapse {
  background: none;
}
.goods-field-menu .panel-body {
  border-top: none !important;
  padding: 0 15px 0 50px;
}
.goods-field-menu .panel-body p {
  border-top: none;
}
.goods-field-menu .panel-body a {
  height: 35px;
  line-height: 35px;
  display: inline-block;
  width: 65%;
}
.goods-field-menu .panel-title {
  position: relative;
}
.goods-field-menu .panel-title a[data-hassubClass="true"]::after {
  content: '';
  display: block;
  width: 0;
  height: 0;
  border: 5px solid #666666;
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  position: absolute;
  left: -18px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  -webkit-transition: .5s;
  transition: .5s;
  -webkit-transform-origin: 25% 50%;
  transform-origin: 25% 50%;
}
.goods-field-menu .panel-title a[aria-expanded="true"]::after {
  -webkit-transform: translateY(-50%) rotateZ(90deg);
  transform: translateY(-50%) rotateZ(90deg);
}
.goods-field-menu .panel-title input[type="checkbox"] {
  position: relative;
  top: 1px;
  margin-right: 5px; 
}
.goods-field-menu .panel-body input[type="checkbox"] {
  position: relative;
  top: 2px;
  margin-right: 5px;
}
.goods-field-menu .panel {
  box-shadow: none;
}
.copy-goods-btn:hover ul{
  display: block;
}
.qr-code {
  position: relative;
}
.code-box {
  position: absolute;
  width: 220px;
  border: 1px solid #ccc;
  top: -130px;
  padding-top: 10px;
  min-height: 260px;
  left: -214px;
  background: #fff;
  display: none;
  overflow: initial;
  font-weight: normal;
  font-size: 12px;
  z-index: 10;
}
.goods-show-wrap .goods-list-table tbody tr td:nth-child(8) {
  overflow: initial;
}
.code-box:before {
  width: 10px;
  height: 10px;
  content: '';
  border: 1px solid #ccc;
  position: absolute;
  transform: rotatez(45deg);
  top: 133px;
  border-left: 0;
  border-bottom: 0;
  background: #fff;
  left: 214px;
}
.code-box img {
  min-width: 200px;
  min-height: 200px;
}
.code-box a,.code-box span {
  color: #178cf1;
  margin: 0 10px;
  cursor: pointer;
}
.BatchDownloadGoodsQRCode {
  display: none;
}
.specification-detail-table input.spe-all-virtualPrice {
  width: 85px;
}
</style>
<style type="text/css">
  .goods-type-tab {
      position: relative;
      height: 45px;
      line-height: 45px;
  }
  .goods-type-tab .tab-text {
      display: inline-block;
      margin-left: 12px;
      margin-right: 6px;
  }
  .goods-type-tab .goods-type-list {
      display: inline-block;
      margin: 0;
      padding: 0;
  }
  .goods-type-tab .goods-type-list li {
      display: inline-block;
      width: 60px;
      height: 25px;
      line-height: 25px;
      text-align: center;
      margin: 10px 5px 0;
      vertical-align: top;
      cursor: pointer
  }
  .goods-type-tab .goods-type-list li.active {
      border-bottom: 1px solid #F2B302;
      color: #F2B302;
  }
  .goods-type-tab .goodsType-default {
    display: inline-block;
    position: absolute;
    right: 0;
    min-width: 200px;
  }
  .goods-type-tab .goodsType-default > span {
    display: inline-block;
    margin-right: 10px;
  }
  .goods-type-tab .goodsType-default > select {
    display: inline-block;
    height: 28px;
    line-height: 28px;
    vertical-align: middle;
  }
</style>
<div class="goods-type-tab row">
    <div class="tab-text">店铺类型:</div>
    <ul class="goods-type-list">
        <li data-pjax="1" data-page="manager_goods_manage" data-href="&amp;h=manager_goods_manage" class="active">电商</li>
        <li data-pjax="1" data-page="manager_takeout_manage" data-href="&amp;h=manager_takeout_manage">外卖</li>
        <li data-pjax="1" data-page="manager_booking_manage" data-href="&amp;h=manager_booking_manage">预约</li>
        <li data-pjax="1" data-page="manager_tostore_manage" data-href="&amp;h=manager_tostore_manage">到店</li>
    </ul>
    <div class="goodsType-default">
      <span>默认展示店铺类型</span>
      <select id="goodsType_default_select">
        <option value="0">电商</option>
        <option value="2">外卖</option>
        <option value="1">预约</option>
        <option value="3">到店</option>
      </select>
    </div>
</div>
<script type="text/javascript">
  // 加载当前类型
  $('.goods-type-list [data-page="'+ GetQueryString('h') +'"]').addClass('active');
  // 加载默认展示店铺类型
  $.ajax({
    url: '/index.php?r=pc/AppShop/GetDefaultGoodsType',
    type: 'get',
    data: {
      app_id: appId
    },
    dataType: 'json',
    success: function(data){
      if (data.status!=0) {
        alert(data.data);
      }
      switch(parseInt(data.data)){
        case 0:
          datap = 'manager_goods_manage';
          break;
        case 1:
          datap = 'manager_booking_manage';
          break;
        case 2:
          datap = 'manager_takeout_manage';
          break;
        case 3:
          datap = 'manager_tostore_manage';
          break;
        default:
          datap = 'manager_goods_manage';
          break;
      }
      $('#goodsType_default_select').val(data.data);
    }
  });
  // 店铺切换
  $('.goods-type-list').on('click', 'li', function(){
    var url = '/index.php?r=pc/AppMgr/manager'+'&_app_id='+ appId + $(this).attr('data-href');
    if ($(this).attr('data-pjax')) {
      PjaxRequest(url);
    }
  });
  // 默认展示店铺类型
  $('#goodsType_default_select').on('change', function(){
    var goodsType = $(this).val();
    $.ajax({
      url: '/index.php?r=pc/AppShop/SetDefaultGoodsType',
      type: 'get',
      data: {
        app_id: appId,
        goods_type: goodsType
      },
      dataType: 'json',
      success: function(data){
        if (data.status!=0) {
          alert(data.data);
        }
      }
    });
  });
</script>
<!-- 商品列表 -->
<div class="goods-show-wrap" style="display: none;">
  <div class="row page-content-header page-content-header-goods">
    <div class="col-md-6">
      <h4 class="goodsList">商品列表</h4>
    </div>
    <div class="row goodstype page-content-header">
<!--         <div class="col-md-5">
           <span class="goodstype-title">分类：</span> <ul class="nav nav-pills small goods-category-ul goods-category-list"></ul>
        </div> -->
        <div class="col-md-7 pull-right">
            <a class="btn btn-success export-goods-list manage-goodsList-header-common"><span class="glyphicon glyphicon-download"></span>导出数据</a>
            <div class="btn btn-default manage-category manage-goodsList-header-common"><span class="glyphicon glyphicon-cog"></span>分类管理</div>
            <div class="btn copy-goods batchCopyGoods manage-goodsList-header-common">批量操作<ul style="display: none;"><li class="copy-goods-btn">复制<span class="caret" style="margin-left: 64px; transform: rotate(-90deg);"></span><ul style="left: 130px; top: 0px; display: none;"><li class="copy-diy">自选复制</li><li class="copy-all">全部复制</li></ul></li><li class="delete-goods-btn">删除</li><li class="download-qr-btn">下载二维码</li></ul></div>
            <div class="btn add-goods addGoodsIngoodsList manage-goodsList-header-common"><span class="glyphicon glyphicon-plus"></span> 添加商品</div>
            <div class="header-form-control header-form-control-goods manage-goodsList-header-common">
                <input class="form-control goods-search-input" type="text" placeholder="商品名称">
                <span class="glyphicon glyphicon-search goods-searchBtn"></span>
            </div>
        </div>
        <style rel="stylesheet">
.data-category-container .nav>li>a{
	border: none;
	padding: 2px 10px;
}
.data-category-container .nav>li.active{
	background:#d5dce2 ;
}
.data-category-container .nav>li:hover{
	background:#d5dce2 ;
}
.data-obj-wrap .data-obj-edit-wrap .nav-pills>li.active>a{
	background: none;
}
.data-obj-wrap .data-obj-edit-wrap .nav-pills>li>a{
	padding: 3px 10px;
}
.manage-category-wrap {
  position: absolute;
  display: none;
  z-index: 1;
  width: 500px;
  height: 300px;
 /* padding: 15px;*/
  top: 50%;
  left:50%;
 margin-left: -250px;
 margin-top: 170px;
 /* text-align: center;*/
  background: #fff;
  box-shadow: 0 3px 3px #999;
}
.manage-category-wrap h3{
	height: 40px;
	text-align: left;
	margin: 0;
	color: #848484;
	line-height: 40px;
	font-size: 14px;
	padding: 0 0 0 10px;
	background: #f0f0f0;
	cursor: pointer;
}

.manage-category-wrap h3 .close{
	float: right;
	display: inline-block;
	line-height:40px ;
	font-size: 14px;
	color: #4d4e53;
	margin-right: 10px;
}
.manage-category-wrap .ulList{
	padding-left: 10px;
	padding-top: 20px;
	height: 200px;
	overflow: auto;
}
.manage-category-wrap .ulList ul{
	overflow: hidden;
}
.manage-category-wrap .ulList ul li{
	float: left;
	height: 28px;
}

.manage-category-wrap .ulList .add-category{
	width: 80px;
	display: block;
	border: 1px solid #fdb400;
	text-align: center;
	height: 30px;
	color: #febc25;
	font-size: 14px;
	cursor: pointer;
	line-height: 30px;
		background: #fff;
}
.manage-category-wrap .ulList .add-category:hover{
	background: none;
}
.manage-category-wrap .ulList .inputBox{
	width: 120px;
	height: 27px;
	display: none;
	background: #fff;
}
.manage-category-wrap .ulList .inputBox input{
	padding: 0;
	border: 0;
	width: 80px;
	height: 26px;
	outline: none;
	border: 1px solid #fdb400;
	display: inline-block;
}
.inputBox .cate{
cursor: pointer;
padding: 0 3px;
}
span.cateChange{
cursor: pointer;
padding: 0 3px;
display: none;
}
.icon-gou{
	color:#fdb400 ;
	font-size: 14px!important;
}
.icon-closes{
	font-size: 14px!important;
}
.btns{
	width: 70px;
	height: 30px;
	text-align: center;
	/*margin-right: 20px;*/
	border: none;
	outline: none;
}
.cancel{
	background: #f0f0f0;
	/*float: left;*/
	margin: 15px 0 15px 220px;
}
/*.del{
	background: #fdb400;
	color: #fff;
	float:right;
	margin: 15px 155px 15px 0;
}*/
.manage-category-wrap .ulList ul li .ions{
	display: inline-block;
	font-size: 12px;
	padding: 0 3px;
}
.manage-category-wrap .ulList ul li{
	background: #e3ebf1;
	margin-bottom: 5px;
	/*margin-left: 0px;*/
	cursor: pointer;
}
.manage-category-wrap .ulList ul li:first-child{
	margin-left: 10px;
}
.goodstype .nav>li>a{
	display: inline-block;
	text-align: center;
	border: none;
	margin: 4px 0;
}
.goodstype .nav>li.active{
	background-color:#d5dce2 ;
}
.goodstype .nav>li>a:hover{
	background: none;
}
.goodstype .nav>li:hover{
	background-color: #d5dce2;
}
.nav>li.active{
	background-color: #d5dce2;
}
.nav>li:hover{
	background-color: #d5dce2;
}
.select-goods-class .nav>li>a{
	border: none;
}
.nav>li>a{
	display: inline-block;
	margin: 4px 0 4px 0;
	border:none;
}
.nav>li>a:focus, .nav>li>a:hover{
	background: none;
}
.category-change-input{
	padding: 0;
	border: 0;
	width: 80px;
	height: 26px;
	outline: none;
	border: 1px solid #fdb400;
	display: inline-block;
	display: none;
}
.nav-pills>li.active:hover{
	background: #d5dce2;
}
/*.goodstype-title{
	line-height: 28px;
}*/
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
	background:none;
	color: #000;
}
#content .category-list .nav-pills>li.active>a{
	/*margin:4px 0;*/
	border: none;
	color: #59607b;
}
.nav span.ions{
	display: none;
}
.category-list .nav-pills>li.active>a,
.category-list .nav-pills>li.active>a:focus,
.category-list .nav-pills>li.active>a:hover{
	background: #e3ebf1;
}

</style>
<div class="manage-category-wrap">
  <h3>
  	商品分类
  	<i class="close icon-closes"></i>
  </h3>
  <div class="ulList">
  	<ul class="nav nav-pills small category-list">
  		<li class="add-category">
  			+新增分类
  		</li>
  		<li class="inputBox">
  			<input type="text" class="form-control category-name-input">
  			<span class="cate zen icon-gou"></span>
  			<span class="cate dels icon-closes"></span>
  		</li>
  	</ul>
  </div>
  <div>
  	<button class="btns cancel">关闭</button>
  </div>
</div>

<script type="text/javascript">

$('.manage-category-wrap').on('click', '.add-category', function(){
  // 添加分类
//addCategory();
$(".add-category").hide();
$(".inputBox").show();


}).on('click', '.change-category-name', function(){
  // 修改分类名字
  changeCateName();

}).on('click', '.close-btn', function(){
  // 关闭数据分类
  $('.manage-category-wrap').hide();

}).on('click', '.category-list li', function(){
  // 编辑分类时选择分类
  $(this).addClass('active').siblings('.active').removeClass('active');
  $(this).find('.category-change-input').val($(this).find('a').text());

}).on("click",".zen",function(){
	//新增分类
	addCategory();
	$(".add-category").show();
	$(".inputBox").hide();
}).on("click",".dels",function(){
	$(".add-category").show();
	$(".inputBox").hide();
}).on("click",".close",function(){
	//关闭数据分类
	$('.manage-category-wrap').hide();
}).on("click",".del",function(){
	//确定分类
		addCategory();
    $('.manage-category-wrap').hide();
}).on("click",".cancel",function(){
	//关闭数据分类
	$('.manage-category-wrap').hide();
});


$('.manage-category-wrap').on('click', '.icon-delete', function(){
	deleteCate($(this).closest('li'));
}).on("click",".icon-app-edit",function(){
	var thisParent = $(this).parent();
	thisParent.find("a").hide();
	thisParent.find("input").show();
	thisParent.find(".cateChange").show();
	thisParent.find(".ions").hide();
}).on("click",".change",function(){
	var thisParent = $(this).parent();
	changeCateName($(this));
	thisParent.find("a").show();
	thisParent.find("input").hide();
	thisParent.find(".cateChange").hide();
	thisParent.find(".ions").show()
}).on("click",".changeDel",function(){
	var thisParent = $(this).parent();
	thisParent.find("a").show();
	thisParent.find("input").hide();
	thisParent.find(".cateChange").hide();
	thisParent.find(".ions").show();
})


function showManageCategoryWrap(){
  var html = '';
  if($('.manage-category-wrap').is(':visible')){
    return;
  }
  $('.page-content-header .nav-pills').not('.category-list').children('li').each(function(index, li){
    if(index != 0){
      html += '<li data-id='+$(li).attr('data-id')+'><a href="javascript:;">'+$(li).children('a').text()+'</a><input type="text" maxlength="26" class="form-control category-change-input"><span class="cateChange change icon-gou"></span><span class="cateChange changeDel icon-closes"></span><span class="ions changName icon-app-edit" ></span><span class=" ions delName icon-delete"></span></li>';
    }
  });
  $('.manage-category-wrap').show().find('.category-list').html(html+'<li class="add-category">+新增分类</li><li class="inputBox"><input type="text" maxlength="26" class="form-control category-name-input"><span class="cate zen icon-gou"></span><span class="cate dels icon-closes"></span></li>');
}
function addCategory(){
  var name = $('.category-name-input').val();
  if(!name) { return; }

  var goodsType,
      goodsTypeText = $('.goods-type-list .active').text();
  switch(goodsTypeText){
    case '电商':
      // goodsType = 0;
      break;
    case '预约':
      goodsType = 1;
      break;
    case '到店':
    goodsType = 3;
    break;
  }
  // 是否为积分商品
  var isIntegral = GetQueryString('h') == 'manager_points_goods_manage' ? 1 : 0;

  $.ajax({
    url: '/index.php?r=pc/AppAdminCategory/add',
    type: 'get',
    data: {
      form: GetQueryString('o') || $('.sidebar-nav.active').attr('obj-component')
      ,name: name
      ,app_id: appId
      ,goods_type: goodsType
      ,is_integral: isIntegral
    },
    dataType: 'json',
    success: function(data){
      if (data.status !== 0) { alertTip(data.data); return; }
      //debugger;
     $('.list-unstyled .nav-pills, .page-content-header .nav-pills').not('.category-list').append('<li data-id="'+data.data+'"><a href="javascript:;">'+name+'</a></li>');
      $('<li data-id="'+data.data+'"><a href="javascript:;">'+name+'</a><input type="text" maxlength="26" class="form-control category-change-input"><span class="cateChange change icon-gou"></span><span class="cateChange changeDel icon-closes"></span><span class="ions changName icon-app-edit" ></span><span class=" ions delName icon-delete"></span></li>').insertBefore($('.category-list li.add-category'));
      $('.category-name-input').val('');
    }
  });
}
function deleteCate(li){
  var id = li.attr('data-id');
  var categoryIdArr = [];
  categoryIdArr.push(id);
  $.ajax({
    url: '/index.php?r=pc/AppAdminCategory/delete',
    data: {
      cate_id: categoryIdArr,
	  app_id: appId
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $('.data-category-ul, .category-list, .page-content-header .nav-pills').find('li[data-id='+id+']').remove();
      if(li.children('a').text() == $('.category-change-input').val()){
        $('.category-change-input').val('');
      }
    }
  })
}
function changeCateName(_this){
  var name    = _this.siblings('.manage-category-wrap .category-change-input').val(),
      cate_id = $('.manage-category-wrap .category-list li.active').attr('data-id'),
      goodsType = 1;

  if(!name || !cate_id) { return; }

  $.ajax({
    url: '/index.php?r=pc/AppAdminCategory/add',
    type: 'get',
    data: {
      form: GetQueryString('o') || $('.sidebar-nav.active').attr('obj-component')
      ,name: name
      ,cate_id: cate_id
      ,app_id: appId
      ,goods_type: goodsType
    },
    dataType: 'json',
    success: function(data){
      if (data.status !== 0) { alertTip(data.data); return; }
      $('.nav-pills li[data-id='+cate_id+'] a').text(name);
      
    }
  });
}
</script>

    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="goods-list-menu">
        <h3>分类</h3>
        <a class="goods-all active" href="javascript:void(0)" data-id="">全部</a>
        <div class="panel-group" id="goods-list-accordion" role="tablist" aria-multiselectable="true"><div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapse0" aria-expanded="true" aria-controls="collapse0" data-id="300044" data-hassubclass="true" class="">美食</a></h4></div><div id="collapse0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0" aria-expanded="true" style=""><div class="panel-body"><a href="javascript:void(0)" data-id="300055">烧烤</a><a href="javascript:void(0)" data-id="300063">水果</a></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><a role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" data-id="300046" data-hassubclass="true" class="">外卖</a></h4></div><div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1" aria-expanded="true" style=""><div class="panel-body"><a href="javascript:void(0)" data-id="300066">早餐</a><a href="javascript:void(0)" data-id="300079">寿司</a></div></div></div></div>               
      </div>
    </div>
    <div class="col-md-10">
      <table class="table table-hover goods-list-table">
        <thead>
          <tr><th data-field="checkBox" class="theadBox"><input type="checkbox">全选</th>
          <th data-field="zc_weight" type-name="显示排序">显示排序
            <div class="tooltip-container">?
              <div class="tooltip-content">值越大，显示越靠前</div>
            </div>
          </th>
          <th data-field="category" type-name="分类">分类</th>
          <th data-field="title" type-name="文本">商品名称</th>
          <th data-field="cover" type-name="图片">商品图片</th>
          <th data-field="price" type-name="文本">价格</th>
          <th data-field="sales" type-name="文本">销量</th>
          <th data-field="{dataOperation}">操作</th>
          <th data-field="ifShow">上架销售</th>
        </tr></thead>
        <tbody><tr data-id="2354579" data-seckill="2" data-seckill-status="2" data-categoryid="300055|300063|300066|300079" data-categoryname="美食/烧烤|美食/水果|外卖/早餐|外卖/寿司"><td><input type="checkbox"></td><td><input type="text" value="0" class="goodsWeight"></td><td>美食/烧烤,美食/水果,外卖/早餐,外卖/寿司</td><td>好吃的烧烤</td><td><img src="http://img.weiye.me/zcimgdir/album/file_5a2a1d789bfba.png"></td><td>32.00</td><td>0</td><td><span class="edit-data" title="编辑"><img src="//test.zhichiwangluo.com/static/webapp/images/edit.png"></span><span class="delete-data"><img src="//test.zhichiwangluo.com/static/webapp/images/delete.png"></span><span class="copy-data" title="复制"><img src="//test.zhichiwangluo.com/static/webapp/images/copy.png"></span><span class="qr-code" title="下载"><img src="//test.zhichiwangluo.com/static/webapp/images/download-code.png"><div class="code-box" style="display: none;"><img><p>扫码后直接访问商品</p><a>下载</a><span class="regenerateCode">重新生成</span></div></span></td><td><input type="checkbox" class="if-show" checked=""></td></tr></tbody>
      </table>
      <div class="pagination-copygoods-wrap">
        <div id="goods-table-toolbar" class="pagination pagination-centered"><ul><li class="active"><a title="Current page is 1">1</a></li></ul></div>
        <div class="copyGoods-btn-wrap">
          <button type="button" class="choose-ok">选好了</button>
          <button type="button" class="cancle-choose">取消</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 添加商品 -->

<div class="goods-edit-wrap" data-id="" style="display: block;">
  <div class="row page-content-header">
    <button class="right-corner-common pull-right goods-return-btn return-right-corner">返回</button>
    <button class="right-corner-common pull-right save-right-corner">保存</button>
    <!--h5><strong>添加数据</strong> | 所属对象: <span>商品</span></h5-->
    <h4 class="addNewGoods-title">添加商品</h4>
  </div>
  <div class="row">
    <ul class="list-unstyled goods-field-ul">
      <li class="field-block" data-necessary="0" data-field="category" data-type="分类" data-name="分类">
        <label class="field-label">选择分类</label>
        <div class="field-group goods-field-group">
          <ul class="goods-field-list clearfix"></ul>
          <div class="panel-group goods-field-menu" id="accordion" role="tablist" aria-multiselectable="true" style="display: none;"><div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><input type="checkbox" class="checkAll"><a role="button" data-toggle="collapse" href="#collapse90" aria-expanded="false" aria-controls="collapse90" data-hassubclass="true" data-id="300044" data-categoryname="美食">美食</a></h4></div><div id="collapse90" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0"><div class="panel-body"><div><input type="checkbox" class="checkItem"><a href="javascript:void(0)" data-id="300055" data-categoryname="美食/烧烤">烧烤</a></div><div><input type="checkbox" class="checkItem"><a href="javascript:void(0)" data-id="300063" data-categoryname="美食/水果">水果</a></div></div></div></div><div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><input type="checkbox" class="checkAll"><a role="button" data-toggle="collapse" href="#collapse91" aria-expanded="false" aria-controls="collapse91" data-hassubclass="true" data-id="300046" data-categoryname="外卖">外卖</a></h4></div><div id="collapse91" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1"><div class="panel-body"><div><input type="checkbox" class="checkItem"><a href="javascript:void(0)" data-id="300066" data-categoryname="外卖/早餐">早餐</a></div><div><input type="checkbox" class="checkItem"><a href="javascript:void(0)" data-id="300079" data-categoryname="外卖/寿司">寿司</a></div></div></div></div><div class="pack-up-btn glyphicon glyphicon-chevron-up"></div></div> 
        </div>
       <button class="btn btn-default add-sort-in-goods">新建分类</button>
      </li>
      <li class="field-block" data-necessary="1" data-field="title" data-type="文本" data-name="商品名称">
        <label class="field-label">商品名称</label>
        <div class="field-group">
          <input class="form-control field-input" type="text">
        </div>
      </li>
      <li class="field-block" data-necessary="1" data-field="cover" data-type="图片" data-name="商品图片">
        <label class="field-label">商品图片</label>
        <div class="field-group">
          <a class="thumbnail" href="javascript:;"><img class="field-img"></a>
          <button class="btn btn-default field-upload-img">上传图片</button>
        </div>
      </li>
      <li class="field-block" data-necessary="1" data-field="description" data-type="富文本" data-name="商品描述">
        <label class="field-label">商品描述</label>
        <div class="field-group">
          <div class="field-editor">
            <div class="ke-container ke-container-default" style="width: 800px;"><div style="display:block;" class="ke-toolbar" unselectable="on"><span class="ke-outline" data-name="undo" title="后退(Ctrl+Z)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-undo" unselectable="on"></span></span><span class="ke-outline" data-name="redo" title="前进(Ctrl+Y)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-redo" unselectable="on"></span></span><span class="ke-outline" data-name="fontsize" title="文字大小" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-fontsize" unselectable="on"></span></span><span class="ke-outline" data-name="forecolor" title="文字颜色" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-forecolor" unselectable="on"></span></span><span class="ke-outline" data-name="hilitecolor" title="文字背景" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-hilitecolor" unselectable="on"></span></span><span class="ke-outline" data-name="bold" title="粗体(Ctrl+B)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-bold" unselectable="on"></span></span><span class="ke-outline" data-name="italic" title="斜体(Ctrl+I)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-italic" unselectable="on"></span></span><span class="ke-outline" data-name="underline" title="下划线(Ctrl+U)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-underline" unselectable="on"></span></span><span class="ke-outline" data-name="strikethrough" title="删除线" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-strikethrough" unselectable="on"></span></span><span class="ke-outline" data-name="lineheight" title="行距" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-lineheight" unselectable="on"></span></span><span class="ke-outline ke-selected" data-name="justifyleft" title="左对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyleft" unselectable="on"></span></span><span class="ke-outline" data-name="justifycenter" title="居中" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifycenter" unselectable="on"></span></span><span class="ke-outline" data-name="justifyright" title="右对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyright" unselectable="on"></span></span><span class="ke-outline" data-name="justifyfull" title="两端对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyfull" unselectable="on"></span></span><span class="ke-outline" data-name="insertorderedlist" title="编号" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertorderedlist" unselectable="on"></span></span><span class="ke-outline" data-name="insertunorderedlist" title="项目符号" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertunorderedlist" unselectable="on"></span></span><span class="ke-outline" data-name="quickformat" title="一键排版" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-quickformat" unselectable="on"></span></span><span class="ke-outline" data-name="removeformat" title="删除格式" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-removeformat" unselectable="on"></span></span><span class="ke-outline" data-name="selectall" title="全选(Ctrl+A)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-selectall" unselectable="on"></span></span><span class="ke-outline" data-name="fullscreen" title="全屏显示" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-fullscreen" unselectable="on"></span></span><span class="ke-outline" data-name="image" title="图片" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-image" unselectable="on"></span></span><span class="ke-outline" data-name="multiimage" title="批量图片上传" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-multiimage" unselectable="on"></span></span><span class="ke-outline" data-name="table" title="表格" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-table" unselectable="on"></span></span><span class="ke-outline" data-name="hr" title="插入横线" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-hr" unselectable="on"></span></span><span class="ke-outline" data-name="link" title="超级链接" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-link" unselectable="on"></span></span><span class="ke-outline" data-name="unlink" title="取消超级链接" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-unlink" unselectable="on"></span></span><span class="ke-outline" data-name="cut" title="剪切(Ctrl+X)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-cut" unselectable="on"></span></span><span class="ke-outline" data-name="copy" title="复制(Ctrl+C)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-copy" unselectable="on"></span></span><span class="ke-outline" data-name="paste" title="粘贴(Ctrl+V)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-paste" unselectable="on"></span></span><span class="ke-outline" data-name="plainpaste" title="粘贴为无格式文本" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-plainpaste" unselectable="on"></span></span></div><div style="display: block; height: 160px;" class="ke-edit"><iframe class="ke-edit-iframe" hidefocus="true" frameborder="0" tabindex="" style="width: 100%; height: 160px;"></iframe><textarea class="ke-edit-textarea" hidefocus="true" tabindex="" style="width: 100%; height: 160px; display: none;"></textarea></div><div class="ke-statusbar"><span class="ke-inline-block ke-statusbar-center-icon"></span><span class="ke-inline-block ke-statusbar-right-icon"></span></div></div><textarea id="desc_editor" style="display: none;"></textarea>
          </div>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="model_items" data-type="文本" data-name="商品规格">
        <label class="field-label">商品规格</label>
        <div class="field-group">
          <button class="btn btn-default add-goods-specification">添加规格</button>
          <div class="specification-detail-container">
            <ul class="list-unstyled specification-selected-list"></ul>
            <div class="specification-detail-table"></div>
          </div>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="virtual_price" data-type="文本" data-name="虚拟价格">
        <label class="field-label">虚拟价格</label>
        <div class="field-group">
          <input class="form-control field-input" type="text" placeholder="单位：元">
        </div>
      </li>
      <li class="field-block" data-necessary="1" data-field="price" data-type="文本" data-name="价格">
        <label class="field-label">价格</label>
        <div class="field-group">
          <input class="form-control field-input" type="text" placeholder="单位：元">
        </div>
      </li>
      <li class="field-block" data-necessary="1" data-field="stock" data-type="文本" data-name="库存">
        <label class="field-label">库存</label>
        <div class="field-group">
          <input class="form-control field-input" type="text">
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="mass" data-type="商品属性" data-name="商品属性">
        <label class="field-label">商品属性</label>
        <div class="field-group">
          <div>商品物流重量<input class="form-control field-input fregiht-input" type="text">kg</div>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="volume" data-type="商品属性" data-name="商品属性">
        <label class="field-label freight-before"></label>
        <div class="field-group">
          <div>商品物流体积<input class="form-control field-input fregiht-input" type="text">m³</div>
        </div>
      </li>
      <li class="field-block" data-necessary="1" data-field="express_rule_id" data-type="运费" data-name="运费设置">
        <label class="field-label">运费设置</label>
        <div class="field-group">
          <label for="express" style="margin: 0;">快递</label><input id="express" name="freight" type="radio"><label for="freeExpress">包邮</label><input id="freeExpress" name="freight" type="radio" checked="checked">
        </div>
        <div class="express-select" style="display: none;">
          <select style="display: none;"></select>
          <div class="field-group add-express-btn">+新建运费模板</div>
          <div style="color: #f00;margin-top: 10px;">注：由于版本原因，多商家店铺不能用快递功能，建议选择包邮。</div>
        </div>

      </li>
      <!-- <li class="field-block" data-necessary="0" data-field="sale_price" data-type="文本" data-name="促销价"><label class="field-label">促销价</label><div class="field-group"><input class="form-control field-input" type="text"></div></li> -->
      <!-- <li class="field-block" data-necessary="0" data-field="is_recommend" data-type="选择" data-name="是否推荐"><label class="field-label">是否推荐</label><div class="field-group"><select><option value="0">否</option><option value="1">是</option></select></div></li> -->
      <li class="field-block" data-necessary="0" data-field="img_urls" data-type="图片轮播" data-name="轮播图">
        <label class="field-label">轮播图多张</label>
        <div class="field-group"><span class="broadcast-img-list"></span>
          <button class="btn btn-default upload-broadcast-img">上传图片</button>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="type" data-type="选择" data-name="商品类型">
        <label class="field-label">商品类型</label>
        <div class="field-group">
          <select class="goods_info">
            <option value="0">实物商品</option>
          </select>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="receiving_info" data-type="选择" data-name="补充信息">
        <label class="field-label">补充信息</label>
        <div class="field-group">
          <select class="receiving_info"><option value="0">选择模板</option></select><span class="add-new-receiveInfo">+新增模板</span>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="open-location" data-type="选择" data-name="开启定位">
        <label class="field-label">城市定位</label>
        <div class="field-group">
          <div class="open-location">
            <input id="city-location" type="checkbox">
            <label for="city-location"></label>
            <div class="location-background"></div>
          </div>
        </div>
      </li>
      <li class="field-block" data-necessary="0" data-field="region-id" data-type="选择" data-name="城市定位" id="location-li" style="display: none;">
        <label class="field-label"></label>
        <div class="field-group">
          <select name="" id="province-select"><option selected="" disabled="">选择省</option><option value="34" data-name="台湾省">台湾省</option><option value="33" data-name="澳门特别行政区">澳门特别行政区</option><option value="32" data-name="香港特别行政区">香港特别行政区</option><option value="31" data-name="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="30" data-name="宁夏回族自治区">宁夏回族自治区</option><option value="29" data-name="青海省">青海省</option><option value="28" data-name="甘肃省">甘肃省</option><option value="27" data-name="陕西省">陕西省</option><option value="26" data-name="西藏自治区">西藏自治区</option><option value="25" data-name="云南省">云南省</option><option value="24" data-name="贵州省">贵州省</option><option value="23" data-name="四川省">四川省</option><option value="22" data-name="重庆市">重庆市</option><option value="21" data-name="海南省">海南省</option><option value="20" data-name="广西壮族自治区">广西壮族自治区</option><option value="19" data-name="广东省">广东省</option><option value="18" data-name="湖南省">湖南省</option><option value="17" data-name="湖北省">湖北省</option><option value="16" data-name="河南省">河南省</option><option value="15" data-name="山东省">山东省</option><option value="14" data-name="江西省">江西省</option><option value="13" data-name="福建省">福建省</option><option value="12" data-name="安徽省">安徽省</option><option value="11" data-name="浙江省">浙江省</option><option value="10" data-name="江苏省">江苏省</option><option value="9" data-name="上海市">上海市</option><option value="8" data-name="黑龙江省">黑龙江省</option><option value="7" data-name="吉林省">吉林省</option><option value="6" data-name="辽宁省">辽宁省</option><option value="5" data-name="内蒙古自治区">内蒙古自治区</option><option value="4" data-name="山西省">山西省</option><option value="3" data-name="河北省">河北省</option><option value="2" data-name="天津市">天津市</option><option value="1" data-name="北京市">北京市</option></select><select name="" id="city-select"><option selected="" disabled="">选择市</option></select><select name="" id="area-select"><option selected="" disabled="">选择区</option></select>
        </div>
      </li>
      <!-- <li class="field-block" data-necessary="0" data-field="receiving_info" data-type="选择" data-name="开启定位">
          <label class="field-label"></label>
          <div class="field-group">
                    <select class="select-address">
                        <option value=""  disabled selected>选择已有位置</option>
                    </select>
                </div>
            </li>
            <li class="field-block" data-necessary="0" data-field="receiving_info" data-type="选择" data-name="开启定位">
                <label class="field-label"></label>
                <div class="field-group">
                    <div id="tencent-map"></div>
                </div>
            </li>
            <li class="field-block" data-necessary="0" data-field="receiving_info" data-type="选择" data-name="开启定位">
                <label class="field-label"></label>
                <div class="field-group">
                    <input placeholder="请输入地址" id="location-address" class="form-control field-input" type="text">
                    <ul id="pre-address"></ul>
                </div>
            </li> -->
            <!-- <li class="field-block" data-necessary="0" data-field="commodity_code" data-type="文本" data-name="商品编码"><label class="field-label">商品编码</label><div class="field-group"><input class="form-control field-input" type="text"></div></li> -->
            <!-- <li class="field-block" data-necessary="0" data-field="delivery_set" data-type="文本" data-name="快递设置"><label class="field-label">快递设置</label><div class="field-group"></div></li> -->
            <!-- <li class="field-block" data-necessary="0" data-field="distribution_set" data-type="文本" data-name="配送区域"><label class="field-label">配送区域</label><div class="field-group"></div></li> -->
    </ul>
  </div>
  <div class="row goods-content-footer">
    <button class="btn btn-success save-data">保存</button>
    <button class="btn goods-return-btn">取消</button>
  </div>
</div>


<!-- 分类管理 -->
<div class="sort-manage-wrap">
  <ol class="breadcrumb row">
    <li><a href="javascript:void(0);" class="goods-manage-nav">商品管理</a></li>
    <li class="active">分类管理</li>
  </ol>
  <div>
    <a class="btn btn-default add-sort-all" href="javascript:void(0)" role="button">新增分类</a>
    <a class="btn btn-default remove-sort" href="javascript:void(0)" role="button">删除</a>
<!--         <a class="btn btn-default" href="javascript:void(0)" role="button">展开</a>
        <a class="btn btn-default" href="javascript:void(0)" role="button">收起</a> -->
    <a class="btn btn-default sort-manage-return pull-right" href="javascript:void(0)" role="button">返回</a>
  </div>
  <table class="table table-hover sort-manage-list">
    <thead>
      <tr><th width="100">
         <input class="choose-all-sort" type="checkbox">
      </th>
      <th>
          分类名称
      </th>
      <th>
          图标
      </th>
      <th>
          新增子分类
      </th>
      <th>
          操作
      </th>
    </tr></thead>
    <tbody><tr data-id="300044" data-name="美食" data-logo=""><td><input type="checkbox"></td><td><div class="open-folder-btn">+</div>美食</td><td><img src=""></td><td><a href="javascript:void(0)" class="add-sort-btn">新增</a></td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr><tr data-id="300055" data-name="烧烤" data-logo="http://img.weiye.me/zcimgdir/album/file_5a2a1d789bfba.png" data-parent-id="300044"><td><input type="checkbox"></td><td class="subcategory">烧烤</td><td><img src="http://img.weiye.me/zcimgdir/album/file_5a2a1d789bfba.png"></td><td>&nbsp;</td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr><tr data-id="300063" data-name="水果" data-logo="http://img.weiye.me/zcimgdir/album/file_5a2a1d941a2c6.png" data-parent-id="300044"><td><input type="checkbox"></td><td class="subcategory">水果</td><td><img src="http://img.weiye.me/zcimgdir/album/file_5a2a1d941a2c6.png"></td><td>&nbsp;</td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr><tr data-id="300046" data-name="外卖" data-logo=""><td><input type="checkbox"></td><td><div class="open-folder-btn">+</div>外卖</td><td><img src=""></td><td><a href="javascript:void(0)" class="add-sort-btn">新增</a></td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr><tr data-id="300066" data-name="早餐" data-logo="http://img.weiye.me/zcimgdir/album/file_5a2a1dacd282a.png" data-parent-id="300046"><td><input type="checkbox"></td><td class="subcategory">早餐</td><td><img src="http://img.weiye.me/zcimgdir/album/file_5a2a1dacd282a.png"></td><td>&nbsp;</td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr><tr data-id="300079" data-name="寿司" data-logo="http://img.weiye.me/zcimgdir/album/file_5a2a1deb4703b.png" data-parent-id="300046"><td><input type="checkbox"></td><td class="subcategory">寿司</td><td><img src="http://img.weiye.me/zcimgdir/album/file_5a2a1deb4703b.png"></td><td>&nbsp;</td><td><a href="javascript:void(0)" class="edit-sort-btn">编辑</a> <a href="javascript:void(0)" class="delete-sort-btn">删除</a></td></tr></tbody>
  </table>
</div>
<div class="add-sort-manage-wrap">
  <ol class="breadcrumb row">
    <li><a href="javascript:void(0);" class="goods-manage-nav">商品管理</a></li>
    <li class="active">分类管理</li>
  </ol>
  <div class="add-group-manager">
    <div class="add-group-field row">
      <ul>
        <li data-necessary="1">
          <label class="field-label">
              分类名称
          </label>
          <div class="field-group">
            <input class="form-control" type="text" maxlength="8">
          </div>
        </li> 
        <li data-necessary="1">
          <label class="field-label">
              分级类别
          </label>
          <div class="field-group">
            <label class="classify-wrap"><input type="radio" name="classify" value="0">一级分类</label>
            <label class="classify-wrap"><input type="radio" name="classify" value="1">二级分类</label>                        
          </div>
        </li>           
        <li class="correlation">
          <div class="field-group">
            <select class="form-control"><option value="">请选择二级分类所属的一级分类</option><option value="300044">美食</option><option value="300046">外卖</option></select>
          </div>
        </li>
        <li class="add-group-icon">
          <label class="field-label">分类图标</label>
          <div class="field-group">
            <a class="thumbnail" href="javascript:;"><img class="field-img"></a>
            <button class="btn btn-default field-upload-img">上传图片</button>
          </div>
        </li>                
        <li class="add-group-text">
          <span>注:</span>分类图标用于竖版二级分类有图展示 <a class="questiob" href="http://bbs.zhichiwangluo.com/thread-15820-1-1.html" target="_blank">?</a>
        </li>           
      </ul>
      <div class="operation-btn-group row">
        <button class="btn btn-success certain-btn">保存</button>
        <button class="btn delete-btn cancel-btn">取消</button>
      </div>
    </div>
  </div>
</div>
<!-- 商品规格-添加规格 -->
<div class="modal small fade in" id="goodsSpecificationModal" tabindex="-1" role="dialog" style="display: block;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h5 class="modal-title">商品规格项目</h5>
      </div>
      <div class="modal-body">
        <div class="goods-modal-content">
          <h5>我的规格</h5>
          <div>
                        <!-- <span class="btn btn-sm btn-default goods-specification-input"><input class="form-control" type="text"><span class="glyphicon glyphicon-ok"></span></span> -->
            <button class="btn btn-sm btn-default add-custom-specification">
            <span class="glyphicon glyphicon-plus"></span> 添加标签</button>
          </div>
          <hr>
          <h5>常规规格</h5>
          <div>
            <span class="btn btn-sm btn-default goods-specification" data-index="1">尺码</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="2">颜色</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="3">口味</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="4">容量</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="5">套餐</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="6">种类</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="7">尺寸</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="8">重量</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="9">型号</span>
            <span class="btn btn-sm btn-default goods-specification" data-index="10">款式</span>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn btn-primary goods-specification-confirm">确定</button>
      </div>
    </div>
  </div>
</div>
<!-- 补充信息-新增模版 -->
<div class="newReceiveInfo-dialog">
  <div class="newReceiveInfo-content">
    <div class="header-info">
      <div class="header-info-title">新增模板</div>
      <div class="close-obj">X</div>
    </div>
    <div class="project-info">
      <div><span>模板名称:</span>
        <input type="text" placeholder="模板名称" id="infoName-ingoods">
      </div>
        <!-- <div><span>模板描述:</span>
                <input type="text" placeholder="模板描述" id="infoDescribe-ingoods">
            </div> -->
    </div>
    <div class="middle-info">
      <table>
        <thead>
          <tr>
            <th>信息名称</th>
            <th>类型</th>
            <th>是否隐藏</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>给卖家留言</td>
            <td>单文本</td>
            <td>
              <input type="checkbox">
            </td>
            <td>
              <span class="trangle" style="visibility: hidden;"><span class="trangle-top"></span><span class="trangle-bottom"></span></span>
              <span class="edit-receiveAddr" style="visibility: hidden;"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/edit.png" alt=""></span>
              <span class="delete-receiveAddr delete-default-receive" style="visibility: hidden;"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/delete.png" alt=""></span>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="add-new-pro">
        <button type="button"> +新增信息</button>
        <button type="button"><span class="glyphicon glyphicon-wrench"></span>管理模板</button>
      </div>
    </div>
    <div class="footer-info">
      <div>
        <span><span>*</span>注：最多添加5个项目（其中不包含默认项目）</span>
        <button type="button" class="cancle-add-receiveAddr">取消</button>
        <button type="button" class="sure-add-receiveAddr">确认</button>
      </div>
    </div>
  </div>
  <div class="newReceiveInfo-content-already">
    <div class="header-info">
      <div class="header-info-title">模板管理</div>
      <div class="close-obj-already">X</div>
    </div>
    <div class="project-info-addNew">
      <button type="button">返回新增模板</button>
    </div>
    <div class="already-exits-address-list">
      <table>
        <thead>
          <tr>
            <th>模板名称</th>
            <th>信息</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="addressList">
        </tbody>
      </table>
      <div id="receiveInfo-table-toolbar"></div>
    </div>
  </div>
  <div class="newReceiveInfo-content-edit">
    <div class="header-info">
      <div class="header-info-title">编辑模板</div>
      <div class="close-obj-edit">X</div>
    </div>
    <div class="project-edit-info">
      <div><span>模板名称:</span>
        <input type="text" placeholder="模板名称" id="infoName-add">
      </div>
<!--             <div><span>模板描述:</span>
                <input type="text" placeholder="模板描述" id="infoDescribe-add">
            </div> -->
    </div>
    <div class="edit-address">
      <table>
        <thead>
          <tr>
            <th>信息名称</th>
            <th>类型</th>
            <th>是否隐藏</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="editAddress">
        </tbody>
      </table>
    </div>
    <div class="footer-info-edit">
      <div>
        <button type="button" id="cancle-edit-data">取消</button>
        <button type="button" id="edit-save-data">确认</button>
      </div>
    </div>
  </div>
</div>
<div class="copy-modal" id="not-checkCode">
  <div class="copy-modal-wrap">
    <div class="copy-modal-title">
      <span>批量复制</span><span class="close-modal">×</span>
    </div>
    <div class="copy-modal-content">
      <div>
        <p><span>即速应用小程序ID：</span><input type="text"><a href="http://bbs.zhichiwangluo.com/forum.php?mod=viewthread&amp;tid=12515" target="_blank"><span class="how-get-wrap"><span class="how-get">?</span>如何获取</span></a></p>
        <p>补充信息、运费信息无法复制</p>
      </div>
    </div>
    <div class="copy-modal-footer">
      <button type="button" class="cancleBtn">取消</button><button type="button" class="not-btn">确认</button>
    </div>
  </div>
</div>
<div class="copy-modal" id="need-checkCode">
  <div class="copy-modal-wrap">
    <div class="copy-modal-title">
      <span>批量复制</span><span class="close-modal">×</span>
    </div>
    <div class="copy-modal-content">
      <div>
        <p><span>即速应用小程序ID：</span><input type="text"><a href="http://bbs.zhichiwangluo.com/forum.php?mod=viewthread&amp;tid=12515" target="_blank"><span class="how-get-wrap"><span class="how-get">?</span>如何获取</span></a></p>
        <p>对不起！不是你的小程序，请验证关联的手机号</p>
      </div>
      <p><span>验证码：</span><input type="text"></p>
    </div>
    <div class="copy-modal-footer">
      <button type="button" class="cancleBtn">取消</button><button type="button" class="need-btn">确认</button>
    </div>
  </div>
</div>
<div class="tip-modal">
  <div class="tip-modal-wrap">
    <div class="tip-modal-header">
      <span>提示</span><span>×</span>
    </div>
    <div class="tip-modal-content">
        该全选只对当前页的商品数据有效
    </div>
    <div class="tip-modal-footer">
      <input type="checkbox" name="" id="notTipInput"><label for="notTipInput" id="forCheckBox"></label><span>不再提示</span><button type="">确定</button>
    </div>
  </div>
</div>
<script>
$(".copy-modal").on("click",".copy-modal-footer .cancleBtn,.close-modal",function(){
  $(".copy-modal").hide();
  $("#not-checkCode").hide().find("input").val("");
  $("#not-checkCode").removeAttr("data-type");
  $("#need-checkCode").removeAttr("data-type");
  $("#need-checkCode").hide().find("input").val("");
  $('.not-btn,.need-btn').removeAttr('disabled');
}).on("click",".not-btn",function(){
  var type =  $("#not-checkCode").attr("data-type"),
      goodsIds,
      targetAppId = $("#not-checkCode input").val().trim();
  if(targetAppId){
    if(type === 'self'){
      goodsIds = getAllCopyGoodsIds();
    }else if(type === 'all'){
      goodsIds = type;
    }
    $(this).attr("disabled",'disabled');
    batchCopyGoodsData(targetAppId,goodsIds);
  }else{
    alertToolsTip("请输入小程序ID");
  }

}).on("click",".need-btn",function(){
  var type =  $("#need-checkCode").attr("data-type"),
      CheckCode = $("#need-checkCode").find("input").eq(1).val().trim(),
      targetAppId = $("#need-checkCode").find("input").eq(0).val().trim();
  if(CheckCode && targetAppId){
    $(this).attr("disabled",'disabled');
    checkCode(targetAppId,CheckCode,type);
  }else{
    alertToolsTip("请输入小程序ID和验证码");
  }

});
$(".tip-modal").on("click",".tip-modal-header span:last-child",function(){
  $(".tip-modal").hide();
}).on("click",".tip-modal-footer button",function(){
  if($(".tip-modal-footer input").is(":checked")){
    window.localStorage.setItem(appId,1);
  }
  $(".tip-modal").hide();
});
$("body").on("click",function(e){
    var target = $(e.target);
    if(target.is(".batchCopyGoods") && !$(".batchCopyGoods").hasClass('disabled')){
            $(".batchCopyGoods ul").show();
    }else if(target.is(".batchCopyGoods ul")){
        $(".batchCopyGoods ul").show();
    }else{
        $(".batchCopyGoods ul").hide();
    }
});
$('#city-location').on('change', function(){
  $(this).prop('checked') ? $('#location-li').show() : $('#location-li').hide()
})

getArea('#province-select', 0, '请求省列表失败，请刷新重试')
$('#province-select').on('change', function(){
  $('#city-select').empty().append('<option selected disabled>选择市</option>');
  $('#area-select').empty().append('<option selected disabled>选择区</option>');
  getArea('#city-select', $(this).val(), '请求省列表失败，请刷新重试')
})
$('#city-select').on('change', function(){
  $('#area-select').empty().append('<option selected disabled>选择区</option>');
  getArea('#area-select', $(this).val(), '请求省列表失败，请刷新重试')
})



$('.tooltip-container').mouseover(function() {
  $(".tooltip-content").show();
}).mouseout(function() {
  $(".tooltip-content").hide();
});
$(".delete-default-receive").each(function(index, ele) {
  $(ele).click(function() {
    $(ele).parent("td").parent("tr").remove();
  });
});
</script>
</div>
      <!-- 右侧用户详细信息弹出框 start -->
      <div class="fixedDIV">
        <div class="leftInfo">
          <div class="bgInfo">
              <div class="bgInfo-left">
                  <div class="backup-detailmsg">
                    收起&gt;
                  </div>
                  <div class="backup-addNewUser">
                    收起&gt;
                  </div>

                   <div class="user-name-info">
                    <span id="userNickName"></span><span>的个人信息</span>
                  </div>
                  <div class="add-user-name-info">
                    <span>姓名:</span><input type="" placeholder="未命名" name="nickname">
                  </div>
                   <div class="user-infomation-sssc">
                     <span>性别:</span><span id="userSex"></span>
                  </div>
                  <div class="add-user-infomation-sssc">
                    <span>性别:</span>
                    <select id="userSexSeclected">
                      <option value="0">男</option>
                      <option value="1">女</option>
                    </select>
                  </div>
              </div>
              <div class="bgInfo-right">
                     <div class="details-delete">
                       <button>删除</button>
                      </div>
                      <div class="details-edit">
                            <button>编辑</button>
                      </div>
                      <div class="details-edit-save">
                            <button>保存</button>
                      </div>
                      <div class="details-edit-cancle">
                            <button>取消</button>
                      </div>
                      <div class="addNewUserSave">
                           <button>保存</button>
                      </div>
                      <div class="addNewUserCancle">
                           <button> 取消</button>
                      </div>
                      <div class="bgR_qrCode">
                      <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/qrCode.png" alt="">
                      </div>
              </div>
          </div>
          <div class="leftdetailInfo">
              <table class="table user-msg-table">
                    <tbody id="notEditTable">

                    </tbody>
              </table>
              <table class="leftAddNewUser table user-msg-table">
                <tbody>
                  <tr>
                    <td><span class="requireAttr">*</span>手机:</td>
                    <td><input type="text" value="" placeholder="请输入手机号" required="required" name="phone"></td>
                  </tr>
                  <tr>
                    <td>QQ:</td>
                    <td><input type="text" value="" placeholder="请输入QQ号" name="qq"></td>
                  </tr>
                  <tr>
                    <td>邮箱:</td>
                    <td><input type="text" value="" placeholder="请输入邮箱" name="email"></td>
                  </tr>
                  <tr>
                    <td>微信号:</td>
                    <td><input type="text" value="" placeholder="请输入微信号" name="weixin_code"></td>
                  </tr>
                  <tr>
                    <td>公司:</td>
                    <td><input type="text" value="" placeholder="请输入公司名称" name="company"></td>
                  </tr>
                  <tr>
                    <td>沟通状态:</td>
                    <td><input type="text" value="" placeholder="请输入沟通状态" name="contact-status"></td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="rightdetailInfo">
              <table class="table user-msg-table">
                  <tbody id="editTable">

                  </tbody>
              </table>
              <table class="rightAddnewUser table user-msg-table">
                <tbody>
                   <tr>
                        <td>分组:</td>
                        <td class="cliclChooseGroup_td"><label class="cliclChooseGroup addnewusergroup_tags_common">添加分组</label></td>
                   </tr>
                   <tr>
                     <td>标签:</td>
                     <td class="clickChhoseTags_td"><label class="clickChhoseTags addnewusergroup_tags_common">添加标签</label></td>
                   </tr>
                    <tr>
                        <td>备注:</td>
                        <td><textarea cols="20" rows="4" placeholder="请输入备注" name="remark"></textarea> </td>
                        </tr>

                </tbody>
              </table>
          </div>
        </div>
        <div class="rightnote">
          <div class="rightnote-addNote">
                <div class="user-add-note-input-button">
                          <input type="text" name="" value="" placeholder="添加新的笔记......"><button type="button">添加</button>
                       </div>
                       <div class="updateMsgType">
                         <div>
                           全部
                         </div>
                         <div class="user-manager-noteIcon"></div><div>笔记</div>
                         <div class="user-manager-logIcon"></div><div>日志</div>
                         <div class="user-manager-msgIcon"></div><div>短信</div>
                         <div class="user-manager-weiyeIcon"></div><div>微页</div>
                       </div>
                      <div class="year-month-title">
                             <div class="monthtitle"></div>
                              <div class="yeartitle"></div>
            </div>
          </div>
          <div class="rightnote-browser">
            <div class="contentTimeLine">
              <div class="verticalLine">
                <ul>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 右侧用户详细信息弹出框 end -->
    </div>
  </div>
</div>
<div class="modal small fade" id="tipModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<div class="modal small fade" id="confirmModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">提示</h5>
      </div>
      <div class="modal-body">
        <div class="confirm-modal-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary confirm-modal-confirm">确定</button>
        <button type="button" class="btn btn-default confirm-modal-cancel">取消</button>
      </div>
    </div>
  </div>
</div>
<!-- 删除分组   自定义模态框  start-->
<div class="mask_delGroup">
  <div class="content_delGroup">
    <div class="delGroup_title">
      <h5>删除分组</h5>
    </div>
    <hr>
    <div class="delGroup_tip">
      <span>确定删除分组</span>
      <span>

      </span>
    </div>
    <hr>
    <div class="delGroup_confirm">
      <button type="button" class="sureDelGroup">确定</button>
      <button type="button" class="cancleDelGroup">取消</button>
    </div>
  </div>
</div>
<!-- 删除分组   自定义模态框  end-->

<!-- 编辑分组 自定义模态框 start -->
<div class="mask_editNewGroupName">
  <div class="content_editNewGroupName">
    <div class="editNewGroupName_title">
      <h5>编辑分组</h5>
    </div>
    <hr>
    <div class="editNewGroupName_tip">
      <input placeholder="请输入新的分组名称">
    </div>
    <hr>
    <div class="editNewGroupName_confirm">
      <button type="button" class="sureEditNewNameGroup">确定</button>
      <button type="button" class="cancleEditNewNameGroup">取消</button>
    </div>
  </div>
</div>
<!-- 编辑分组 自定义模态框 end -->

<!-- 个人详细信息中分组编辑按钮的模态框 自定义 start -->
<div class="mask_editgroup">
  <div class="content_editgroup">
    <div class="saveToGroup_editgroup">
      <span>
        保存到组:
      </span>
      <button type="button">+新建分组</button>
    </div>
    <div class="addNewGroup_editgroup">
      <input name="newGroupname" value="">
      <button type="button" class="sureaddgroup">保存</button>
      <button type="button" class="cancleaddgroup">取消</button>
    </div>
    <div class="groupList_editgroup">
    </div>
    <div class="edituserGroup">
      <button type="button" class="sureUpdateGroup">确定</button>
      <button type="button" class="cancleUpdateGroup">取消</button>
      <button type="button" class="sureaddNewUserToGroup">确定</button>
      <button type="button" class="cancleaddNewUserToGroup">取消</button>
      <button type="button" class="addUserToGroupManual">确定</button>
      <button type="button" class="cancleUserToGroupManual">取消</button>
      <button type="button" class="addUserToGroupWebApp">确定</button>
      <button type="button" class="cancleUserToGroupWebApp">取消</button>
    </div>
  </div>
</div>
<!-- 个人详细信息中分组编辑按钮的模态框 自定义 end -->

<!-- 顶部导航:设置 模态框 自定义 start -->
<div class="mask_app_setting">
  <div class="content_app_setting">
    <div class="set-modal-title">
      <div class="title-text">基本设置</div>
      <div class="close-btn">x</div>
    </div>
    <div class="set-modal-content">
      <div class="set-detail-item">
        <div class="change-cover-wrap">
          <img class="set-app-cover" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/share_feng.jpg">
          <p class="text">更换封面</p>
        </div>
        <div class="set-app-info">
          <label>*</label>
          <input class="publish-title-input" type="text" placeholder="我的应用">
          <textarea class="publish-desc-input" placeholder="应用描述"></textarea>
        </div>
      </div>
      <div class="set-detail-item">
        <div class="change-logo-wrap">
          <img class="set-app-logo" src="http://cdn.jisuapp.cn/zhichi_frontend/static/invitation/images/logo.png">
          <p class="text">更换Logo</p>
        </div>
        <div class="set-logo-info">
          <p>Logo用于二维码及登录页面</p>
          <p>建议图片尺寸 32*32</p>
        </div>
      </div>
    </div>
    <div class="set-modal-btn">
      <div class="cancel-btn">取消</div>
      <div class="save-btn">保存</div>
    </div>
  </div>
</div>
<!-- 顶部导航:设置 模态框 自定义 end -->

<!-- 通用提示框 start -->
<div class="mask_tip">
  <div class="mask_tip_content">
    <div class="mask_tip_title">
      <span>提示消息</span>
    </div>
    <div class="mask_tip_center">
      <div class="mak_tip_center_content">
        这里是提示消息
      </div>
    </div>
    <div class="mask_tip_bottom">
      <button type="button" class="sureTip">确定</button>
      <button type="button" class="cancleTip">取消</button>
    </div>
  </div>
</div>
<!-- 通用提示框 end -->
<!-- 帮助提示框 start -->
<div class="manager_obj_helpMask">
  <div class="manager_obj_helpContent">
    <div class="manager_obj_help_title">
      <span>帮助</span>
      <span>×</span>
    </div>
    <div class="manager_obj_help_middle">
      <div class="manager_obj_help_message">
      <div class="active_obj">
        <span>什么是应用数据对象</span>
      </div>
      <div>
          <span>如何新建数据对象</span>
      </div>
      <div>
           <span>数据管理</span>
      </div>
      </div>
      <div class="whatis_obj">
      <div class="what_how_manage_obj what_how_manage_obj_left whm_obj_left">
        <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/dataguide_1.jpg" alt="" class="help_img">
      </div>
      <div class="what_how_manage_obj what_how_manage_obj_right whm_obj_right">
         <ul class="obj_ul">
          <li>应用数据是小程序本身内部数据的统一设置和管理</li>
          <li>可以新建、编辑和管理数据对象，添加并管理数据</li>
          <li>可用于数据绑定（例如：动态列表、动态容器、动态表单、页面属性），小程序数据动态展示</li>
        </ul>
      </div>

      </div>
      <div class="hownew_obj">
      <div class="what_how_manage_obj what_how_manage_obj_left">
        <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/dataguide_2.jpg" alt="" class="help_img">
      </div>
      <div class="what_how_manage_obj what_how_manage_obj_right">
        <ul class="obj_ul">
          <li>点击“新增数据对象”</li>
          <li>填写数据对象信息</li>
          <li>点击“添加字段”并完善</li>
        </ul>
         <a href="javascript:;" class="help_href">点击查看示例</a>
      </div>
      </div>
      <div class="manage_obj">
      <div class="what_how_manage_obj what_how_manage_obj_left">
        <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/dataguide_4.jpg" alt="" class="help_img">
      </div>
      <div class="what_how_manage_obj what_how_manage_obj_right">
        <ul class="obj_ul">
          <li>对数据分类、导入、导出</li>
          <li>对数据编辑、删除、复制</li>
          <li>对数据排序、显示、隐藏</li>
        </ul>
        <a href="javascript:;" class="help_href" data-type="manager_obj">点击查看示例</a>
      </div>
      </div>
    </div>
    <div class="manager_obj_help_footer">
      <div>
        <span class="nomore_help"><label><input type="checkbox" name="" id="" value=""><i class="base64"></i></label></span><span>不再提示</span>
      </div>
      <div>
        <span class="IKonw">我知道了</span>
      </div>
    </div>
  </div>
</div>
<!-- 帮助提示框 end -->
<div class="new_data_obj">
  <div class="new_manage_common">
  <div class="close_newdata_tip">
    <span>×</span>
  </div>
    <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/dataguide_3.jpg" alt="">
  </div>
</div>
<div class="manage_data_obj">
  <div class="new_manage_common">
  <div class="close_managedata">
    <span>×</span>
  </div>
    <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/dataguide_5.jpg" alt="">
  </div>
</div>

<!-- 申请出售模板 的模态框-->
<div id="apply-template-dialog" class="zhichi-dialog">
  <div class="zhichi-content" style="width: 600px; height: 390px; min-height: 150px; margin-left: -300px; margin-top: -195px;"><header class="zhichi-title"><span class="zhichi-title-content">申请出售模板</span><span class="zhichi-close">×</span></header>
    <!-- 模版上架设置 -->
    <div id="template-set-wrap">
        <div>
          <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/weiye/images/share_feng.jpg" class="inv-cover" id="template-cover">
        <p style="color:#8e91a2;">模版封面</p>
      </div>
      <div class="template-form">
        <p>价格：<input type="text" id="template-price" placeholder="价格在500～2000之内">
          电话：<input id="template-tel" type="text" placeholder="输入您的联系电话/手机"></p>
        <p>分类：
          <select id="template-cates"><option value="1">常用</option><option value="41">多商家</option><option value="25">电商</option><option value="55">外卖</option><option value="17">美食</option><option value="19">婚庆</option><option value="23">房产</option><option value="24">鲜花</option><option value="34">酒店</option><option value="36">KTV</option><option value="44">社会</option><option value="45">超市</option><option value="51">公司</option><option value="18">珠宝</option><option value="20">旅游</option><option value="21">运动</option><option value="22">美容</option><option value="26">家居</option><option value="27">农产品</option><option value="28">医药</option><option value="29">母婴</option><option value="30">教育</option><option value="31">摄影</option><option value="33">社区</option><option value="37">汽车</option><option value="39">资讯</option><option value="40">金融</option><option value="43">家政</option><option value="46">票务</option><option value="47">洗浴</option><option value="49">工具</option><option value="54">保险</option><option value="12">单页</option></select>
          <!--span style="margin:0 17px;">-</span>
          <select style="width: 140px;" id="template-sec-cates"></select-->
        </p>
        <p>简介：<input id="template-desc" type="text" placeholder="不超过50个字符"></p>
      </div>
      <ol class="template-tip">
        <li>
          <p style="margin: 0px;">样例须交互完整，体验顺畅；您提交的模板，我们将在5个工作日内审核完毕，请您耐心等待；通过之后，收入我们采取4：6的分成比例（所有者占60%）。</p></li>
        <li>内容正面，不造谣，不传谣，不侵权，不攻击，不欺诈，不色情，不植入广告。</li>
        <li>产品类注意版权，产品图一经版权举报会被撤销样例。</li>
        <li>模板上架审核通过后将不能进行修改，也不能下架。</li>
      </ol>
    </div>
  <span class="zhichi-submit-btn">提交审核</span></div>
</div>

<!-- 是否是设计师的认证模态框-->
<div id="sale-app-tip" class="zhichi-dialog">
  <div class="sale-tip-container">
      <div class="header">
        <span>提示信息</span>
        <span class="zhichi-close">×</span>
      </div>
      <div class="content">
      <p>您还未成为设计师，不能出售模板!</p>
      <p><a>取消</a><a href="/index.php?r=pc/Designer/ShowApply&amp;is_app=1" target="_blank">认证</a></p>
      </div>
  </div>
</div>

<!-- 已出售App的收益 模态框 -->
<div id="app-nav-income" class="zhichi-dialog">
  <div class="app-income-modal">
    <div class="header">
      <span>收益详情</span>
      <span>×</span>
    </div>
    <div class="middle">
      <div class="unit-price">
        <div class="unit-common">单价</div>
        <div class="item"><p>单价</p><p class="single-app-price">500元</p></div>
      </div>
      <div class="seven-transaction-number">
        <div class="unit-common">交易</div>
        <div class="item"><p>7天交易笔数</p><p class="single-app-num">43</p></div>
      </div>
      <div class="seven-income">
        <div class="unit-common">收入</div>
        <div class="item"><p>7天收入</p><p class="single-app-profit">876元</p></div>
      </div>
    </div>
    <div class="footer">
   </div>
  </div>
</div>
<div class="advanced-label-btn advanced-label-right">
    <span id="advanced-label-span"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/high.png" alt="">小程序企业高级版申请试用</span>
    <div class="advanced-label-"></div>
  </div>
<!-- <div class="alert alert-success" id="tipSuccess" role="alert"></div>
<div class="alert alert-info" id="tipInfo" role="alert"></div>
<div class="alert alert-warning" id="tipWarning" role="alert"></div>
<div class="alert alert-danger" id="tipDanger" role="alert"></div> -->
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://map.qq.com/api/js?v=2.exp"></script><script src="http://open.map.qq.com/apifiles/2/4/81/main.js" type="text/javascript"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/lib/bootstrap/js/jquery.pjax.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/common/js/jquery.Jcrop.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/city_json.js"></script>
<!-- <script src="//jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.js"></script> -->
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/bootstrap-paginator.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/jqPaginator.min.js"></script>
<!-- <script src="/zhichi_frontend/static/pc/invitation/ueditor/ueditor.config.js"></script>
<script src="/zhichi_frontend/static/pc/invitation/ueditor/ueditor.all.min.js"></script> -->
<script src="/zhichi_frontend/static/webapp/js/library/kindeditor/kindeditor-all-min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc/invitation/js/webuploader.nolog.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/jquery.dragsort-0.5.1.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/highcharts.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/highcharts-more.js"></script>
<script src="http://cdn.hcharts.cn/highcharts/modules/data.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/themes/sand-signika.js"></script>
<!-- <script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/modules/exporting.js"></script> -->
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/modules/map.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/modules/cn-with-city.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/laydate/laydate.js"></script>
<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/justTool.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/library/jquery.zeroclipboard.min.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc/invitation/spectrum/spectrum.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_obj.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_custom_menu.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_goods_manage.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_booking_manage.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_tostore_manage.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_user_webapp.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_user_manual.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_location_tostore_manage.js"></script>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/js/manager_freight_manage.js"></script>
<style>
  #goods-resource-dialog {
    display: none;
  }
  #goods-resource-dialog .webapp-box {
    position: fixed;
    z-index: 1001;
    left: 50%;
    top: 50%;
    width: 875px;
    min-height: 550px;
    margin-left: -435px;
    margin-top: -283px;
    border: 1px solid #DDD;
    border-radius: 5px;
    background: #FFF;
    padding:0px;
  }
  #goods-resource-dialog .webapp-box-header {
    width: 100%;
    height: 47px;
    background: #f0f0f0;
    border-radius: 5px 5px 0 0;
  }
  #goods-resource-dialog .webapp-box-close {
    position: absolute;
    top: 10px;
    right: 20px;
    cursor: pointer;
    font-size: 30px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .2;
  }
  #goods-resource-dialog .webapp-box-content {
    width: 100%;
    background: #FFF;
  }
  #goods-resource-dialog .webapp-box-footer {
    height: 70px;
    line-height: 70px;
    background: #FFF;
    border-top: 1px solid #e5e5e5;
    padding:0px;
  }
  #goods-resource-dialog .webapp-box input[type="text"] {
    border: 1px solid #666;
    font-size: 14px;
    line-height: 14px;
    padding: 9px;
    box-shadow: none;
    outline: 0;
    width: 135px;
    margin-left: 20px;
    -webkit-user-select: text;
    border-radius: 4px 0 0 4px;
  }
  #goods-resource-dialog .webapp-box select {
    border: 1px solid #666;
    border-radius: 4px;
    line-height: 14px;
    padding: 6px 4px 6px 6px;
    box-shadow: none;
    outline: 0;
    width: 134px;
    height: 35px;
    background: #fff;
    display: inline-block;
    float: left;
    margin-left: 20px;
  }

  /* 微页列表样式 */
  #goods-resource-dialog .webapp-box-title {
    display: inline-block;
    margin: 12px 0 0 24px;
    font-size: 18px;
  }
  #goods-resource-dialog .resource-list-wrap {
    height: 320px;
    overflow: auto;
  }
  #goods-resource-dialog .goods-resource-list {
    margin: 0 10px;
    font-size: 0;
  }
  #goods-resource-dialog .goods-resource-list li {
    position: relative;
    display: inline-block;
    margin: 10px;
    width: 240px;
    vertical-align: top;
    font-size: 14px;
    padding: 10px;
    border: 1px solid #DCDCDC;
    border-radius: 5px;
    box-sizing: content-box;
  }
  #goods-resource-dialog .goods-resource-list li:hover {
    border: 1px solid #efbf1f;
    -webkit-transition:border 0.5s; -moz-transition:border 0.5s; -ms-transition:border 0.5s; -o-transition:border 0.5s; transition:border 0.5s;
  }
  #goods-resource-dialog .webapp-li img {
    float: left;
    height: 90px;
    width: 90px;
    margin-right: 10px;
  }
  #goods-resource-dialog .webapp-li p {
    height: 60px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
  #goods-resource-dialog .webapp-title {
    margin-bottom: 10px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 140px;
  }
  #goods-resource-dialog .goods-type {
    height: 40px;
    line-height: 40px;
    border-bottom: 1px solid #dcdcdc;
    width: 830px;
    margin: 0 auto;
    box-sizing: content-box;
  }
  #goods-resource-dialog .goods-type span {
    width: 65px;
    display: inline-block;
    text-align: center;
  }
  #goods-resource-dialog .goods-type .active {
    color: #efbf1f!important;
    border-bottom:1px solid #efbf1f!important;
  }
  #goods-resource-dialog .goods-filter {
    height: 50px;
    padding-top: 20px;
    box-sizing: content-box;
  }
  #goods-resource-dialog .search {
    float: left;
    margin-right: 20px;
  }
  #goods-resource-dialog .search input {
    float:left;
    padding:8px!important;
  }
  #goods-resource-dialog .search button {
    float: left;
    height: 34px;
    line-height: 34px;
    background: #fff;
    border-style: none;
    border: 1px solid #666;
    border-left: none;
    width: 40px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }
  #goods-resource-dialog .add-goods {
    height: 32px;
    width: 100px;
    border: 1px solid #666;
    display: inline-block;
    line-height: 32px;
    text-align: center;
    color: #666;
    border-radius: 4px;
  }
  #goods-resource-dialog .add-goods span {
    font-size: 30px;
    float: left;
    margin-left: 10px;
    font-weight: bold;
  }
  #goods-resource-dialog .selected {
    border:1px solid #efbf1f!important;
    box-shadow: 0 0 10px 5px #ddd;
  }
  #goods-resource-dialog .hide {
    display:none;
  }
  #goods-resource-dialog .refresh {
    display: none;
    position: absolute;
    height: 432px;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 999;
    top: 47px;
  }
  #goods-resource-dialog .refresh p {
    text-align: center;
    height: 200px;
    line-height: 200px;
    color: #fff;
    font-size: 20px;
  }
  #goods-resource-dialog .no-data {
    line-height: 300px;
    text-align: center;
  }
  #goods-resource-dialog .btn-wrap {
    width: 220px;
    margin: 0 auto;
  }
  #goods-resource-dialog .btn-cancel {
    border-style: none;
    background: #eee;
    width: 100px;
    height: 40px;
    line-height: 40px;
    border-radius: 5px;
    font-size: 14px;
    color: #666;
  }
  #goods-resource-dialog .mr-10 {
    margin-right: 10px;
  }
  #goods-resource-dialog .btn-confirm {
    border-style: none;
    background: #efbf1f;
    width: 100px;
    height: 40px;
    line-height: 40px;
    border-radius: 5px;
    font-size: 14px;
    color: #fff;
  }
  #goods-resource-dialog .no-data > span {
    color: #efbf1f;
  }
</style>
<!--商品资源模态框-->
<div id="goods-resource-dialog">
  <div class="webapp-box-bg hide-dialog"></div>
  <div class="webapp-box">
    <div class="webapp-box-header">
      <div class="webapp-box-title">我的商品</div>
      <span class="webapp-box-close hide-dialog">×</span>
    </div>
    <div class="goods-type"></div>
    <div class="goods-filter">
      <select class="goods-filter-select"></select>
      <div class="search">
        <input class="search-confirm-input" type="text" placeholder="商品搜索">
        <button class="search-confirm-btn">搜索</button>
      </div>
      <div class="add-goods goto-add-goods"><span>+</span>添加商品</div>
    </div>
    <div class="webapp-box-content">
      <div class="resource-list-wrap">
        <div class="no-data">暂无数据，<span class="goto-add-goods">点击此处添加商品</span></div>
        <ul class="goods-resource-list"></ul>
      </div>
    </div>
    <div class="refresh">
      <p>商品是否添加完成？</p>
      <div class="btn-wrap">
        <button class="btn-confirm mr-10 finish-add-btn">是</button>
        <button class="btn-cancel hide-refresh-btn">否</button>
      </div>
    </div>
    <div class="webapp-box-footer">
      <div class="btn-wrap">
        <button class="btn-cancel mr-10 hide-dialog">取消</button>
        <button class="btn-confirm confirm-btn">确定</button>
      </div>
    </div>
  </div>
</div>
<script>
  /*
    模态框：商品资源模态框（goodsResourceDialog）
    使用：1.初始化并打开模态框 goodsResourceDialog.show(param)
    参数：param.displayGoodsTypeArray:控制显示商品的类型 默认：[0, 1, 2, 3] 电商:0 预约:1 外卖:2 到店:3
         param.confirmCallback: 确认商品后的回调，并把商品数据作为参数data传给回调函数
  */
  var goodsResourceDialog = {
    data: {
      hasBind: false,
      confirmCallback: '',
      searchType: 'category',
      searchValue: '',
      page: 1,
      is_more: 0
    },
    // 展示模态框
    show: function(param){
      var self = this;
      if(!self.data.hasBind){
        self.bindEvents();
        self.data.hasBind = true;
      }
      // 设置可显示商品类型
      var displayGoodsTypeArray = param.displayGoodsTypeArray || [ 0, 1, 2, 3 ];
      var typeHtml = '';
      for(var i = 0; i < displayGoodsTypeArray.length; i++){
        typeHtml += '<span ';
        if(i == 0) {
          typeHtml += 'class="active"';
        }
        switch(displayGoodsTypeArray[i]){
          case 0:
            typeHtml += ' data-type="0" data-form="goods" >电商</span>';
            break;
          case 1:
            typeHtml += ' data-type="1" data-form="appointment" >预约</span>';
            break;
          case 2:
            typeHtml += ' data-type="2" data-form="takeout" >外卖</span>';
            break;
          case 3:
            typeHtml += ' data-type="3" data-form="tostore" >到店</span>';
            break;
          default:
            typeHtml += ' >无此商品类型</span>'
            break;
        }
      }
      $('#goods-resource-dialog .goods-type').html(typeHtml);
      // 初始化数据
      self.data.searchType = 'category';
      self.data.searchValue = '';
      self.data.page = 1;
      self.getList();
      self.getCategory();
      // 设置回调
      self.data.confirmCallback = param.confirmCallback;
      $('#goods-resource-dialog').show();
      $('#goods-resource-dialog .webapp-box-bg, #goods-resource-dialog .webapp-box').addClass('animate-show').removeClass('animate-hide');
    },
    // 关闭模态框，并清空数据
    hide: function(){
      $('#goods-resource-dialog .webapp-box-bg, #goods-resource-dialog .webapp-box').addClass('animate-hide').removeClass('animate-show');
      $('#goods-resource-dialog').show();
      $('#goods-resource-dialog .goods-type').html('');
      $('#goods-resource-dialog .goods-resource-list').html('');
    },
    // 确认商品
    confirm: function(){
      var self = this;
      if($.isFunction(self.data.confirmCallback)){
        var goodsData = $('#goods-resource-dialog .webapp-li.selected').data('data-goods');
        var continueExecute = self.data.confirmCallback(goodsData); // 回调返回的值
        if(!continueExecute){
          return false;
        }
      }
      self.hide();
    },
    // 绑定事件
    bindEvents: function(){
      var self = this;
      $('#goods-resource-dialog').on('click', '.hide-dialog', function(){
        // 关闭模态框
        self.hide();
      }).on('click', '.goods-type>span', function(){
        // 切换商品类型
        $(this).addClass('active').siblings().removeClass('active');
        $('#goods-resource-dialog .goods-resource-list').html('');
        self.data.page = 1;
        self.data.searchType =  'category';
        self.data.searchValue =  '';
        self.getList();
      }).on('click', '.goto-add-goods', function(){
        // 去添加商品
        var form = $('#goods-resource-dialog .goods-type>span.active').attr('data-form');
        var router = '';
        switch(form){
          case 'goods':
            router = 'manager_goods_manage';
            break;
          case 'appointment':
            router = 'manager_takeout_manage';
            break;
          case 'takeout':
            router = 'manager_booking_manage';
            break;
          case 'tostore':
            router = 'manager_tostore_manage';
            break;
          default:
            router = 'manager_goods_manage';
            break;
        }
        window.open('/index.php?r=pc/AppMgr/manager&_app_id='+ appId +'&h='+router);
        $('#goods-resource-dialog .refresh').show();
      }).on('click', '.hide-refresh-btn', function(){
        $('#goods-resource-dialog .refresh').hide();
      }).on('click', '.finish-add-btn', function(){
        $('#goods-resource-dialog .refresh').hide();
        $('#goods-resource-dialog .goods-resource-list').html('');
        self.data.page = 1;
        self.data.searchType =  'category';
        self.data.searchValue =  '';
        self.getList();
      }).on('click', '.confirm-btn', function(){
        self.confirm();
      }).on('click', '.webapp-li', function(){
        if($(this).hasClass('selected')){
          $(this).removeClass('selected');
          return false;
        }
        $(this).addClass('selected').siblings('.selected').removeClass('selected');
      }).on('change', '.goods-filter-select', function(){
        self.data.page = 1;
        self.data.searchType = 'category';
        self.data.searchValue = $(this).val();
        $('#goods-resource-dialog .search-confirm-input').val('');
        $('#goods-resource-dialog .goods-resource-list').html('');
        self.getList();
      }).on('click', '.search-confirm-btn', function(){
        self.data.page = 1;
        self.data.searchType = 'title';
        self.data.searchValue = $('#goods-resource-dialog .search-confirm-input').val();
        $('#goods-resource-dialog .goods-filter-select').val('');
        $('#goods-resource-dialog .goods-resource-list').html('');
        self.getList();
      });

      $('#goods-resource-dialog .resource-list-wrap').on('scroll',  function(){
        var container = $(this);
        var scTop = container.scrollTop();
        var scHeight = container.children("ul").height() - container.height();
        if(scTop >= scHeight){
          if(self.data.isMore){
            self.getList();
          }
        }
      })
    },
    // 获取商品列表
    getList: function(){
      var self = this;
      $.ajax({
        url: '/index.php?r=pc/AppShop/goodsList',
        type: 'get',
        data: {
          app_id: appId,
          page: self.data.page,
          form: $('#goods-resource-dialog .goods-type>span.active').attr('data-form'),
          goods_type: $('#goods-resource-dialog .goods-type>span.active').attr('data-type'),
          idx_arr: {
            idx: self.data.searchType,
            idx_value: self.data.searchValue
          }
        },
        dataType: 'json',
        success: function(res){
          if(res.status != 0){
            alertTip(res.data);
            return false;
          }
          if(res.is_more){
            self.data.isMore = 1;
            self.data.page++;
          } else {
            self.data.isMore = 0;
          }
          self.setList(res.data);
        }
      });
    },
    // 设置商品列表
    setList: function(data){
      if(!data.length){
        $('#goods-resource-dialog .no-data').show().siblings('.goods-resource-list').hide();
        $('#goods-resource-dialog .goods-resource-list').html('');
        return false;
      } else {
        $('#goods-resource-dialog .no-data').hide().siblings('.goods-resource-list').show();
      }
      var fragment = document.createDocumentFragment();
      var html = '';
      for(var i = 0; i < data.length; i++){
        html = '<li class="webapp-li">';
        html += '<img src="'+ data[i]['form_data']['cover'] +'">';
        html += '<div><div class="webapp-title" title="'+ data[i]['form_data']['title'] +'">'+ data[i]['form_data']['title'] +'</div>'
        html += '<div class="webapp-title" title="'+ data[i]['form_data']['price'] +'">价格：￥'+ data[i]['form_data']['price'] +'</div>'
        if(data[i]['form_data']['goods_type'] != 3){
          html += '<div class="webapp-title" title="'+ data[i]['form_data']['stock'] +'">库存：'+ data[i]['form_data']['stock'] +'件</div>';
        }
        html += '</li>';
        html = $(html);
        $(html).data('data-goods', data[i]['form_data']);
        $(fragment).append(html);
      }
      $('#goods-resource-dialog .goods-resource-list').append(fragment);
    },
    // 获取商品分类
    getCategory: function(){
      var self = this;
      $.ajax({
        url: '/index.php?r=pc/AppAdminCategory/list',
        type: 'get',
        data: {
          app_id: appId,
          form: $('#goods-resource-dialog .goods-type>span.active').attr('data-form'),
          goods_type: $('#goods-resource-dialog .goods-type>span.active').attr('data-type')
        },
        dataType: 'json',
        success: function(res){
          if(res.status != 0){
            alertTip(res.data);
            return false;
          }
          self.setCategory(res.data);
        }
      });
    },
    // 设置商品分类
    setCategory: function(data){
      var self = this;
      if(!data.length){
        $('#goods-resource-dialog .goods-filter-select').html('<option value="">全部</option>');
        return false;
      }
      var html = '';
      html += '<option value="">全部</option>';
      for(var i = 0; i < data.length; i++){
        html += ' <option value="'+ data[i]['id'] +'">' + data[i]['name'] + '</option>';
      }
      $('#goods-resource-dialog .goods-filter-select').html(html);
    }
  }
</script>
<link rel="stylesheet" href="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/common/css/jquery.Jcrop.min.css">
<style rel="stylesheet">
.webapp-box {
  position: fixed;
  -webkit-transform: translateX(-10000px);
  -moz-transform: translateX(-10000px);
  transform: translateX(-10000px);
  z-index: 1001;
  left: 50%;
  top: 10%;
  width: 603px;
  min-height: 460px;
  margin-left: -300px;
  padding-bottom: 15px;
  border: 1px solid #DDD;
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0,0,0,.4),-5px -5px 20px rgba(0,0,0,.4);
  background: #FFF;
}
.webapp-box.animate-show {
  -webkit-animation: 'show' .5s linear;
  -moz-animation: 'show' .5s linear;
  animation: 'show' .5s linear;
}
.webapp-box.animate-hide {
  -webkit-animation: 'hide' .3s linear;
  -moz-animation: 'hide' .3s linear;
  animation: 'hide' .3s linear;
}
.webapp-box-bg {
  position: fixed;
  -webkit-transform: translateX(-10000px);
  -moz-transform: translateX(-10000px);
  transform: translateX(-10000px);
  width: 100%;
  height: 100%;
  z-index: 1000;
  left: 0;
  top: 0;
  background: rgba(0,0,0,.5);
}
.animate-show {
  -webkit-transition: opacity .5s linear;
  -moz-transition: opacity .5s linear;
  transition: opacity .5s linear;
  opacity: 1;
}
.animate-hide {
  -webkit-transition: opacity .5s linear;
  -moz-transition: opacity .5s linear;
  transition: opacity .5s linear;
  opacity: 0;
}
.webapp-box-bg.animate-show, .webapp-box.animate-show {
  -webkit-transform: translateX(0px);
  -moz-transform: translateX(0px);
  transform: translateX(0px);
}

@-webkit-keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;-webkit-transform:scale(1.01,1.01)}
  85%{opacity:1;-webkit-transform:scale(0.99,0.99)}
  100%{-webkit-transform:scale(1,1)}
}
@-moz-keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;-moz-transform:scale(1.01,1.01)}
  85%{opacity:1;-moz-transform:scale(0.99,0.99)}
  100%{-moz-transform:scale(1,1)}
}
@keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;transform:scale(1.01,1.01)}
  85%{opacity:1;transform:scale(0.99,0.99)}
  100%{transform:scale(1,1)}
}

@-webkit-keyframes 'hide'{
  0%{-webkit-transform:scale(1,1);opacity:1}
  35%{-webkit-transform:scale(1.02,1.02);opacity:.5}
  70%{-webkit-transform:scale(1.05,1.05);opacity:.2}
  100%{-webkit-transform:scale(1,1);opacity:0}
}
@-moz-keyframes 'hide'{
  0%{-moz-transform:scale(1,1);opacity:1}
  35%{-moz-transform:scale(1.02,1.02);opacity:.5}
  70%{-moz-transform:scale(1.05,1.05);opacity:.2}
  100%{-moz-transform:scale(1,1);opacity:0}
}
@keyframes 'hide'{
  0%{transform:scale(1,1);opacity:1}
  35%{transform:scale(1.02,1.02);opacity:.5}
  70%{transform:scale(1.05,1.05);opacity:.2}
  100%{transform:scale(1,1);opacity:0}
}
.webapp-box input[type=file]:focus, .webapp-box input[type=checkbox]:focus, .webapp-box input[type=radio]:focus {
  outline: none;
}


.webapp-box-header {
/*  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;*/
  width: 100%;
  height: 45px;
  background: #FFF;
  border-bottom: 1px solid #e5e5e5;
  border-radius: 10px 10px 0 0;
}
.webapp-box-header-ul {
  margin: 12px 0 0 10px;
  padding: 0;
  font-size: 0;
  text-align: center;
}
.webapp-box-header-ul li {
  display: inline-block;
  padding: 5px 16px;
  cursor: pointer;
  font-size: 14px;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.webapp-box-header-ul li:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  border-left: 1px solid #ddd;
}
.webapp-box-header-ul li:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-right: 1px solid #ddd;
}
.webapp-box-header-ul li.active {
  background: #00a3e9;
  color: #FFF;
}
.webapp-box-close {
  position: absolute;
  top: 15px;
  right: 20px;
  cursor: pointer;
  font-size: 2.1rem;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .2;
}
.webapp-box-content {
  /*position: relative;*/
  /*box-sizing: border-box;*/
  /*padding: 55px 0 50px;*/
  width: 100%;
  /*height: 100%;*/
  background: #FFF;
  border-radius: 15px;
}
.box-hide {
  display: none;
}
.webapp-box-content .box-resource-content {
  display: none;
}
.webapp-box-content .webapp-content-tab {
  padding-left: 10px;
  margin: 0;
  max-height: 140px;
  overflow-y: auto;
}
.webapp-box-content .webapp-content-tab li {
  display: inline-block;
  padding: 5px 14px;
  margin: 5px 0;
  cursor: pointer;
}
.webapp-box-content .webapp-content-tab li.active {
  border-radius: 6px;
  background: #00a3e9;
  color: #FFF;
}
.webapp-box-content .content-top-operation {
/*  position: absolute;
  bottom: 49px;
  left: 0;
  right: 0;*/
  background: #f7f7f7;
  padding: 8px;
}
.webapp-box-content .content-top-operation ul {
  margin: 0;
  padding: 0;
}
.content-top-operation .box-operation-menu li {
  margin-right: 5px;
}
#webapp-img-box .resource-list-wrap {
/*  position: absolute;
  top: 100px;
  bottom: 100px;
  left: 0;
  right: 0;*/
  display: none;
  height: 290px;
  /*width: 100%;*/
  padding-left: 15px;
  padding-top: 8px;
  overflow-x: hidden;
  overflow-y: auto;
}
#webapp-img-box .resource-list li {
  display: inline-block;
  margin: 0 15px 15px 0;
  position: relative;
  border: 1px solid transparent;
}
#webapp-img-box .resource-list li:hover,
#webapp-img-box .resource-list li.selected {
  border-color: #ccc;
}
#webapp-img-box .resource-list li:hover {
  background-color: #ddd;
}
#webapp-img-box .resource-list li.selected:after {
  position: absolute;
  right: -12px;
  top: -10px;
  display: block;
  width: 24px;
  height: 24px;
  content: '√';
  color: #fff;
  font-family: "微软雅黑";
  line-height: 22px;
  text-align: center;
  border: 2px solid #fff;
  background: #6abb03;
  border-radius: 50%;
}
/*.webapp-box-content .resource-list .img-title {
  width: 72px;
  height: 24px;
  line-height: 24px;
  margin: 0;
  font-size: 12px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}*/
#webapp-img-box .resource-list .img-operate {
  display: none;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 1;
}
#webapp-my-img .resource-list li:hover .img-operate,
body[data-admin="1"] #webapp-system-img li:hover .img-operate,
body[admin="1"] #webapp-system-img li:hover .img-operate {
  display: block;
}
#webapp-img-box .resource-list .img-operate a {
  display: table-cell;
  width: 1%;
  padding: 2px;
  text-align: center;
  color: #fff;
  font-size: 12px;
  text-decoration: none;
  background-color: rgba(0,0,0,.5);
}
#webapp-img-box .resource-list .img-operate a:hover {
  background-color: rgba(0,0,0,.8);
}
#webapp-img-box .resource-list .progress-mask {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,.8);
  z-index: 2;
  padding-top: 30px;
  color: #fff;
  text-align: center;
  font-size: 16px;
}
#webapp-img-box .resource-list .upload-fail-tip {
  display: none;
}
.webuploader-container {
  position: relative;
}
.webapp-box-footer {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 50px;
  line-height: 40px;
  padding-right: 30px;
  border-radius: 0 0 10px 10px;
  background: #FFF;
  border-top: 1px solid #e5e5e5;
  z-index: 2;
  font-size: 12px;
}
#img-crop-box .webapp-box-footer {
  text-align: right;
}
.webapp-box .webuploader-pick {
  font-size: inherit !important;
  background-color: transparent;
  overflow: initial;
}
.webapp-box .resource-select-num {
  color: #0034FF;
}
.webapp-box .form-control {
  display: inline-block;
  width: 120px;
}
.webapp-box .progress-bar {
  position: absolute;
  left: 365px;
  top: 20px;
}
.webapp-box .thumbnail {
  display: inline-block;
  width: 80px;
  height: 80px;
  margin: 0;
  text-align: center;
  font-size: 0;
  border: none;
}
.webapp-box .thumbnail:before, .webapp-box .thumbnail:after {
  content: "";
  display: inline-block;
  width: 0;
  height: 100%;
  vertical-align: middle;
}
.webapp-box .thumbnail img {
  display: inline-block;
  max-width: 100%;
  max-height: 100%;
  vertical-align: middle;
}
#img-crop-box {
  width: 700px;
  height: 500px;
  margin-left: -350px;
}
.img-crop-scope {
  width: 508px;
  height: 320px;
  margin-top: 20px;
  text-align: center;
  font-size: 0;
  border: 1px solid #bbb;
  background-color: #ccc;
  overflow: hidden;
}
.img-crop-top-input {
  padding: 7px 10px;
  background-color: #eee;
}
.jcrop-holder > input[type="radio"] {
  left: -2000px !important;
}
.webapp-sub-cate {
  display: none;
  padding: 8px 15px;
}
.webapp-sub-cate > span {
  cursor: pointer;
  margin-right: 8px;
  padding-right: 8px;
  border-right: 1px solid;
  color: #6c6c6c;
}
.webapp-sub-cate > span.active {
  color: #00a3e9;
}
.img-box-ui-radio {
  display: inline-block;
  width: 22px;
  height: 22px;
  position: relative;
  overflow: visible;
  border: 0;
  background: 0 0;
  -webkit-appearance: none;
  outline: 0;
  vertical-align: middle;
}
.img-box-ui-radio:before {
  content: '';
  display: block;
  width: 16px;
  height: 16px;
  border: 2px solid #dfe0e1;
  border-radius: 16px;
  background-clip: padding-box;
  position: absolute;
  left: 0;
  top: 0;
}
.img-box-ui-radio:checked:before {
  border: 2px solid #18b4ed;
}
.img-box-ui-radio:after {
  content: '';
  display: block;
  width: 8px;
  height: 8px;
  background: #dfe0e1;
  border-radius: 8px;
  position: absolute;
  left: 6px;
  top: 6px;
}
.img-box-ui-radio:checked:after {
  background: #18b4ed;
}
.img-crop-body-left {
  float: left;
  padding: 10px;
  margin: 0 20px;
  border: 1px solid #eee;
}
.img-crop-body-left label {
  display: block;
  padding: 0 8px;
  margin: 16px 0;
  text-align: right;
}
.img-crop-body-left .img-box-ui-radio {
  margin-left: 10px;
}
.webapp-box .btn {
  display: inline-block;
  padding: 6px 12px;
  width: auto;
  font-size: 14px;
  line-height: 18px;
  border: 1px solid #ccc;
  border-radius: 3px;
  color: #666;
  background-color: #fff;
  cursor: pointer;
  vertical-align: middle;
}
.webapp-box .btn.green {
  color: #fff;
  background-color: #03d8a2;
  border-color: #05C897;
}
.webapp-box .btn.orange {
  color: #fff;
  background-color: #ff9f22;
  border-color: #ee9016;
}
.webapp-box .btn.blue {
  color: #fff;
  background-color: #1dc6f1;
  border-color: #15bbe5;
}
.webapp-box input[type="text"] {
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  line-height: 14px;
  padding: 6px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.2);
  outline: 0;
  -webkit-user-select: text;
}
.webapp-box select {
  border: 1px solid #ccc;
  border-radius: 4px;
  line-height: 14px;
  padding: 6px 4px 6px 6px;
  box-shadow: inset 0 2px 8px rgba(0,0,0,.2);
  outline: 0;
  width: 160px;
  margin: 0;
}
input[type="file"]{
  opacity: 0;
}
</style>
<div class="webapp-box-bg" id="webapp-img-box-bg"></div>
<div class="webapp-box" id="webapp-img-box">
    <div class="webapp-box-header">
        <div>
            <div>
                <ul class="webapp-box-header-ul">
                    <li>我的图片</li>
                    <li class="system-img-library">图片库</li>
                </ul>
            </div>
        </div>
        <span class="webapp-box-close">×</span>
    </div>
    <div class="webapp-box-content">
        <div class="box-resource-content" id="webapp-my-img">
            <div>
                <ul class="webapp-content-tab">
                    <li data-page="1" data-id="0" id="default-img-group">全部</li>
                </ul>
                <div class="resource-list-wrap">
                    <ul class="resource-list"></ul>
                </div>
            </div>
        </div>
        <div class="box-resource-content" id="webapp-system-img">
            <ul class="webapp-content-tab">
              <li data-page="1" data-id="0">全部</li>
            </ul>
            <div class="resource-list-wrap">
                <ul class="resource-list"></ul>
            </div>
        </div>
        <div class="content-top-operation">
            <div class="box-operation-menu">
                <ul>
                    <li class="btn btn-success green webuploader-container" id="select-local-img"><div class="webuploader-pick">上传至当前组</div><div id="rt_rt_1c1h414hscljnkv1t9b1f891eql1" style="position: absolute; top: 6px; left: 12px; width: 84px; height: 18px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible" multiple="multiple" accept="image/gif,image/jpg,image/jpeg,image/bmp,image/png"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></li>
                    <li class="btn btn-default" data-href="#img-box-group-create">新建分组</li>
                    <li class="btn btn-default cannot-operate-default edit-img-group" data-href="#img-box-group-edit">编辑分组</li>
                    <li class="btn btn-default img-batch" data-href="#box-img-batch">批量处理</li>
                </ul>
            </div>
            <div class="box-hide" id="img-box-group-edit">修改组名 <input class="group-name-input form-control input" type="text">
                <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
                <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
                <a href="javascript:;" class="btn btn-danger orange delete-img-group">删除当前组</a>
            </div>
            <div class="box-hide" id="img-box-group-create">新建分组 <input class="group-name-input form-control input" type="text">
                <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
                <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
                <span>组名不超过6个字</span>
            </div>
            <div class="box-hide" id="box-img-batch">已选<span class="resource-select-num">0</span>张
                移至 <select class="resource-group-select form-control"></select>
                <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
                <a href="javascript:;" class="btn btn-danger orange delete-select-img">删除选中图片</a>
                <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
            </div>
        </div>
    </div>
<!--     <div class="webapp-box-footer">
        <a href="javascript:;" class="btn blue img-box-confirm">确定</a>
    </div> -->
</div>
<div class="webapp-box-bg" id="img-crop-box-bg"></div>
<div class="webapp-box" id="img-crop-box">
  <div class="webapp-box-header">
    <div class="webapp-box-header-ul">
      <span style="font-size:16px;">图片裁剪</span> 
    </div>
    <span class="webapp-box-close">×</span>
  </div>
  <div class="webapp-box-content">
    <div class="form-inline img-crop-top-input">
      <span>宽度: </span><input class="form-control input-sm input img-crop-width-input" type="text">
      <span>高度: </span><input class="form-control input-sm input img-crop-height-input" type="text">
    </div>
    <div class="img-crop-body">
      <div class="img-crop-body-left">
        <label>原图比例<input class="img-box-ui-radio" data-ratio="1" type="radio" name="img-box-ratio"></label>
        <label>1:1<input class="img-box-ui-radio" data-ratio="1" type="radio" name="img-box-ratio"></label>
        <label>4:3<input class="img-box-ui-radio" data-ratio="4/3" type="radio" name="img-box-ratio"></label>
        <label>3:4<input class="img-box-ui-radio" data-ratio="3/4" type="radio" name="img-box-ratio"></label>
        <label>16:9<input class="img-box-ui-radio" data-ratio="16/9" type="radio" name="img-box-ratio"></label>
        <label>自由拖动<input class="img-box-ui-radio" data-ratio="0" type="radio" name="img-box-ratio"></label>
      </div>
      <div class="img-crop-body-right">
        <div class="img-crop-scope">
            <img id="img-crop-target" style="display: none; visibility: hidden; width: 0px; height: 0px;"><div class="jcrop-holder" style="width: 0px; height: 0px; position: relative; background-color: rgb(0, 0, 0);"><div style="position: absolute; z-index: 600;"><div style="width: 100%; height: 100%; z-index: 310; position: absolute; overflow: hidden;"><img style="border: none; visibility: visible; margin: 0px; padding: 0px; position: absolute; top: 0px; left: 0px; width: 0px; height: 0px;"><div class="jcrop-hline" style="position: absolute; opacity: 0.4;"></div><div class="jcrop-hline bottom" style="position: absolute; opacity: 0.4;"></div><div class="jcrop-vline right" style="position: absolute; opacity: 0.4;"></div><div class="jcrop-vline" style="position: absolute; opacity: 0.4;"></div><div class="jcrop-tracker" style="cursor: move; position: absolute; z-index: 360;"></div></div><div style="width: 100%; height: 100%; z-index: 320; display: block;"><div class="ord-n jcrop-dragbar" style="cursor: n-resize; position: absolute; z-index: 370;"></div><div class="ord-s jcrop-dragbar" style="cursor: s-resize; position: absolute; z-index: 371;"></div><div class="ord-e jcrop-dragbar" style="cursor: e-resize; position: absolute; z-index: 372;"></div><div class="ord-w jcrop-dragbar" style="cursor: w-resize; position: absolute; z-index: 373;"></div><div class="ord-n jcrop-handle" style="cursor: n-resize; position: absolute; z-index: 374; opacity: 0.5;"></div><div class="ord-s jcrop-handle" style="cursor: s-resize; position: absolute; z-index: 375; opacity: 0.5;"></div><div class="ord-e jcrop-handle" style="cursor: e-resize; position: absolute; z-index: 376; opacity: 0.5;"></div><div class="ord-w jcrop-handle" style="cursor: w-resize; position: absolute; z-index: 377; opacity: 0.5;"></div><div class="ord-nw jcrop-handle" style="cursor: nw-resize; position: absolute; z-index: 378; opacity: 0.5;"></div><div class="ord-ne jcrop-handle" style="cursor: ne-resize; position: absolute; z-index: 379; opacity: 0.5;"></div><div class="ord-se jcrop-handle" style="cursor: se-resize; position: absolute; z-index: 380; opacity: 0.5;"></div><div class="ord-sw jcrop-handle" style="cursor: sw-resize; position: absolute; z-index: 381; opacity: 0.5;"></div></div></div><div class="jcrop-tracker" style="width: 4px; height: 4px; position: absolute; top: -2px; left: -2px; z-index: 290; cursor: crosshair;"></div><input type="radio" class="jcrop-keymgr" style="position: fixed; left: -120px; width: 12px;"><img style="display: block; visibility: visible; width: 0px; height: 0px; border: none; margin: 0px; padding: 0px; position: absolute; top: 0px; left: 0px; opacity: 0.6;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="webapp-box-footer">
    <button class="btn btn-info blue img-crop-cancel">不裁剪</button>
    <button class="btn btn-success green img-crop-confirm">裁剪</button>
    <button class="btn btn-default img-crop-return" style="margin-left:50px;">取消</button>
  </div>
</div>    
<script>
/**
 * 图片上传
 */
var jcropApiIns, // 图片裁剪实例
    jcropSelectPos, $img_box_replacer, afterSelectImgCallback, img_box_scrollTimer, img_box_inputTimer;

$('#img-crop-target').Jcrop({
  boxWidth : $('.img-crop-scope').width(),
  boxHeight: $('.img-crop-scope').height(),
  aspectRatio: 1/1,
  onSelect: function(){
    jcropSelectPos = jcropApiIns.tellSelect();
  },
  onChange: function(c){
    var $tracker = $('.jcrop-tracker');
    $('.img-crop-width-input').val(Math.round(c.w));
    $('.img-crop-height-input').val(Math.round(c.h));
  }
}, function(){
  jcropApiIns = this;
  jcropApiIns.setSelect([0, 0, 100, 100]);
});

$('#webapp-img-box').on('click', '.webapp-box-header-ul li', function(){
  // 我的图片/图片库 切换
  if($(this).hasClass('active')) { return; }
  var index = $(this).index(),
      $content = $('#webapp-img-box .box-resource-content').eq(index),
      $li = $content.find('.webapp-content-tab li'),
      $subCate;

  $(this).addClass('active').siblings().removeClass('active');
  $content.show().siblings('.box-resource-content').hide();
  if (!$li.filter('.active').length){
    $li.eq(0).trigger('click');
  } else {
    $li.filter('.active').trigger('click');
  }
  if($(this).hasClass('system-img-library')){
    if($('body').attr('data-admin') || $('body').attr('admin')){
      $('#webapp-img-box .content-top-operation').show();
    }else {
      $('#webapp-img-box .content-top-operation').hide();
    }
  } else {
    $('#webapp-img-box .content-top-operation').show();
  }
  $('#webapp-img-box .group-edit-cancel:visible').trigger('click');
}).on('click', '.webapp-box-close', function(){
// 关闭资源框
  $('#webapp-img-box, #webapp-img-box-bg').addClass('animate-hide').removeClass('animate-show');

}).on('click', '.webapp-content-tab li', function(){
// 一级菜单切换
  var index = $(this).index(),
      $content = $(this).parent().siblings('.resource-list-wrap').eq(index),
      $subCate;

  $(this).addClass('active').siblings('.active').removeClass('active');
  $content.show().siblings('.resource-list-wrap').hide();
  $('#webapp-img-box .resource-list .selected').removeClass('selected');
  $('#webapp-img-box .resource-select-num').text(0);

  if( ($subCate = $(this).parent().siblings('.webapp-sub-cate[data-href='+$(this).attr('data-id')+']')).length){
  // 如果有一级菜单下有二级菜单时 展示二级菜单, data-page为1 表示该列表没有请求过数据 点击二级菜单请求数据
    $subCate.show().siblings('.webapp-sub-cate').hide();
    if ($(this).attr('data-page') == 1) {
      $(this).attr('data-page', 2);
      $subCate.children().eq(0).trigger('click');
    }
  } else {
  // 没有二级菜单 直接点击一级菜单请求数据
    $('#webapp-img-box .webapp-sub-cate').hide();
    if ($(this).attr('data-page') == 1) {
      getImgResource('image', $(this), $content.find('.resource-list'));
    }
  }
}).on('click', '.webapp-sub-cate > span', function(){
// 二级菜单切换
  $(this).attr('data-page', 1).addClass('active').siblings('.active').removeClass('active');
  $('#webapp-img-box .resource-list-wrap:visible').off('scroll').on('scroll', function(){
    webappImgBoxScroll($(this));
  });
  getImgResource('image', $(this), $('#webapp-img-box .resource-list:visible'));

}).on('click', '.resource-list li', function(){
  // 选中图片
  if($(this).hasClass('resource-uploading')){ return; }
  if($('#box-img-batch:visible').length){
    $(this).toggleClass('selected');
    $('#webapp-img-box .resource-select-num').text($('#webapp-img-box .resource-list li.selected').length);
  } else {
    var $img = $(this).find('img'),
        imgsrc = $img.attr('src'),
        ratio  = $img.width()/$img.height();

    $('#webapp-img-box .selected').removeClass('selected');
    $(this).addClass('selected');
    $('#img-crop-target').attr({
      'src': imgsrc,
      'data-id': $(this).attr('data-id')
    });

    $('.img-crop-width-input, .img-crop-height-input').val('');
    jcropApiIns.setImage(imgsrc);
    jcropApiIns.setOptions({ aspectRatio:ratio });
    setTimeout(function(){
      jcropApiIns.setSelect([0,0,300,300]);
    }, 300);
    $('.img-crop-body-left').find('input').eq(0).prop('checked', true).attr('data-ratio', ratio);
    $('#img-crop-box, #img-crop-box-bg').removeClass('animate-hide').addClass('animate-show');
  }

}).on('click', '.box-operation-menu li', function(){
  // 点击我的图片界面操作按钮 展示对应操作
  var $this = $(this),
    selector;

  if(!$('#webapp-img-box .system-img-library').hasClass('active') && 
    $(this).hasClass('cannot-operate-default') && !$this.hasClass('img-batch') && 
    $('#default-img-group:visible').hasClass('active')){
    alertTip('不能删除、编辑默认分组');
    return;
  }
  if(selector = $this.attr('data-href')) {
    $('#img-box-group-create .group-name-input').val('');
    $(selector).removeClass('box-hide').siblings().addClass('box-hide');
  }
  // 编辑组名
  if($this.hasClass('edit-img-group')) {
    $('#img-box-group-edit .group-name-input').val($('#webapp-img-box .webapp-content-tab:visible .active').text());
    return;
  }
  // 批量处理
  if($this.hasClass('img-batch')) {
    var select = '';
    $('#webapp-img-box .webapp-content-tab:visible li').each(function(i, li){
      select += '<option value="'+$(li).attr('data-id')+'">'+$(li).text()+'</option>'
    });
    $('#webapp-img-box .resource-group-select').html(select);
    $('#webapp-img-box .resource-list .selected').removeClass('selected');
    $('#webapp-img-box .resource-select-num').text(0);
    // $('#webapp-img-box .img-box-confirm').hide();
  }

}).on('click', '.group-edit-cancel', function(){
// 点击操作组取消按钮
  $(this).parent().addClass('box-hide');
  $('#webapp-img-box .box-operation-menu').removeClass('box-hide');
  $('#webapp-img-box li.selected').removeClass('selected');
  // $('#webapp-img-box .img-box-confirm').show();

}).on('click', '#img-box-group-edit .group-edit-confirm', function(){
// 确定修改组名
  var $this     = $(this),
      groupName = $this.siblings('.group-name-input').val(),
      $li       = $('#webapp-img-box .webapp-content-tab:visible .active'),
      groupId   = $li.attr('data-id'),
      data      = {
        tag: groupName
        ,tag_id: groupId
      };

  $('#webapp-img-box .system-img-library').hasClass('active') ? (data.admin = 1) : (data.user = 1);
  $.ajax({
    url : '/index.php?r=pc/UserTag/updateTag', 
    type: 'get',
    data: data, 
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $li.text(groupName);
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '#img-box-group-edit .delete-img-group', function(){
// 删除组
  var $this   = $(this),
      $li     = $('#webapp-img-box .webapp-content-tab:visible .active'),
      groupId = $li.attr('data-id'),
      $content= $li.parent().siblings('.resource-list-wrap').eq($li.index()),
      data = {
        tag_id: groupId
      };

  if(!confirm('删除分组后分组里的图片不会删除，您确定要删除当前组？')) { return; }
  $('#webapp-img-box .system-img-library').hasClass('active') ? (data.admin = 1) : (data.user = 1);
  $.ajax({
    url : '/index.php?r=pc/UserTag/removeTag',
    type: 'get',
    data: data,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $li.siblings('li').eq(0).trigger('click');
      $li.remove();
      $content.remove();
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '#img-box-group-create .group-edit-confirm', function(){
// 确定创建分组
  var $this     = $(this),
      groupName = $this.siblings('.group-name-input').val(),
      url       = '/index.php?r=pc/UserTag/addTag', 
      para = {
        tag   : groupName
        ,user : $('#webapp-img-box .system-img-library').hasClass('active') ? 0 : 1
        ,type : 0
      };

  $.ajax({
    url: url,
    type: 'get',
    data: para,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var li = '<li data-page="1" data-id="'+data.data+'">'+data.title+'</li>';
      $('#webapp-img-box .webapp-content-tab:visible').append(li).parent()
        .append('<div class="resource-list-wrap"><ul class="resource-list"></ul></div>');
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });

}).on('click', '#box-img-batch .group-edit-confirm', function(){
// 确定批量移动
  var $this     = $(this),
      imgId     = [],
      imgs      = $('#webapp-img-box .resource-list:visible .selected'),
      oldGroupId  = $('#webapp-img-box .webapp-content-tab:visible .active').attr('data-id'),
      newGroupId  = $('#webapp-img-box .resource-group-select:visible').val();

  if(oldGroupId == newGroupId) { return; }
  imgs.length && imgs.each(function(index, au){
    imgId.push($(au).attr('data-id'));
  });
  $.ajax({
    url : '/index.php?r=pc/UserTag/moveImg',
    type: 'get',
    data: {
      tag_id: newGroupId
      ,img_arr: imgId
      ,user : $('#webapp-img-box .system-img-library').hasClass('active') ? 0 : 1
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      if($('#webapp-img-box .webapp-content-tab:visible .active').attr('data-id') == 0){
        $('#webapp-img-box .webapp-content-tab:visible .selected').removeClass('selected');
      }else {
        imgs.remove();
      }
      $('#webapp-img-box .webapp-content-tab:visible [data-id="'+newGroupId+'"]').attr('data-page', 1);
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '.delete-select-img', function(){
// 确定批量删除
  var $this = $(this),
      imgs  = $('#webapp-img-box .resource-list:visible .selected'),
      imgId;

  if(!imgs.length) { return; }
  if(!confirm('确定删除所有选中的图片')) { return; }
  imgId = [];

  imgs.each(function(index, au){
    imgId.push($(au).attr('data-id'));
  });
  $.ajax({
    url : '/index.php?r=pc/UserTag/removeImg',
    type: 'post',
    data: {
      tag_id: $('#webapp-img-box .webapp-content-tab:visible .active').attr('data-id')
      ,img_arr: imgId
      ,user: $('#webapp-img-box .system-img-library').hasClass('active') ? 0 : 1
    }, 
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      imgs.remove();
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });

}).on('click', '.img-operate [data-role="delete"]', function(e){
// 删除图片
  e.stopPropagation();
  var $this = $(this);
  if(!confirm('确定要删除图片？')){ return; }
  $.ajax({
    url: '/index.php?r=pc/UserTag/removeImg',
    type: 'post',
    data: {
      tag_id: $('#webapp-img-box .webapp-content-tab:visible .active').attr('data-id')
      ,img_arr: [$this.closest('li').attr('data-id')]
      ,user: $('#webapp-img-box .system-img-library').hasClass('active') ? 0 : 1
    }, 
    dataType: 'json',
    success: function(data){
      if (data.status !==0) { alertTip(data.data); return; }
      $this.closest('li').remove();
    }
  });

});

// 裁剪
$('#img-crop-box').on('click', '.img-crop-confirm', function(){
// 确定裁剪
  var $this = $(this),
      $targetImg = $('#img-crop-target'),
      target_url = $targetImg.attr("src"),
      target_id  = $targetImg.attr("data-id");

  if(/\.gif/.test(target_url)){
    alertTip("GIF格式的图片无法裁剪");
    return;
  }
  if($this.hasClass('disabled')) { return; }
  $this.addClass('disabled').text("提交中..");
  $.ajax({
    url: '/index.php?r=pc/UserTag/CropImage',
    type: 'post',
    dataType: 'json',
    data: {
      id: target_id,
      orig_file: target_url,
      width: Math.round(jcropSelectPos.w),
      height:Math.round(jcropSelectPos.h),
      x:Math.round(jcropSelectPos.x),
      y:Math.round(jcropSelectPos.y)
    },
    success: function(data){
      $this.removeClass('disabled').text("确定");
      if(data.status !== 0){ alertTip(data.data); return; }
      var info = data.data,
          imgStr = '<li data-id='+info.id+' data-src='+info.img_thumb
                 + '><a href="javascript:;" title="" class="thumbnail"><img src='
                 + info.img_thumb +' alt=""></a><div class="img-operate">'
                 // + '<a href="javascript:;"'
                 // + ' title="移动到其他分组" data-role="move"><span class="glyphicon '
                 // + 'glyphicon-move"></span></a>'
                 // + '<a href="javascript:;" title="裁剪尺寸" data-role="truncate">'
                 // + '<span class="glyphicon glyphicon-edit">裁剪</span></a>'
                 + '<a href="javascript:;" title="删除" data-role="delete"><span class="glyphicon'
                 + ' glyphicon-trash">删除</span></a></div></li>';

      $('#webapp-img-box .resource-list:visible').prepend(imgStr);
      if($img_box_replacer){
        $img_box_replacer.attr('src', info.img_thumb);
      }
      $.isFunction(afterSelectImgCallback) && afterSelectImgCallback(info.img_thumb);
      $('#img-crop-box .webapp-box-close, #webapp-img-box .webapp-box-close').trigger('click');
    },
    error: function() {
      $this.removeClass('disabled').text("确定");
      alertTip('请求出错');
    }
  });

}).on('click', '.img-crop-cancel', function(){
// 不裁剪
  var imgUrl = $('#webapp-img-box .resource-list:visible .selected img').attr('src');
  if($img_box_replacer){
    $img_box_replacer.attr('src', imgUrl);
  }
  $.isFunction(afterSelectImgCallback) && afterSelectImgCallback(imgUrl);
  $('#img-crop-box .webapp-box-close, #webapp-img-box .webapp-box-close').trigger('click');

}).on('blur', '.img-crop-width-input, .img-crop-height-input', function(e){
// 输入裁剪宽高
  // var keycode = e.keyCode;
  // console.log(keycode);
  // if ((48 <= keycode && keycode <= 57) || (96 <= keycode && keycode <= 105) || keycode == 8 || keycode == 46 ){
    var x = jcropSelectPos.x,
        y = jcropSelectPos.y,
        width = +$('.img-crop-width-input').val()+x,
        height= +$('.img-crop-height-input').val()+y;

    // img_box_inputTimer && clearTimeout(img_box_inputTimer);
    $('.img-box-ui-radio').last().prop('checked', true);
    jcropApiIns.setOptions({aspectRatio: 0});
    // img_box_inputTimer = setTimeout(function(){
      jcropApiIns.setSelect([x, y, width, height]);
  //   }, 1000);

  // } else {
  //   e.preventDefault();
  // }
}).on('click', '.webapp-box-close, .img-crop-return', function(){
// 关闭剪裁框
  $('#img-crop-box, #img-crop-box-bg').addClass('animate-hide').removeClass('animate-show');

}).on('click', '.img-crop-body-left input', function(){
// 修改裁剪比例
  jcropApiIns.setOptions({aspectRatio: eval($(this).attr('data-ratio'))});
});

function webappImgBoxScroll(list_wrap){
  var $this = list_wrap,
      scrollTop, wrapHeight, contentH;

  if(img_box_scrollTimer){ return; }
  img_box_scrollTimer = setTimeout(function(){
    scrollTop  = $this.scrollTop();
    wrapHeight = $this.height();
    contentH   = $this.children('ul').height();
    if(wrapHeight + scrollTop >= contentH){
      getImgResource('image',
        $('#webapp-video-box .webapp-sub-cate:visible .active').length
        ? $('#webapp-video-box .webapp-sub-cate:visible .active')
        : $('#webapp-img-box .webapp-content-tab:visible .active'),
      $('#webapp-img-box .resource-list:visible'));
    }
    img_box_scrollTimer = 0;
  }, 100);
}

// 注册图片上传插件
ImgUploader('#select-local-img');
function ImgUploader(id) {
  var fileId, uploader, $current_progress,
      FILE_SIZE_LIMIT = 1024 * 1024 * 2;

  uploader = WebUploader.create({
    accept: {
      extensions: 'gif,jpg,jpeg,bmp,png',
      mimeTypes: 'image/gif,image/jpg,image/jpeg,image/bmp,image/png'
    },
    compress: {
      width: 1600,
      height: 1600,
      // 图片质量，只有type为`image/jpeg`的时候才有效。
      quality: 90,
      // 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
      allowMagnify: false,
      // 是否允许裁剪。
      crop: false,
      // 是否保留头部meta信息。
      preserveHeaders: true,
      // 如果发现压缩后文件大小比原来还大，则使用原来图片
      // 此属性可能会影响图片自动纠正功能
      noCompressIfLarger: false,
      // 单位字节，如果图片大小小于此值，不会采用压缩。
      compressSize: 0
    },
    // fileNumLimit: 10, // 验证文件总数量, 超出则不允许加入队列
    auto: true,
    fileSingleSizeLimit: FILE_SIZE_LIMIT, //文件大小为2M
    // swf文件路径
    swf: './Uploader.swf',
    // 文件接收服务端。
    server: '/index.php?r=pc/UserTag/addimg',
    // 允许重复上传
    duplicate: true,
    // 选择文件的按钮。可选。
    // 内部根据当前运行时创建，可能是input元素，也可能是flash.
    pick: id
  });
  // 当有文件添加进来的时候
  uploader.on('filesQueued', function(files) {
    var list = '';

    $.each(files, function(index, file){
      list += '<li class="resource-uploading" data-name="'+file.name+'" data-id="'+file.id+'">'
            + '<a href="javascript:;" title="" class="thumbnail"><img></a>'
            // + '<h5 class="img-title">'+file.name+'</h5>'
            + '<div class="img-operate">'
            // + '<a href="javascript:;" title="移动到其他分组" data-role="move"><span class="glyphicon glyphicon-move"></span></a>'
            // + '<a href="javascript:;" title="裁剪尺寸" data-role="truncate"><span class="glyphicon glyphicon-edit">裁剪</span></a>'
            + '<a href="javascript:;" title="删除" data-role="delete"><span class="glyphicon glyphicon-trash">删除</span></a></div>'
            + '<div class="progress-mask"><p class="progress-inner"></p><p class="upload-fail-tip">上传失败</p></div></li>';
    });
    $('#webapp-img-box .resource-list:visible').prepend(list);
  });
  uploader.on('startUpload', function(file, percentage) {
    // 开始上传流程触发
    var user = $('#webapp-img-box .webapp-box-header-ul .active').hasClass('system-img-library') ? 0 : 1,
        tag = $('#webapp-img-box .webapp-content-tab:visible .active').attr('data-id') || 0;
    uploader.option('server', '/index.php?r=pc/UserTag/addimg&user='+ user +'&tag_id=' + tag);
  });
  uploader.on('uploadStart', function(file){
    $current_progress = $('#webapp-img-box .resource-list:visible li[data-id="'+file.id+'"] .progress-inner');
  });
  uploader.on('uploadProgress', function(file, percentage) {
    $current_progress.text(Math.round(percentage*100)+'%');
  });
  uploader.on('uploadSuccess', function(file, response) {
    var fileId  = file.id,
        $li     = $('#webapp-img-box .resource-list:visible li[data-id="'+fileId+'"]');

    if(response.status !== 0) {
      $li.find('.upload-fail-tip').show().siblings('.progress-bar').hide();
      return;
    }
    $li.closest('.resource-list-wrap').scrollTop(0);
    $li.attr({ 'data-id': response.data.id, 'data-src': response.data.img_original })
       .removeClass('resource-uploading')
       .find('.progress-mask').remove();
    $li.find('img').attr('src', response.data.img_original);
  });
  uploader.on('uploadError', function(file) {
    var fileId  = file.id,
      $li   = $('#webapp-img-box .resource-list:visible li[data-id="'+fileId+'"]');

    $li.attr('upload-fail', 1).find('.upload-fail-tip').show().siblings('.progress-inner').hide();
  });
  uploader.on('uploadFinished', function() {
    // 所有文件结束上传
    $('#webapp-img-box .resource-list:visible li[upload-fail="1"]').remove();
  });
  uploader.on('error', function(type) {
    if(type === 'Q_TYPE_DENIED'){
      alert('请上传 gif/jpg/jpeg/bmp/png 格式的文件');
    } else if(type === 'Q_EXCEED_NUM_LIMIT'){
      alert('选择的文件数目超出限制 超出部分已取消上传');
    } else if(type === 'Q_EXCEED_SIZE_LIMIT '){
      alert('添加的文件总大小超出限制 超出部分已取消上传');
    }
  });
  uploader.on('beforeFileQueued', function(file){
    if(file.size > FILE_SIZE_LIMIT){
      alert('文件大小超出'+ (FILE_SIZE_LIMIT/1024/1024) +'M限制');
      return false;
    }
  });
}

function showImgResourceBox(img, afterCallback){
  $img_box_replacer = $(img) || '';
  afterSelectImgCallback = afterCallback || '';

  if($('#webapp-img-box').hasClass('img-resource-loaded')){
    $('#webapp-img-box .resource-list .selected').removeClass('selected');
    $('#webapp-img-box-bg, #webapp-img-box').removeClass('animate-hide').addClass('animate-show');
    return;
  }

  // 第一次打开图片资源框 加载默认分组图片
  $.ajax({
    url: '/index.php?r=pc/UserTag/getTagList', 
    type: 'get',
    data: {
      type: 0
    },
    dataType: 'json',
    success:  function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var taglist = data.data.user_list,
          tab = content_wrap = '',
          wrap_template = '<div class="resource-list-wrap"><ul class="resource-list"></ul></div>';

      taglist.length && $.each(taglist, function(index, tag){
        tab += '<li data-id="'+tag.id+'" data-page="1">'+tag.title+'</li>';
        content_wrap += wrap_template;
      });
      $('#webapp-my-img .webapp-content-tab').append(tab).parent().append(content_wrap);

      $('#webapp-img-box').addClass('img-resource-loaded');
      $('#webapp-img-box .resource-list .selected').removeClass('selected');
      $('#webapp-img-box-bg, #webapp-img-box').removeClass('animate-hide').addClass('animate-show');
      if (!(list = $('#webapp-img-box .webapp-box-header-ul:visible li')).find('.active').length){
        list.eq(0).trigger('click');
      }

      $.ajax({
        url: '/index.php?r=pc/InvitationData/GetCategory', 
        type: 'get',
        data: { type : 2 },
        dataType: 'json',
        success: function(data) {
          if (data.status !== 0) { alertTip(data.data); return; }
          var subCate = '';

          taglist = data.data;
          tab = content_wrap = '';
          taglist.length && $.each(taglist, function(index, tag){
            tab += '<li data-id="'+tag.cate_id+'" data-page="1">'+tag.name+'</li>';
            if(tag.cate.length) {
              subCate += '<div class="webapp-sub-cate" data-href='+tag.cate_id
                       + '><span data-id='+tag.cate_id+' data-page="1">全部</span>';
              $.each(tag.cate, function(key, cate){
                subCate += '<span data-id='+cate.cate_id+' data-page="1">'+cate.name+'</span>';
              });
              subCate += '</div>';
            }
            content_wrap += wrap_template;
          });
          $('#webapp-system-img .webapp-content-tab').append(tab).after(subCate + content_wrap);
          $('#webapp-img-box .resource-list-wrap').on('scroll', function(){
            webappImgBoxScroll($(this));
          });
        }
      });
    }
  });
}
// 获取资源框内容
function getImgResource(type, $clickTab, $ul){
  var page = Number($clickTab.attr('data-page')),
      para = {
        tag_id: $clickTab.attr('data-id')
        ,page: page
        ,page_size: 20
        ,user: $('#webapp-img-box .system-img-library').hasClass('active') ? 0 : 1
      };

  $.ajax({
    url: '/index.php?r=pc/UserTag/getImgList', 
    type: 'get',
    data: para,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var list = data.data,
          html = '';
      list.length && $.each(list, function(i, item){
        if ( type === 'audio'){
          html += '<li data-id="'+item.id+'" data-src="'+item.music+'"><span class="resource-name">'+item.title
              + '</span><div class="audio-play-pause"><i class="resource-audio-play">播放 </i><i class="resource-audio-pause">'
              + '暂停</i></div><div class="resource-remove"><span>×</span><div></li>';
        
        } else if (type === 'image') {
          html += '<li data-id="'+item.id+'" data-src="'+item.img_original+'">'
              + '<a href="javascript:;" title="" class="thumbnail"><img src="'
              + item.img_original +'"></a>'
              // + '<h5 class="img-title">'+item.name+'</h5>'
              + '<div class="img-operate">'
              // + '<a href="javascript:;" title="移动到其他分组" data-role="move"><span class="glyphicon glyphicon-move"></span></a>'
              // + '<a href="javascript:;" title="裁剪尺寸" data-role="truncate"><span class="glyphicon glyphicon-edit">裁剪</span></a>'
              + '<a href="javascript:;" title="删除" data-role="delete"><span class="glyphicon glyphicon-trash">删除</span></a></div></li>';
        }
      });
      page == 1 ? $ul.html(html) : $ul.append(html);
      $clickTab.attr('data-page', ++page);
      if (data.current_page >= data.total_page){
        $ul.parent().off('scroll');
      }
    }
  });
}

</script>
<style rel="stylesheet">
.webapp-box {
  position: fixed;
  -webkit-transform: translateX(-10000px);
  -moz-transform: translateX(-10000px);
  transform: translateX(-10000px);
  z-index: 1001;
  left: 50%;
  top: 10%;
  width: 603px;
  min-height: 460px;
  margin-left: -300px;
  padding-bottom: 15px;
  border: 1px solid #DDD;
  border-radius: 10px;
  box-shadow: 5px 5px 20px rgba(0,0,0,.4),-5px -5px 20px rgba(0,0,0,.4);
  background: #FFF;
}
.webapp-box.animate-show {
  -webkit-animation: 'show' .5s linear;
  -moz-animation: 'show' .5s linear;
  animation: 'show' .5s linear;
}
.webapp-box.animate-hide {
  -webkit-animation: 'hide' .3s linear;
  -moz-animation: 'hide' .3s linear;
  animation: 'hide' .3s linear;
}
.webapp-box-bg {
  position: fixed;
  -webkit-transform: translateX(-10000px);
  -moz-transform: translateX(-10000px);
  transform: translateX(-10000px);
  width: 100%;
  height: 100%;
  z-index: 1000;
  left: 0;
  top: 0;
  background: rgba(0,0,0,.5);
}
.animate-show {
  -webkit-transition: opacity .5s linear;
  -moz-transition: opacity .5s linear;
  transition: opacity .5s linear;
  opacity: 1;
}
.animate-hide {
  -webkit-transition: opacity .5s linear;
  -moz-transition: opacity .5s linear;
  transition: opacity .5s linear;
  opacity: 0;
}
.webapp-box-bg.animate-show, .webapp-box.animate-show {
  -webkit-transform: translateX(0px);
  -moz-transform: translateX(0px);
  transform: translateX(0px);
}

@-webkit-keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;-webkit-transform:scale(1.01,1.01)}
  85%{opacity:1;-webkit-transform:scale(0.99,0.99)}
  100%{-webkit-transform:scale(1,1)}
}
@-moz-keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;-moz-transform:scale(1.01,1.01)}
  85%{opacity:1;-moz-transform:scale(0.99,0.99)}
  100%{-moz-transform:scale(1,1)}
}
@keyframes 'show'{
  0%{opacity:.1}
  60%{opacity:.85;transform:scale(1.01,1.01)}
  85%{opacity:1;transform:scale(0.99,0.99)}
  100%{transform:scale(1,1)}
}

@-webkit-keyframes 'hide'{
  0%{-webkit-transform:scale(1,1);opacity:1}
  35%{-webkit-transform:scale(1.02,1.02);opacity:.5}
  70%{-webkit-transform:scale(1.05,1.05);opacity:.2}
  100%{-webkit-transform:scale(1,1);opacity:0}
}
@-moz-keyframes 'hide'{
  0%{-moz-transform:scale(1,1);opacity:1}
  35%{-moz-transform:scale(1.02,1.02);opacity:.5}
  70%{-moz-transform:scale(1.05,1.05);opacity:.2}
  100%{-moz-transform:scale(1,1);opacity:0}
}
@keyframes 'hide'{
  0%{transform:scale(1,1);opacity:1}
  35%{transform:scale(1.02,1.02);opacity:.5}
  70%{transform:scale(1.05,1.05);opacity:.2}
  100%{transform:scale(1,1);opacity:0}
}
.webapp-box input[type=file]:focus, .webapp-box input[type=checkbox]:focus, .webapp-box input[type=radio]:focus {
  outline: none;
}


.webapp-box-header {
/*  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;*/
  width: 100%;
  height: 45px;
  background: #FFF;
  border-bottom: 1px solid #e5e5e5;
  border-radius: 10px 10px 0 0;
}
.webapp-box-header-ul {
  margin: 12px 0 0 10px;
  padding: 0;
  font-size: 0;
  text-align: center;
}
.webapp-box-header-ul li {
  display: inline-block;
  padding: 5px 16px;
  cursor: pointer;
  font-size: 14px;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.webapp-box-header-ul li:first-child {
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  border-left: 1px solid #ddd;
}
.webapp-box-header-ul li:last-child {
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-right: 1px solid #ddd;
}
.webapp-box-header-ul li.active {
  background: #00a3e9;
  color: #FFF;
}
.webapp-box-close {
  position: absolute;
  top: 15px;
  right: 20px;
  cursor: pointer;
  font-size: 2.1rem;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .2;
}
.webapp-box-content {
  /*position: relative;*/
  /*box-sizing: border-box;*/
  /*padding: 55px 0 50px;*/
  width: 100%;
  /*height: 100%;*/
  background: #FFF;
  border-radius: 15px;
}
.box-hide {
  display: none;
}
.webapp-box-content .box-resource-content {
  display: none;
}
#webapp-my-video{
  display: block;
}
.webapp-box-content .webapp-content-tab {
  padding-left: 10px;
  margin: 0;
  max-height: 140px;
  overflow-y: auto;
}
.webapp-box-content .webapp-content-tab li {
  display: inline-block;
  padding: 5px 14px;
  margin: 5px 0;
  cursor: pointer;
}
.webapp-box-content .webapp-content-tab li.active {
  border-radius: 6px;
  background: #00a3e9;
  color: #FFF;
}
.webapp-box-content .content-top-operation {
/*  position: absolute;
  bottom: 49px;
  left: 0;
  right: 0;*/
  background: #f7f7f7;
  padding: 8px;
}
.webapp-box-content .content-top-operation ul {
  margin: 0;
  padding: 0;
}
.content-top-operation .box-operation-menu li {
  margin-right: 5px;
}
#webapp-video-box .resource-list-wrap {
/*  position: absolute;
  top: 100px;
  bottom: 100px;
  left: 0;
  right: 0;*/
  display: none;
  height: 290px;
  /*width: 100%;*/
  padding-left: 15px;
  padding-top: 8px;
  overflow-x: hidden;
  overflow-y: auto;
}
#webapp-video-box .resource-list li {
  display: inline-block;
  width: 80px;
  margin: 0 15px 15px 0;
  position: relative;
  border: 1px solid transparent;
}
/*#webapp-video-box .resource-list li:hover,
#webapp-video-box .resource-list li.selected {
  border-color: #ccc;
}*/
/*#webapp-video-box .resource-list li:hover {
  background-color: #ddd;
} */
#webapp-video-box .resource-list li.selected:after {
  position: absolute;
  right: -12px;
  top: -10px;
  display: block;
  width: 24px;
  height: 24px;
  content: '√';
  color: #fff;
  font-family: "微软雅黑";
  line-height: 22px;
  text-align: center;
  border: 2px solid #fff;
  background: #6abb03;
  border-radius: 50%;
}
/*#webapp-video-box a.thumbnail.active,
#webapp-video-box a.thumbnail:focus,
#webapp-video-box a.thumbnail:hover{
  border-color: #ccc;
}*/
#webapp-video-box .resource-list .video-operate {
  display: none;
  width: 100%;
  position: absolute;
  left: 0;
  bottom: 0;
  z-index: 5;
}
#webapp-my-video .resource-list li:hover .video-operate,
body[data-admin="1"] #webapp-system-video li:hover .video-operate,
body[admin="1"] #webapp-system-video li:hover .video-operate {
  display: block;
}
#webapp-video-box .resource-list .video-operate a {
  display: block;
  width: 100%;
  height: 20px;
  text-align: center;
  color: #fff;
  font-size: 12px;
  text-decoration: none;
  background-color: rgba(0,0,0,.5);
  line-height: 20px;
}
#webapp-video-box .resource-list .video-operate a span{
  margin-right: 5px;
}
#webapp-video-box .resource-list .video-operate a:hover {
  background-color: rgba(0,0,0,.8);
}
#webapp-video-box .resource-list .progress-mask {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  line-height: 70px;
  color: #fff;
  text-align: center;
  font-size: 14px;
  background-color: rgba(0,0,0,.8);
  z-index: 2;
}
#webapp-video-box .resource-list .upload-fail-tip {
  display: none;
}
.webuploader-container {
  position: relative;
}
.webapp-box-footer {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 50px;
  line-height: 40px;
  padding-right: 30px;
  border-radius: 0 0 10px 10px;
  background: #FFF;
  border-top: 1px solid #e5e5e5;
  z-index: 2;
  font-size: 12px;
}
.webapp-box .webuploader-pick {
  font-size: inherit !important;
  background-color: transparent;
  overflow: initial;
}
.webapp-box .resource-select-num {
  color: #0034FF;
}
.webapp-box .form-control {
  display: inline-block;
  width: 120px;
}
.webapp-box .progress-bar {
  position: absolute;
  left: 365px;
  top: 20px;
}
.webapp-box .thumbnail {
  display: inline-block;
  width: 80px;
  height: 80px;
  margin: 0;
  text-align: center;
  font-size: 0;
  border: none;
}
#webapp-video-box .thumbnail{
  border: 1px solid #ddd;
}
.webapp-box .thumbnail:before, .webapp-box .thumbnail:after {
  content: "";
  display: inline-block;
  width: 0;
  height: 100%;
  vertical-align: middle;
}
.webapp-box .thumbnail img {
  display: inline-block;
  max-width: 100%;
  max-height: 100%;
  vertical-align: middle;
}
.webapp-sub-cate {
  display: none;
  padding: 8px 15px;
}
.webapp-sub-cate > span {
  cursor: pointer;
  margin-right: 8px;
  padding-right: 8px;
  border-right: 1px solid;
  color: #6c6c6c;
}
.webapp-sub-cate > span.active {
  color: #00a3e9;
}
.webapp-box .btn {
  display: inline-block;
  padding: 6px 12px;
  width: auto;
  font-size: 14px;
  line-height: 18px;
  border: 1px solid #ccc;
  border-radius: 3px;
  color: #666;
  background-color: #fff;
  cursor: pointer;
  vertical-align: middle;
}
.webapp-box .btn.green {
  color: #fff;
  background-color: #03d8a2;
  border-color: #05C897;
}
.webapp-box .btn.orange {
  color: #fff;
  background-color: #ff9f22;
  border-color: #ee9016;
}
.webapp-box .btn.blue {
  color: #fff;
  background-color: #1dc6f1;
  border-color: #15bbe5;
}
.webapp-box input[type="text"] {
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  line-height: 14px;
  padding: 6px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.2);
  outline: 0;
  -webkit-user-select: text;
}
.webapp-box select {
  border: 1px solid #ccc;
  border-radius: 4px;
  line-height: 14px;
  padding: 6px 4px 6px 6px;
  box-shadow: inset 0 2px 8px rgba(0,0,0,.2);
  outline: 0;
  width: 160px;
  margin: 0;
}
input[type="file"]{
  opacity: 0;
}
.videobox-title{
  line-height: 20px;
  font-size: 12px;
  margin-bottom: 0;
  margin-top: 3px;
  text-align: center;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.videobox-img{
  position: relative;
}
</style>
<div class="webapp-box-bg" id="webapp-video-box-bg"></div>
<div class="webapp-box" id="webapp-video-box">
  <div class="webapp-box-header">
    <div>
      <ul class="webapp-box-header-ul">
          <li class="active">我的视频库</li>
      </ul>
    </div>
    <span class="webapp-box-close">×</span>
  </div>
  <div class="webapp-box-content">
    <div class="box-resource-content" id="webapp-my-video">
      <div>
        <ul class="webapp-content-tab">
          <li class="active" id="default-video-group" data-page="1" data-id="0">全部</li>
        </ul>
        <div class="resource-list-wrap">
          <ul class="resource-list">
          </ul>
        </div>
      </div>
    </div>
    <div class="content-top-operation">
      <div class="box-operation-menu">
        <ul>
          <li class="btn btn-success green webuploader-container" id="select-local-video"><div class="webuploader-pick">上传至当前组</div><div id="rt_rt_1c1h414im8ggr0keo11jnol3c4" style="position: absolute; top: 6px; left: 12px; width: 84px; height: 18px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible" multiple="multiple" accept="video/mp4"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></li>
          <li class="btn btn-default" data-href="#video-box-group-create">新建分组</li>
          <li class="btn btn-default cannot-operate-default edit-video-group" data-href="#video-box-group-edit">编辑分组</li>
          <li class="btn btn-default video-batch" data-href="#box-video-batch">批量处理</li>
        </ul>
      </div>
      <div class="box-hide" id="video-box-group-edit">修改组名 <input class="group-name-input form-control input" type="text" maxlength="6">
        <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
        <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
        <a href="javascript:;" class="btn btn-danger orange delete-video-group">删除当前组</a>
        <span>组名不超过6个字</span>
      </div>
      <div class="box-hide" id="video-box-group-create">新建分组 <input class="group-name-input form-control input" type="text" maxlength="6">
        <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
        <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
        <span>组名不超过6个字</span>
      </div>
      <div class="box-hide" id="box-video-batch">已选<span class="resource-select-num">0</span> 个
        移至 <select class="resource-group-select form-control"></select>
        <a href="javascript:;" class="btn btn-success green group-edit-confirm">确定</a>
        <a href="javascript:;" class="btn btn-danger orange delete-select-video">删除选中视频</a>
        <a href="javascript:;" class="btn btn-default group-edit-cancel">取消</a>
      </div>
    </div>
  </div>
</div>
<script>
/**
 * 视频库
 */
var afterSelectImgCallback , $video_box_replacer;


$('#webapp-video-box').on('click', '.webapp-box-close', function(){
// 关闭资源框
  $('#webapp-video-box, #webapp-video-box-bg').addClass('animate-hide').removeClass('animate-show');

}).on('click', '.webapp-content-tab li', function(){
// 一级菜单切换
  var index = $(this).index(),
      $content = $(this).parent().siblings('.resource-list-wrap').eq(index);

  $(this).addClass('active').siblings('.active').removeClass('active');
  $content.show().siblings('.resource-list-wrap').hide();
  $('#webapp-video-box .resource-list .selected').removeClass('selected');
  $('#webapp-video-box .resource-select-num').text(0);

  if ($(this).attr('data-page') == 1) {
    getVideoResource( $(this), $content.find('.resource-list'));
  }
}).on('click', '.resource-list li', function(){
  // 选中视频
  var _this = $(this);
  if(_this.hasClass('resource-uploading')){ return; }
  if($('#box-video-batch:visible').length){
    _this.toggleClass('selected');
    $('#webapp-video-box .resource-select-num').text($('#webapp-video-box .resource-list li.selected').length);
  }else{
    
    $('#webapp-video-box, #webapp-video-box-bg').addClass('animate-hide').removeClass('animate-show');

    if($video_box_replacer){
      $video_box_replacer.attr({
        'src': _this.attr('data-src') ,
        'data-id':  _this.attr('data-id')
      });
    }
    afterSelectImgCallback && afterSelectImgCallback({
      video_id : _this.attr('data-id'),
      img_url : _this.attr('data-src')
    });
  }

}).on('click', '.box-operation-menu li', function(){
  // 点击我的视频界面操作按钮 展示对应操作
  var $this = $(this),
    selector;

  if($(this).hasClass('cannot-operate-default') && !$this.hasClass('video-batch') &&
    $('#default-video-group:visible').hasClass('active')){
    alertTip('不能删除、编辑默认分组');
    return;
  }
  if(selector = $this.attr('data-href')) {
    $('#video-box-group-create .group-name-input').val('');
    $(selector).removeClass('box-hide').siblings().addClass('box-hide');
  }
  // 编辑组名
  if($this.hasClass('edit-video-group')) {
    $('#video-box-group-edit .group-name-input').val($('#webapp-video-box .webapp-content-tab:visible .active').text());
    return;
  }
  // 批量处理
  if($this.hasClass('video-batch')) {
    var select = '';
    $('#webapp-video-box .webapp-content-tab:visible li').each(function(i, li){
      select += '<option value="'+$(li).attr('data-id')+'">'+$(li).text()+'</option>'
    });
    $('#webapp-video-box .resource-group-select').html(select);
    $('#webapp-video-box .resource-list .selected').removeClass('selected');
    $('#webapp-video-box .resource-select-num').text(0);
  }

}).on('click', '.group-edit-cancel', function(){
// 点击操作组取消按钮
  $(this).parent().addClass('box-hide');
  $('#webapp-video-box .box-operation-menu').removeClass('box-hide');
  $('#webapp-video-box li.selected').removeClass('selected');

}).on('click', '#video-box-group-edit .group-edit-confirm', function(){
// 确定修改组名
  var $this     = $(this),
      groupName = $this.siblings('.group-name-input').val(),
      $li       = $('#webapp-video-box .webapp-content-tab:visible .active'),
      groupId   = $li.attr('data-id'),
      data      = {
        tag: groupName ,
        tag_id: groupId,
        admin: 0
      };

  if(!groupName){
    alertTip('分组名称不能为空');
    return ;
  }

  $.ajax({
    url : '/index.php?r=pc/UserTag/UpdateTag',
    type: 'get',
    data: data,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $li.text(groupName);
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '#video-box-group-edit .delete-video-group', function(){
// 删除组
  var $this   = $(this),
      $li     = $('#webapp-video-box .webapp-content-tab:visible .active'),
      groupId = $li.attr('data-id'),
      $content= $li.parent().siblings('.resource-list-wrap').eq($li.index()),
      data = {
        tag_id: groupId,
        admin :0
      };

  if(!confirm('删除分组后分组里的视频不会删除，您确定要删除当前组？')) { return; }
  $.ajax({
    url : '/index.php?r=pc/UserTag/RemoveTag',
    type: 'get',
    data: data,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $li.siblings('li').eq(0).trigger('click');
      $li.remove();
      $content.remove();
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '#video-box-group-create .group-edit-confirm', function(){
// 确定创建分组
  var $this     = $(this),
      groupName = $this.siblings('.group-name-input').val(),
      url       = '/index.php?r=pc/UserTag/AddTag',
      para = {
        tag   : groupName ,
        user : 1 ,
        type : 7
      };
  if(!groupName){
    alertTip('分组名称不能为空');
    return ;
  }

  $.ajax({
    url: url,
    type: 'get',
    data: para,
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var li = '<li data-page="1" data-id="'+data.data+'">'+data.title+'</li>';
      $('#webapp-video-box .webapp-content-tab:visible').append(li).parent()
        .append('<div class="resource-list-wrap"><ul class="resource-list"></ul></div>');
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });

}).on('click', '#box-video-batch .group-edit-confirm', function(){
// 确定批量移动
  var $this     = $(this),
      videoId     = [],
      videos      = $('#webapp-video-box .resource-list:visible .selected'),
      oldGroupId  = $('#webapp-video-box .webapp-content-tab:visible .active').attr('data-id'),
      newGroupId  = $('#webapp-video-box .resource-group-select:visible').val();

  if(!videos.length) { 
    alertTip('您还没有选择视频!');
    return;
  }
  if(oldGroupId == newGroupId) {
    alertTip('移动的分组跟当前分组相同!');
    return; 
  }
  videos.each(function(index, au){
    videoId.push($(au).attr('data-id'));
  });
  $.ajax({
    url : '/index.php?r=pc/UserTag/MoveVideo',
    type: 'get',
    data: {
      tag_id: newGroupId ,
      video_arr: videoId
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      if($('#webapp-video-box .webapp-content-tab:visible .active').attr('data-id') == 0){
        $('#webapp-video-box .webapp-content-tab:visible .selected').removeClass('selected');
      }else {
        videos.remove();
      }
      $('#webapp-video-box .webapp-content-tab:visible [data-id="'+newGroupId+'"]').attr('data-page', 1).removeClass('nomore');
      $this.siblings('.group-edit-cancel').trigger('click');
    }
  });
}).on('click', '.delete-select-video', function(){
// 确定批量删除
  var $this = $(this),
      videos  = $('#webapp-video-box .resource-list:visible .selected'),
      videoId;

  if(!videos.length) { 
    alertTip('您还没有选择视频!');
    return;
  }
  if(!confirm('确定删除所有选中的视频')) { return; }
  videoId = [];

  videos.each(function(index, au){
    videoId.push($(au).attr('data-id'));
  });
  $.ajax({
    url : '/index.php?r=pc/UserTag/DeleteVideo',
    type: 'post',
    data: {
      tag_id: $('#webapp-video-box .webapp-content-tab:visible .active').attr('data-id') ,
      video_arr: videoId
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      videos.remove();
      $this.siblings('.group-edit-cancel').trigger('click');

      if(!$("#default-video-group").hasClass('active')){
        $("#default-video-group").attr('data-page', 1).removeClass('nomore');
      }
    }
  });

}).on('click', '.video-delete', function(e){
// 删除视频
  e.stopPropagation();
  var $this = $(this);
  var _li = $this.closest('li');
  if(_li.hasClass('resource-uploading')){
    if(!confirm('确定取消上传这个视频？')){ return; }
    localVideoUp.removeFile(_li.attr('data-id'));
  }else{
    if(!confirm('确定要删除视频？')){ return; }
    $.ajax({
      url: '/index.php?r=pc/UserTag/DeleteVideo',
      type: 'post',
      data: {
        tag_id: $('#webapp-video-box .webapp-content-tab:visible .active').attr('data-id') ,
        video_arr: [_li.attr('data-id')]
      },
      dataType: 'json',
      success: function(data){
        if (data.status !==0) { alertTip(data.data); return; }
        $this.closest('li').remove();

        if(!$("#default-video-group").hasClass('active')){
          $("#default-video-group").attr('data-page', 1).removeClass('nomore');
        }
      }
    });
  }

});


function webappVideoBoxScroll(list_wrap){
  var $this = list_wrap,
      scrollTop, wrapHeight, contentH;

    scrollTop  = $this.scrollTop();
    wrapHeight = $this.height();
    contentH   = $this.children('ul').height();
    if(wrapHeight + scrollTop >= contentH){
      getVideoResource( $('#webapp-video-box .webapp-content-tab:visible .active'), $this.children('.resource-list'));
    }
}

// 注册视频上传插件
var localVideoUp = new videoUploader('#select-local-video');
function videoUploader(id) {
  var fileId, uploader, fileArr = [],
      FILE_SIZE_LIMIT = 1024 * 1024 * 1024 * 1,
      that = this;

  var ma = new Map();

  this.uploader = uploader = WebUploader.create({
    accept: {
      extensions: 'mp4',
      mimeTypes: 'video/mp4'
    },
    // fileNumLimit: 1, // 验证文件总W数量, 超出则不允许加入队列
    auto: false,
    fileSingleSizeLimit: FILE_SIZE_LIMIT, //文件大小
    // swf文件路径
    swf: './Uploader.swf',
    // 文件接收服务端。
    server: 'http://upload-z2.qiniup.com',
    // 允许重复上传
    duplicate: true,
    // 选择文件的按钮。可选。
    // 内部根据当前运行时创建，可能是input元素，也可能是flash.
    pick: {
      id : id ,
      // multiple : false
    },
    threads : 3 , //上传并发数。允许同时最大上传进程数。
    chunked: true, //是否要分片处理大文件上传。
    chunkSize: 4194304, //如果要分片，分多大一片？ 默认大小为5M.
    // chunkRetry: 2, //如果某个分片由于网络问题出错，允许自动重传多少次？
    prepareNextFile : true //是否允许在文件传输时提前把下一个文件准备好
  });

  that.generateToken = function(file){
      var list = '';
      var tag = $('#webapp-my-video .webapp-content-tab .active').attr('data-id') || 0;

      $.ajax({
        url: '/index.php?r=pc/AppVideo/GenerateToken',
        type: 'get',
        data: {
          file_name : file.name ,
          size: file.size,
          tag : tag
        },
        dataType: 'json',
        success: function(data){
          if(data.status !== 0) { 
            alertTip(data.data);
            $('#webapp-my-video #'+file.id).remove();
            
            uploader.cancelFile(file);
            uploader.removeFile(file, true);
            return;
          }
          that.token = data.data.token;
          uploader.option( 'formData', {
            'token': data.data.token,
            'key': data.data.key,
            'file' : file.name
          });
          file.key = data.data.key;
          file.token = data.data.token;
          console.log('token:' + data.data.token);
          uploader.upload(file);

        }
      });
  }
  // 当有文件添加进来的时候
  uploader.on('fileQueued', function(file) {
    var list = '';

    fileArr.push(file);

    list += '<li class="resource-uploading" id="'+file.id+'" data-name="'+file.name+'" data-id="'+file.id+'">'
            + '<div class="videobox-img"><a href="javascript:;" class="thumbnail"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/video-upload.jpg" onerror="videoThumbError(this)"></a>'
            + '<div class="video-operate">'
            + '<a class="video-delete" href="javascript:;" title="删除" data-role="delete"><span class="icon-delete">删除</span></a></div></div><p class="videobox-title" title="'+file.name+'">'+file.name.replace(/.mp4$/, '')+'</p>'
            + '<div class="progress-mask"><p class="progress-inner">等待上传</p><p class="upload-fail-tip">上传失败</p></div></li>';

    $('#webapp-my-video .resource-list:visible').prepend(list);

    var ctx = new Array();
    ma.set(file.name, ctx);

    that.generateToken(file);
  });

  uploader.on('startUpload', function(file, percentage) {
    // 开始上传流程触发
  });
  uploader.on("uploadStart", function(file){
  });

  uploader.on("uploadBeforeSend", function (block, data, headers) {
    console.log("uploadBeforeSend............")
    if (parseInt(block.file.size) <= parseInt(uploader.options.chunkSize)) {
      uploader.options.chunked = false;
      console.log("使用表单上传.........");
    } else {
      uploader.options.chunked = true;
      headers['Authorization'] = 'UpToken ' + block.file.token;
      headers['Content-Type'] = 'application/octet-stream';
      block.transport.options.server = "http://upload-z2.qiniup.com/mkblk/" + (block.end - block.start);
      block.transport.options.sendAsBinary = true;
      block.transport.options.formData = false;
      console.log(true);
    }
  });
  uploader.on('uploadProgress', function(file, percentage) {
    $('#webapp-my-video #'+file.id+' .progress-inner').text(Math.round(percentage*100)+'%');
  });
  uploader.on("uploadAccept", function (block, ret) {
      console.log("uploadAccept.............");
      console.log("block.file.name:" + block.file.name);
      ma.get(block.file.name)[block.chunk] = ret.ctx;
  });
  uploader.on('uploadSuccess', function(file, response) {

    if(parseInt(file.size) <= parseInt(uploader.options.chunkSize)) {
      that.UploadComplete(file,response);
      console.log(response);
    } else {
      that.MakeFile(ma.get(file.name), file);
    }
    
  });
  uploader.on('uploadError', function(file) {
    var fileId  = file.id,
        $li     = $('#webapp-my-video #'+file.id);

    alertTip(file.name + ' 上传失败');
    $li.remove();
  });
  uploader.on('uploadComplete', function(file) {
    // 不管成功或者失败，文件上传完成时触发

  });
  uploader.on('uploadFinished', function() {
    // 所有文件结束上传
    // $('#webapp-my-video .resource-list:visible li[upload-fail="1"]').remove();
  });
  uploader.on('error', function(type) {
    if(type === 'Q_TYPE_DENIED'){
      alert('请上传 mp4 格式的文件');
    } else if(type === 'Q_EXCEED_NUM_LIMIT'){
      alert('选择的文件数目超出限制 超出部分已取消上传');
    } else if(type === 'Q_EXCEED_SIZE_LIMIT '){
      alert('添加的文件总大小超出限制 超出部分已取消上传');
    } else if(type === 'F_DUPLICATE'){
      alert('添加的文件重复');
    }
  });
  uploader.on('beforeFileQueued', function(file){
    if(file.size > FILE_SIZE_LIMIT){
      alert('文件大小超出'+ (FILE_SIZE_LIMIT/1024/1024/1024) +'G限制');
    }
  });
}
videoUploader.prototype.removeFile = function(fileid) {
  var uploader = this.uploader;

  uploader.cancelFile(fileid);
  uploader.removeFile(fileid , true);
  $('#webapp-my-video #'+fileid).remove();
};

videoUploader.prototype.MakeFile = function(ctx, file) {
  console.log("ctx:" + ctx);
  var b = ctx.join(",");
  var that = this;
  
  $.ajax({
    type: 'POST',
    url: 'http://upload-z2.qiniup.com/mkfile/' + file.size + '/key/' + URLSafeBase64Encode(file.key),
    data: b,
    contentType: "text/plain",
    contentLength: b.length,
    beforeSend: function (XMLHttpRequest) {
      XMLHttpRequest.setRequestHeader("Authorization", 'UpToken ' + file.token);
    },
    success: function(res){
      that.UploadComplete(file, res);
    }
  });
}

videoUploader.prototype.UploadComplete = function(file, response) {
  var fileId  = file.id,
      $li     = $('#webapp-my-video #'+file.id);

  var tag = $('#webapp-my-video .webapp-content-tab .active').attr('data-id') || 0;
  $.ajax({
    url: '/index.php?r=pc/AppVideo/UploadSuccessCallback',
    type: 'get',
    data: {
      key : file.key ,
      fsize: file.size,
      tag_id : tag
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { 
        return;
      }

      $li.closest('.resource-list-wrap').scrollTop(0);
      $li.attr({ 'data-id': data.data.id, 'data-src': data.data.img_url })
         .removeClass('resource-uploading')
         .find('.progress-mask').remove();
      $li.find('img').attr('src', data.data.img_url);

    }
  });
}

function URLSafeBase64Decode(data){
  data = data.replace(/_/g, '/').replace(/-/g, '+');
  var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
  ac = 0,
  dec = "",
  tmp_arr = [];

  if (!data) {
    return data;
  }

  data += '';

  do { // unpack four hexets into three octets using index points in b64
    h1 = b64.indexOf(data.charAt(i++));
    h2 = b64.indexOf(data.charAt(i++));
    h3 = b64.indexOf(data.charAt(i++));
    h4 = b64.indexOf(data.charAt(i++));

    bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

    o1 = bits >> 16 & 0xff;
    o2 = bits >> 8 & 0xff;
    o3 = bits & 0xff;

    if (h3 === 64) {
      tmp_arr[ac++] = String.fromCharCode(o1);
    } else if (h4 === 64) {
      tmp_arr[ac++] = String.fromCharCode(o1, o2);
    } else {
      tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
    }
  } while (i < data.length);

  dec = tmp_arr.join('');

  return dec;
}

function utf8_encode(argString) {

  if (argString === null || typeof argString === 'undefined') {
    return '';
  }

  var string = (argString + ''); // .replace(/\r\n/g, '\n').replace(/\r/g, '\n');
  var utftext = '',
  start, end, stringl = 0;

  start = end = 0;
  stringl = string.length;
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
        (c1 >> 6) | 192, (c1 & 63) | 128
        );
    } else if (c1 & 0xF800 ^ 0xD800 > 0) {
      enc = String.fromCharCode((c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128 );
    } else { // surrogate pairs
      if (c1 & 0xFC00 ^ 0xD800 > 0) {
        throw new RangeError('Unmatched trail surrogate at ' + n);
      }
      var c2 = string.charCodeAt(++n);
      if (c2 & 0xFC00 ^ 0xDC00 > 0) {
        throw new RangeError('Unmatched lead surrogate at ' + (n - 1));
      }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
      enc = String.fromCharCode(
        (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
        );
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }
      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}

function URLSafeBase64Encode(data) {
  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
  ac = 0,
  enc = '',
  tmp_arr = [];

  if (!data) {
    return data;
  }

  data = utf8_encode(data + '');

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

      // use hexets to index into b64, and append result to encoded string
      tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);

  enc = tmp_arr.join('');

  switch (data.length % 3) {
    case 1:
    enc = enc.slice(0, -2) + '==';
    break;
    case 2:
    enc = enc.slice(0, -1) + '=';
    break;
  }

  return enc.replace(/\//g, '_').replace(/\+/g, '-');
}


function showVideoResourceBox(img, afterCallback){
  $video_box_replacer = $(img) || '';
  afterSelectImgCallback = afterCallback || '';

  $('#webapp-video-box .resource-list .selected').removeClass('selected');
  $('#webapp-video-box .box-operation-menu').removeClass('box-hide').siblings().addClass('box-hide');
  $('#webapp-video-box-bg, #webapp-video-box').removeClass('animate-hide').addClass('animate-show');

  if($('#webapp-video-box').hasClass('video-resource-loaded')){
    return;
  }
  
  // 第一次打开视频资源框 加载默认分组视频
  $.ajax({
    url: '/index.php?r=pc/UserTag/GetTagList',
    type: 'get',
    data: {
      type: 7
    },
    dataType: 'json',
    success:  function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var taglist = data.data.user_list,
          tab = content_wrap = '',
          wrap_template = '<div class="resource-list-wrap"><ul class="resource-list"></ul></div>';

      taglist.length && $.each(taglist, function(index, tag){
        tab += '<li data-id="'+tag.id+'" data-page="1">'+tag.title+'</li>';
        content_wrap += wrap_template;
      });
      $('#webapp-my-video .webapp-content-tab').append(tab).parent().append(content_wrap);
      $('#webapp-video-box').addClass('video-resource-loaded');

      $('#webapp-video-box  .resource-list-wrap').on('scroll', function(){
        webappVideoBoxScroll($(this));
      });
      $('#webapp-video-box .webapp-content-tab li').filter('.active').trigger('click');

    }
  });
}
// 获取资源框内容
function getVideoResource($clickTab, $ul){
  if($clickTab.hasClass('loading') || $clickTab.hasClass('nomore')){
    return ;
  }
  $clickTab.addClass('loading');

  var page = Number($clickTab.attr('data-page')),
      para = {
        tag_id: $clickTab.attr('data-id') ,
        page: page ,
        page_size: 20
      };

  $.ajax({
    url: '/index.php?r=pc/UserTag/GetVideoList',
    type: 'get',
    data: para,
    dataType: 'json',
    success: function(data){
      $clickTab.removeClass('loading');

      if(data.status !== 0) { alertTip(data.data); return; }
      var list = data.data,
          html = '';
      list.length && $.each(list, function(i, item){

          html += '<li data-id="'+item.id+'" data-src="'+item.img_url+'">'
              + '<div class="videobox-img"><a href="javascript:;" class="thumbnail"><img src="'
              + item.img_url +'" onerror="videoThumbError(this)"></a>'
              + '<div class="video-operate">'
              + '<a class="video-delete" href="javascript:;" title="删除" data-role="delete"><span class="icon-delete"></span>删除</a></div></div><p class="videobox-title" title="'+item.file_name+'">'+item.file_name.replace(/.mp4$/, '')+'</p></li>';
      });
      page == 1 ? $ul.html(html) : $ul.append(html);
      $clickTab.attr('data-page', ++page);
      data.is_more == 0 &&  $clickTab.addClass('nomore');
    },
    error: function() {
      $clickTab.removeClass('loading');
    }
  });
}

function videoThumbError(ele) {
  ele.src = 'http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/video-upload.jpg';
  $(ele).closest('li').attr('data-src', 'http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/video-upload.jpg');
}
</script>

<meta charset="utf-8"> 
<style>
	*{
		margin: 0;
		padding: 0;
	}
	.transfer-div {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0.5);
		z-index: 999999;
		overflow: hidden;
    border-radius: 5px;
	}
	.transfer-panel {
		position: relative;
		top: 50%;
		left: 50%;
		width: 330px;
		height: 240px;
		margin-left: -165px;
		margin-top: -120px;
		background-color: #fff;
		text-align: center;
		overflow: hidden;
		border-radius: 5px;
	}
	.transfer-title {
		color: #4d4d4d;
		font-size: 24px;
		padding: 16px 0 13px;
	}
	.transfer-tip {
		color: #727272;
    font-size: 14px;
    margin: 0;
	}
	.transfer-email {
		margin:23px 0;
	}
	.transfer-email input{
		height: 35px;
		width: 280px;
		text-indent: 5px;
		border-radius: 2px;
		line-height: 35px;
		border: 1px solid #afafaf;
	}
	.transfer-panel button {
		height: 33px;
    width: 100px;
    margin: 0 10px;
    background-color: #fff;
    border-radius: 2px;
	}
	.transfer-cancel-btn {
		border: 1px solid #afafaf;
		color: #4d4d4d;
	}
	.transfer-panel .transfer-sure-btn {
		background-color: #3091f2;
		border: 1px solid #3091f2;
		color: #fff;
	}
	.webapp .transfer-panel .transfer-sure-btn {
		background-color: #f1c130;
		border: 1px solid #f1c130;
		color: #fff;
	}
</style>
<div class="transfer-div" id="transfer-div">
	<div class="transfer-panel">
		<div class="transfer-title">转让</div>
		<p class="transfer-tip">请复制后转让</p>
		<p class="transfer-tip">以免带来不必要的麻烦</p>
		<p class="transfer-tip" style="color:red;">转让功能只能尊享版和旗舰版使用</p>
		<div class="transfer-email" style="margin: 5px 0 23px; ">
			<input id="transferUser" type="text" placeholder="请输入接收方邮箱或手机">
		</div>
		<div><button class="transfer-cancel-btn">取消</button><button class="transfer-sure-btn">转让</button></div>
	</div>
</div>
<script>
function transferToUser(id, type, callback){
	// type 0是微页， 1是app
	if (type == 1 ) {
		$('#transfer-div .transfer-title').text('webapp转让');
	}else{
		$('#transfer-div .transfer-title').text('微页转让');
	};
	$('#transferUser').focus();
	var url=['/index.php?r=pc/InvitationNew/TransferInvUser', '/index.php?r=pc/AppData/TransferAppUser'];
	$('#transfer-div').show();
	$('#transfer-div .transfer-sure-btn').on('click', function(){
		var username = $('#transferUser').val().trim(),	
				regE = /^[a-zA-Z0-9_\.-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
				regP = /^1\d{10}/;
		if (!username) {
			alertTip('请输入接收方邮箱或手机');
			$('#transferUser').focus();
			return;
		};
		if(!regE.test(username) && !regP.test(username)){
			alertTip("请输入正确的邮箱或手机！");
			return;
		}
		$.ajax({
			url: url[type],
			type: 'post',
			dataType: 'json',
			data: {
				id: id,
				username: username,
			},
			success:function(data){
				if (data.status != 0) {alertTip(data.data);return;};
				alertTip('转让成功');
				$('#transfer-div').hide();
				callback();
			},
			error:function(data) {
				alertTip(data.data);
				return;
			},
		})
	});
	$('#transfer-div .transfer-cancel-btn').click(function(){
		$('#transfer-div').hide();
	});
}

</script>
        <!-- 高级版试用弹窗 -->
    
<link rel="stylesheet" type="text/css" href="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp_home/css/enterprise.css">
<div class="advancedContainer" id="advanced-container">
<div class="main">
	<div class="premium-left">
		<img src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp_home/img/premium.jpg" alt="" style="width: 370px">
	</div><div class="premium-right">
		<div class="submenu ">
			<p style="font-size: 24px">小程序高级版&nbsp;<span style="color: #ff3f1d;">￥3999/年</span>
			<span style="font-size: 16px;margin-left: 5px;">（有效期7天）</span></p>
		</div>
		<div class="msg">
			<div style="border-bottom: 1px solid #666666">
			<lable>姓名：</lable>
		   <input type="text" id="name">
			</div>
			<div style="border-bottom: 1px solid #666666">
			<lable>电话：</lable>
			 <input type="text" id="telephone">
			</div>
			<div style="border-bottom: 1px solid #666666">
			<lable>公司名称：</lable>
			<input type="text" id="company">
			</div>
			<div style="border-bottom: 1px solid #666666">
			<lable>职称：</lable>
			<input type="text" id="technicalTitle">
			</div>
		</div>
		<div class="advanced-button">
			<button style="width: 314px;height: 37px;background-color: #37b7eb;font-size: 16px;margin-top: 30px;
			color: white;margin-top: 42px;border: none;">立即试用</button>

		</div>
	</div>

</div>
</div>
<script type="text/javascript" src="http://cdn.jisuapp.cn/zhichi_frontend/static/webapp_home/js/enterprise.js"></script>    <!--高级版试用弹窗  完 -->
	
<style>
.buy-shop-wrap {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,.6);
}
.buy-shop-window {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 600px;
  height: 470px;
  background: #fff;
  transform: translate(-50%, -50%);
  color: #303445;
  border-radius: 5px;
  overflow: hidden;
}
.buy-shop-window header {
  padding-left: 15px;
  height: 48px;
  line-height: 48px;
  font-size: 18px;
  background: #ddd;
}
.buy-shop-window .icon-closes {
  float: right;
  padding: 14px;
  font-size: 18px!important;
  text-decoration: none;
}
.buy-shop-window .content {
  padding: 24px 50px;
}
.buy-shop-window .content > div {
  height: 48px;
  line-height: 48px;
}
.buy-shop-window .first-title{
  padding-right: 20px;
}
.buy-shop-window .account-field > p {
  display: inline-block;
  width: 50%;
}
.buy-shop-window .shopNum-field{

}
.buy-shop-window .shopNum-field .num-opt{
  display: inline-block;
  margin-right: 20px;
  width: 78px;
  height: 28px;
  line-height: 28px;
  text-align: center;
  border: 1px solid #666;
  border-radius: 5px;
  cursor:pointer;
}
.buy-shop-window .shopNum-field .num-opt.selected {
  border-color: #f78500;
  color: #f78500;
}
.buy-shop-window .shopNum-field input {
  position: relative;
  top: -1px;
  outline: none;
}
.buy-shop-window .shopNum-field input.selected{
  color: #f78500;
}
.buy-shop-window .shopNum-field input::-webkit-input-placeholder{
  color: #303445;
}
.buy-shop-window .shopNum-field input.selected::-webkit-input-placeholder{
  color: #f78500;
}
.buy-shop-window .shopNum-field input::-moz-placeholder{
  color: #303445;
}
.buy-shop-window .shopNum-field input.selected::-moz-placeholder{
  color: #f78500;
}
.buy-shop-window .shopNum-field input::-ms-placeholder{
  color: #303445;
}
.buy-shop-window .shopNum-field input.selected::-ms-placeholder{
  color: #f78500;
}
.buy-shop-window .payType-field input {
  position: relative;
  top: 3px;
  display: inline-block;
  width: 15px;
  height: 15px;
  cursor: pointer;
}
.buy-shop-window .payType-field span:nth-of-type(2) {
  padding-right: 30px;
}
.buy-shop-window .platForm-field .first-title {
  display: inline-block;
  vertical-align: top;
}
.buy-shop-window .pay-cash {
  font-size: 18px;
  color: #f78500;
}
.buy-shop-window .platForm-field > div {
  display: inline-block;
  width: 200px;
  text-align: center;
  vertical-align: top
}
.buy-shop-window .platForm-field img {
  display: block;
  margin: 0 auto;
}
.buy-shop-window .zhifubao {
  padding: 50px 0;
}
.buy-shop-window .zhifubao img {
  width: 140px;
}
.buy-shop-window .weixin {
  padding: 48px 0;
}
.buy-shop-window .weixin img {
  width: 50px;
}
.buy-shop-window .btn-pay {
  display: inline-block;
  margin-top: 40px;
  width: 120px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  border-radius: 5px;
  border: 1px solid #f78500;
  color: #f78500;
  text-decoration: none;
}
.buy-shop-window .btn-zfb,
.buy-shop-window .btn-weiBi {
  background: #f78500;
  color: #fff;
}
.buy-shop-window .btn-weiBi.no-drop {
  background: darkgray;
  border-color: darkgray;
  cursor: no-drop;
}
.buy-shop-window .btn-zfb.no-drop{
  cursor: no-drop;
  background: darkgray;
  border-color: darkgray;
}
.buy-shop-window .btn-wx.no-drop {
  cursor: no-drop;
  border-color: darkgray;
  color: darkgray;
}
.buy-shop-window .weiBi-field{
  display: none;
}
.buy-shop-window .payment-wx-logo {
  text-align: left;
  padding: 0 24px;
}
.buy-shop-window .payment-wx-logo img {
  display: inline;
  width: 50px;
}
</style>
<!-- 购买子店弹窗 -->
<div class="buy-shop-wrap" id="buy-shop-wrap">
  <div class="buy-shop-window">
    <header>购买子店<a href="javascript:;" class="icon-closes"></a></header>
    <div class="content">
      <div class="account-field">
        <p><span class="first-title">账号名称：</span><span id="account"></span></p><p><span>剩余店家数量：</span><span class="last-shop-num"></span>个</p>
      </div>
      <div class="shopNum-field" data-num="50" data-price="" type-id="1">
        <span class="first-title">子店数量：</span>
        <input class="num-opt selected" readonly="readonly" type="text" data-num="50" type-id="1" value="50家">
        <input class="num-opt" readonly="readonly" type="text" data-num="100" type-id="2" value="100家">
        <input class="num-opt" readonly="readonly" type="text" data-num="200" type-id="3" value="200家">
        <input class="num-opt self-define" type="text" min="0" data-num="0" type-id="4" placeholder="自定义">
      </div>
      <div class="payType-field" data-paytype="theThird">
        <span class="first-title">支付方式：</span>
        <input type="radio" checked="checked" class="pay-type" name="payType" data-type="theThird">
        <span>第三方支付平台</span>
        <input type="radio" name="payType" class="pay-type" data-type="weixin">
        <span>微币支付</span>
      </div><div class="payType-field">
        <span class="first-title">支付金额：</span>
        <span class="pay-cash"></span>
      </div>
      <div class="weiBi-field">
        <span class="first-title">剩余微币：</span>
        <span id="last-weiBi">1000个</span>
        <a class="buy-weiBi" href="/index.php?r=pc/IndexNew/weibiRecharge&amp;is_app=" target="_blank" style="color: red;">(微币不足，点击购买更多)</a>
        <p style="text-align: center;"><a href="javascript:;" id="btn-pay-wb" class="btn-pay btn-weiBi" paytype="wb">确认支付</a></p>
      </div>
      <div class="platForm-field"> 
        <span class="first-title">支付平台：</span><div class="zhifubao">
          <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/vippacket/images/alipay.png" alt="">
          <a href="javascript:;" id="btn-pay-zfb" target="_blank" class="btn-pay btn-zfb" paytype="zfb">点击去支付</a>
        </div><div class="weixin">
          <img src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/vippacket/images/wecharpay.png" alt="">
          <a href="javascript:;" id="btn-pay-wx" class="btn-pay btn-wx" paytype="wx">点击去支付</a>
        </div><div id="wechar-pay-qrcode" class="payment-wx" style="display: none;">
          <img id="wechar-pay-qrcode-img" class="payment-qcode" src="" alt="">
          <div class="payment-wx-logo"><img src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/common/images/wechat.jpg" alt="">微信扫码支付</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="http://cdn.jisuapp.cn/zhichi_frontend/static/pc2/common/js/qrcode.js?version=10470"></script>
<script>
  $(".buy-shop-window").on("click", ".icon-closes", function () {
    $('.buy-shop-wrap').hide();
  }).on("click", ".num-opt", function () {
    var $this = $(this),
    $parent = $this.parent(),
    num = $this.attr("data-num"),
    price = $this.attr("data-price"),
    typeId = $this.attr("type-id");
    $parent.attr({"data-num": num, "data-price": price, "type-id": typeId});
    $this.addClass('selected').siblings('.num-opt').removeClass('selected');
    totalBuyShopCash();
    if ($this.hasClass('self-define')) {
      $this.attr("type","number").val(num);
      if (num == 0) {
        $(".buy-shop-window .weixin").show();
        $(".buy-shop-window .payment-wx").hide();
      }
      return;
    }
    buyShopAddOrder();
  }).on("click", ".pay-type", function () {
    var $this = $(this),
    $parent = $this.parent(),
    $type = $this.attr("data-type");
    if ($type === 'theThird') {
      $(".weiBi-field").hide();
      $(".platForm-field").show();
    }else {
      $(".weiBi-field").show();
      $(".platForm-field").hide();
    }
    $parent.attr("data-paytype", $type);
    totalBuyShopCash();
  }).on("click", ".btn-pay", function () {
    var $this = $(this),
    $payType = $this.attr("payType"),
    orderId = $this.attr("order-id");
    switch ($payType) {
      case 'zfb':
      if ($this.hasClass('no-drop')) {
        alertToolsTip("请选择子店数量");
        return;
      }
      break;
      case 'wx':
      if ($this.hasClass('no-drop')) {
        alertToolsTip("请选择子店数量");
        return;
      }
      $(".buy-shop-window .weixin").hide();
      $(".buy-shop-window .payment-wx").show();
      break;
      case 'wb':
      if ($this.hasClass('no-drop')) {
        var totalCash = +$("#buy-shop-wrap .pay-cash").text();
        alertToolsTip(!!totalCash ? "微币不足，请购买更多" : "请选择子店数量");
        return;
      }
      $.ajax({
        url: "/index.php?r=pc/InvitationNew/BuySubShoNumPacket",
        type: "post",
        dataType: "json",
        data: {order_id: orderId},
        success: function () {},
        error: function () {}
      })
      alertToolsTip("正在处理订单，请稍候");
      break;
      default: 
      break;
    }
    checkOrderDone(orderId);
  })
  // 自定义子店数量
  $(".buy-shop-window input.self-define").blur(function () {
    var $this = $(this),
    val = parseInt($this.val()),
    $parent = $this.parent();
    if (val == 0 || isNaN(val)) {
      $this.attr("type","text").val("").attr("data-num", 0);
      $parent.attr("data-num", 0);
      $("#btn-pay-zfb").attr("href", "javascript:;");
      $(".buy-shop-window .weixin").show();
      $(".buy-shop-window .payment-wx").hide();
      return;
    }
    if (!/^\d+$/.test(val)) {
      alertTip("请输入正整数");
      $this.attr("type","text").val("").attr("data-num", 0);
      $parent.attr("data-num", 0);
      totalBuyShopCash();
      $("#btn-pay-zfb").attr("href", "javascript:;");
      $(".buy-shop-window .weixin").show();
      $(".buy-shop-window .payment-wx").hide();
      return;
    }
    $parent.attr("data-num", val);
    $this.attr("type","text").val(val+"家").attr("data-num", val);
    buyShopAddOrder();
  }).on('input', function () {
    var $this = $(this),
    val = parseInt($this.val()),
    $parent = $this.parent();
    if (isNaN(val)) {val = 0;}
    $this.attr("data-num", val);
    $parent.attr("data-num", val);
    totalBuyShopCash();
    if (val == 0) {
      $(".buy-shop-window .weixin").show();
      $(".buy-shop-window .payment-wx").hide();
    }
  })
  // addOrder
  function buyShopAddOrder() {
    var url = "/index.php?r=pc/order/AddOrder",
    shopNumField = $(".buy-shop-window .shopNum-field"),
    typeId = shopNumField.attr("type-id"),
    param = {
      obj_id: 26,
      type_id: typeId
    },
    success = function (data) {
      if (data.status == 0) {
        var orderId = data.order_id;
        $("#btn-pay-zfb").attr({"href": "/index.php?r=pc/order/AliPay&order_id=" + orderId, "order-id": orderId});
        $("#btn-pay-wb").attr({"order-id": orderId});
        $.ajax({
            url:'/index.php?r=pc/order/WeixinCodePay', 
            type:'get', 
            data:{order_id: orderId}, 
            dataType:'json', 
            success:function(data) {
              if (data.status != 0) {
                alertToolsTip(data.data);
                return;
              }
              var qrData = data.data;
              if (!qrData) {
                alertToolsTip("无法生成微信二维码，请使用支付宝或者微币支付");
                return;
              }
              var qr = qrcode(10, 'L');
              qr.addData(qrData);
              qr.make();
              $('#wechar-pay-qrcode-img').attr('src', $(qr.createImgTag()).attr('src'));
              $("#btn-pay-wx").attr("order-id", orderId);
            }
        });
      }
    },
    error = function (data) {
      console.error(data)
    };
    if (typeId == 4) {
      var num = +shopNumField.attr("data-num");
      if (num > 0) {
        param.shop_num = num;
      }
    }
    $.ajax({
      url: url,
      type: "post",
      dataType: "json",
      data: param,
      success: success,
      error: error
    })
  }
  // 检查订单是否完成
  var checkTimeOut;
  function checkOrderDone(orderId) {
    if (checkTimeOut != undefined) {
      clearInterval(checkTimeOut);
    };
    checkTimeOut = setInterval(function(){
      $.ajax({
        url:'/index.php?r=pc/Order/CheckOrder',
        data:{order_id: orderId},
        dataType:'json',
        type:'post',
        success:function(data){
          if (data.status != 0) {
            alertToolsTip(data.data);
            return;
          }
          switch(data.data.status) {
            case '0':  // 订单未支付
              break;
            case '1': // 订单支付完成
              alertToolsTip('订单支付完成');
              clearInterval(checkTimeOut);
              $('.buy-shop-wrap').hide();
              franchiseeList.getShopNumsMeal();
              break;
            case '2': // 订单取消
              break;
          }
        },
        error:function(data){
        }
      })
    },3000);
  }
</script>


<div class="modal-backdrop fade in"></div></body></html>

