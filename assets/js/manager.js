var appId     = GetQueryString('_app_id'),
    page_href = GetQueryString('h'),
    authorized= false;

var is_domain = $('body').attr('is_domain') == 1 ? true: false;
var is_yidou = $('body').attr('yidou') == 1 ? true : false;
// 鍏ㄥ眬鍙橀噺 鍘熸湰鍦╩anager.html
var searchNote = false;
var searchLog = false;
var searchMsg = false;
var searchWeiye = false;
var searchAll = false;
//婊氬姩鍒嗛〉椤垫暟鏌ヨ鍏ㄩ儴
var contentTimeLineScroll = 1;
//鏌ヨ绗旇
var contentTimeLineScrollNote = 1;
//鏌ヨ鏃ュ織
var contentTimeLineScrollLog = 1;
//鏌ヨ鐭俊
var contentTimeLineScrollMsg = 1;
//鏌ヨ寰〉
var contentTimeLineScrollWy = 1;
var phoneReg = /^1[3|4|5|7|8]\d{9}$/;
var emailReg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
var noteSrc = "http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/note.svg";
var logSrc = "http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/log.svg";
var mssageSrc = "http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/message.svg";
var weiyeSrc = "http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/app_user/weiye.svg";
// 鍒板簵璁㈠崟椤甸潰杞
var tostoreOrderTimeout;

$(function(){
  appId && initial();

  function initial(){
    bindEvents();
    bindEventsNew();
    ifAuthorized();
    getAppObj(appId);
    getApp();
    getAppCategoryList()
  }
  function getAppCategoryList(){
    $.ajax({
        url:"/index.php?r=pc/AppData/AppCategoryList",
        type:'GET',
        data:{},
        dataType:'json',
        success:function(data){
          if (data.status !== 0) {alertTip(data.data);return;};
          var tempOption = '';
          $.each(data.data,function(index,ele){
            tempOption+="<option value="+ele.id+">"+ele.name+"</option>"
             $.each(ele.cate,function(i,e){
                  tempOption+="<option value="+e.id+">"+e.name+"</option>"
             });
          });
          $("#template-cates").append(tempOption);
        },
        error:function(data){
          alertTip(data.data)
        }
      })
  }

  function bindEvents(){
    $(document).on('pjax:success', function(data, status, xhr, options){
      page_href = GetQueryString('h');

      var nav = $('.sidebar-nav[data-page='+page_href+']');

      if(GetQueryString('o')){
        initialManagerObj();
        nav = nav.filter('[obj-component='+GetQueryString('o')+']');
      } else {

        switch(page_href){
              case 'manager_authorize': initialManagerAuthorize();
                                        break;
           case 'manager_follow_reply': initialFollowReply();
                                        break;
          case 'manager_default_reply': initialDefaultReply();
                                        break;
          case 'manager_keyword_reply': initialKeywordReply();
                                        break;
            case 'manager_custom_menu': initialGzhCustomMenu();
                                        break;
               case 'manager_template': initialTemplate();
                                        break;
             case 'manager_statistics': initialStatistics();
                                        break;
               case 'manager_material': initialMaterial();
                                        break;
             case 'manager_obj_manage': initialObjManage();
                                        break;
           case 'manager_goods_manage': initialGoodsManage();
                                        break;
         case 'manager_booking_manage': initialBookingManage();
                                        break;
         case 'manager_tostore_manage': initialTostoreManage();
                                        break;
    case 'manager_points_goods_manage': initialPointsGoodsManage();
                                        break;
                case 'manager_payment': initialPayment();
                                        break;
           case 'manager_order_manage': initialOrderManage();
                                        break;
   case 'manager_order_booking_manage': initialBookingOrderManage();
                                        break;
case 'manager_order_storedvalue_manage': initialStoredvalueOrderManage();
                                        break;
       case 'manager_order_statistics': initialOrderStatistics();
                                        break;
            case 'manager_bill_detail': initialBillDetail();
                                        break;
          case 'manager_default_share': initialDefaultShare();
                                        break;
          case 'manager_child_account': initialChildAccount();
                                        break;
            case 'manager_spread_data': getSpreadData();
                                        break;
       case 'manager_visitor_analysis': getVisitorAnalysisData();
                                        break;
        case 'manager_membership_card': initialMembershipCard();
                                        break;
            case 'manager_coupon_card': initialCouponCard();
                                        break;
                 case 'manager_points': initialPoints();
                                        break;
           case 'manager_stored_value': initialStoredValue();
                                        break;
       case 'manager_template_message': initialTemplateMessage();
                                        break;
       case 'manager_topic_management': initialTopicManagement();
                                        break;
             case 'manager_plate_list': initialPlateList();
                                        break;
   case 'manager_community_associator': initialCommunityAssociator();
                                        break;

   case 'manager_order_tostore_manage': initialOrderTostoreManage();
                                        break;
  case 'manager_order_transfer_manage': initialOrderTransferManage();
                                        break;
case 'manager_location_tostore_manage': initialLocationTostoreManage();
                                        break;
             case 'manager_seller_crm': initialSellerCRM();
                                        break;
   case 'manager_applet_authorization': initAppletAuthorization();
                                        break;
         case 'manager_freight_manage': initialFreightManage();
                                        break;
              case 'manager_short_msg': initShortMessage();
                                        break;
                case 'manager_seckill': initialSecKill();
                                        break;
        case 'manager_collect_benefit': initialCollectBenefit();
                                        break;
      case 'manager_extension_setting': initialExtensionSetting();
                                        break;
              case 'manager_behavior' : initialBehaviorManage();
                                        break;
      case  'manager_carousel_manage' : InitialCarouselManage();
                                        break;
            case  'manager_group_buy' : initialGroupBuyManage();
                                        break;
case  'manager_order_groupbuy_manage' : initialGroupBuyOrderManage();
                                        break;
            case  'manager_promotion' : initialPromotion();
                                        break;
     case  'manager_business_payment' : initialBusinessPayment();
                                        break;                            
           case  'manager_video_list' : initialVideoList();
                                        break;
 case  'manager_ticket_customization' : initialTicketCustomization();
                                        break; 
         case 'manager_video_comment' : initialVideoComment();
                                        break;
           case 'manager_video_order' : initialVideoOrder();
                                        break;
        case  'manager_video_project' : initialVideoProject();     
                                        break;
        case  'tostore_shop_settings' : initialTostoreShopSettings();     
                                        break; 
        }
      }

      $('.sidebar-nav.active').removeClass('active');
      nav.addClass('active').hasClass('sidebar-sub-menu') && nav.parents('.sidebar-menu').addClass('unfold active');
      // Start 瀵归绾︾瓑鍟嗗搧鍚岀被鐨勯〉闈㈠仛澶勭悊锛屽乏渚у鑸€変腑
      switch(page_href){
        case 'manager_booking_manage':
        case 'manager_takeout_manage':
        case 'manager_tostore_manage':
        case 'tostore_shop_settings':
          $('.sidebar-nav[data-page="manager_goods_manage"]').addClass('active').parents('.sidebar-menu').addClass('unfold active');
          break;

        case 'manager_order_booking_manage':
        case 'manager_order_waimai':
        case 'manager_order_tostore_manage':
        case 'manager_order_transfer_manage':
        case 'manager_order_storedvalue_manage':
        case 'manager_ticket_customization':
          $('.sidebar-nav[data-page="manager_order_manage"]').addClass('active').parents('.sidebar-menu').addClass('unfold active');
          break;

      }
      if (page_href == 'manager_franchisee_order_analysis' || page_href == 'manager_franchisee_order_detail') {
          $('.sidebar-nav[data-page="manager_franchisee_order_analysis"]').addClass('active').parents('.sidebar-menu').addClass('unfold active');

      }
      // End
      if(nav.parent().hasClass('sidebar-obj-ul')){
        $('.sidebar-nav[data-page="manager_obj_manage"]').addClass('active').parents('.sidebar-menu').addClass('unfold active');
      }
      $('#content').scrollTop(0);//椤甸潰鍥炲埌椤堕儴

      if(page_href !== 'manager_order_tostore_manage' && tostoreOrderTimeout){
        clearTimeout(tostoreOrderTimeout);
      }
    }).on('show.bs.modal', '.modal', function (event) {
      var modal = $(this),
          button = $(event.relatedTarget);

      if (!button.length){
        return;
      }
      button.attr('modal-title') && modal.find('.modal-title').text(button.attr('modal-title'));
      button.attr('modal-content') && modal.find('.modal-body').html(button.attr('modal-content'));
    });

    $(window).on('popstate', function(){
      page_href = GetQueryString('h');

      var nav = $('.sidebar-nav[data-page='+page_href+']');

      $('.sidebar-nav.active').removeClass('active');
      $(".sidebar-menu.active").removeClass('active');
      nav.addClass('active').hasClass('sidebar-sub-menu') && nav.closest('.sidebar-menu').addClass('unfold active');
      if(nav.parent().hasClass('sidebar-obj-ul')){
        $('.sidebar-nav[data-page="manager_obj_manage"]').addClass('active');
      }
      var url = '/index.php' + window.location.search;
      PjaxRequest(url);
    });

    /**
     * 椤甸潰椤堕儴
     */
    $('#page-header').on('change', '.app-switch', function(){
      window.location.href = '/index.php?r=pc/AppMgr/manager&_app_id='+$(this).val();
    }).on('click', '.app-nav-transfer', function(){
      transferToUser(appId, 1, function(){
        window.close();
      });
    }).on('click', '.app-nav-preview', function(){
      //window.open('/index.php?r=pc/Webapp/preview&id='+appId);
        window.open('/make/app/'+appId+'.html');

    }).on('click', '.app-nav-edit', function(){
      window.open('/index.php?r=pc/Webapp/edit&id='+appId);

    }).on('click', '.app-nav-delete', function(){
      confirmTip({ content: '纭畾瑕佸垹闄よ搴旂敤锛�'}, function(){
        $.ajax({
          url: '/index.php?r=pc/AppData/Delete',
          type: 'post',
          data: {
            app_id: appId
          },
          dataType: 'json',
          success: function(data) {
            if (data.status !== 0) { alertTip(data.data); return; }
            window.close();
          }
        });
      });

    }).on('click', '.app-nav-set', function(){
      $(".mask_app_setting").show();
      $.ajax({
        url: '/index.php?r=pc/AppData/detail',
        data: {
          app_id: appId,
        },
        dataType: 'json',
        success: function(data){
          if(data.status !== 0) {
            alertTip(data.data);
            return;
          }
          var info = data.data;
          $('.publish-title-input').val(info.app_name);
          $('.publish-desc-input').val(info.description);
          $('.set-app-cover').attr('src', (is_domain && info.cover == 'http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/share_feng.jpg') ? $('body').attr('logo')  : info.cover);
          $('.set-app-logo').attr('src', (is_domain && info.cover == 'http://cdn.jisuapp.cn/zhichi_frontend/static/invitation/images/logo.png') ? $('body').attr('logo')  :info.logo);
        }
      });
    }).on("click",".app-nav-sale",function(){
      var is_designer = $("body").attr("is-designer"),
          vend_status = $(this).attr("data-vend_status"),
          vend_price =  $(this).attr("data-vend_price");
      if(is_designer != "1"){
          $("#sale-app-tip").show();
      }else{
          if(vend_status == 0 && Number(vend_price) != 0){
            alertTip("姝ｅ湪瀹℃牳涓�,涓嶅彲鍐嶅嚭鍞紒");
          }else{
            window.location.href = "/index.php?r=pc/Webapp/AppSale&app_id="+appId+"&vend_status="+vend_status+"&vend_price="+vend_price;
          }
      }
    }).on("click",".app-nav-income",function(){
        $("#app-nav-income").show();
        $.when($.get("/index.php?r=pc/Designer/GetAppTempletStat",{app_id:appId,days:7})).done(function(data){
          var obj = JSON.parse(data),categories=[],yAxis1=[],yAxis=[];
          $.each(obj.data.pv_tendency,function(a,b){
            categories.push(a);
            yAxis1.push(Number(b));
          });
           $.each(obj.data.sale_tendency,function(a,b){
            categories.push(a);
            yAxis.push(Number(b));
          });
          if(!categories.length){
              categories = ['鍛ㄤ竴', '鍛ㄤ簩', '鍛ㄤ笁', '鍛ㄥ洓', '鍛ㄤ簲', '鍛ㄥ叚','鍛ㄦ棩'];
          }
          if(!yAxis1.length){
              yAxis1 = [0,0,0,0,0,0,0];
          }
          if(!yAxis.length){
              yAxis = [0,0,0,0,0,0,0];
          }
          $("#app-nav-income").find(".single-app-num").text(obj.data['7_sale']);
          $("#app-nav-income").find(".single-app-profit").text(obj.data['7_profit']+"鍏�");
          $("#app-nav-income").find(".single-app-price").text(obj.data.price+"鍏�");
          HightChartfun(categories,yAxis1,yAxis);
        });
      function HightChartfun(categories,yAxis1,yAxis) {
        $("#app-nav-income .footer").highcharts({
          chart: {
            zoomType: 'xy'
          },
          title: {
            text: ''
          },
          subtitle: {
            text: ''
          },
          xAxis: [{
            categories: categories,
            crosshair: true
          }],
          yAxis: [{
            labels: {
              format: '{value}',
              style: {
                color: Highcharts.getOptions().colors[2]
              }
            },
            title: {
              text: '璐拱鏁�',
              style: {
                color: Highcharts.getOptions().colors[2]
              }
            },
            opposite: true
          }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
              text: '娴忚閲�',
              style: {
                color: Highcharts.getOptions().colors[0]
              }
            },
            labels: {
              format: '{value}',
              style: {
                color: Highcharts.getOptions().colors[0]
              }
            }
          }],
          tooltip: {
            shared: true,
            formatter: function() {
              console.log(this);
              return this.x + "<br>" + "<span style='color:#4572A7'>娴忚閲忥細" + this.points[0].y + " </span><br>" + "<span style='color:#89A54E'>璐拱鏁帮細" + this.points[1].y + " </span>";
            }
          },
          legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
          },
          series: [{
            name: '娴忚閲�',
            yAxis: 1,
            data: yAxis1
          }, {
            name: '璐拱鏁�',
            data: yAxis
          }]
        });
      }
    }).on("click",".app-nav-manage",function(){
        window.location.href = "/index.php?r=pc/Webapp/SmallProgramDesc&id="+appId;
    }).on("click", ".app-nav-unlock", function(e){
      $.ajax({
        url: '/index.php?r=pc/Admin/ProcessPass',
        type: 'get',
        dataType: 'json',
        data: {obj_id: appId},
        success: function(data){
          if (data.status != 0) {alertTip(data.data);return;};
          alert("璇ュ簲鐢ㄥ凡瑙ｉ櫎灞忚斀");
          window.location.reload();
        }
      });
    }).on("click", ".app-nav-lock", function(e) {
      $.ajax({
        url: '/index.php?r=pc/Admin/ProcessX',
        type: 'get',
        dataType: 'json',
        data: {app_id: appId},
        success: function(data){
          if (data.status != 0) {alertTip(data.data);return;};
          alert("璇ュ簲鐢ㄥ凡琚睆钄�");
          window.location.reload();
        }
      });
    });
    //鏀剁泭妯℃€佹浜嬩欢
    $("#app-nav-income").on("click",".app-income-modal .header span:last-child",function(){
        $("#app-nav-income").hide();
    });
     //鍑哄敭妯℃€佹鐐瑰嚮浜嬩欢
    $("#apply-template-dialog").on("click",".zhichi-close",function(){
      $("#apply-template-dialog").hide();
      $("#template-desc").val("");
      $("#template-tel").val("");
      $("#template-price").val("");
    }).on("click",".zhichi-submit-btn",function(){
        var price = Number($("#template-price").val()),
        description = $("#template-desc").val(),
        phoneReg = /^1[34578]\d{9}$/,
        phone = $("#template-tel").val().trim(),
        phoneflag = false,
        priceflag = false,
        descflag = false;
        if(price < 500 || price > 2000 || isNaN(price)){
          alertTip("浠锋牸鍦�500锝�2000涔嬪唴锛�");
          $("#template-price").focus();
          return;
        }else{
          priceflag = true;
        }
        if(description.length>50){
          alertTip("绠€浠嬩笉鑳借秴杩�50涓瓧绗︼紒");
          $("#template-desc").focus();
          return;
        }else{
          descflag = true;
        }
        if(!phoneReg.test(phone)){
          alertTip("鎵嬫満鍙风爜杈撳叆鏈夎锛�");
          $("#template-tel").focus();
          return;
        }else{
           phoneflag = true;
        }
        if(priceflag && descflag && phoneflag){
           $.ajax({
                url:"/index.php?r=pc/Webapp/SellApp",
                type:'POST',
                data:{
                  app_id:appId,
                  price:price,
                  cate_id:$("#template-cates").val(),
                  phone:phone,
                  description:description
                },
                dataType:'json',
                success:function(data){
                    if (data.status !== 0) {alertTip(data.data);return;};
                    alertTip("鎻愪氦鎴愬姛锛屾垜浠細灏藉揩瀹℃牳锛�");
                    $("#apply-template-dialog").hide();
                },
                error:function(data){
                   alertTip(data.data);
                }
        });
        }
    });
    $("#sale-app-tip").on("click",".zhichi-close,.sale-tip-container .content a:first-child",function(){
       $("#sale-app-tip").hide();
    });
    /**
    甯姪鎻愮ず妗嗙殑鐐瑰嚮浜嬩欢
    */
    $(".manager_obj_helpMask").on("click",".manager_obj_help_title span:last-child",function(){
        $(".manager_obj_helpMask").hide();
    }).on("click",".manager_obj_help_message div:nth-of-type(1)",function(){
          $(".whatis_obj").show();
          $(".hownew_obj").hide();
          $(".manage_obj").hide();
          $(this).addClass("active_obj");
          $(".manager_obj_help_message div").not(this).removeClass("active_obj");
    }).on("click",".manager_obj_help_message div:nth-of-type(2)",function(){
         $(".whatis_obj").hide();
          $(".hownew_obj").show();
          $(".manage_obj").hide();
          $(this).addClass("active_obj");
          $(".manager_obj_help_message div").not(this).removeClass("active_obj");
    }).on("click",".manager_obj_help_message div:nth-of-type(3)",function(){
          $(".whatis_obj").hide();
          $(".hownew_obj").hide();
          $(".manage_obj").show();
          $(this).addClass("active_obj");
          $(".manager_obj_help_message div").not(this).removeClass("active_obj");
    }).on("click",".help_href",function(){
        if($(this).attr("data-type")){
            $(".manage_data_obj").show();
        }else{
            $(".new_data_obj").show();
        }
    }).on("click",".IKonw",function(){
        $(".manager_obj_helpMask").hide();
    }).on("click",".manager_obj_help_footer input",function(){
        $(".manager_obj_helpMask").hide();
        if($(this).is(":checked")){
          localStorage.setItem("firstShow",1);
        }else{
          localStorage.setItem("firstShow",0);
        }
    });
    $(".close_managedata").click(function(){
      $(".manage_data_obj").hide();
    });
    $(".close_newdata_tip").click(function(){
      $(".new_data_obj").hide();
    });
    /**
     * 宸︿晶瀵艰埅鏍忕偣鍑讳簨浠�
     */
    $('#sidebar').on('click', '.sidebar-menu-title', function(){
      var $menu = $(this).parent();
      $menu.toggleClass('unfold');
    }).on('click', '.sidebar-nav:not(.disabled)', function(){
      if($(this).attr("data-page")=="manager_obj_manage"){
        if(localStorage.getItem("firstShow")==1){
          $(".manager_obj_helpMask").hide();
        }else{
          $(".manager_obj_helpMask").show();
        }
      }

      $('.sidebar-nav:not(.disabled)').not(this).removeClass("active");
      $(this).addClass('active');
      $(this).parents('.sidebar-menu').addClass('active').siblings().removeClass('active unfold');
      if($(this).parent().attr("data-data")=="goods"){
        $(this).find(".vip2").show();
        $(this).find(".vip1").hide();
        $(this).parent().find("li").not(this).find(".vip1").show();
        $(this).parent().find("li").not(this).find(".vip2").hide();
      }else{
        $(".vip2").hide();
        $(".vip1").show();
      }
      if (!$(this).attr('data-href')){ return; }
      var url = '/index.php?r=pc/AppMgr/manager'+'&_app_id='+appId+$(this).attr('data-href');

      // if(!$(this).parent().hasClass('sidebar-obj-ul')){
      //   $('.sidebar-nav.active').removeClass('active');
      //   $(this).addClass('active').closest('.sidebar-menu').addClass('unfold');
      // }
      if($(this).attr("data-page")=="manager_user_manage"||$(this).attr("data-page")=="manager_user_frommanual"){
        $(".userGroupContent,.userGroupClick").show();
      }else{
        $(".userGroupContent,.userGroupClick").hide();
      }
      page_href = GetQueryString('h', url);

      if($(this).attr('data-pjax')){
        // 鍟嗗搧鍒楄〃銆佽鍗曠鐞嗗鍔犻粯璁ょ被鍨�, 鏍规嵁鐢ㄦ埛璁剧疆杩涘叆榛樿椤甸潰
        if ($(this).attr('data-page') == 'manager_goods_manage') {
          var dataHref = '&h=';
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
                  dataHref += 'manager_goods_manage';
                  break;
                case 1:
                  dataHref += 'manager_booking_manage';
                  break;
                case 2:
                  dataHref += 'manager_takeout_manage';
                  break;
                case 3:
                  dataHref += 'manager_tostore_manage';
                  break;
                default:
                  dataHref += 'manager_goods_manage';
                  break;
              }
              url = '/index.php?r=pc/AppMgr/manager' + '&_app_id=' + appId + dataHref;
              PjaxRequest(url);
            }
          });
        } else if ($(this).attr('data-page') == 'manager_order_manage') {
          var dataHref = '&h=';
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
                  dataHref += 'manager_order_manage';
                  break;
                case 1:
                  dataHref += 'manager_order_booking_manage';
                  break;
                case 2:
                  dataHref += 'manager_order_waimai';
                  break;
                case 3:
                  dataHref += 'manager_order_tostore_manage';
                  break;
                case 4:
                  dataHref += 'manager_order_storedvalue_manage';
                  break;
                default:
                  dataHref += 'manager_order_manage';
                  break;
              }
              url = '/index.php?r=pc/AppMgr/manager' + '&_app_id=' + appId + dataHref;
              PjaxRequest(url);
            }
          });

        } else {
          PjaxRequest(url);
        }
      }
      if($(".fixedDIV").width()!=0){
           $(".fixedDIV").animate({
            width: '0'
          }, "100");
      }
    }).on('click', '.sidebar-menu', function(){
      if (!($(this).hasClass('slider-menu-div'))) {
        return false;
      }
      $(this).addClass('active').siblings().removeClass('active');
    });

    /**
     * 鍙充晶鍐呭鍖虹偣鍑讳簨浠�
     */
    $('#content').on('click', '.field-upload-img', function(){
      // 鎵撳紑涓婁紶鍥剧墖绠＄悊
        showImgResourceBox($(this).siblings('.thumbnail').find('img'));
    });
    $('#content').on('click', '.field-upload-video', function(){
      // 鎵撳紑涓婁紶瑙嗛绠＄悊
        showVideoResourceBox($(this).siblings('.thumbnail').find('img'));
    });
  }

  //鍘熸湰鍦╩anager.html鐨勭粦瀹氫簨浠�
  function bindEventsNew(){
    $(".userGroupContent,.userGroupClick").hide();
    /*------------------鐐瑰嚮鎻愮ず妗嗙殑纭畾鎸夐挳 start -----------------------*/
    $(".sureTip").click(function() {
      var type = $(this).attr("type");
      if (type == 1) {
        deleTags_WebApp_Manual(appId, $(this).attr("tags-id"));
      } else if (type == 2) {
        if (window.location.search.search(".h=manager_user_manage") != -1) {
          $("#tagsidsindetail_webapp" + $(this).attr("tags-id")).remove();
          var user_ids = [];
          user_ids.push($("#editTable").attr("data-id"));
          delTagsIndetail(appId, user_ids, getlabeltdSpanCountArr(), userInfoEdit_fromWebApp, clicktagsQueryUser_fromWebApp);
        } else {
          $("#tagsidsindetail_manual" + $(this).attr("tags-id")).remove();
          var user_ids = [];
          user_ids.push($("#editTable").attr("data-id"));
          delTagsIndetail(appId, user_ids, getlabeltdSpanCountArr(), userInfoEdit_fromManual, clicktagsQueryUser_fromManual);
        }
      } else if (type == 3) {
        var app_user_ids = [];
        app_user_ids.push($(this).attr("del-id"));
        deleteUser(appId, app_user_ids);
      } else if (type == 4) {
        var app_user_ids = $(this).attr("user-id").split(",");
        deleteUser(appId, app_user_ids)
      }
    });

    //鎵嬪姩娣诲姞鐢ㄦ埛淇濆瓨鍒板垎缁�
    $(".addUserToGroupManual").click(function() {
      var app_user_group_id;
      $(".groupList_editgroup span").each(function(index, ele) {
        if ($(ele).hasClass("updateUG-true")) {
          app_user_group_id = $(ele).attr("data-id");
          return;
        }
      });
      saveCUserIntoCGroup_fromManual(app_user_group_id);
    });
    //鎵嬪姩娣诲姞鐢ㄦ埛淇濆瓨鍒板垎缁�
    $(".addUserToGroupWebApp").click(function() {
      var app_user_group_id;
      $(".groupList_editgroup span").each(function(index, ele) {
        if ($(ele).hasClass("updateUG-true")) {
          app_user_group_id = $(ele).attr("data-id");
          return;
        }
      });
      saveCUserIntoCGroup_fromWebApp(app_user_group_id);
    });
    //鑷畾涔夋彁绀烘ā鎬佹鐨勪簨浠�
    $(".mask_tip").click(function(e) {
      var target = $(e.target);
      if (target.is(".cancleTip") || target.is(".mask_tip")) {
        $(this).hide();
      } else if (target.is(".mask_tip_content")) {
        return;
      }
    });
    //鏂板缓鐢ㄦ埛鏃惰鐢ㄦ埛娣诲姞鍒嗙粍鐨勭‘瀹氭寜閽�
    $(".sureaddNewUserToGroup").click(function() {
      var tempGroupStr = "";
      var tempgroupFlag = false;
      $(".groupList_editgroup span").each(function(index, ele) {
        if ($(ele).hasClass("updateUG-true")) {
          tempGroupStr += "<span data-id=" + $(ele).attr("data-id") + ">" + $(ele).text() + "</span>";
          tempgroupFlag = true;
        }
      });
      if (tempGroupStr != "") {
        if (tempgroupFlag) {
          $(".cliclChooseGroup").prevAll("span").remove();
          $(tempGroupStr).insertBefore(".cliclChooseGroup");
        }
        $(".groupList_editgroup span").removeClass("updateUG-true").addClass("updateUG-false");
        $(".mask_editgroup").hide();
        $(".sureUpdateGroup").show();
        $(".sureaddNewUserToGroup").hide();
        $(".cancleaddNewUserToGroup").hide();
        $(".cancleUpdateGroup").show();
      } else {
        alertToolsTip("璇烽€夋嫨鍒嗙粍!");
      }
    });
    //宸︿晶鍒犻櫎鍒嗙粍鏃剁殑鎻愮ず妯℃€佹
    $(".mask_delGroup").click(function(e) {
      var $e = $(e.target);
      if ($e.is(".cancleDelGroup")) {
        $(this).hide();
      } else {
        return;
      }
    });
    //宸︿晶缂栬緫鍒嗙粍鏃剁殑鎻愮ず妯℃€佹
    $(".mask_editNewGroupName").click(function(e) {
      var $e = $(e.target);
      if ($e.is(".cancleEditNewNameGroup")) {
        $(this).hide();
      } else {
        return;
      }
    });

    // 涓汉璇︾粏淇℃伅涓垎缁勭紪杈戞寜閽殑妯℃€佹
    $(".mask_editgroup").click(function(e) {
      var $e = $(e.target);
      if ($e.is(".cancleUpdateGroup") || $e.is(".cancleaddNewUserToGroup") || $e.is(".cancleUserToGroupManual ") || $e.is(".cancleUserToGroupWebApp")) {
        $(this).hide();
        $(".groupList_editgroup span").removeClass("updateUG-true").addClass("updateUG-false");
        $(".sureaddNewUserToGroup").hide();
        $(".cancleaddNewUserToGroup").hide();
        $(".sureUpdateGroup").show();
        $(".cancleUpdateGroup").show();
        $(".cancleUserToGroupManual").hide();
        $(".cancleUserToGroupWebApp").hide();
        $(".addUserToGroupWebApp").hide();
        $(".addUserToGroupManual").hide();
        $(".addNewGroup_editgroup").hide();
      } else {
        return;
      }
    });
    //淇敼鐢ㄦ埛鍒嗙粍鐨勫脊鍑烘鏃堕棿缁戝畾
    $(".mask_editgroup").on("click", ".saveToGroup_editgroup button", function() {
      $(".addNewGroup_editgroup").css("display", "block");
      $(".edituserGroup").css({
        "margin-top": "10px"
      });
      $(".addNewGroup_editgroup input").focus();
    }).on("click", ".groupList_editgroup span", function() {
      $(this).addClass("updateUG-true").removeClass("updateUG-false");
      $(".groupList_editgroup span").not(this).addClass("updateUG-false").removeClass("updateUG-true");
    }).on("click", ".cancleaddgroup", function() {
      $(".addNewGroup_editgroup").css("display", "none");
      $(".edituserGroup").css({
        "margin-top": "45px"
      });
    }).on("click", ".sureaddgroup", function() {
      //鐐瑰嚮纭畾澧炲姞鍒嗙粍鐨勬寜閽�
      var groupName = $(".addNewGroup_editgroup input").val().trim();
      if (groupName.length == 0) {
        alertToolsTip("鍒嗙粍鍚嶇О涓嶈兘涓虹┖!");
      } else if (groupName.length < 6) {
        InertAppUserGroup(groupName);
        $(this).parent().css("display", "none");
        $(".addNewGroup_editgroup input").val("");
      } else {
        alertToolsTip("鍒嗙粍鍚嶇О杩囬暱!");
      }
    });
    //纭畾淇敼鍒嗙粍鐨勫悕绉�
    $(".sureEditNewNameGroup").on('click', function() {
      var tempInput = $(".editNewGroupName_tip input");
      var groupid = tempInput.attr("edit-groupid");
      var groupname = tempInput.val();
      if (groupname.length == "") {
        alertToolsTip("鍒嗙粍鍚嶇О涓嶈兘涓虹┖!");
        return;
      } else if (groupname.length > 6) {
        alertToolsTip("鍒嗙粍鍚嶇О杩囬暱!");
        return;
      } else {
        $.ajax({
          url: '/index.php?r=pc/AppUser/UpdateAppUserGroup',
          type: 'get',
          data: {
            id: groupid,
            app_id: appId,
            group_name: groupname
          },
          dataType: 'json',
          success: function(data) {
            if (data.status == 0) {
              if (window.location.search.indexOf("h=manager_user_manage") != -1) {
                initAppUserGroupList_fromWebApp();
              } else {
                initAppUserGroupList_fromManual();
              }
              tempInput.val("");
              $(".mask_editNewGroupName").hide();
              $(".cancleGroupeditbtn").hide();
              $(".groupeditbtn").show();
              alertToolsTip("淇敼鎴愬姛!");
            }
          }
        });
      }
    });
    //鏄惁纭畾鍒犻櫎鍒嗙粍鐨勬ā鎬佹
    $(".sureDelGroup").click(function() {
      var delgid = $(".delGroup_tip span:last-child").attr("group_id");
      //鍙戦€佸垹闄ゅ垎缁勮姹�
      $.ajax({
        url: '/index.php?r=pc/AppUser/DeleteAppUserGroup',
        type: 'get',
        data: {
          id: delgid,
          app_id: appId
        },
        dataType: 'json',
        success: function(data) {
          if (data.status == 0) {
            $(".mask_delGroup").hide();
            $("#group_name" + delgid).remove();
            $("#userDetailGroupid" + delgid).remove();
            alertToolsTip("鍒犻櫎鎴愬姛!");
          } else {
            alertToolsTip("鍒犻櫎澶辫触!");
          }
        }
      });
    });
    $("body").on('click', ".userGroupClick", function() {
      if ($(".userGroupContent").width() != 0) {
        $(".userGroupContent").removeClass("openup-content").addClass("packup-content");
        $(this).removeClass("openup-slider").addClass("packup-slider");
        $(this).find("span").addClass("rightTrangle").removeClass("leftTrangle");
        if (window.location.search.search("h=manager_user_frommanual") != -1) {
          $("#bbtt").find("span").eq(1).text("鏌ョ湅鍒嗙粍");
        } else {
          $("#bbtt_fromWebApp").find("span").eq(1).text("鏌ョ湅鍒嗙粍");
        }
      } else {
        $(".userGroupContent").addClass("openup-content").removeClass("packup-content");
        $(this).addClass("openup-slider").removeClass("packup-slider");
        $(this).find("span").addClass("leftTrangle").removeClass("rightTrangle");
        if (window.location.search.search("h=manager_user_frommanual") != -1) {
          $("#bbtt").find("span").eq(1).text("鏀惰捣鍒嗙粍");
        } else {
          $("#bbtt_fromWebApp").find("span").eq(1).text("鏀惰捣鍒嗙粍");
        }
      }
    });
    $(".addnewGroupDIV").click(function() {
      $(this).hide();
      $("#addnewGroupinput").show();
    });
    //鍙栨秷鏂板缓鍒嗙粍
    $(".glyphicon-remove-2").click(function() {
      $("#addnewGroupinput").hide();
      $(".addnewGroupDIV").show();
    });
    //纭畾鏂板缓鍒嗙粍
    $(".glyphicon-ok-2").click(function() {
      var groupname = $('input[name="addnewGroupName"]').val();
      var allGroup_col_img = $(".all-nogroup-user .col-md-4 img");
      var inputAllGroup_img = $(".all-nogroup-user .col-md-2 img");
      if (groupname && groupname.length < 6) {
        InertAppUserGroup(groupname);
        $("#addnewGroupinput").hide();
        $(".addnewGroupDIV").show();
        $('input[name="addnewGroupName"]').val("");
        if (allGroup_col_img.length > 0 &&
          allGroup_col_img.eq(0).css("display") == "block") {
          inputAllGroup_img.show();
          allGroup_col_img.show();
        } else {
          inputAllGroup_img.hide();
          allGroup_col_img.hide();
        }
      } else {
        alertToolsTip("鍒嗙粍鍚嶇О涓嶈兘涓虹┖涓斾笉瓒呰繃鍏釜瀛楃!");
      }
    });
    //缂栬緫鍒嗙粍鎸夐挳缁戝畾浜嬩欢
    $(".groupeditbtn").click(function() {
      $(".all-nogroup-user .col-md-2 img").show();
      $(".all-nogroup-user .col-md-4 img").show();
      $(".cancleGroupeditbtn").css({
        "display": "block"
      });
      $(this).hide();
    });
    //鍙栨秷缂栬緫鍒嗙粍鎸夐挳鐨勭偣鍑讳簨浠�
    $(".cancleGroupeditbtn").click(function() {
      $(".all-nogroup-user .col-md-2 img").hide();
      $(".all-nogroup-user .col-md-4 img").hide();
      $(".groupeditbtn").show();
      $(this).hide();
    });
    $(".fixedDIV").on("click", ".backup-detailmsg", function() {
      //鏀惰捣璇︾粏淇℃伅
      $(".fixedDIV").animate({
        width: '-72%'
      }, "100");
      contentTimeLineScrollWy = 1;
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").removeClass("nopage_all");
      $(".user-add-note-input-button").css({
        "visibility": "visible"
      });
    }).on("click", ".user-add-note-input-button button", function() {
      //娣诲姞绗旇鐨勭‘瀹氭寜閽�
      var user_token = $(".contentTimeLine").attr("user_token");
      var content = $(".user-add-note-input-button input").val();
      if (content == "") {
        alertToolsTip("璇疯緭鍏ョ瑪璁板唴瀹�!");
      } else {
        $(this).attr("disabled", "disabled");
        $.ajax({
          url: "/index.php?r=pc/WebAppMgr/AddNote",
          type: "GET",
          data: {
            app_id: appId,
            reciver_token: user_token,
            content: content
          },
          dataType: "json",
          success: function(data) {
            if (data.status == 0) {
              $(".user-add-note-input-button button").removeAttr("disabled");
              $(".user-add-note-input-button input").val("");
              $(".contentTimeLine ul").html("");
              $(".contentTimeLine").scrollTop(0);
              //鏌ヨ鍏ㄩ儴
              contentTimeLineScroll = 1;
              searchAll = true;
              //鏌ヨ绗旇
              contentTimeLineScrollNote = 1;
              searchNote = false;
              //鏌ヨ鏃ュ織
              contentTimeLineScrollLog = 1;
              searchLog = false;
              //鏌ヨ鐭俊
              contentTimeLineScrollMsg = 1;
              searchMsg = false;
              //鏌ヨ寰〉
              contentTimeLineScrollWy = 1;
              searchWeiye = false;
              $(".contentTimeLine").removeClass("nopage_all");
              getOperationLog(contentTimeLineScroll, 10, user_token, 2);
              alertToolsTip("娣诲姞鎴愬姛!");
            } else {
              alertToolsTip(data.data);
            }
          }
        });
      }
    }).on("click", ".updateMsgType div:eq(0)", function() {
      //鍏ㄩ儴
      var user_token = $(".contentTimeLine").attr("user_token");
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").scrollTop(0);
      //鏌ヨ鍏ㄩ儴
      contentTimeLineScroll = 1;
      searchAll = true;
      //鏌ヨ绗旇
      contentTimeLineScrollNote = 1;
      searchNote = false;
      //鏌ヨ鏃ュ織
      contentTimeLineScrollLog = 1;
      searchLog = false;
      //鏌ヨ鐭俊
      contentTimeLineScrollMsg = 1;
      searchMsg = false;
      //鏌ヨ寰〉
      contentTimeLineScrollWy = 1;
      searchWeiye = false;
      $('.contentTimeLine').removeClass('nopage_all');
      getOperationLog(contentTimeLineScroll, 10, user_token, 2);
    }).on("click", ".updateMsgType div:eq(1),.updateMsgType div:eq(2)", function() {
      //绗旇
      var user_token = $(".contentTimeLine").attr("user_token");
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").scrollTop(0);
      //鏌ヨ鍏ㄩ儴
      contentTimeLineScroll = 1;
      searchAll = false;
      //鏌ヨ绗旇
      contentTimeLineScrollNote = 1;
      searchNote = true;
      //鏌ヨ鏃ュ織
      contentTimeLineScrollLog = 1;
      searchLog = false;
      //鏌ヨ鐭俊
      contentTimeLineScrollMsg = 1;
      searchMsg = false;
      //鏌ヨ寰〉
      contentTimeLineScrollWy = 1;
      searchWeiye = false;
      $('.contentTimeLine').removeClass('nopage_note');
      getOperationLog(contentTimeLineScrollNote, 10, user_token, 1);
    }).on("click", ".updateMsgType div:eq(3),.updateMsgType div:eq(4)", function() {
      //鏃ュ織
      var user_token = $(".contentTimeLine").attr("user_token");
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").scrollTop(0);
      //鏌ヨ鍏ㄩ儴
      contentTimeLineScroll = 1;
      searchAll = false;
      //鏌ヨ绗旇
      contentTimeLineScrollNote = 1;
      searchNote = false;
      //鏌ヨ鏃ュ織
      contentTimeLineScrollLog = 1;
      searchLog = true;
      //鏌ヨ鐭俊
      contentTimeLineScrollMsg = 1;
      searchMsg = false;
      //鏌ヨ寰〉
      contentTimeLineScrollWy = 1;
      searchWeiye = false;
      $('.contentTimeLine').removeClass('nopage_log');
      getOnlyLog(contentTimeLineScrollLog, 10, user_token, 2);
    }).on("click", ".updateMsgType div:eq(5),.updateMsgType div:eq(6)", function() {
      //鐭俊
      var user_token = $(".contentTimeLine").attr("user_token");
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").scrollTop(0);
      //鏌ヨ鍏ㄩ儴
      contentTimeLineScroll = 1;
      searchAll = false;
      //鏌ヨ绗旇
      contentTimeLineScrollNote = 1;
      searchNote = false;
      //鏌ヨ鏃ュ織
      contentTimeLineScrollLog = 1;
      searchLog = false;
      //鏌ヨ鐭俊
      contentTimeLineScrollMsg = 1;
      searchMsg = true;
      //鏌ヨ寰〉
      contentTimeLineScrollWy = 1;
      searchWeiye = false;
      $('.contentTimeLine').removeClass('nopage_message');
      getOperationLog(contentTimeLineScrollMsg, 10, user_token, 3);
    }).on("click", ".updateMsgType div:eq(7),.updateMsgType div:eq(8)", function() {
      //寰〉
      var user_token = $(".contentTimeLine").attr("user_token");
      $(".contentTimeLine ul").html("");
      $(".contentTimeLine").scrollTop(0);
      //鏌ヨ鍏ㄩ儴
      contentTimeLineScroll = 1;
      searchAll = false;
      //鏌ヨ绗旇
      contentTimeLineScrollNote = 1;
      searchNote = false;
      //鏌ヨ鏃ュ織
      contentTimeLineScrollLog = 1;
      searchLog = false;
      //鏌ヨ鐭俊
      contentTimeLineScrollMsg = 1;
      searchMsg = false;
      //鏌ヨ寰〉
      contentTimeLineScrollWy = 1;
      searchWeiye = true;
      $('.contentTimeLine').removeClass('nopage_weiye');
      getOperationLog(contentTimeLineScrollWy, 10, user_token, 4);
    }).on("click", ".backup-addNewUser", function() {
      //娣诲姞鐢ㄦ埛鐨勬敹璧锋寜閽�
      $(".rightdetailInfo table:first").show();
      $(".leftdetailInfo table:first").show();
      $(".rightdetailInfo table:last").hide();
      $(".leftdetailInfo table:last").hide();
      $(".fixedDIV").animate({
        width: "0"
      }, 100);
      $(".add-user-infomation-sssc").hide();
      $(".add-user-name-info").hide();
      $(".user-infomation-sssc").show();
      $(".user-name-info").show();
      $(".addNewUserSave").hide();
      $(".addNewUserCancle").hide();
      $(".details-edit").show();
      $(".details-delete").show();
      $(this).hide();
      $(".backup-detailmsg").show();
      $(".add-user-name-info input").val("");
      $(".leftAddNewUser input").val("");
      $(".cliclChooseGroup_td span").remove();
      $(".clickChhoseTags_td span").remove();
      $(".rightAddnewUser textarea").val("");
    }).on("click", ".addNewUserCancle", function() {
      //娣诲姞鐢ㄦ埛鐨勫彇娑堟寜閽�
      $(".rightdetailInfo table:first").show();
      $(".leftdetailInfo table:first").show();
      $(".rightdetailInfo table:last").hide();
      $(".leftdetailInfo table:last").hide();
      $(".fixedDIV").animate({
        width: "0"
      }, 100);
      $(".add-user-infomation-sssc").hide();
      $(".add-user-name-info").hide();
      $(".user-infomation-sssc").show();
      $(".user-name-info").show();
      $(".addNewUserSave").hide();
      $(".backup-addNewUser").hide();
      $(".details-edit").show();
      $(".details-delete").show();
      $(this).hide();
      $(".backup-detailmsg").show();
      $(".add-user-name-info input").val("");
      $(".leftAddNewUser input").val("");
      $(".cliclChooseGroup_td span").remove();
      $(".clickChhoseTags_td span").remove();
      $(".rightAddnewUser textarea").val("");
    }).on('click', ".details-edit-cancle button", function() {
      var tempInput = $("#editTable input");
      //璇︾粏淇℃伅涓偣鍑荤紪杈戞寜閽嚭鐜颁繚瀛樺拰鍙栨秷鎸夐挳 缁欎繚瀛樺拰鍙栨秷鎸夐挳娣诲姞鐐瑰嚮浜嬩欢
      tempInput.each(function(index, ele) {
        $(ele).val($(ele).attr("value"));
      });
      tempInput.not(".groupInput ,input[name='addNewLabelmsg']").removeClass("detailEditStatusInfo").addClass("detailNotEditStatusInfo").attr("readonly", "readonly");
      $(this).parent().hide();
      $(".details-edit").show();
      $(".details-edit-save").hide();
      $(".add-user-name-info").hide();
      $(".add-user-infomation-sssc").hide();
      $(".user-infomation-sssc").show();
      $(".user-name-info").show();
      $(".add-user-name-info input").val("");
      $(".add-user-infomation-sssc select").find("option[value='0']").attr("selected", true);
      $("#editTable textarea[name='remark']").removeClass("detailEditTextareaStatusInfo").addClass("detailNotEditTextareaStatusInfo").attr("readonly", "readonly").val($("#editTable textarea[name='remark']").attr("value"));
    }).on("click", ".details-edit", function() {
      //鐐瑰嚮璇︾粏淇℃伅涓殑缂栬緫鎸夐挳
      if(window.location.search.search("h=manager_user_frommanual")!=-1){
          $("#editTable input").not(".groupInput ,input[name='addNewLabelmsg']").removeClass("detailNotEditStatusInfo").addClass("detailEditStatusInfo").removeAttr("readonly");
          $(".add-user-name-info").show();
          $(".add-user-infomation-sssc").show();
          $(".user-infomation-sssc").hide();
          $(".user-name-info").hide();
          $(".add-user-name-info input").val($("#userNickName").text());
          var optV = $("#userSex").text() == "鐢�" ? 0 : 1;
          $(".add-user-infomation-sssc select").find("option[value='" + optV + "']").attr("selected", true);
      }else{
        $("#editTable input").not(".groupInput ,input[name='addNewLabelmsg']").removeClass("detailNotEditStatusInfo").addClass("detailEditStatusInfo").removeAttr("readonly");
      }
      $(this).hide();
      $(".details-edit-save").show();
      $(".details-edit-cancle").show();
      $("#editTable textarea[name='remark']").removeClass("detailNotEditTextareaStatusInfo").addClass("detailEditTextareaStatusInfo").removeAttr("readonly");
    }).on("click", ".details-edit-save button", function() {
      //璇︾粏淇℃伅涓偣鍑荤紪杈戞寜閽嚭鐜颁繚瀛樻坊鍔犵偣鍑讳簨浠�
      var phone = $("#editTable tr td input[name='phone']").val();
      var qq = $("#editTable tr td input[name='qq']").val();
      var email = $("#editTable tr td input[name='email']").val();
      var company = $("#editTable tr td input[name='company']").val();
      var nickname = $(".add-user-name-info input").val();
      var sex = $(".add-user-infomation-sssc select").find("option:selected").val();
      var uid = $("#editTable").attr("data-id");
      var remark=$("#editTable tr td textarea[name='remark']").val();
      if(email){
          if(!emailReg.test(email)){
            alertToolsTip("閭鏍煎紡鏈夎!");
            return;
          }
      }
      var paramter;
      if(window.location.search.indexOf("h=manager_user_manage") != -1){
        var weixin_code=$("#editTable tr td input[name='weixin_code']").val();
          paramter={
              app_id: appId,
              user_id: uid,
              phone: phone,
              qq: qq,
              email: email,
              weixin_code: weixin_code,
              remark:remark
            }
             if(phone != null && phone != "" && phone != undefined) {
                 if (!phoneReg.test(phone)) {
                    alertToolsTip("鎵嬫満鍙风爜鏍煎紡閿欒!");
                    return;
                 }
            }
      }else{
        paramter={
              app_id: appId,
              user_id: uid,
              phone: phone,
              nickname: nickname,
              qq: qq,
              email: email,
              company: company,
              sex: sex,
              remark:remark
            }
            if(phone == null || phone == "" || phone == undefined) {
                   alertToolsTip("鎵嬫満鍙风爜涓嶈兘涓虹┖!");
                   return;
            }else{
                 if (!phoneReg.test(phone)) {
                    alertToolsTip("鎵嬫満鍙风爜鏍煎紡閿欒!");
                    return;
                 }
            }
      }

          $.ajax({
            url: "/index.php?r=pc/AppUser/UpdateCustomer",
            type: "POST",
            data: paramter,
            dataType: "json",
            success: function(data) {
              if (data.status == 0) {
                alertToolsTip("缂栬緫鎴愬姛!");
                if (window.location.search.indexOf("h=manager_user_manage") != -1) {
                  userInfoEdit_fromWebApp(uid);
                  clicktagsQueryUser_fromWebApp();
                } else {
                  userInfoEdit_fromManual(uid);
                  clicktagsQueryUser_fromManual();
                }
                $(".details-edit-save").hide();
                $(".details-edit-cancle").hide();
                $(".details-edit").show();
                $(".add-user-name-info").hide();
                $(".add-user-infomation-sssc").hide();
                $(".user-infomation-sssc").show();
                $(".user-name-info").show();
                $(".add-user-name-info input").val("");
                $(".add-user-infomation-sssc select").find("option[value='0']").attr("selected", true);
              } else {
                alertToolsTip("鏇存柊淇℃伅鍑洪敊!");
              }
            }
          });
    }).on("click", ".addNewUserSave button", function() {
      /*----------------------------------------------鏂板缓鐢ㄦ埛  start--------------------------------*/
      var $nickname = $(".add-user-name-info input").val();
      var $sex = $("#userSexSeclected option:selected").val();
      var $phone = $(".leftAddNewUser input[name='phone']").val();
      var $company = $(".leftAddNewUser input[name='company']").val();
      var $remark = $(".rightAddnewUser textarea[name='remark']").val();
      var $group = $(".rightAddnewUser input[name='newuserGroup']").val();
      var $email = $(".leftAddNewUser input[name='email']").val();
      var $contact_status = $(".leftAddNewUser input[name='contact-status']").val();
      var $qq = $(".leftAddNewUser input[name='qq']").val();
      var $weixin_id = $(".leftAddNewUser input[name='weixin_code']").val();
      var $groupid = $(".cliclChooseGroup_td span").attr("data-id");
      var $tags_ids = [];
      $(".clickChhoseTags_td span").each(function(index, ele) {
        $tags_ids.push($(ele).attr("data-id"));
      });
      if ($nickname == "") {
        alertToolsTip("鐢ㄦ埛濮撳悕涓嶈兘涓虹┖!");
        return;
      } else if ($nickname.length > 6) {
        alertToolsTip("鐢ㄦ埛濮撳悕涓嶈兘瓒呰繃鍏釜瀛楃!");
        return;
      }
      if ($phone != null && $phone != "" && $phone != undefined && phoneReg.test($phone)) {
        $(this).attr("disabled", "disabled");
        $.ajax({
          url: "/index.php?r=pc/AppUser/InsertCustomer",
          type: "GET",
          data: {
            app_id: appId,
            phone: $phone,
            nickname: $nickname,
            qq: $qq,
            email: $email,
            sex: $sex,
            weixin_code: $weixin_id,
            remark: $remark,
            company: $company,
            contact_status: $contact_status,
            app_user_group_id: $groupid || '0',
            tag_ids: $tags_ids,
            type:0
          },
          dataType: "json",
          success: function(data) {
            if (data.status == 0) {
              $(".add-user-name-info input").val("");
              $(".leftAddNewUser input").val("");
              $(".rightAddnewUser textarea").val("");
              $(".cliclChooseGroup_td span").remove();
              $(".clickChhoseTags_td span").remove();
              $(".fixedDIV").animate({
                width: "0"
              }, 100);
              $(".addNewUserSave button").removeAttr("disabled");
              alertToolsTip("娣诲姞鎴愬姛!");
              clicktagsQueryUser_fromManual();
            } else {
              alertToolsTip(data.data);
            }
          }
        });
      } else {
        alertToolsTip("鎵嬫満鍙疯緭鍏ユ湁璇�!");
      }
    }).on("click", ".cliclChooseGroup", function() {
      //鏂板缓鐢ㄦ埛鐐瑰嚮娣诲姞鍒嗙粍
      $(".mask_editgroup").show();
      $(".sureUpdateGroup").hide();
      $(".sureaddNewUserToGroup").show();
      $(".cancleaddNewUserToGroup").show();
      $(".cancleUpdateGroup").hide();
      if ($(".cliclChooseGroup_td span").length) {
        $(".cliclChooseGroup_td span").each(function(index, ele) {
          var tempid = ".groupList_editgroup #userDetailGroupid" + $(ele).attr("data-id");
          $(tempid).addClass("updateUG-true");
        });
      }
    }).on("click", ".clickChhoseTags", function() {
      // 鏂板缓鐢ㄦ埛鏃剁偣鍑荤粰鐢ㄦ埛娣诲姞鏍囩
      $(".mask_fromManual_tags").show();
      $(".manage-tags-manual").hide();
      $(".manage-tags-sure-manual").hide();
      $(".manage-tags-calcle-manual").hide();
      $(".sureaddtagsBtn_fromManual").hide();
      $(".cancleaddtagsBtn_fromManual").hide();
      $(".sureaddtagsBtn_newUser").show();
      $(".cancleaddtagsBtn_newUser").show();
      $(".addtags_input_fromManual input").focus();
      if ($(".clickChhoseTags_td span").length) {
        $(".clickChhoseTags_td span").each(function(index, ele) {
          var tempid = ".tags_area_middle #tagsids_fromManual" + $(ele).attr("data-id");
          $(tempid).addClass("slef-label-click-color");
        });
      }
    });

    // 鍙充晶渚ц竟鏍忛珮绾х増鐢宠鐐瑰嚮浜嬩欢
  $(".advanced-label-btn").on('click',function(event){
    advancedApply();
  });

    //鏌ョ湅鎿嶄綔璁板綍鐨勬椂鍊欒繘琛屾粴鍔ㄥ姞杞�
    $(".contentTimeLine").scroll(function() {
      if ($(this).scrollTop() + $(this).height() > $(".contentTimeLine ul").height() + 10) {
        if (searchNote) {
          if ($('.contentTimeLine').hasClass('scrolling_note') || $('.contentTimeLine').hasClass('nopage_note')) {
            return;
          }
          $('.contentTimeLine').addClass('scrolling_note');
          if ($('.contentTimeLine').hasClass('requesting_note')) {
            return;
          };
          getOperationLog(contentTimeLineScrollNote, 10, $(".contentTimeLine").attr("user_token"), 1);
        } else if (searchLog) {
          if ($('.contentTimeLine').hasClass('scrolling_log') || $('.contentTimeLine').hasClass('nopage_log')) {
            return;
          }
          $('.contentTimeLine').addClass('scrolling_log');
          if ($('.contentTimeLine').hasClass('requesting_log')) {
            return;
          };
          getOnlyLog(contentTimeLineScrollLog, 10, $(".contentTimeLine").attr("user_token"), 2);
        } else if (searchMsg) {
          if ($('.contentTimeLine').hasClass('scrolling_message') || $('.contentTimeLine').hasClass('nopage_message')) {
            return;
          }
          $('.contentTimeLine').addClass('scrolling_message');
          if ($('.contentTimeLine').hasClass('requesting_message')) {
            return;
          };
          getOperationLog(contentTimeLineScrollMsg, 10, $(".contentTimeLine").attr("user_token"), 3);
        } else if (searchWeiye) {
          if ($('.contentTimeLine').hasClass('scrolling_weiye') || $('.contentTimeLine').hasClass('nopage_weiye')) {
            return;
          }
          $('.contentTimeLine').addClass('scrolling_weiye');
          if ($('.contentTimeLine').hasClass('requesting_weiye')) {
            return;
          };
          getOperationLog(contentTimeLineScrollWy, 10, $(".contentTimeLine").attr("user_token"), 4);
        } else if (searchAll) {
          if ($('.contentTimeLine').hasClass('scrolling_all') || $('.contentTimeLine').hasClass('nopage_all')) {
            return;
          }
          $('.contentTimeLine').addClass('scrolling_all');
          if ($('.contentTimeLine').hasClass('requesting_all')) {
            return;
          };
          getOperationLog(contentTimeLineScroll, 10, $(".contentTimeLine").attr("user_token"), 2);
        }
      }
    });
    /* 璁剧疆 寮圭獥 */
    $(".mask_app_setting").on("click", ".close-btn, .cancel-btn", function(){
      $(".mask_app_setting").hide();
    }).on("click", ".save-btn", function(){
      var $btn = $('.set-modal-btn .save-btn'),
          name = $('.publish-title-input').val().trim(),
          description = $('.publish-desc-input').val().trim(),
          logo = $('.set-app-logo').attr('src'),
          cover = $('.set-app-cover').attr('src');

      if($btn.hasClass('js-requesting')){
        return;
      }
      if(!name){
        alertTip('璇疯緭鍏ュ簲鐢ㄥ悕');
        $('.publish-title-input').focus();
        return;
      }
      // if(!description){
      //   alertTip('璇疯緭鍏ュ簲鐢ㄦ弿杩�');
      //   $('.publish-desc-input').focus();
      //   return;
      // };

      var param = {
        app_id: appId,
        app_name : name,
        description: description,
        logo : logo,
        cover: cover,
      };

      $btn.addClass('js-requesting');
      $.ajax({
        url: '/index.php?r=pc/AppData/add',
        type: 'post',
        data: param,
        dataType: 'json',
        success: function(data){
          if (data.status !== 0) { alertTip(data.data); return; }
          alertTip('淇濆瓨鎴愬姛', 1000);
          $btn.removeClass('js-requesting');
          $btn = null;
          $(".mask_app_setting").hide();
        },
        error: function(data){
          $btn.removeClass('js-requesting');
          $btn = null;
        }
      });
    }).on("click", ".change-cover-wrap", function(){
      showImgResourceBox($('.set-app-cover'));
    }).on("click", ".change-logo-wrap", function(){
      showImgResourceBox($('.set-app-logo'));
    });
  }
});
function advancedApply(){
  $("#advanced-container").show();
  $('#tipModal').modal('hide');
}

function PjaxRequest(url){
  $.pjax({url: url, container: '#content', timeout: 30000});
}

// 鑾峰彇鍒涘缓鐨刟pp
function getApp(){
  $.ajax({
    url: '/index.php?r=pc/AppData/MyList',
    type: 'get',
    data: {
      'page': -1
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var html = '';
      $.each(data.data, function(index, app){
        html += '<option value='+app.app_id+'>'+app.app_name+'</option>';
        if(app.app_id === appId){
          $('.app-cover').attr('src', is_domain ? (app.cover == 'http://cdn.jisuapp.cn/zhichi_frontend/static/webapp/images/share_feng.jpg' ? $('body').attr('logo') : app.cover) : app.cover).data('copy-para', {
            app_name : app.app_name,
            description: app.description,
            logo : app.logo,
            cover: app.cover,
            f_app_id : app.app_id
          }).siblings('span').text(app.app_name);
        }
      });
      $('.app-switch').html(html).val(appId);
    }
  })
}

// 鑾峰彇app鍐呭叧鑱旂殑鏁版嵁瀵硅薄
function getAppObj(appId){

  $.ajax({
    url: '/index.php?r=pc/WebAppMgr/formlist',
    type: 'get',
    data: {
      app_id: appId
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      var html = document.createDocumentFragment(),
          $li;
      data.data && $.each(data.data, function(index, obj){
        // if(index == 'goods'){
        //  // $('.collapse-content > ul').append('<li class="sidebar-nav sidebar-menu" data-pjax=1 obj-component='+obj.form+' data-page="manager_goods_manage" data-href="&h=manager_goods_manage"><div class="sidebar-menu-title">鍟嗗搧绠＄悊</div></li><li class="sidebar-nav sidebar-menu" data-pjax="1" data-page="manager_payment" data-href="&h=manager_payment"><div class="sidebar-menu-title">鏀粯鏂瑰紡</div></li><li class="sidebar-nav sidebar-menu" data-pjax="1" data-page="manager_order_manage" data-href="&h=manager_order_manage"><div class="sidebar-menu-title">璁㈠崟绠＄悊</div></li>');
        // } else {
          $li = $('<li class="sidebar-nav sidebar-sub-menu" data-pjax=1 obj-component='+obj.form+' data-page="manager_obj" data-href="&h=manager_obj&o='+obj.form+'">'+obj.name+'</li>').data('field',obj.field_arr);
          $(html).append($li);
        // }
      });
      $('.sidebar-obj-ul').append(html);
      if(component = GetQueryString('o')){
        $('.sidebar-nav[obj-component="'+component+'"]').trigger('click');
      }
    }
  });
}

function ifAuthorized(){
  $.ajax({
    url: '/index.php?r=pc/AppWxMgr/GetWxInfo',
    type: 'get',
    data: {
        app_id: appId,
        type:1
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      authorized  = data.data ? true : false;
      if (authorized) {
        $('.sidebar-nav[data-page="manager_authorize"]').data('gzh-data',data.data)
        $('.sidebar-gzh-ul .sidebar-nav.disabled').removeClass('disabled');
      }
      if(!GetQueryString('o')){
        page_href ? PjaxRequest(window.location.href) : $('.sidebar-nav').eq(0).trigger('click');
        // page_href ? $('.sidebar-nav[data-page='+page_href+']').trigger('click')
        //           : $('.sidebar-nav').eq(0).trigger('click');
      }
    }
  });
}

function GetQueryString(name, string){
  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
  var r = (string || window.location.search.substr(1)).match(reg);
  if(r!=null){
    return  unescape(r[2]);
  }
  return '';
}

// 寮瑰嚭(鍥剧墖)璧勬簮妗�
function openResourceBox(type) {
  var list;
  $('#webapp-img-box').attr('resource-type', type);
  $('#webapp-img-box [data-role="'+type+'"]').removeClass('box-hide').siblings('.box-hide').addClass('box-hide');
  $('#webapp-img-box, #webapp-img-bg').addClass('animate-show').removeClass('animate-hide');
  $('.resource-list .selected').removeClass('selected');
  if (!(list = $('#webapp-img-box .webapp-box-header-ul:visible li')).find('.active').length){
    list.eq(0).trigger('click');
  }
}
// 鑾峰彇璧勬簮妗嗗唴瀹�
function getResource(type, $clickTab, $ul){
  var page = $clickTab.attr('data-page'),
      para = {
        tag_id: $clickTab.attr('data-id')
        ,page: page
        ,page_size: 20
        ,user: 1
      },
      url;

  if (type === 'audio') {
    url = '/index.php?r=pc/UserTag/getMusicList';
  } else if (type === 'image') {
    url = '/index.php?r=pc/UserTag/getImgList';
  }

  $.ajax({
    url: url,
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
              + '</span><div class="audio-play-pause"><i class="resource-audio-play">鎾斁 </i><i class="resource-audio-pause">'
              + '鏆傚仠</i></div><div class="resource-remove"><span>脳</span><div></li>';

        } else if (type === 'image') {
          html += '<li data-id="'+item.id+'" data-src="'+item.img_original+'">'
              + '<a href="javascript:;" title="" class="thumbnail"><img src="'
              + item.img_original +'"></a>'
              // + '<h5 class="img-title">'+item.name+'</h5>'
              + '<div class="menu">'
              + '<a href="javascript:;" title="绉诲姩鍒板叾浠栧垎缁�" data-role="move"><span class="glyphicon glyphicon-move"></span></a>'
              + '<a href="javascript:;" title="瑁佸壀灏哄" data-role="truncate"><span class="glyphicon glyphicon-edit"></span></a>'
              + '<a href="javascript:;" title="鍒犻櫎" data-role="delete"><span class="glyphicon glyphicon-trash"></span></a></div></li>';
        }
      });
      page == 1 ? $ul.html(html) : $ul.append(html);
      $clickTab.attr('data-page', ++page);
    }
  });
}

function alertTip(html, time) {
  $('#tipModal .modal-title').text('提示');
  $('#tipModal .modal-body').html(html);
  $('#tipModal').modal();
  time && setTimeout(function(){
    $('#tipModal').modal('hide');
  }, time);
}
/**
 * 纭妗�
 * @param  {object}   option          {content:鎻愮ず鍐呭, confirmText:纭鎸夐挳鏂囧瓧,
 *                                     cancelText:鍙栨秷鎸夐挳鏂囧瓧}
 * @param  {function} confirmCallback 纭鍥炶皟鍑芥暟
 * @param  {function} cancelCallback  鍙栨秷鍥炶皟鍑芥暟
 *
 */
function confirmTip(option, confirmCallback, cancelCallback){
  $('#confirmModal .modal-body').html(option.content);

  $('.confirm-modal-confirm').off('click').on('click', function(event){
    $('#confirmModal').modal('hide');
    $.isFunction(confirmCallback) && confirmCallback();
    event.stopPropagation(); 
  }).text(option.confirmText || '确定');

  $('.confirm-modal-cancel').off('click').on('click', function(event){
    $('#confirmModal').modal('hide');
    $.isFunction(cancelCallback) && cancelCallback();
    event.stopPropagation(); 
  }).text(option.cancelText || '取消');

  $('#confirmModal').off('click').on('click', function(event){
    $('#confirmModal').modal('hide');
    $.isFunction(cancelCallback) && cancelCallback();
    event.stopPropagation(); 
  }).modal();
}
// function alertSuccess(html){
//   $('#tipSuccess').html(html).show();
// }
// function alertInfo(html){
//   $('#tipInfo').html(html).show();
// }
// function alertWarning(html){
//   $('#tipWarning').html(html).show();
// }
// function alertDanger(html){
//   $('#tipDanger').html(html).show();
// }

/*--------------------------------------------鎻愮ず妯℃€佹-----------------------*/
  (function($){
    // 鎻愮ず妗嗙粍浠� author: anle
    $.tooltip = function(ops){
        var ops = $.extend({
                html    : '',
                delay   : 2000,
                callback: null
            }, ops);
        var obj = null,
            text= ops.html,
            html= '<div id="tool_tip" style="position:fixed; max-width:300px; z-index:9999999; top:0;'
                + ' left:0; opacity:1; padding:40px 60px; background:rgba(0,0,0,0.7);'
                + 'color:#fff; border-radius:8px; text-align:center; font-size:18px; font-weight:bold">'
                + text +'</div>';

        $('#tool_tip').remove();
        obj = $(html).appendTo('body');
        obj.css({'-webkit-transform': 'translate(-50%, -50%)', transform : 'translate(-50%, -50%)',
                 left:'50%', top:'50%'});

        setTimeout(function(){
            obj.animate({
                opacity : 0
            }, 500, 'linear', function(){
                obj.remove();
                $.isFunction(ops.callback) && ops.callback();
            });
        }, ops.delay);
    };
    var defaultSettings = {
      width            : 300,
      height           : 'auto',
      minHeight        : 150,
      title            : '',
      shadow           : true,
      close            : null,
      btnText          : '纭畾',
      submit           : null
    };
    $.fn.zDialog = function(options) {
      return this.each(function() {
        var _dialog = $(this).find('.zhichi-content'),
            settings = $.extend({}, defaultSettings, options),
            marginLeft = -settings.width/2,
            marginTop = -settings.height/2,
            titleObject = $('<header class="zhichi-title"><span class="zhichi-title-content">'+settings.title+'</span></header>'),
            closeObject = $('<span class="zhichi-close"></span>');

        (!settings.shadow) && _dialog.parent().css('background-color','transparent');

        _dialog.css({
          'width'      : settings.width,
          'height'     : settings.height,
          'min-height' : settings.minHeight,
          'margin-left': marginLeft,
          'margin-top' : marginTop
        });

        closeObject.appendTo(titleObject);
        titleObject.prependTo(_dialog);
        if( $.isFunction(settings.submit) ){
          $('<span class="zhichi-submit-btn">'+settings.btnText+'</span>').appendTo(_dialog).click(function(event) {
            settings.submit();
          });
        }
        closeObject.click(function(event) {
          $.isFunction(settings.close) && settings.close();
          _dialog.parent().hide('slow');
        });
      });
    }
  })(jQuery);
//寮归粯璁ゆ彁绀烘
function alertToolsTip(html, callback, delay) {
    $.tooltip({
        'html'    : html || '',
        'delay'   : $.isNumeric(callback) ? callback : (delay ? delay : 1500),
        'callback': $.isFunction(callback) ? callback : null
    });
}

// 灏佽ajax璇锋眰
function $ajax(url, type, data, dataType, success, error) {
    showLoading();
    $.ajax({
        url: url,
        type: type || 'get',
        data: data || {},
        timeout: 30000,
        dataType: dataType || 'json',
        success: function(data) {
            removeLoading();
            $.isFunction(success) && success(data);
        },
        error: function(jqXHR, textStatus) {
            removeLoading();
            if (textStatus === 'timeout') {
                alertToolsTip('缃戠粶瓒呮椂');
            } else {
                alertToolsTip('缃戠粶閿欒');
            }
            $.isFunction(error) && error(data);
        }
    });
}
// 灞曠ずloading
function showLoading(goal){
    var _goal = goal || $("body");
    var loading = '<div class="loading_spinner loading_logo" id="loading_logo"><div class="spinner-container container1">'
                + '<div class="circle1"></div><div class="circle2"></div>'
                + '<div class="circle3"></div><div class="circle4"></div></div>'
                + '<div class="spinner-container container2"><div class="circle1"></div>'
                + '<div class="circle2"></div><div class="circle3"></div>'
                + '<div class="circle4"></div></div><div class="spinner-container container3">'
                + '<div class="circle1"></div><div class="circle2"></div><div class="circle3"></div>'
                + '<div class="circle4"></div></div></div>';
    _goal.append(loading);
}
// 鐩存帴绉婚櫎loading
function removeLoading(){
    $('#loading_logo').length && $('#loading_logo').remove();
}

// 鍑芥暟 鍘熸湰鍦╤tml涓婄殑鏂囦欢
//娣诲姞鍒嗙粍
function InertAppUserGroup(groupName) {
  $.ajax({
    url: '/index.php?r=pc/AppUser/InsertAppUserGroup',
    type: 'get',
    data: {
      app_id: appId,
      group_name: groupName
    },
    dataType: 'json',
    success: function(data) {
      if (data.status == 0) {
        $(".cancleGroupeditbtn").hide();
        $(".groupeditbtn").show();
        if (window.location.search.indexOf("h=manager_user_manage") != -1) {
          initAppUserGroupList_fromWebApp("fromWebApp");
        } else {
          initAppUserGroupList_fromManual("fromManual");
        }
      } else {
        alertToolsTip(data.data);
      }
    }
  });
}
//鏍规嵁骞存湀鏃ヨ幏鍙栨槦鏈熷嚑
function getDayByYMD(date) {
  var arr = ["鍛ㄦ棩", "鍛ㄤ竴", "鍛ㄤ簩", "鍛ㄤ笁", "鍛ㄥ洓", "鍛ㄤ簲", "鍛ㄥ叚"];
  var d = new Date(date).getDay();
  return arr[d];
}
//鑾峰彇鍑犲彿
function getDay(date) {
  var date = new Date(date).getDate();
  if (date < 10) {
    date = "0" + date;
  }
  return date;
}

function getMonthByDate(date) {
  var yarr = ["涓€鏈�", "浜屾湀", "涓夋湀", "鍥涙湀", "浜旀湀", "鍏湀", "涓冩湀", "鍏湀", "涔濇湀", "鍗佹湀", "鍗佷竴鏈�", "鍗佷簩鏈�"];
  return yarr[new Date(date).getMonth()];
}

function getYearByDate(date) {
  return new Date(date).getFullYear();
}
/*-----------------------------------鏌ヨ鐢ㄦ埛鎿嶄綔璁板綍 start----------------------------------*/
function getOperationLog(pageLog, pageLog_size, user_token, type) {
  //鏌ヨ鍏ㄩ儴
  if (searchAll) {
    if ($(".contentTimeLine").hasClass("requesting_all")) {
      return;
    }
    $(".contentTimeLine").addClass("requesting_all");
  }
  //鏌ヨ绗旇
  if (searchNote) {
    if ($(".contentTimeLine").hasClass("requesting_note")) {
      return;
    }
    $(".contentTimeLine").addClass("requesting_note");
  }
  //鏌ヨ鐭俊
  if (searchMsg) {
    if ($(".contentTimeLine").hasClass("requesting_message")) {
      return;
    }
    $(".contentTimeLine").addClass("requesting_message");
  }
  //鏌ヨ寰〉
  if (searchWeiye) {
    if ($(".contentTimeLine").hasClass("requesting_weiye")) {
      return;
    }
    $(".contentTimeLine").addClass("requesting_weiye");
  }
  $.ajax({
    url: "/index.php?r=pc/WebAppMgr/LogList",
    type: "GET",
    data: {
      page: pageLog,
      page_size: pageLog_size,
      app_id: appId,
      reciver_token: user_token,
      type: type
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        if (data.count == 0) {
          var date = new Date();
          var nyr = date.toLocaleDateString().replace(/\//ig, "-");
          var nothingData = '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(nyr) + '</p><p><span class="spandate-timeline">' + getDay(nyr) + '</span><span class="spantitle-timeline logTitleColor">鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!</span><span class="logTitleColor">' + date.toTimeString().substring(0, 8) + '</span></p><div class="more-timeline" data-value="鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!"><span>鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!</span></div> </li>';
          $(".contentTimeLine ul").append(nothingData);
        } else {
          //鍏ㄩ儴鏃ュ織
          if (searchAll) {
            contentTimeLineScroll++;
          }
          //鏌ヨ绗旇
          if (searchNote) {
            contentTimeLineScrollNote++;
          }
          //鏌ヨ寰〉
          if (searchWeiye) {
            contentTimeLineScrollWy++;
          }
          //鏌ヨ鐭俊
          if (searchMsg) {
            contentTimeLineScrollMsg++;
          }

          if (data.is_more == 0) {
            //鏌ヨ鍏ㄩ儴
            if (searchAll) {
              $(".contentTimeLine").addClass("nopage_all");
            }
            //鏌ヨ绗旇
            if (searchNote) {
              $(".contentTimeLine").addClass("nopage_note");
            }
            //鏌ヨ鐭俊
            if (searchMsg) {
              $(".contentTimeLine").addClass("nopage_message");
            }
            //鏌ヨ寰〉
            if (searchWeiye) {
              $(".contentTimeLine").addClass("nopage_weiye");
            }
          }
          var logStr = "";
          var temp = data.data[0].add_time.split(" ")[0];
          if (temp) {
            $(".monthtitle").text(getMonthByDate(temp));
            $(".yeartitle").text(getYearByDate(temp));
          } else {
            $(".monthtitle").text(getMonthByDate(new Date()));
            $(".yeartitle").text(getYearByDate(new Date()));
          }
          for (var i = 0, dlen = data.data.length; i < dlen; i++) {
            var timeArr = data.data[i].add_time.split(" ");
            switch (data.data[i].type) {
              case "group":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "tags":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "contact_status":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + noteSrc + '"/><span class="spantitle-timeline noteTitleColor">' + data.data[i].title + '</span><span class="noteTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "remark":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "user":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "add_customer":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "is_deleted":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "is_destroy":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "add_note":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + noteSrc + '"/><span class="spantitle-timeline noteTitleColor">' + data.data[i].title + '</span><span class="noteTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "sms":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + mssageSrc + '"/><span class="spantitle-timeline msgTitleColor">' + data.data[i].title + '</span><span class="msgTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "tpl_sms":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + weiyeSrc + '"/><span class="spantitle-timeline weiyeTitleColor">' + data.data[i].title + '</span><span class="weiyeTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;

            }
          }
          $(".contentTimeLine ul").append(logStr);
          $(".contentTimeLine ul li").first().find(".spandate-timeline").addClass("currently-color");
          $(".contentTimeLine ul li").not(":first").find(".spandate-timeline").addClass("stepaway-color");
          $(".more-timeline span").mouseover(function() {
            var _this = $(this);
            _this.justToolsTip({
              animation: "moveInLeft",
              width: "300px",
              contents: _this.parent().attr("data-value"),
              gravity: 'left'
            });
          });
        }

      } else {
        alertToolsTip(data.data);
      }
      //鏌ヨ鍏ㄩ儴
      if (searchAll) {
        $(".contentTimeLine").removeClass("requesting_all");
        $(".contentTimeLine").removeClass("scrolling_all");
      }
      //鏌ヨ绗旇
      if (searchNote) {
        $(".contentTimeLine").removeClass("requesting_note");
        $(".contentTimeLine").removeClass("scrolling_note");
      }
      //鏌ヨ鐭俊
      if (searchMsg) {
        $(".contentTimeLine").removeClass("requesting_message");
        $(".contentTimeLine").removeClass("scrolling_message");
      }
      //鏌ヨ寰〉
      if (searchWeiye) {
        $(".contentTimeLine").removeClass("requesting_weiye");
        $(".contentTimeLine").removeClass("scrolling_weiye");
      }
    }
  });
}

function getOnlyLog(pageLog, pageLog_size, user_token, type) {
  if ($(".contentTimeLine").hasClass("requesting_log")) {
    return;
  }
  $(".contentTimeLine").addClass("requesting_log");
  $.ajax({
    url: "/index.php?r=pc/WebAppMgr/LogList",
    type: "GET",
    data: {
      page: pageLog,
      page_size: pageLog_size,
      app_id: appId,
      reciver_token: user_token,
      type: type
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        if (data.count == 0) {
          var date = new Date();
          var nyr = date.toLocaleDateString().replace(/\//ig, "-");
          var nothingData = '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(nyr) + '</p><p><span class="spandate-timeline">' + getDay(nyr) + '</span><span class="spantitle-timeline logTitleColor">鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!</span><span class="logTitleColor">' + date.toTimeString().substring(0, 8) + '</span></p><div class="more-timeline" data-value="鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!"><span>鎮ㄨ繕娌℃湁浠讳綍鎿嶄綔璁板綍!</span></div> </li>';
          $(".contentTimeLine ul").append(nothingData);
        } else {
          contentTimeLineScrollLog++;
          if (data.is_more == 0) {
            $(".contentTimeLine").addClass("nopage_log");
          }
          var logStr = "";
          var temp = data.data[0].add_time.split(" ")[0];
          if (temp) {
            $(".monthtitle").text(getMonthByDate(temp));
            $(".yeartitle").text(getYearByDate(temp));
          } else {
            $(".monthtitle").text(getMonthByDate(new Date()));
            $(".yeartitle").text(getYearByDate(new Date()));
          }
          for (var i = 0, dlen = data.data.length; i < dlen; i++) {
            var timeArr = data.data[i].add_time.split(" ");
            switch (data.data[i].type) {
              case "group":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "tags":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "remark":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "user":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "add_customer":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "is_deleted":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
              case "is_destroy":
                var logContent = data.data[i].content
                logContent = logContent.length > 63 ? (logContent.substring(0, 63) + "...") : logContent;
                logStr += '<li class="cls-timeline"><p class="date-timeline">' + getDayByYMD(timeArr[0]) + '</p><p><span class="spandate-timeline">' + getDay(timeArr[0]) + '</span><img src="' + logSrc + '"/><span class="spantitle-timeline logTitleColor">' + data.data[i].title + '</span><span class="logTitleColor">' + timeArr[1] + '</span></p><div class="more-timeline" data-value="' + data.data[i].content + '"><span>' + logContent + '</span></div> </li>';
                break;
            }
          }
          $(".contentTimeLine ul").append(logStr);
          $(".contentTimeLine ul li").first().find(".spandate-timeline").addClass("currently-color");
          $(".contentTimeLine ul li").not(":first").find(".spandate-timeline").addClass("stepaway-color");
          $(".more-timeline span").mouseover(function() {
            var _this = $(this);
            _this.justToolsTip({
              animation: "moveInLeft",
              width: "300px",
              contents: _this.parent().attr("data-value"),
              gravity: 'left'
            });
          });
        }

      } else {
        alertToolsTip(data.data);
      }
      $(".contentTimeLine").removeClass("requesting_log");
      $(".contentTimeLine").removeClass("scrolling_log");
    }
  });
}
/*-----------------------------------鏌ヨ鐢ㄦ埛鎿嶄綔璁板綍 end----------------------------------*/
//鍒ゆ柇鍘熷缁戝畾浜嬩欢
function judgeBindEvent(jqElement, eventType) {
  var objEvt = $._data(jqElement[0], "events");
  if (objEvt && objEvt[eventType]) {
    return true;
  } else {
    return false;
  }
}

function addVisibleFields(VisibleFieldsArray) {
  $.ajax({
    url: "/index.php?r=pc/WebAppMgr/AddVisibleFields",
    type: "POST",
    data: {
      app_id: appId,
      visible_fields: VisibleFieldsArray
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        console.log("AddVisibleFields Success!");
      }
    }
  });
}
//鎶藉彇鍏叡閮ㄥ垎
function resetAndcancle(e, w) {
  e.each(function(index, ele) {
    if ($(ele).is(":checked")) {
      $(ele).prop("checked", false);
    }
  });
  w.each(function(index, ele) {
    $(ele).remove();
  })
}
//缁欑敤鎴锋坊鍔犳爣绛剧殑鏍囩缁戝畾浜嬩欢------------鏍囩寮瑰嚭妗�
function tagsBindUser($ele, $color) {
  $ele.each(function(index, ele) {
    if (!judgeBindEvent($(ele), "click")) {
      $(ele).click(function(event) {
        if (!$(ele).hasClass($color)) {
          $(ele).addClass($color);
        } else {
          $(ele).removeClass($color);
        }
      });
    }
  });
}
function getAllCheckedUser($el) {
  var count = 0;
  $el.each(function(index, element) {
    if ($(element).is(":checked")) {
      count++;
    }
  });
  return count;
}
//鍒嗙粍缂栬緫鎸夐挳
function groupeditImg() {
  $(".all-nogroup-user .col-md-2 img").each(function(index, ele) {
    $(ele).click(function() {
      $(".mask_editNewGroupName").show();
      $(".editNewGroupName_tip input").attr("edit-groupid", $(ele).attr("group_id"));
    });
  });
}
//鍒犻櫎鍥剧墖缁戝畾浜嬩欢
function bindEventOndelGroupImg() {
  $(".all-nogroup-user .col-md-4 img").each(function(index, ele) {
    $(ele).click(function() {
      $(".mask_delGroup").show();
      $(".delGroup_tip span:last-child").text("[" + $(ele).parent().prev('div').text() + "]?")
        .attr("group_id", $(ele).attr("group_id"));
    });
  });
}
//鏇存柊鐢ㄦ埛鐘舵€佷俊鎭�
function userStatusChange(userID, appID, contactStatus, $teaxtArea, $maskhide, $callback) {
  $.ajax({
    url: "/index.php?r=pc/AppUser/ChangeCustomerContactStatus",
    type: "POST",
    data: {
      user_id: userID,
      app_id: appID,
      contact_status: contactStatus
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        $teaxtArea.val("");
        $maskhide.hide();
        $callback();
        alertToolsTip("淇敼鎴愬姛!");
      }
    }
  });

}
//灏嗚繑鍥炵殑鏁版嵁缁勮鎴愬瓧绗︿覆 鐒跺悗璁剧疆鍒皌body涓紝鐒跺悗缁戝畾浜嬩欢
function InitUserTable_WebApp_Manual(data, nd, $userTbody, $callback, $hidde) {
  if (data.status === 0) {
    var str = "";
    $(data.data).each(function(index, user) {
      //tr鏍囩寮€濮�
      str += "<tr data-id='" + user.id + "' data-user-token='" + user.user_token + "'><td><input data-id='" + user.id + "' data-name='" + user.nickname + "' data-phone='" + user.phone + "' type='checkbox' name='userCheckBox'/></td><td class='fixed-userNickName' title='" + user.nickname + "'>" + user.nickname + "</td>";
      //闇€瑕佹樉绀虹殑搴忓垪
      for (var i = 0; i < nd.length; i++) {
        switch (nd[i]) {
          case "contact_status":
            var userCs = ((user.contact_status==null||user.contact_status=="")?"":user.contact_status);
            str += "<td title='"+userCs +"'>" +userCs + "</td>";
            break;
          case "phone":
            var userP = ((user.phone==null||user.phone=="")?"":user.phone);
            str += "<td title='"+ userP +"'>" + userP + "</td>";
            break;
          case "qq":
            var userQ = ((user.qq==null||user.qq=="")?"":user.qq);
            str += "<td title='"+ userQ +"'>" + userQ + "</td>";
            break;
          case "email":
            var userEm = ((user.email==null||user.email=="")?"":user.email);
            str += "<td title='"+ userEm + "'>" + userEm + "</td>";
            break;
          case "sex":
            var tempdataSex = "";
            if(user.sex == '0'){
              tempdataSex = "鐢�";
            }else if(user.sex == '1'){
              tempdataSex = "濂�";
            }else{
              tempdataSex = "鏈～鍐�";
            }
            str += "<td title='"+ tempdataSex +"'>" + tempdataSex + "</td>";
            break;
          case "from_manual":
            var userFM = (user.from_manual == '1' ? '鏄�' : '鍚�');
            str += "<td title='"+ userFM + "'>" + userFM + "</td>";
            break;
          case "tags":
            var userTG = ((user.tags==null||user.tags=="")?"":user.tags);
            str += "<td title='"+ userTG +"'>" + userTG + "</td>";
            break;
          case "group":
            var userGP = ((user.group==null||user.group=="")?"":user.group);
            str += "<td title='"+ userGP +"'>" + userGP + "</td>";
            break;
          case "vip_title":
            str += "<td title='"+ user.vip_title + "'>" + user.vip_title + "</td>";
            break;
          case "integral":
            str += "<td class='show-integral-detail-btn' title='鏌ョ湅绉垎璇︽儏' >" + user.integral + "</td>";
            break;
          case "balance":
            str += "<td class='show-balance-detail-btn' title='鏌ョ湅鍌ㄥ€奸噾璇︽儏' >" + user.balance + "鍏� </td>";
            break;
          case "add_time":
            str+="<td title='"+user.add_time+"'>"+user.add_time+"</td>";
            break;
          case "coupon":
            str+="<td title='鏌ョ湅浼樻儬鍒歌鎯�'>" + user.coupon +"<span class='show-coupon-detail-btn'>璇︽儏</span></td>";
            break;
          default:
            break;
        }
      }
      //娣诲姞鎿嶄綔鐩稿叧
      str += "<td class='status-detail-delete'><div><div title='鐘舵€佹洿鏂�' name='statusupdate' data-id=" + user.id + " data-name=" + user.nickname + " data-sex=" + user.sex + "></div><div title='璇︾粏淇℃伅' name='showdetail' data-id=" + user.id + " data-name=" + user.nickname + "></div><div  " + $hidde + " title='鍒犻櫎鐢ㄦ埛' name='deleteuser' data-id=" + user.id + " data-name=" + user.nickname + "></div></div></td></tr>";
    });
    $userTbody.append(str);
    $callback();
  }
}
//鍒犻櫎鏍囩
function deleTags_WebApp_Manual(appID, tagIDS) {
  $.ajax({
    url: "/index.php?r=pc/AppUser/DeleteAppUserTag",
    type: "get",
    data: {
      app_id: appID,
      id: tagIDS
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        $(".mask_tip").hide();
        alertToolsTip("鍒犻櫎鎴愬姛!");
        if (window.location.search.search("h=manager_user_manage") != -1) {
          $(".spanContentlabel_fromWebApp #tagsids_fromWebApp" + tagIDS).remove();
          $(".mask_fromWebApp_tags #tagsids_fromWebApp" + tagIDS).remove();
          clicktagsQueryUser_fromWebApp();
        } else {
          $(".spanContentlabel #tagsids_fromManual" + tagIDS).remove();
          $(".mask_fromManual_tags #tagsids_fromManual" + tagIDS).remove();
          clicktagsQueryUser_fromManual();
        }
      } else {
        alertToolsTip(data.data);
      }
    }
  });
}
//娣诲姞鏍囩
function addTags_WebApp_Manual(appID, tag_name) {
  $.ajax({
    url: "/index.php?r=pc/AppUser/InsertAppUserTag",
    type: "get",
    data: {
      app_id: appID,
      tag_name: tag_name
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        if (window.location.search.search("h=manager_user_manage") != -1) {
          var newtempSpan = "<span data-id='" + data.data + "' id='tagsids_fromWebApp" + data.data + "'>" + tag_name + "<i class='glyphicon glyphicon-remove removeLabel'></i></span>";
          $(newtempSpan).insertBefore(".addtags_fromWebApp");
          $(".spanContentlabel_fromWebApp").append(newtempSpan);
          if ($(".manage-tags").text() != "绠＄悊") {
            $(".mask_fromWebApp_tags .tags_area_middle i").not(".sureaddtags_fromWebApp,.cancleaddtags_fromWebApp").css({
              "display": "inline-block"
            });
            $(".mask_fromWebApp_tags .tags_area_middle span").css({
              "padding-right": "2px"
            });
          }
          $(".mask_fromWebApp_tags .tags_area_middle span i").each(function(index, ele) {
            if (!judgeBindEvent($(ele), "click")) {
              $(ele).click(function() {
                $(".mask_tip").show();
                $(".mak_tip_center_content").text("纭畾鍒犻櫎璇ユ爣绛�?");
                $(".sureTip").attr("type", "1").attr("tags-id", $(newtempSpan).attr("data-id"));
              });
            }
          });
          tagsBindUser($(".mask_fromWebApp_tags .tags_area_middle span"), "slef-label-click-color");
        } else {
          var newtempSpan = "<span data-id='" + data.data + "' id='tagsids_fromManual" + data.data + "'>" + tag_name + "<i class='glyphicon glyphicon-remove removeLabel'></i></span>";
          $(newtempSpan).insertBefore(".addtags_fromManual");
          $(".spanContentlabel").append(newtempSpan);
          if ($(".manage-tags-manual").text() != "绠＄悊") {
            $(".mask_fromManual_tags .tags_area_middle i").not(".sureaddtags_fromManual,.cancleaddtags_fromManual").css({
              "display": "inline-block"
            });
            $(".mask_fromManual_tags .tags_area_middle span").css({
              "padding-right": "2px"
            });
          }
          $(".mask_fromManual_tags .tags_area_middle span i").each(function(index, ele) {
            if (!judgeBindEvent($(ele), "click")) {
              $(ele).click(function() {
                $(".mask_tip").show();
                $(".mak_tip_center_content").text("纭畾鍒犻櫎璇ユ爣绛�?");
                $(".sureTip").attr("type", "1").attr("tags-id", $(newtempSpan).attr("data-id"));
              });
            }
          });
          tagsBindUser($(".mask_fromManual_tags .tags_area_middle span"), "slef-label-click-color");
        }
        alertToolsTip("娣诲姞鎴愬姛!");
      } else {
        alertToolsTip(data.data);
      }
    }
  });
}
//淇濆瓨鐢ㄦ埛鍒板垎缁勭殑鎵€鏈夌敤鎴风殑ID
function getUserCheked_WebApp_Manual($userTableInput) {
  var app_user_ids = [];
  $userTableInput.each(function(index, ele) {
    if ($(ele).is(":checked")) {
      var userId = $(ele).parent("td").parent("tr").attr("data-id");
      app_user_ids.push(userId);
    }
  });
  return app_user_ids;
}
//鑷畾涔夋樉绀哄垪鐨勮〃澶磋缃�
function selfShowThead(initUserTHeaderArr, $fun, $thead) {
  var hstr = "<tr><th><input type='checkbox'/></th><<th>濮撳悕</th>";
  for (var k = 0, len = initUserTHeaderArr.length; k < len; k++) {
    if (initUserTHeaderArr[k] == "濮撳悕") {
      continue;
    }
    hstr += "<th>" + initUserTHeaderArr[k] + "</th>"
  }
  hstr += " <th><span onclick='" + $fun + "()'>鑷畾涔夋樉绀哄垪</span></th></tr>";
  $thead.html("").html(hstr);
}

/*
---------------webApp_Manual_common------------------------------------
*/
//涓汉璇︾粏淇℃伅涓偣鍑荤敤鎴风殑鏍囩鍚庣偣鍑诲垹闄ょ敤鎴锋爣绛炬椂鏇存柊鐢ㄦ埛鏍囩
function updatUserTagsInDetal_fromWebApp() {
  $("#labeltd i").each(function(index, ele) {
    $(ele).click(function(e) {
      e.stopPropagation();
      //鍒犻櫎鏍囩
      $(".mask_tip").show();
      $(".mak_tip_center_content").text("纭畾鍒犻櫎璇ユ爣绛�?");
      $(".sureTip").attr("type", "2").attr("tags-id", $(ele).parent("span").attr("data-id"));
    });
  });
}

function updatUserTagsInDetal_fromManual() {
  $("#labeltd i").each(function(index, ele) {
    $(ele).click(function(e) {
      e.stopPropagation();
      //鍒犻櫎鏍囩
      $(".mask_tip").show();
      $(".mak_tip_center_content").text("纭畾鍒犻櫎璇ユ爣绛�?");
      $(".sureTip").attr("type", "2").attr("tags-id", $(ele).parent("span").attr("data-id"));
    });
  });
}

function getlabeltdSpanCountArr() {
  var spanarr = [];
  $("#labeltd span").each(function(index, ele) {
    spanarr.push($(ele).attr("data-id"));
  });
  return spanarr;
}

function delTagsIndetail(app_id, user_ids, tag_ids, $callback1, $callback2) {
  $.ajax({
    url: "/index.php?r=pc/AppUser/AddAppUserTags",
    type: "get",
    data: {
      app_id: app_id,
      user_ids: user_ids,
      tag_ids: tag_ids,
      skip_original_tags: 1
    },
    dataType: "json",
    success: function(data) {
      if (data.status == 0) {
        $callback1(user_ids[0]);
        $callback2();
        $(".contentTimeLine ul").html("");
        //鏌ヨ鎿嶄綔鏃ュ織
        $(".contentTimeLine").scrollTop(0);
        //鏌ヨ鍏ㄩ儴
        contentTimeLineScroll = 1;
        searchAll = true;
        //鏌ヨ绗旇
        contentTimeLineScrollNote = 1;
        searchNote = false;
        //鏌ヨ鏃ュ織
        contentTimeLineScrollLog = 1;
        searchLog = false;
        //鏌ヨ鐭俊
        contentTimeLineScrollMsg = 1;
        searchMsg = false;
        //鏌ヨ寰〉
        contentTimeLineScrollWy = 1;
        searchWeiye = false;
        $(".contentTimeLine").removeClass("nopage_all");
        getOperationLog(contentTimeLineScroll, 10, $(".contentTimeLine").attr("user_token"), 2);
        $(".mask_tip").hide();
        alertToolsTip("鍒犻櫎鎴愬姛!");
      } else {
        alertToolsTip(data.data);
      }
    }
  });
}
//鐐瑰嚮鍒嗙粍鍚庢寜鍒嗙粍鏌ヨ鐢ㄦ埛
var queryUserByGroup_bindEvent = false;
function queryUserByGroup_Manual_WebApp() {
  $(".user-group-middle .all-nogroup-user").click(function(event) {
    var wls = window.location.search;
    var target = $(event.target);
    if (target.is("img")) {
      return;
    } else {
      $(this).addClass("choosedStatus");
      $(".userGroupContent .all-nogroup-user").not(this).removeClass("choosedStatus");
      if (wls.search("h=manager_user_frommanual") != -1) {
        var idxArr = {};
        idxArr['group'] = $(this).attr("id").substring(10);
        var orderarr = $(".sort-up-down .btn-Content").attr("data-attr").split("-");
        var orderBy = orderarr[0];
        var order = orderarr[1];
        var arr = [];
        var searchValue = $('.search-umu').val();
        var searchIdx = $(".user-manager-select-input .btn-Content").attr("data-attr");
        $(".spanContentlabel span").each(function(index, element) {
          if ($(element).hasClass("slef-label-click-color")) {
            arr.push($(element).attr("data-id"));
          }
        });
        idxArr['tags'] = arr;
        $("#user_fromManual").html("");
        user_fromManualPage = 1;
        $('#userListTable_fromManual').removeClass('nopage_fromManual');
        getuserListData_fromManual({
          app_id: appId,
          page: user_fromManualPage,
          search_value: searchValue || '',
          search_idx: searchIdx || '',
          orderby: orderBy,
          order: order,
          idx_arr: idxArr,
          from_manual: "1"
        });
      } else {
        var idxArr = {};
        idxArr['group'] = $(this).attr("id").substring(10);
        var arr = [];
        var searchValue = $('.search-umu').val();
        var searchIdx = $(".user-manager-select-input_fromWebApp .btn-Content").attr("data-attr");
        var orderarr = $(".sort-up-down_fromWebApp .btn-Content").attr("data-attr").split("-");
        var orderBy = orderarr[0];
        var order = orderarr[1];
        $(".spanContentlabel_fromWebApp span").each(function(index, element) {
          if ($(element).hasClass("slef-label-click-color")) {
            arr.push($(element).attr("data-id"));
          }
        });
        idxArr['tags'] = arr;
        $("#user_fromWebApp").html("");
        userPage = 1;
        $('#userListTable_fromWebApp').removeClass('nopage_fromWebApp');
        getuserListData_fromWebApp({
          app_id: appId,
          page: userPage,
          search_value: searchValue || '',
          search_idx: searchIdx || '',
          idx_arr: idxArr,
          orderby: orderBy,
          order: order
        });
      }
      $("thead th input").prop("checked", false);
    }
  });
  if(queryUserByGroup_bindEvent){
    return ;
  }
  queryUserByGroup_bindEvent = true;
  
  $(".userGroupContent .user-group-header .all-nogroup-user:eq(0)").click(function() {
    var wls = window.location.search;
    $(this).addClass("choosedStatus");
    $(".userGroupContent .all-nogroup-user").not(this).removeClass("choosedStatus");
    if (wls.search("h=manager_user_frommanual") != -1) {
      clicktagsQueryUser_fromManual();
    } else {
      clicktagsQueryUser_fromWebApp();
    }
    $("thead th input").prop("checked", false);
  });
  $(".userGroupContent .user-group-header .all-nogroup-user:eq(1)").click(function() {
    var wls = window.location.search;
    $(this).addClass("choosedStatus");
    $(".userGroupContent .all-nogroup-user").not(this).removeClass("choosedStatus");
    if (wls.search("h=manager_user_frommanual") != -1) {
      var idxArr = {};
      idxArr['group'] = 0;
      var temparr = $(".sort-up-down .btn-Content").attr("data-attr");
      var orderarr = temparr.split("-");
      var orderBy = orderarr[0];
      var order = orderarr[1];
      var arr = [];
      var searchValue = $('.search-umu').val();
      var searchIdx = $(".user-manager-select-input .btn-Content").attr("data-attr");
      $(".spanContentlabel span").each(function(index, element) {
        if ($(element).hasClass("slef-label-click-color")) {
          arr.push($(element).attr("data-id"));
        }
      });
      idxArr['tags'] = arr;
      $("#user_fromManual").html("");
      user_fromManualPage = 1;
      $('#userListTable_fromManual').removeClass('nopage_fromManual');
      getuserListData_fromManual({
        app_id: appId,
        page: user_fromManualPage,
        search_value: searchValue || '',
        search_idx: searchIdx || '',
        orderby: orderBy,
        order: order,
        idx_arr: idxArr,
        from_manual: "1"
      });
    } else {
      var idxArr = {};
      idxArr['group'] = 0;
      var arr = [];
      var searchValue = $('.search-umu').val();
      var searchIdx = $(".user-manager-select-input_fromWebApp .btn-Content").attr("data-attr");
      var sortudfwa = $(".sort-up-down_fromWebApp .btn-Content").attr("data-attr");
      var orderarr = sortudfwa.split("-");
      var orderBy = orderarr[0];
      var order = orderarr[1];
      $(".spanContentlabel_fromWebApp span").each(function(index, element) {
        if ($(element).hasClass("slef-label-click-color")) {
          arr.push($(element).attr("data-id"));
        }
      });
      idxArr['tags'] = arr;
      $("#user_fromWebApp").html("");
      userPage = 1;
      $('#userListTable_fromWebApp').removeClass('nopage_fromWebApp');
      getuserListData_fromWebApp({
        app_id: appId,
        page: userPage,
        search_value: searchValue || '',
        search_idx: searchIdx || '',
        idx_arr: idxArr,
        orderby: orderBy,
        order: order
      });
    }
    $("thead th input").prop("checked", false);
  });
}
// 棰滆壊鍒濆鍖�
//鍒濆鍖栭鑹查€夋嫨鍣�
$.fn.colorPlugin = function(cl, movefuc , hidefuc){

  $(this).spectrum({
    color: cl || "#fff",
    chooseText: "确定",
    cancelText: "默认值",
    showInput: true,
    allowEmpty: true,
    containerClassName: 'full-spectrum',
    showInitial: true,
    showPalette: true,
    showSelectionPalette: true,
    showAlpha: true,
    maxPaletteSize: 10,
    preferredFormat: "hex",
    localStorageKey: "spectrum.demo",
    change: function(color){
      // movefuc && movefuc(color);
    },
    move: function(color){
      movefuc && movefuc(color);
    },
    show: function () {
    },
    beforeShow: function () {
    },
    hide: function (color) {
      movefuc && movefuc(color);
      hidefuc && hidefuc(color);
    },
    palette: [
    ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
    ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
    ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
    ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
    ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
    ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
    ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","rgba(0,0,0,0)"]
    ]
  });
}
//


// bootstrap鍒嗛〉
/* @param {
      currentPage      褰撳墠椤�
      totalPage        鎬婚〉鏁�
      pageClickFun     鐐瑰嚮椤电爜瑕佽皟鐢ㄧ殑鍑芥暟
      pageClickFunArgu 鐐瑰嚮椤电爜瑕佽皟鐢ㄧ殑鍑芥暟鍙傛暟
      el               椤电爜鐨凞om
      isreset          鏄惁閲嶇疆鍒嗛〉  0 鍚︼紝 1鏄�
*   }
*/
function paginator(options, isreset, other){
  options.pageClickFunArgu = options.pageClickFunArgu || {};
  var page_options = {
    currentPage: options.currentPage,
    totalPages: options.totalPage,
    size: 'normal',
    alignment: 'center',
    itemTexts: function(type, page, current) {
      switch (type) {
        case "first":
          return "棣栭〉";
        case "prev":
          return "<";
        case "next":
          return ">";
        case "last":
          return "鏈〉";
        case "page":
          return page;
      }
    },
    tooltipTitles :function(type, page, current) {
      switch (type) {
        case "first":
          return "棣栭〉";
        case "prev":
          return "涓婁竴椤�";
        case "next":
          return "涓嬩竴椤�";
        case "last":
          return "鏈〉";
        case "page":
          return '绗�' + page + '椤�';
      }
    },
    onPageClicked: function(e, originalEvent, type, page) {
      if($(originalEvent.target).closest('li').hasClass('active')){
        return;
      };
      options.pageClickFunArgu.page = page;
      options.pageClickFun(options.pageClickFunArgu, 1, other);
    }
  };
  if (!isreset) {
  $(options.el).bootstrapPaginator(page_options);
  }
}


