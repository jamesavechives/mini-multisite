  var base_url = $("#base_url").val();
  var is_domain = true;
  is_domain ? $('#manager-coupon-card .teach').hide(): '';
  function initialCouponCard(){
    managerCouponCard.initial();
  }
  var managerCouponCard = {
    // 初始化
    initial: function(){
      var self = this;
      self.bindEvents();
      // 获取优惠券列表
      var page = 'list';
      if(page == 'coupon_usage'){
        self.getUsageList({
          ownerToken: userToken
        })
        $('#manager-coupon-card .coupon-usage').show().siblings('div').hide();
      } else {
        self.getCardList();
      }
    },
    // 绑定事件
    bindEvents: function(){
      var self = this;
      // 优惠券列表
      $('#manager-coupon-card .coupon-list').on('click', '.add-coupon-card', function(){
        // 新建优惠券
        self.initCardInfo();
        $('#manager-coupon-card .coupon-setting').show().siblings('div').hide();
      }).on('click', '.goto-usage-page-btn', function(){
        // 优惠券使用情况
        $('#manager-coupon-card .coupon-usage .usage-search-input').val('');
        $('#manager-coupon-card .coupon-usage select[name="verification_status"').val('');
        self.getUsageList();
        $('#manager-coupon-card .coupon-usage').show().siblings('div').hide();
      }).on('click', '.edit-coupon-card', function(){
        // 编辑优惠券
        self.initCardInfo();
        self.getCardInfo($(this).parents('tr').attr('data-id'));
      }).on('click', '.delete-coupon-card', function(){
        // 删除优惠券
        self.deleteCard($(this).parents('tr').attr('data-id'));
      }).on('click', '.shelve-status', function(){
        // 上架使用
        self.changeCardStatus($(this).parents('tr').attr('data-id'), Number($(this).is(':checked')));
      }).on('click', '.coupon-usage-btn', function(){
        // 单个优惠券使用情况
        var couponId = $(this).parents('tr').attr('data-id');
        $('#manager-coupon-card .coupon-usage select[name="verification_status"]').val('');
        var searchType = $('#manager-coupon-card .coupon-usage .usage-search-type').val('coupon_id');
        var searchValue = $('#manager-coupon-card .coupon-usage .usage-search-input').val(couponId);
        self.getUsageList({
          couponId: couponId
        });
        $('#manager-coupon-card .coupon-usage').show().siblings('div').hide();
      }).on('click', '.coupon-search-btn', function(){
        var searchType = $('#manager-coupon-card .coupon-list .coupon-search-type').val();
        var searchValue = $('#manager-coupon-card .coupon-list .coupon-search-input').val();
        self.getCardList({
          searchType: searchType,
          searchValue: searchValue
        });
      });

      // 编辑优惠券
      $('#manager-coupon-card .coupon-setting').on('click', '.save-btn', function(){
        // 有re-edit则为重新编辑，没有则为新建优惠券
        $(this).hasClass('re-edit') ? self.saveCardInfo() : self.addCardInfo();
      }).on('click', '.cancel-btn', function(){
        $('#manager-coupon-card .coupon-list').show().siblings('div').hide();
        self.clearCardInfo();
      }).on('blur', 'input[type="text"], textarea', function(){
        self.setPreviewArea($(this).closest('.field-item'));
      }).on('click', 'input[type="radio"], input[type="checkbox"]', function(){
        self.setPreviewArea($(this).closest('.field-item'));
      }).on('click', 'input[name="coupon_type"]', function(){
        var type = $(this).closest('.field-item').find('input[name="coupon_type"]:checked').val();
        $('.field-item[data-field="coupon_type"]').find('.coupon-type-content>div[data-type="' + type + '"]').show().siblings().hide();
      }).on('click', '.select-goods-btn, .select-exchange-btn', function(){
        var btn = $(this);
        var goodsTypeArray = [ 0,3 ];
        var conditionGoodsType = Number($('#manager-coupon-card .exchange-type-block .select-goods-item').attr('data-type'));
        var exchangeGoodsType = Number($('#manager-coupon-card .exchange-goods-block .select-goods-item').attr('data-type'));
        if(btn.hasClass('select-goods-btn') && !isNaN(exchangeGoodsType)){
          goodsTypeArray = [ exchangeGoodsType ];
        } else if(btn.hasClass('select-exchange-btn') && !isNaN(conditionGoodsType)){
          goodsTypeArray = [ conditionGoodsType ];
        }
        // 引用外部函数
        goodsResourceDialog.show({
          displayGoodsTypeArray: goodsTypeArray, // 电商、到店
          confirmCallback: function(goodsData){
            if(!goodsData){
              alertTip('请选择商品');
              return false;
            }
            var html = '<div class="select-goods-item" data-id="' + goodsData.id + '" data-type="' + goodsData.goods_type + '" >';
                html += '<div class="img-box"><img src="'+ goodsData.cover +'" alt="'+ goodsData.title +'"></div>';
                html += '<div class="info-box"><div class="goods-name">'+ goodsData.title +' </div><div class="clear-goods-btn">清除商品</div></div>';
                html += '</div>';
            btn.hide();
            btn.after(html);
            self.setPreviewArea($('#manager-coupon-card .field-item[data-field="coupon_type"]'));
            return true;
          } 
        });
      }).on('click', '.clear-goods-btn', function(){
        $(this).closest('.select-goods-item').siblings('.select-goods-btn, .select-exchange-btn').show();
        $(this).closest('.select-goods-item').remove();
      });
      // 初始化优惠券列表色
      $('#manager-coupon-card .coupon-setting .card-list-color').colorPlugin("#fd445b", function(color){
        var color = String(color) || '#fd445b';
        var $couponTicket = $('#coupon-ticket');
        $couponTicket.find('.top-section').css({
          'border-top': '5px solid ' + color
        });
        $couponTicket.find('.background-word-area').css({
          'border': '1px solid ' + color
        });
        $couponTicket.find('.background-circle').css({
          'background-color': color
        });
        $couponTicket.find('.function-btn').css({
          'background-color': color
        });
      });
    //   初始化优惠券背景色
      $('#manager-coupon-card .coupon-setting .card-background-color').colorPlugin("#eaebed", function(color){
        var color = color || '#eaebed';
        $('#coupon-detail').css({
          'background': color
        });
      });
   //    初始化优惠券列表色
      $('#manager-coupon-card .coupon-setting .card-button-color').colorPlugin("#fd445b", function(color){
        var color = color || '#fd445b';
        $('#coupon-detail .receive-btn').css({
          'background': color
        });
      });

      // 优惠券使用情况
      $('#manager-coupon-card .coupon-usage').on('click', '.goto-usage-page-btn', function(){
        $('#manager-coupon-card .coupon-usage .usage-search-input').val('');
        $('#manager-coupon-card .coupon-usage select[name="verification_status"').val('');
        self.getUsageList();
      }).on('click', '.goto-list-page-btn', function(){
        self.getCardList();
        $('#manager-coupon-card .coupon-list').show().siblings('div').hide();
      }).on('change', '.verification-stauts-block select[name="verification_status"]', function(){ 
        var status = $('#manager-coupon-card .coupon-usage select[name="verification_status"]').val();
        var searchType = $('#manager-coupon-card .coupon-usage .usage-search-type').val();
        var searchValue = $('#manager-coupon-card .coupon-usage .usage-search-input').val();
        if(searchType == 'coupon_id'){
          self.getUsageList({
            status: status,
            couponId: searchValue
          });
        } else {
          self.getUsageList({
            status: status,
            searchType: searchType,
            searchValue: searchValue
          });
        }
      }).on('click', '.usage-search-btn',function(){
        var status = $('#manager-coupon-card .coupon-usage select[name="verification_status"]').val();
        var searchType = $('#manager-coupon-card .coupon-usage .usage-search-type').val();
        var searchValue = $('#manager-coupon-card .coupon-usage .usage-search-input').val();
        if(searchType == 'coupon_id'){
          self.getUsageList({
            status: status,
            couponId: searchValue
          });
        } else {
          self.getUsageList({
            status: status,
            searchType: searchType,
            searchValue: searchValue
          });
        }
      }).on('keydown', '.verify-code-input', function(e){
        let keycode = e.keyCode;
        if (keycode == 13) {
          $('.verify-code-confirm').trigger('click');
        }
      }).on('click', '.manual-verify', function(){
        $('#verifyCodeInputModal').modal().find('.verify-code-input').val('');
      }).on('click', '.verify-code-confirm', function(){
        let code = $('.verify-code-input').val().trim();
        if (!code) {
          alert('请输入核销码');
          return;
        }
        self.getVerifyCodeInfo(code);
      }).on('click', '.verify-detail-confirm', function(){
        let code = $('.verify-code-input').val().trim();
        self.confirmVerifyCode(code);
      });
    },
          // 获取优惠券列表
     getCardList: function(argData){
       var self = this;
       var argData = argData || {};
       var param = {
         page: argData.page || 1,
         idx_arr: {
           idx: argData.searchType,
           value: argData.searchValue
         }
       };
       $.ajax({
         url: base_url+'coupons/view',
         type: 'get',
         data: param,
         dataType: 'json',
         success: function(data){
           if (data.status !== 0) {
             alert(data.data);
             return;
           }
           var cardData = data.data;
           var currentPage = data.current_page;
           var totalPage = data.total_page;
           var tableOptions;
 
           self.setCardList(cardData);
 
           if (data.total_page > 1) {
             tableOptions = {
               currentPage: currentPage,
               totalPages: totalPage,
               size: 'normal',
               alignment: 'center',
               itemTexts: function(type, page, current) {
                 switch (type) {
                   case "first":
                     return "首页";
                   case "prev":
                     return "<";
                   case "next":
                     return ">";
                   case "last":
                     return "末页";
                   case "page":
                     return page;
                 }
               },
               onPageClicked: function(e, originalEvent, type, page) {
                 param['page'] = page;
                 $.ajax({
                   url: '/index.php?r=pc/AppShop/GetCouponList',
                   type: 'get',
                   data: param,
                   dataType: 'json',
                   success: function(data) {
                     if (data.status !== 0) {
                       alert(data.data);
                       return;
                     }
                     self.setCardList(data.data);
                   }
                 });
               }
             };
             $('#couponlisttoolbar').show().bootstrapPaginator(tableOptions);
           } else {
             $('#couponlisttoolbar').hide();
           }
         }
       });
     },
    // 设置优惠券列表
    setCardList: function(data){
      if (!data.length) {
        $('#coupon-list-tbody').html('');
        return false;
      }
      var fragment = document.createDocumentFragment();
      $.each(data, function(entryIndex, entry){

         
        // start
        var html = '<tr data-id="'+ entry.id +'" >';
        // Id
        html += '<td>' + entry.id + '</td>';
        // 类型
        var couponTypeText = "";
        switch(entry.coupon_type){
          case '0':
            couponTypeText = '满减券';
            break;
          case '1':
            couponTypeText = '打折券';
            break;
          case '2':
            couponTypeText = '代金券';
            break;
          case '3':
            couponTypeText = '兑换券';
            break;
          case '4':
            couponTypeText = '储值券';
            break;
          case '5':
            couponTypeText = '通用券';
            break;
          default:
            break;
        }
        html += '<td>' + couponTypeText + '</td>';
        // 优惠券名称
        html += '<td class="coupon-name-td">' + entry.title + '</td>';
        // 优惠方式
        var couponWayText;
        switch(entry.coupon_type){
          case '0':
            couponWayText = '满' + Number(entry.coupon_condition) + '元，减' + Number(entry.value) + '元';
            break;
          case '1':
            couponWayText = '打' + Number(entry.value) + '折';
            break;
          case '2':
            couponWayText = '可抵扣' + Number(entry.value) + '元';
            break;
          case '3':
//            if(entry.extra_condition == ''){
//              couponWayText = '直接兑换' + entry.coupon_goods_info.title;
//            } else if(entry.extra_condition.price){
//              couponWayText = '消费满' + entry.extra_condition.price + '元可兑换' + entry.coupon_goods_info.title;
//            } else if(entry.extra_condition.goods_id){
//              couponWayText = '购买' + entry.condition_goods_info.title + '可兑换' + entry.coupon_goods_info.title;
//            }
            break;
          case '4':
            couponWayText = '储值金可充值' + Number(entry.value) + '元';
            break;
          case '5':
            couponWayText = entry.extra_condition;
            break;
          default: 
            break;
        }
        html += '<td class="coupon-way-td">' + couponWayText + '</td>';
        // 有效期
        var useDateText = '<div>' + entry.start_use_date + '至' + entry.end_use_date +  '</div>';
        useDateText += '<div>' + (entry.exclude_holiday == 1 ? '除法定节假日' : '') + ' ' + (entry.exclude_weekend == 1 ? '周一至周五' : '') +  '</div>';
        useDateText += '<div>' + entry.start_use_time + '-' + entry.end_use_time +  '</div>';
        html += '<td class="user-date-td">' + useDateText + '</td>';
        // 库存
        html += '<td>' + entry.stock + '</td>';
        // 已领张数
        html += '<td>' + entry.recv_num + '</td>';
        // 核销次数
        html += '<td>' + entry.consume_num + '</td>';
        // 领取列表展示
        html += '<td>' + (entry.in_show_list == 1 ? '是' : '否')  + '</td>';
        // 操作
        html += '<td class="btn-panel"><span class="edit-coupon-card">编辑</span><span class="delete-coupon-card">删除</span><span class="coupon-usage-btn">使用情况</span></td>';
        // 上架使用
        html += '<td><input type="checkbox" class="shelve-status" '+ ( entry.enable_status == 1 ? 'checked': '' ) +'></td>';
        // end
        html += '</tr>';
        $(fragment).append(html);
      });
      $('#coupon-list-tbody').html(fragment);
    },
    // 初始化卡片信息
    initCardInfo: function(){
      // 初始化时间组件
      $('.field-item .select-time').on('click', function(){
        var name = $(this).attr('data-name');
        var startUseDate = $('.field-item[data-field="use_time"] [data-name="start_use_date"]').text();
        laydate({
          istime: true,
          format: 'YYYY-MM-DD',
          choose: function(dates){
            if (name == 'end_use_date' && startUseDate ) {
              $('#coupon-detail .date-duration').text(startUseDate + '至' + dates);
              $('#coupon-ticket .date-duration').text(startUseDate + '至' + dates);
            }
          }
        });
      });

      // 初始化 名称、logo
      $.ajax({
        url: base_url+'admin/site_detail',
        type: 'get',
        data: {
        },
        dataType: 'json',
        success: function(data){
          if (data.status !== 0) {
            alertTip(data.data);
            return;
          }
          console.log(data);
          var appName = data.data.name;
          var appLogo = data.data.app_logo;
          if (appName) {
            $('#coupon-detail .name').text(appName);
            $('.field-item[data-field="name"] .field-item-panel').text(appName);
          }
          if (appLogo) {
            $('#coupon-detail .logo').attr('src', appLogo);
            $('.field-item[data-field="logo"] .field-item-panel img').attr('src', appLogo);
          }
        },
        complete:function(e){
            
            console.log(e);
        }
      });

      // 优惠券默认显示在列表中
      $('#manager-coupon-card .coupon-setting input[name="in_show_list"]').prop('checked', true);
    },
    // 添加优惠券信息
    addCardInfo: function(){
      var self = this;
      var fieldItems = $('#manager-coupon-card .coupon-setting .field-item');
      if ($('#manager-coupon-card .coupon-setting .save-btn').hasClass('submiting')) {
        alertTip('请勿重复提交');
        return false;
      }

      // 验证通过执行下一步
      var verifyPass = true;
      fieldItems.each(function(){
        if(!self.verifyCardInfo($(this))){
          verifyPass = false;
          return false;
        }
      });
      if(!verifyPass){
        return false;
      }

      // 验证通过后执行，优惠券字段参数
      var param = {
        background: fieldItems.find('.card-background-color').spectrum("get").toRgbString(),
        button_color: fieldItems.find('.card-button-color').spectrum("get").toRgbString(),
        list_color: fieldItems.find('.card-list-color').spectrum("get").toRgbString(),
        title: fieldItems.find('input[name="title"]').val(),
        sub_title: fieldItems.find('input[name="sub_title"]').val(),
        address: fieldItems.find('textarea[name="address"]').val(),
        phone: fieldItems.find('input[name="phone"]').val(),
        stock: fieldItems.find('input[name="stock"]').val(),
        limit_num: fieldItems.find('input[name="limit_num"]').val(),
        in_show_list: Number(fieldItems.find('input[name="in_show_list"]').is(':checked'))
      }
      // 优惠券类型
      var couponType = fieldItems.find('input[name="coupon_type"]:checked').val();
      var $typeDiv = fieldItems.find('.coupon-type-content>div[data-type="'+ couponType +'"]');
      param['type'] = couponType;
      if(couponType == 0){
        param['condition'] = $typeDiv.find('input[name="condition"]').val();
        param['value'] = $typeDiv.find('input[name="value"]').val();
      } else if(couponType == 1){
        param['value'] = $typeDiv.find('input[name="value"]').val();
      } else if(couponType == 2){
        param['value'] = $typeDiv.find('input[name="value"]').val();
      } else if(couponType == 3){
        var exchangeType = $typeDiv.find('input[name="exchange_type"]:checked').val();
        if(exchangeType == 0){
          param['extra_condition'] = 0;
        } else if(exchangeType == 1){
          param['extra_condition'] = {
            price: $typeDiv.find('input[name="exchange_condition"]').val()
          };
        } else if(exchangeType == 2){
          param['extra_condition'] = {
            goods_id: $typeDiv.find('.exchange-type-block .select-goods-item').attr('data-id')
          }
        }
        param['value'] = $typeDiv.find('.exchange-goods-block .select-goods-item').attr('data-id');
      } else if(couponType == 4){
        param['value'] = $typeDiv.find('input[name="value"]').val();
      } else if(couponType == 5){
        param['extra_condition'] = $typeDiv.find('input[name="extra_condition"]').val();
      }
      // 可用时间
      param['start_use_date'] = fieldItems.find('span[data-name="start_use_date"]').text();
      param['end_use_date'] = fieldItems.find('span[data-name="end_use_date"]').text();
      param['exclude_weekend'] = Number(fieldItems.find('input[name="exclude_weekend"]').is(':checked'));
      param['exclude_holiday'] = Number(fieldItems.find('input[name="exclude_holiday"]').is(':checked'));
      var timeData = [];
      timeData.push(fieldItems.find('input[name="start_use_time_h"]').val());
      timeData.push(fieldItems.find('input[name="start_use_time_m"]').val());
      timeData.push(fieldItems.find('input[name="end_use_time_h"]').val());
      timeData.push(fieldItems.find('input[name="end_use_time_m"]').val());
      if(timeData.indexOf('') == -1){
        param['start_use_time'] = timeData[0] + ':' + timeData[1];
        param['end_use_time'] = timeData[2] + ':' + timeData[3];
      }

      $('#manager-coupon-card .coupon-setting .save-btn').addClass('submiting');
      $.ajax({
        url: base_url+'coupons/create_coupon',
        type: 'post',
        data: param,
        dataType: 'json',
        success: function(data){
          $('#manager-coupon-card .coupon-setting .save-btn').removeClass('submiting');
          if (data.status !== 0) {
            alertTip(data.data);
            return;
          }
          self.getCardList();
       //   show_page_for_backend(base_url+"coupons/view");
          $('.coupon-list').show().siblings('div').hide();
          self.clearCardInfo();
        },
        complete:function(res){
            console.log(res);
        }
      });
    },
    // 验证优惠券信息
    verifyCardInfo: function(item){
      switch(item.attr('data-field')){
        case 'title':
          var titleLen = 0;
          if(item.find('input[name="title"]').val().trim() == ''){
            alertTip('请输入优惠券标题');
            return false;
          } else {
            var title = item.find('input[name="title"]').val().trim();
            var titleLen = 0;
            for(var i = 0; i < title.length; i++){
              var a = title.charAt(i);
              if(a.match(/[^\x00-\xff]/ig) != null){
                titleLen += 2;
              } else {
                titleLen += 1;
              }
            }
            if(titleLen > 18){
              alertTip('已超出限制字数，请删减！');
              return false;
            }
          }
          break;
        case 'coupon_type':
          if(!item.find('input[name="coupon_type"]').is(':checked')){
            alertTip('请选择优惠券类型');
            return false;
          }
          var type = item.find('input[name="coupon_type"]:checked').val();
          var $typeDiv = item.find('.coupon-type-content>div[data-type="'+ type +'"]');
          if(type == 0){
            var condition = $typeDiv.find('input[name="condition"]').val();
            var value = $typeDiv.find('input[name="value"]').val();
            if(!condition || !value){
              alertTip('请填写优惠券类型:满减券的优惠力度');
              return false;
            }
            if(!(/^[0-9]+([.]{1}[0-9]{1,2})?$/.test(condition)) || !(/^[0-9]+([.]{1}[0-9]{1,2})?$/.test(value))){
              alertTip('优惠券类型:满减券的优惠力度必须为>=0的金额，精确到小数点后2位!');
              return false;
            }
          } else if(type == 1){
            var value = $typeDiv.find('input[name="value"]').val();
            if(!value){
              alertTip('请填写优惠券类型:折扣券的折扣力度');
              return false;
            }
            if(!(/^[0-9]+([.]{1}[0-9]{1})?$/.test(value)) || value > 9.9){
              alertTip('优惠券类型:折扣券的折扣力度必须为0.1-9.9的数字，最多一位小数');
              return false;
            }
          } else if(type == 2){
            var value = $typeDiv.find('input[name="value"]').val();
            if(!value){
              alertTip('请填写优惠券类型:代金券的面值');
              return false;
            }
            if(!(/^[0-9]+([.]{1}[0-9]{1,2})?$/.test(value))){
              alertTip('优惠券类型:代金券的面值必须为>=0的金额，精确到小数点后2位!');
              return false;
            }
          } else if(type == 3){
            if(!$typeDiv.find('input[name="exchange_type"]').is(':checked')){
              alertTip('请选中优惠券类型:兑换券的类型');
              return false;
            }
            var exchangeType = $typeDiv.find('input[name="exchange_type"]:checked').val();
            if(exchangeType == 1){
              var exchangeCondition = $typeDiv.find('.exchange-type-block input[name="exchange_condition"]').val();
              if(!exchangeCondition){
                alertTip('请填写优惠券类型:兑换券的消费需满足金额');
                return false;
              }
              if(!(/^[0-9]+([.]{1}[0-9]{1,2})?$/.test(exchangeCondition))){
                alertTip('优惠券类型:储值券的面值必须为>=0的金额，精确到小数点后2位!');
                return false;
              }
            } else if(exchangeType == 2){
              if(!$typeDiv.find('.exchange-type-block .select-goods-item').attr('data-id')){
                alertTip('请选择优惠券类型:兑换券的购买指定商品');
                return false;
              }
            }
            if(!$typeDiv.find('.exchange-goods-block .select-goods-item').attr('data-id')){
              alertTip('请选择优惠券类型:兑换券的兑换商品');
              return false;
            }
          } else if(type == 4){
            var value = $typeDiv.find('input[name="value"]').val();
            if(!value){
              alertTip('请填写优惠券类型:储值券的面值');
              return false;
            }
            if(!(/^[0-9]+([.]{1}[0-9]{1,2})?$/.test(value))){
              alertTip('优惠券类型:储值券的面值必须为>=0的金额，精确到小数点后2位!');
              return false;
            }
          } else if(type == 5){
            if(!$typeDiv.find('input[name="extra_condition"]').val()){
              alertTip('请填写优惠券类型:通用券的使用条件');
              return false;
            }
          }
          break;
        case 'use_time':
          var startDate = item.find('span[data-name="start_use_date"]').text();
          var endDate = item.find('span[data-name="end_use_date"]').text();
          if(startDate == '' || startDate == '选择时间' || endDate == '' || endDate == '选择时间'){
            alertTip('请选择可用时间的有效期');
            return false;
          }
          var timeData = [];
          if(!item.find('[name="start_use_time_h"]').val()){
            timeData.push(item.find('[name="start_use_time_h"]').val());
          }
          if(!item.find('[name="start_use_time_m"]').val()){
            timeData.push(item.find('[name="start_use_time_m"]').val());
          }
          if(!item.find('[name="end_use_time_h"]').val()){
            timeData.push(item.find('[name="end_use_time_h"]').val());
          }
          if(!item.find('[name="end_use_time_m"]').val()){
            timeData.push(item.find('[name="end_use_time_m"]').val());
          }
          if(timeData.length == 4){
            // 都填了
             
          } else if(timeData.length > 0) {
            // 有填，没写完
            alertTip('请填写完整的可用时间的时间段');
            return false;
          }
          break;
        case 'stock':
          if(item.find('input[name="stock"]').val().trim() == ''){
            alertTip('请输入库存');
            return false;
          }
          break;
        default:
          return true;
          break;
      }
      return true;
    },
    // 设置预览区域
    setPreviewArea: function(item){ // item 为.coupon-setting .field-item的jq对象
      switch(item.attr('data-field')){
        case 'card_color':
          var listColor = item.find('.card-list-color').spectrum("get").toRgbString();
          var backgroundColor = item.find('.card-background-color').spectrum("get").toRgbString();
          var buttonColor = item.find('.card-button-color').spectrum("get").toRgbString();
          var $couponTicket = $('#coupon-ticket');
          var $couponDetail = $('#coupon-detail');
          $couponTicket.find('.top-section').css({
            'border-top': '5px solid ' + listColor
          });
          $couponTicket.find('.background-word-area').css({
            'border': '1px solid ' + listColor
          });
          $couponTicket.find('.background-circle').css({
            'background-color': listColor
          });
          $couponTicket.find('.function-btn').css({
            'background-color': listColor
          });
          $couponDetail.css({
            'background': backgroundColor
          });
          $couponDetail.find('.receive-btn').css({
            'background': buttonColor
          });
          break;
        case 'title':
          $('#coupon-detail .title').text(item.find('input[name="title"]').val());
          $('#coupon-ticket .name').text(item.find('input[name="title"]').val());
          break;
        case 'sub_title':
          $('#coupon-detail .sub-title').text(item.find('input[name="sub_title"]').val());
          break;
        case 'coupon_type':
          var type = item.find('input[name="coupon_type"]:checked').val();
          var $typeDiv = item.find('.coupon-type-content>div[data-type="'+ type +'"]');
          var useConditionText = '';
          var ticketWord = '';
          if(type == 0){
            var _condition = Number($typeDiv.find('input[name="condition"]').val());
            var _value = Number($typeDiv.find('input[name="value"]').val());
            useConditionText = '满' + _condition + '元，减' + _value + '元';
            ticketWord = '满';
          } else if(type == 1){
            var _value = Number($typeDiv.find('input[name="value"]').val());
            useConditionText = '打' + _value + '折';
            ticketWord = '折';
          } else if(type == 2){
            var _value = Number($typeDiv.find('input[name="value"]').val());
            useConditionText = '可抵扣' + _value + '元';
            ticketWord = '代';
          } else if(type == 3){
            var exchangeType = $typeDiv.find('input[name="exchange_type"]:checked').val();
            var exchangeGoodsName = $typeDiv.find('.exchange-goods-block .goods-name').text();
            if(exchangeType == 0){
              useConditionText = '直接兑换 ' + exchangeGoodsName;
            } else if(exchangeType == 1){
              var _condition = $typeDiv.find('input[name="exchange_condition"]').val();
              useConditionText = '消费满' + _condition + '元可兑换 ' +  exchangeGoodsName;
            } else if(exchangeType == 2){
              var _condition = $typeDiv.find('.exchange-type-block .goods-name').val() || '';
              useConditionText = '购买' + _condition + '可兑换 ' +  exchangeGoodsName;
            }
            ticketWord = '兑';
          } else if(type == 4){
            var _value = Number($typeDiv.find('input[name="value"]').val());
            useConditionText = '储值金可充值' + _value + '元';
            ticketWord = '储';
          } else if(type == 5){
            var _value = $typeDiv.find('input[name="extra_condition"]').val();
            useConditionText = _value;
            ticketWord = '通';
          }
          $('#coupon-detail .detail-item.condition .item-content').text(useConditionText);
          $('#coupon-ticket .condition-text').text(useConditionText);
          $('#coupon-ticket .background-word').text(ticketWord);
          break;
        case 'use_time':
          // 其他情况  
          var otherCase1 = item.find('input[name="exclude_holiday"]').is(':checked') ? '除法定节假日' : '';
          var otherCase2 = item.find('input[name="exclude_weekend"]').is(':checked') ? '周一至周五' : '';
          $('#coupon-detail .other-case').text(otherCase1 + ' ' + otherCase2);
          $('#coupon-ticket .other-case').text(otherCase1 + ' ' + otherCase2);
          // 时间段
          var timeData = [];
          timeData.push(item.find('[name="start_use_time_h"]').val());
          timeData.push(item.find('[name="start_use_time_m"]').val());
          timeData.push(item.find('[name="end_use_time_h"]').val());
          timeData.push(item.find('[name="end_use_time_m"]').val());
          if(timeData.indexOf('') == -1){
            $('#coupon-detail .time-duration').text(timeData[0] + ':' + timeData[1] + '-' + timeData[2] + ':' + timeData[3]);
            $('#coupon-ticket .time-duration').text(timeData[0] + ':' + timeData[1] + '-' + timeData[2] + ':' + timeData[3]);
          } else {
            $('#coupon-detail .time-duration').text('');
            $('#coupon-ticket .time-duration').text('');
          }
          break;
        case 'address':
          var addressText = item.find('textarea[name="address"]').val();
          if(addressText){
            $('#coupon-detail .detail-item.address .item-content').text(addressText);
            $('#coupon-detail .detail-item.address').show();
          } else {
            $('#coupon-detail .detail-item.address').hide();
          }
          break;
        case 'phone':
          var phoneText = item.find('input[name="phone"]').val();
          if(phoneText){
            $('#coupon-detail .detail-item.phone .item-content').text(phoneText);
            $('#coupon-detail .detail-item.phone').show();
          } else {
            $('#coupon-detail .detail-item.phone').hide();
          }
          break;
        case 'stock':
        case 'limit_num':
        case 'in_show_list':
          break;
        default:
          break;
      }
    },
    // 获取优惠券详细信息
    getCardInfo: function(id){
      var self = this;
      $.ajax({
        url: base_url+'coupons/getcoupondetail',
        type: 'get',
        data: {
          'coupon_id': id
        },
        dataType: 'json',
        success: function(data){
          if (data.status !== 0) {
            alertTip(data.data);
            return;
          }
          self.setCardInfo(id, data.data);
        }
      });
    },
    // 设置优惠券详细信息
    setCardInfo: function(id, data){
      var self = this;
      var $couponSetting = $('#manager-coupon-card .coupon-setting');

      $couponSetting.find('.card-list-color').spectrum("set", data['list_color'] || '#fd445b');
      $couponSetting.find('.card-button-color').spectrum("set", data['button_color'] || '#eaebed');
      $couponSetting.find('.card-background-color').spectrum("set", data['background'] || '#fd445b');
      $couponSetting.find('input[name="title"]').val(data['title']);
      $couponSetting.find('input[name="sub_title"]').val(data['sub_title']);
      // 优惠券类型 Start
      $couponSetting.find('input[name="coupon_type"][value="'+ data['type'] +'"]').prop('checked', true);
      $couponSetting.find('.coupon-type-content>div[data-type="'+ data['type'] +'"]').show().siblings().hide();
      switch(data['type']){
        // 满减券
        case '0':
          $couponSetting.find('.coupon-type-content>div[data-type="'+ data['type'] +'"] input[name="condition"]').val(data['condition']);
          $couponSetting.find('.coupon-type-content>div[data-type="'+ data['type'] +'"] input[name="value"]').val(data['value']);
          break;
        // 打折券、代金券、储值券
        case '1':
        case '2':
        case '4':
          $couponSetting.find('.coupon-type-content>div[data-type="'+ data['type'] +'"] input[name="value"]').val(data['value']);
          break;
        // 兑换券
        case '3':
          $couponSetting.find('.exchange-type-block .select-goods-btn').hide();
          $couponSetting.find('.exchange-goods-block .select-exchange-btn').hide();
          if(data['extra_condition'] == ''){
            $couponSetting.find('input[name="exchange_type"][value="0"]').prop('checked', true);
          } else if(data['extra_condition']['price']){
            $couponSetting.find('input[name="exchange_type"][value="1"]').prop('checked', true);
            $couponSetting.find('input[name="exchange_condition"]').val(data['extra_condition']['price']);
          } else if(data['extra_condition']['goods_id']){
            $couponSetting.find('input[name="exchange_type"][value="2"]').prop('checked', true);
            var conditionGoodsHtml = '<div class="select-goods-item" data-id="' + data.condition_goods_info.id + '" data-type="' + data.goods_type + '" >';
            conditionGoodsHtml += '<div class="img-box"><img src="'+ data.condition_goods_info.cover +'" alt="'+ data.condition_goods_info.title +'"></div>';
            conditionGoodsHtml += '<div class="info-box"><div class="goods-name">'+ data.condition_goods_info.title +' </div></div>';
            conditionGoodsHtml += '</div>';
            $couponSetting.find('.select-goods-btn').after(conditionGoodsHtml);
          }
          var exchangeGoodsHtml = '<div class="select-goods-item" data-id="' + data.coupon_goods_info.id + '"  data-type="' + data.goods_type + '" >';
          exchangeGoodsHtml += '<div class="img-box"><img src="'+ data.coupon_goods_info.cover +'" alt="'+ data.coupon_goods_info.title +'"></div>';
          exchangeGoodsHtml += '<div class="info-box"><div class="goods-name">'+ data.coupon_goods_info.title +' </div></div>';
          exchangeGoodsHtml += '</div>';
          $couponSetting.find('.select-exchange-btn').after(exchangeGoodsHtml);
          break;
        // 通用券
        case '5':
          $couponSetting.find('.coupon-type-content>div[data-type="'+ data['type'] +'"] input[name="extra_condition"]').val(data['extra_condition']);
          break;
        default:
          break;
      }
      // 优惠券类型 End
      // 可用时间 Start
      $couponSetting.find('span[data-name="start_use_date"]').text(data['start_use_date']);
      $couponSetting.find('span[data-name="end_use_date"]').text(data['end_use_date']);
      data['exclude_holiday'] == 1 ? $couponSetting.find('input[name="exclude_holiday"]').prop('checked', true) : '';
      $couponSetting.find('input[name="exclude_holiday"]').attr('disabled', true);
      data['exclude_weekend'] == 1 ? $couponSetting.find('input[name="exclude_weekend"]').prop('checked', true) : '';
      $couponSetting.find('input[name="exclude_weekend"]').attr('disabled', true);
      $couponSetting.find('input[name="start_use_time_h"]').val(data['start_use_time'].split(":")[0]).attr('disabled', true);
      $couponSetting.find('input[name="start_use_time_m"]').val(data['start_use_time'].split(":")[1]).attr('disabled', true);
      $couponSetting.find('input[name="end_use_time_h"]').val(data['end_use_time'].split(":")[0]).attr('disabled', true);
      $couponSetting.find('input[name="end_use_time_m"]').val(data['end_use_time'].split(":")[1]).attr('disabled', true);
      // 可用时间 End
      $couponSetting.find('textarea[name="address"]').val(data['address']);
      $couponSetting.find('input[name="phone"]').val(data['phone']);
      $couponSetting.find('input[name="stock"]').val(data['stock']);
      $couponSetting.find('input[name="limit_num"]').val(data['limit_num']);
      $couponSetting.find('input[name="in_show_list"]').prop('checked', (data['in_show_list'] == 1 ? true : false ));
      // 设置预览
      $couponSetting.find('.field-item').each(function(){
        self.setPreviewArea($(this));
      })

      // 部分字段不可更改
      $couponSetting.find('.field-item input[type="radio"]').attr('disabled', true);
      $couponSetting.find('.field-item[data-field="coupon_type"] input[type="text"]').attr('disabled', true);
      $couponSetting.find('.field-item .select-time[data-name="start_use_date"]').off('click');

      $('.coupon-setting .save-btn').addClass('re-edit').attr('data-id', id);
      $('.coupon-setting').show().siblings('div').hide();
    },
    // 保存优惠券信息
    saveCardInfo: function(){
      var self = this;
      var fieldItems = $('#manager-coupon-card .coupon-setting .field-item');
      if ($('#manager-coupon-card .coupon-setting .save-btn').hasClass('submiting')) {
        alertTip('请勿重复提交');
        return false;
      }

      // 验证通过执行下一步
      var verifyPass = true;
      fieldItems.each(function(){
        if(!self.verifyCardInfo($(this))){
          verifyPass = false;
          return false;
        }
      });
      if(!verifyPass){
        return false;
      }

      var param = {
        coupon_id: $('.coupon-setting .save-btn').attr('data-id'), // 优惠券ID
        background: fieldItems.find('.card-background-color').spectrum("get").toRgbString(),
        button_color: fieldItems.find('.card-button-color').spectrum("get").toRgbString(),
        list_color: fieldItems.find('.card-list-color').spectrum("get").toRgbString(),
        title: fieldItems.find('input[name="title"]').val(),
        sub_title: fieldItems.find('input[name="sub_title"]').val(),
        end_use_date: fieldItems.find('span[data-name="end_use_date"]').text(),
        address: fieldItems.find('textarea[name="address"]').val(),
        phone: fieldItems.find('input[name="phone"]').val(),
        stock: fieldItems.find('input[name="stock"]').val(),
        limit_num: fieldItems.find('input[name="limit_num"]').val(),
        in_show_list: Number(fieldItems.find('input[name="in_show_list"]').is(':checked'))
      }

      $('#manager-coupon-card .coupon-setting .save-btn').addClass('submiting');
      $.ajax({
        url: base_url+'coupons/create_coupon',
        type: 'post',
        data: param,
        dataType: 'json',
        success: function(data){
          $('#manager-coupon-card .coupon-setting .save-btn').removeClass('submiting');
          if (data.status !== 0) {
            alertTip(data.data);
            return;
          }
          self.getCardList();
          $('#manager-coupon-card .coupon-list').show().siblings('div').hide();
          self.clearCardInfo();
        },
        complete:function(e){
            console.log(e);
        }
      });
    },
    // 清除优惠券设置信息
    clearCardInfo: function(){
      // 重置设置信息
      var $couponSetting = $('#manager-coupon-card .coupon-setting');
      $couponSetting.find('.field-item input[type="radio"]').prop('checked', false).attr('disabled', false);
      $couponSetting.find('.field-item input[type="text"]').val('').attr('disabled', false);
      $couponSetting.find('.field-item input[type="checkbox"]').prop('checked', false).attr('disabled', false);
      $couponSetting.find('.field-item textarea').val('');
      $couponSetting.find('.field-item .select-time').text('选择时间');
      $couponSetting.find('.card-list-color').spectrum("set", '#fd445b');
      $couponSetting.find('.card-background-color').spectrum("set", '#eaebed');
      $couponSetting.find('.card-button-color').spectrum("set", '#fd445b');
      $couponSetting.find('input[name="coupon_type"]').prop('checked', false);
      $couponSetting.find('.coupon-type-content>div').hide();
      $couponSetting.find('.exchange-type-block .select-goods-btn').show();
      $couponSetting.find('.exchange-goods-block .select-exchange-btn').show();
      $couponSetting.find('.exchange-type-block .select-goods-item').remove();
      $couponSetting.find('.exchange-goods-block .select-goods-item').remove();
      $couponSetting.find('.save-btn').removeClass('re-edit').removeAttr('data-id');
      $couponSetting.find('input[name="in_show_list"]').prop('checked', true);
      // 重置预览页面
      $('#coupon-detail').css({'background': '#eaebed'});
      $('#coupon-detail .receive-btn').css({'background': '#fd445b'});
      $('#coupon-detail .logo').attr('src', '');
      $('#coupon-detail .name').text('');
      $('#coupon-detail .title').text('');
      $('#coupon-detail .sub-title').text('');
      $('#coupon-detail .detail-item.condition .item-content').text('');
      $('#coupon-detail .detail-item.time .date-duration').text('');
      $('#coupon-detail .detail-item.time .other-case').text('');
      $('#coupon-detail .detail-item.time .time-duration').text('');
      $('#coupon-detail .detail-item.address').hide();
      $('#coupon-detail .detail-item.phone').hide();
      $('#coupon-detail .detail-item.address .item-content').text('');
      $('#coupon-detail .detail-item.phone .item-content').text('');
      $('#coupon-ticket .top-section').attr({'style':''});
      $('#coupon-ticket .background-word-area').attr({'style':''});
      $('#coupon-ticket .background-circle').attr({'style':''});
      $('#coupon-ticket .function-btn').attr({'style':''});
      $('#coupon-ticket .name').text('');
      $('#coupon-ticket .condition-text').text('');
      $('#coupon-ticket .background-word').text('');
      $('#coupon-ticket .date-duration').text('');
      $('#coupon-ticket .other-case').text('');
      $('#coupon-ticket .time-duration').text('');
    },
    // 上下架优惠券 status: 0／1（下架／上架）
    changeCardStatus: function(id, status){
      if ($('#coupon-list-tbody tr[data-id="' + id + '"] .shelve-status').hasClass('submiting')) {
        alertTip('请勿频繁操作');
        return false;
      }
      function changeStatus(){
        $('#coupon-list-tbody tr[data-id="' + id + '"] .shelve-status').addClass('submiting');
        $.ajax({
          url: base_url+'coupons/toggle_status',
          type: 'get',
          data: {
            'coupon_id': id,
            'enable_status': status
          },
          dataType: 'json',
          success: function(data){
            $('#coupon-list-tbody tr[data-id="' + id + '"] .shelve-status').removeClass('submiting');
            if (data.status !== 0) {
              alertTip(data.data);
              return;
            }
            $('#coupon-list-tbody tr[data-id="' + id + '"] .shelve-status').prop('checked', (status == 1 ? true : false));
            alertTip(status == 1 ? '上架成功' : '下架成功');
          }
        });
      }
      if(status == 0){
        confirmTip({ 
          content: '确定要下架此优惠券吗'}, 
          function(){
            changeStatus();
          },
          function(){
            $('#coupon-list-tbody tr[data-id="' + id + '"] .shelve-status').prop('checked', true);
          }
        );
      } else {
        changeStatus();
      }
    },
    // 删除优惠券
    deleteCard: function(id){
      var self = this;
      if ($('#coupon-list-tbody tr[data-id="' + id + '"] .delete-coupon-card').hasClass('submiting')) {
        alertTip('请勿重复操作');
        return false;
      }
      confirmTip({ content: '确定要删除此优惠券？'}, function(){
        $('#coupon-list-tbody tr[data-id="' + id + '"] .delete-coupon-card').addClass('submiting');
        $.ajax({
          url: base_url+'coupons/delete_coupon',
          type: 'get',
          data: {
            'coupon_id': id
          },
          dataType: 'json',
          success: function(data){
            $('#coupon-list-tbody tr[data-id="' + id + '"] .delete-coupon-card').removeClass('submiting');
            if (data.status !== 0) {
              alertTip(data.data);
              return;
            }
            self.getCardList();
          }
        });
      })
    },
    // 获取优惠券使用情况列表
    getUsageList: function(argData){
      var self = this;
      var argData = argData || {};
      var param = {
        'app_id': appId,
        'page': argData.page || 1,
        'page_size': 10,
        'status': argData.status,
        'idx_arr': {
          'idx': argData.searchType,
          'idx_value': argData.searchValue
        },
        'coupon_id': argData.couponId,
        'owner_token': argData.ownerToken
      };
      $.ajax({
        url: '/index.php?r=pc/AppShop/getUserCouponList',
        type: 'get',
        data: param,
        dataType: 'json',
        success: function(data){
          if (data.status == 999) {
              alertTip(data.data + (is_domain ? '' :'<div style="margin-top:10px;text-align:center;"><a style="background-color: #fcb500;color: white;text-align: center;width: 100px;height: 28px;line-height: 28px;border-radius: 4px;letter-spacing: 1px;font-size: 14px;cursor: pointer;display: inline-block;" target="_blank" href="/index.php?r=pc/Index/appVipPacket">确定</a><span style="background-color: #fcb500;color: white;text-align: center;width: 100px;height: 28px;line-height: 28px;border-radius: 4px;letter-spacing: 1px;font-size: 14px;cursor: pointer;display: inline-block;margin-left: 20px;" onclick=advancedApply();>申请试用</span></div>'));
              return;
          }
          if (data.status !== 0) {
            alertTip(data.data);
            return;
          }
          var usageData = data.data;
          var currentPage = data.current_page;
          var totalPage = data.total_page;
          var tableOptions;

          self.setUsageList(usageData);

          // if (data.total_page > 1) {
            tableOptions = {
              currentPage: currentPage,
              totalPages: totalPage,
              size: 'normal',
              alignment: 'center',
              itemTexts: function(type, page, current) {
                switch (type) {
                  case "first":
                    return "首页";
                  case "prev":
                    return "<";
                  case "next":
                    return ">";
                  case "last":
                    return "末页";
                  case "page":
                    return page;
                }
              },
              onPageClicked: function(e, originalEvent, type, page) {
                param['page'] = page;
                $.ajax({
                  url: '/index.php?r=pc/AppShop/getUserCouponList',
                  type: 'get',
                  data: param,
                  dataType: 'json',
                  success: function(data) {
                    if (data.status !== 0) {
                      alertTip(data.data);
                      return;
                    }
                    self.setUsageList(data.data);
                  }
                });
              }
            };
            $('#coupon-usage-toolbar').show().bootstrapPaginator(tableOptions);
          // } else {
          //   $('#coupon-usage-toolbar').hide();
          // }
        }
      });
    },
    // 设置优惠券使用情况列表
    setUsageList: function(data){
      if (!data.length) {
        $('#coupon-usage-tbody').html('');
        return false;
      }
      var fragment = document.createDocumentFragment();
      $.each(data, function(entryIndex, entry){
        // start
        var html = '<tr >';
        // 名称
        html += '<td>' + entry.coupon_title + '</td>';
        // 姓名
        html += '<td>' + entry.use_info.user_info.nickname + '</td>';
        // 电话
        html += '<td>' + (entry.use_info.user_info.phone || '无') + '</td>';
        // 领取时间
        html += '<td class="receive-time-td">' + entry.recv_time + '</td>';
        // 领取方式
        var receiveWayText = '';
        if(entry.recv_type == 0){
          receiveWayText = '自主领取';
        } else if(entry.recv_type == 1){
          receiveWayText = '商家赠送';
        } else if(entry.recv_type == 1){
          receiveWayText = '会员卡赠送';
        } else if(entry.recv_type == 1){
          receiveWayText = '集集乐';
        } else if(entry.recv_type == 2){
          receiveWayText = '抽奖获得';
        }
        html += '<td>' + receiveWayText + '</td>';
        // 核销情况
        var statusText = '';
        if(entry.status == 1){
          statusText = '未核销';
        } else if(entry.status == 2) {
          statusText = '已核销';
        } else if(entry.status == 3) {
          statusText = '已失效';
        }
        html += '<td>' + statusText + '</td>';
        // 核销时间
        html += '<td class="verify-time-td">' + (entry.status == 2 ? entry.consume_time : '') + '</td>';
        // 核销方式
        var verifyWay = '';
        var orderId = '';
        if(entry.status == 2){ // 已核销
          if(entry.type == 4){ // 储值券
            verifyWay = '已充值';
          } else if(!entry.use_info.order_info){
            if(entry.consume_time == 0){ // 未付款未扫码
              verifyWay = '被占用';
            } else {
              verifyWay = '扫码核销';
            }
          } else if(entry.use_info.order_info){
            if(entry.use_info.order_info.goods_type == 5){
              verifyWay = '当面付';
              orderId = entry.use_info.order_info.order_id;
            } else if(entry.use_info.order_info){
              verifyWay = '线上支付';
              orderId = entry.use_info.order_info.order_id;
            }
          }
        } 
        html += '<td>' + verifyWay + '</td>';
        // 核销订单号
        html += '<td class="order-id-td">' + orderId  + '</td>';
        // end
        html += '</tr>';
        $(fragment).append(html);
      });
      $('#coupon-usage-tbody').html(fragment);
    },
    getVerifyCodeInfo: function(code = {}){
      let self = this;
      $.ajax({
        url: '/index.php?r=pc/AppSellerCRM/getInfo',
        data: {
          verify_code : code,
          app_id: appId
        },
        dataType: 'json',
        success: function (res) {
          if (res.status != 0) {
            alertTip(res.data);
            return;
          }
          let info = res.data,
              form_data;
          if (info.length == 0) {
            alertTip('搜索不到这个核销码');
            return;
          }
          if (res.type == 'order') {
            form_data = info[0].form_data;
            if (form_data.goods_type == 3 && form_data.tostore_data && form_data.tostore_data.tostore_remark) {
              form_data.tostore_data.tostore_remark = form_data.tostore_data.tostore_remark.replace(/\n|\\n/g , '\n');
            }
          } else if (res.type == 'coupon') {
            form_data = info[0];
          }
          self.modifyCodeInfo(form_data, res.type);
          $('#verifyCodeInputModal').modal('hide');
          $('#verifyDetailModal').modal();
        }
      });
    },
    modifyCodeInfo: function (orderInfo, infoType) {      
      if (infoType == 'order') {
        let goodsType     = orderInfo.goods_type;
        let $goodsSection = $('.verify-order-section [goods-type='+goodsType+']');
        $('#verifyDetailModal .verify-order-section').show().siblings().hide();
        $goodsSection.show().siblings('[goods-type]').hide();
        
        $('.goods-info-section').html(orderInfo.goods_info.map(goods => `
          <div class="goods-info">
            <img src="${goods.cover}">
            <div class="goods-other">
              <span class="goods-title">${goods.is_benefit_goods == 1 ? '<span class="goods-benefit">赠品</span>':''}${goods.goods_name}</span>
              ${goods.model_name ? `<div class="goods-size"><span>${goods.model_value.toString()}</span></div>` : ''}
              <div class="goods-money"><span class="goods-price">￥${goods.price} x <span>${goods.num}</span></span><span class="goods-total">共${goods.num}件 <span>￥${goods.num * goods.price}</span>（不含运费）</span></div>
            </div>
          </div>`.trim()).join(''));
        $goodsSection.find('.address-info').html(`${orderInfo.address_info.province.text}${orderInfo.address_info.city.text}${orderInfo.address_info.district.text}${orderInfo.address_info.detailAddress}，${orderInfo.address_info.name}，<text class="order-phone">${orderInfo.address_info.contact}</text>`);
        switch (+goodsType) {
          case 0: break;
          case 1: $goodsSection.find('.appointment-info').html(orderInfo.appointment_time); break;
          case 3: $goodsSection.html(`<div class="tostore-info-item">
                    <span>到店号：</span>
                    <span>${orderInfo.tostore_data.formatted_queue_num}</span>
                  </div>
                  <div class="tostore-info-item">
                    <span>到店方式：</span>
                    <span class="info-content">${orderInfo.tostore_data.tostore_order_type == 1 ? '点餐' : orderInfo.tostore_data.tostore_order_type == 2 ? '预约' : '其他'}</span>
                  </div>
                  <div class="tostore-info-item">
                    <span>位置信息：</span>
                    <span>${orderInfo.tostore_data.location_name || '无'}</span>
                  </div>
                  ${orderInfo.tostore_data.tostore_order_type == 1 
                    ? `<div class="tostore-info-item"><span>取餐时间：</span><span>${orderInfo.tostore_data.appointed_time}</span></div>` 
                    : `${orderInfo.tostore_data.tostore_order_type == 2 ? `<div class="tostore-info-item"><span>预约时间：</span>
                        <span>${orderInfo.tostore_data.tostore_appointment_time}</span></div>` : ''}`
                  }
                  <div class="tostore-info-item">
                    <span>手机号：</span>
                    <span>${orderInfo.tostore_data.tostore_buyer_phone}</span>
                  </div>
                  <div class="tostore-info-item">
                    <span>备注：</span>
                    <span>${orderInfo.tostore_data.tostore_remark}</span>
                  </div>`);
                  break;
        }
      } else if (infoType == 'coupon') {
        let $couponSection = $('#verifyDetailModal .verify-coupon-section');
        
        $couponSection.show().siblings().hide();
        $couponSection.html(`
          <div class="coupon-info">
            <img class="coupon-logo" src="${orderInfo.logo}">
            <div class="coupon-other">
              <div class="coupon-title">${orderInfo.title}</div>
              <div class="tostore-info-item">
                <span>可用时间</span>
                <span>${orderInfo.start_use_date}-${orderInfo.end_use_date} ${orderInfo.start_use_time}-${orderInfo.end_use_time}</span>
              </div>
              <div class="tostore-info-item">
                <span>核销码</span>
                <span>${orderInfo.verify_code}</span>
              </div>
              <div class="tostore-info-item">
                <span>用户</span>
                <span>${orderInfo.use_info.user_info.nickname}</span>
              </div>
              <div class="tostore-info-item">
                <span>电话</span>
                <span>${orderInfo.use_info.user_info.phone || '无'}</span>
              </div>
              <div class="tostore-info-item">
                <span>领取时间</span>
                <span>${orderInfo.recv_time}</span>
              </div>
              <div class="tostore-info-item">
                <span>领取方式</span>
                <span>${ orderInfo.recv_type == 0 
                  ? '客户领取'
                  : orderInfo.recv_type == 1 
                      ? '商家赠送'
                      : orderInfo.recv_type == 2 
                          ? '会员卡赠送'
                          : orderInfo.recv_type == 3 ? '集集乐赠送' : ''} </span>
              </div>
            </div>
          </div>
        `.trim());
      }
    },
    confirmVerifyCode: function (code){
      let self = this;
      $.ajax({
        url: '/index.php?r=pc/AppSellerCRM/VerifyOrder',
        data: {
          code: code,
          app_id: appId
        },
        dataType: 'json',
        success: function (res) {
          if (res.status !== 0) {
            alertTip(res.data);
            return;
          }
          $('#verifyDetailModal').modal('hide');
          self.getUsageList({
            page: $('#coupon-usage-toolbar li.active a').text()            
          })
        }
      });
    }
  }
initialCouponCard();
