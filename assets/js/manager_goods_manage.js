/**
 * iteration by yongming huang on 2017/9/19
 */
var goodsManager = {
    
    bindEvent: function() {
        var that = this;
        $(document).on('click', '.add-goods-specification', function() {
            var $modal = $('#goodsSpecificationModal');
            $modal.find('.goods-specification.active').removeClass('active');
            $.each(speModels, function(key, m) {
                $modal.find('.goods-specification[data-index=' + key + ']').addClass('active');
            });
            $('#goodsSpecificationModal').modal();

        });

        $('#goodsSpecificationModal').on('click', '.goods-specification', function() {
            if (!$(this).hasClass('active') && $('.goods-specification.active').length >= 5) {
                alertTip('不能超过5个属性');
                return;
            }
            $(this).toggleClass('active');
        });

        
        $('#goodsSpecificationModal').on('click', '.goods-specification-confirm', function() {

            var $specification, 
                spcId, 
                nomatch = true,
                $active = $('#goodsSpecificationModal .goods-specification.active');

            $.each(speModels, function(key, model) {
                nomatch = true;
                $active.each(function(index, activeSpe) {
                    if ($(activeSpe).attr('data-index') == key) {
                        nomatch = false;
                        return false;
                    }
                });
                if(nomatch) {
                    delete speModels[key];
                }
            });

            $active.each(function(index, spe) {
                $specification = $(spe);
                spcId = $specification.attr('data-index');

                if (!speModels[spcId]) {
                    speModels[spcId] = {
                        id: spcId,
                        name: $specification.text(),
                        subModelName: [],
                        subModelId: []
                    };
                }
            });
            $('#goodsSpecificationModal').modal('hide');
            modifyGoodsSpecification();
            paintSpecificationTable();
        });



        
    },   
    init: function() {
         this.bindEvent();
    }
}

var goodsFieldToShow = ['price', 'sales', 'stock', 'title', 'category', 'cover', 'add_time']; 
var specificationIndex = 30,
    modelChanged = 0,
    speModels = {},
    subPriceStock = {};
//    Editor;

function initialGoodsManage() {

  goodsManager.init();
  bindGoodsEvents();
}

function bindGoodsEvents() {
  
  $('#goodsSpecificationModal').on('click', '.add-custom-specification', function() {
    // 
    $(this).before('<span class="btn btn-sm btn-default goods-specification-input"><input class="form-control" type="text"><span class="glyphicon glyphicon-ok"></span></span>').find('input').focus();
  }).on('click', '.goods-specification-input > .glyphicon-ok', function() {
    // 
    var val = $(this).siblings('input').val().trim();
    if (val.length > 4) {
      alertTip('自定义规格不能超过4个');
      return;
    }
    $(this).parent().removeClass('goods-specification-input').addClass('goods-specification').html(val).attr('data-index', specificationIndex++);
  });

  // 
  $('.specification-detail-container').on('click', '.glyphicon-remove', function() {
    var modelId = $(this).closest('li').attr('data-model');

    if ($(this).hasClass('sub-specification-remove')) {
      // 
      var subModelId = Number($(this).parent().attr('data-id')),
        index = speModels[modelId].subModelId.indexOf(subModelId);

      subModelId && speModels[modelId].subModelId.splice(index, 1);
      subModelId && speModels[modelId].subModelName.splice(index, 1);
      $(this).parent().remove();

    } else {
      // 
      delete speModels[modelId];
      $(this).closest('li').remove();
    }
    paintSpecificationTable();

  }).on('click', '.sub-specification-confirm', function() {
    // debugger;
    // 
    var val = $(this).siblings('input').val().trim(),
      modelId = $(this).closest('li').attr('data-model'),
      label = $(this).siblings('label'),
      subId, subModelIndex;

    if (!val) {
      alertTip('不知道');
      return;
    }

    $(this).parent().removeClass('editing');
    if (label.text() === '') {
      // 
      subId = specificationIndex++;
      $(this).parent().attr('data-id', subId);
      label.text(val);
      speModels[modelId].subModelName.push(val);
      speModels[modelId].subModelId.push(subId);
      paintSpecificationTable();

    } else if (label.text() !== val) {
      // 
      subId = $(this).parent().attr('data-id');
      subModelIndex = speModels[modelId].subModelId.indexOf(Number(subId));
      speModels[modelId].subModelName.splice(subModelIndex, 1, val);
      label.text(val);
      paintSpecificationTable();
    }
  }).on('click', '.sub-specification-edit', function() {
    // 
    $(this).parent().addClass('editing');
  }).on('click', '.add-sub-specification', function(e) {
    // 
    e.preventDefault();
    $(this).before('<div class="specification-case editing"><input class="form-control" type="text"><label></label><span class="glyphicon glyphicon-ok sub-specification-confirm"></span><span class="glyphicon glyphicon-pencil sub-specification-edit"></span><span class="glyphicon glyphicon-remove sub-specification-remove"></span></div>');
  }).on('input', '.spe-all-price', function() {
    // 
    $('.specification-price').val($(this).val()).trigger('input');
  }).on('input', '.spe-all-stock', function() {
    // 
    $('.specification-stock').val($(this).val()).trigger('input');
  }).on('input', '.spe-all-virtualPrice', function() {
    // 
    $('.specification-virtualPrice').val($(this).val()).trigger('input');
  }).on('input', '.specification-detail-tbody .specification-price', function() {
    var key = $(this).closest('div[data-models]').attr('data-models');

    subPriceStock[key] = subPriceStock[key] || {};
    subPriceStock[key].price = $(this).val();
  }).on('input', '.specification-detail-tbody .specification-stock', function() {
    var key = $(this).closest('div[data-models]').attr('data-models');

    subPriceStock[key] = subPriceStock[key] || {};
    subPriceStock[key].stock = $(this).val();
  });
}


function showGoodsEditWrap(data_id){


  $(".goods-edit-wrap").find('.save-data').removeClass('disabled');

  // 缂栬緫鍟嗗搧
  if (data_id) {
    $.ajax({
      url: '/index.php?r=pc/AppShop/getGoods',
      type: 'get',
      data: {
        app_id: appId,
        data_id: data_id
      },
      dataType: 'json',
      success: function(data) {
        if (data.status !== 0) {
          alertTip(data.data);
          return;
        }

        if(data.data[0].form_data.is_seckill == 1){  //濡傛灉鏄鏉€鍟嗗搧锛屽垯鏃犳硶淇敼
          alertTip('褰撳墠鍟嗗搧绉掓潃娲诲姩姝ｅ湪杩涜涓紝鏃犳硶淇敼锛屽彧鑳芥煡鐪嬨€傚鏋滈渶瑕佷慨鏀癸紝璇峰厛鍒犻櫎璇ョ鏉€鍟嗗搧銆�');
          $(".goods-edit-wrap").find('.save-data').addClass('disabled');
        }

        modifyGoodsContent(data.data);
        $('.goods-show-wrap').hide();
        $('.goods-edit-wrap').attr('data-id', data_id || '').show().siblings().hide();
      }
    });
    return;
  }

  modifyGoodsContent();
  $('.goods-show-wrap').hide();
  $('.goods-edit-wrap').attr('data-id', data_id || '').show().siblings().hide();
}
// 鍟嗗搧缂栬緫椤靛唴瀹�
function modifyGoodsContent(app_data){
  var app_data = app_data ? app_data[0].form_data : '',
    // editor_id = 1,
    html, field;
    if(app_data["delivery_id"]){
       $(".receiving_info").val(app_data["delivery_id"]);
     }else{
       $(".receiving_info").val(0);
     }
 
  $('.goods-field-ul > li').each(function(index, li) {
    field = $(li).attr('data-field');
    switch (field) {
      case 'category':
        var $category_li = $('.goods-category-ul li').clone(),
          category_arr;

        // 鍒犻櫎鍒嗙被'鍏ㄩ儴'
        $category_li.removeClass('active').splice(0, 1);

        if ($category_li.length) {
          category_arr = app_data && app_data[field];
          category_arr && $.each($category_li, function() {
            category_arr.indexOf($(this).find('a').text()) >= 0 && $(this).addClass('active');
          });
        } else {
          $category_li = '<span>鏃�</span>';
        }
        $(li).find('.goods-edit-cate-ul').html($category_li);
        break;
      case 'title':
      case 'stock':
      case 'price':
      case 'sale_price':
      case 'commodity_code':
      case 'mass':
      case 'volume':
        $(li).find('input').val(app_data ? app_data[field] : '');
        break;
      case 'express_rule_id':
        if(app_data[field] && app_data[field] != 0){
          $('#express').prop('checked',true).trigger('click');
          $(li).find('.express-select select').val(app_data ? app_data[field] : '');
        }else{
          $('#freeExpress').prop('checked',true).trigger('click');
        }
        break;
      case 'cover':
        app_data ? $(li).find('img').attr('src', app_data[field]) : $(li).find('img').removeAttr('src');
        break;
      case 'type':
      case 'is_recommend':
        $(li).find('select').val(app_data ? app_data[field] : 0);
        break;
      case 'description':
    //    Editor.html(app_data ? app_data[field] : '');
        break;
      case 'img_urls':
        html = '';
        app_data && app_data[field] && $.each(app_data[field], function(index, imgurl) {
          html += '<a class="thumbnail" href="javascript:;"><img class="field-img" src=' + imgurl + '><span class="broadcast-img-dele">&times;</span></a>';
        });
        $(li).find('.broadcast-img-list').html(html);
        break;
      case 'model_items':
        if (app_data) {
          $.each(app_data[field], function(index, data) {
            $.each(data.model.split(','), function(i, id) {
              id = Number(id);
              specificationIndex = specificationIndex > id ? specificationIndex : id;
            });
            subPriceStock[data.model] = {
              price: data.price ? Number(data.price) : '',
              stock: data.stock ? Number(data.stock) : '',
              img_url: data.img_url
            };
          });
          specificationIndex++;
          speModels = app_data.model || {};
          $.each(speModels, function(entryIndex, entry){
            if (entry["subModelId"]) {
              $.each(entry["subModelId"], function(lineIndex, line){
                speModels[entryIndex]["subModelId"][lineIndex] = Number(line);
              });
            }
          });
          modifyGoodsSpecification();
          paintSpecificationTable();
          if(app_data[field].length){
            $('.goods-field-ul').find('li[data-field="stock"], li[data-field="price"]').hide();
          } else {
            $('.goods-field-ul').find('li[data-field="stock"], li[data-field="price"]').show();
          }
                        } else {
                          $('.specification-selected-list, .specification-detail-table').html('');
          $('.goods-field-ul').find('li[data-field="stock"], li[data-field="price"]').show();
          speModels = {};
        }
        break;
      case 'open-location': 
        if (app_data.region_id && app_data.region_ids) {
          $(li).find('input[type="checkbox"]').prop('checked', true);
          $('#location-li').show();
          $('#province-select').empty().html('<option value="">閫夋嫨鐪�</option>');
          $('#city-select').empty().html('<option value="">閫夋嫨甯�</option>');
          $('#area-select').empty().html('<option value="">閫夋嫨鍖�</option>');
          getArea('#province-select', 0, '璇锋眰鐪佸垪琛ㄥけ璐ワ紝璇峰埛鏂伴噸璇�', app_data.region_ids[0]);
          getArea('#city-select', app_data.region_ids[0], '璇锋眰鐪佸垪琛ㄥけ璐ワ紝璇峰埛鏂伴噸璇�', app_data.region_ids[1]);
          getArea('#area-select', app_data.region_ids[1], '璇锋眰鐪佸垪琛ㄥけ璐ワ紝璇峰埛鏂伴噸璇�', app_data.region_ids[2]);
        }else{
          $(li).find('input[type="checkbox"]').prop('checked', false);
          $('#location-li').hide();
        }
        break;
    }
  });
}

// 淇濆瓨鍟嗗搧鏁版嵁
function saveGoodsData() {
  var $cur_obj = $('.sidebar-nav.active'),
      obj_com = $cur_obj.attr('obj-component'),
      appData = {},
      completeInfo, type, field, necessary, specData, subPrice, subStock, errorInfo;

  $('.goods-field-ul > li:visible').each(function(index, li) {
    field = $(li).attr('data-field');
    necessary = Number($(li).attr('data-necessary'));

    switch (field) {
      case 'category':
        appData[field] = [];
        $('.goods-edit-cate-ul li').each(function() {
          if ($(this).hasClass('active')) {
            appData[field].push($(this).attr('data-id'));
          }
        });
        break;
      case 'title':
      case 'stock':
      case 'price':
      case 'sale_price':
      case 'commodity_code':
        appData[field] = $(li).find('input').val().trim();
        break;
      case 'mass':
      case 'volume':
        appData[field] = $(li).find('input').val().trim() > 0 ? $(li).find('input').val().trim() : '';
        if($('#freeExpress').prop('checked')){
          necessary = false;
        }
        break;
      case 'express_rule_id':
        if($('#freeExpress').prop('checked')){
          appData[field] = 0;
          necessary = false;
        }else{
          appData[field] = $(li).find('.express-select select').val();
        }
        break;
      case 'cover':
        appData[field] = $(li).find('img').attr('src');
        break;
      case 'type':
      case 'is_recommend':
        appData[field] = $(li).find('select').val();
        break;
      case 'img_urls':
        appData[field] = [];
        $.each($(li).find('.broadcast-img-list img'), function(index, imgurl) {
          imgurl && $(imgurl).attr('src') && appData[field].push($(imgurl).attr('src'));
        });
        break;
      case 'description':
        break;
      case 'model_items':
        if ($('.specification-detail-tbody').length) {
          appData.model = speModels;
          appData[field] = {};
          $.each($('.specification-detail-tbody > div'), function() {
            specData = $(this).attr('data-models');
            appData[field][specData] = {};
            subPrice = $(this).find('.specification-price').val().trim();
            subStock = $(this).find('.specification-stock').val().trim();
            var imgurl = $(this).find('.specification-img').attr('src') || '';
            if (!subPrice || !subStock) {
              necessary = true;
              appData[field] = '';
              return false;
            } else if (+subPrice < 0 || +subStock < 0) {
              errorInfo = '鍟嗗搧浠锋牸鍜屽簱瀛樹笉鑳藉皬浜�0';
              return false;
            } else {
              appData[field][specData].price = subPrice;
              appData[field][specData].stock = subStock;
              appData[field][specData].img_url = imgurl;
            }
          });
          $('.specification-detail-tbody .specification-price').each(function(index, item){
            var price = +$(this).val().trim();
            if(price && price != '0'){
              appData.price = price;
              appData.stock = +$('.specification-detail-tbody .specification-stock').eq(index).val();
              return false;
            }
          });
        }
        break;
    }

    if (necessary && (!appData[field] || !appData[field].length)) {
      completeInfo = $(li).attr('data-name');
      return false;
    }
  });

  if (completeInfo) {
    alertTip('璇疯ˉ鍏� ' + completeInfo + ' 淇℃伅');
    return;
  }
  if (errorInfo){
    alertTip(errorInfo);
    return;
  }
  appData.model_is_change = modelChanged;
  appData.delivery_id = $(".receiving_info option:selected").val();
  if ($('#city-location').prop('checked') && !$('#area-select').val()  ) {
    alertTip('璇烽€夋嫨鍩庡競鍦板尯');
    return;
  }else if($('#city-location').prop('checked') && $('#area-select').val()){
    appData.region_id = $('#area-select').val();
  }else{
    appData.region_id = ''
  }
  $.ajax({
    url: '/index.php?r=pc/AppShop/addGoods',
    type: 'post',
    data: {
      app_id: appId,
      form_data: appData,
      data_id: $('.goods-edit-wrap').attr('data-id'),
    },
    dataType: 'json',
    success: function(data) {
      if (data.status == 99) {
        alertTip(data.data + '<div style="margin-top:10px;text-align:center;"><a style="background-color: #fcb500;color: white;text-align: center;width: 100px;height: 28px;line-height: 28px;border-radius: 4px;letter-spacing: 1px;font-size: 14px;cursor: pointer;display: inline-block;" target="_blank" href="/index.php?r=pc/Index/appVipPacket">纭畾</a></div>');
        return;
      }
      if (data.status !== 0) {
        alertTip(data.data);
        return;
      }
      $('.goods-edit-wrap').hide();
      $('.goods-show-wrap').show();
      $('.goods-category-ul li.active').trigger('click');
      modelChanged = 0;
    }
  });
}
// 
function modifyGoodsSpecification(){
  var list = '';

  $.each(speModels, function(index, spe){
    list += '<li data-model='+index+'><span class="specification-case"><span class="specification-name">'+spe.name+' </span><span class="glyphicon glyphicon-remove"></span></span><div class="sub-specification-list">';

    spe.subModelId && $.each(spe.subModelId, function(index, id) {
      list += '<div class="specification-case" data-id=' + id + '><input class="form-control" type="text" value=' + spe.subModelName[index] + '><label>' + spe.subModelName[index] + '</label><span class="glyphicon glyphicon-ok sub-specification-confirm"></span><span class="glyphicon glyphicon-pencil sub-specification-edit"></span><span class="glyphicon glyphicon-remove sub-specification-remove"></span></div>';
    });

    list += '<button class="btn btn-default btn-sm add-sub-specification">添加类型</button></div></li>';
  });
  $('.specification-selected-list').html(list);
}
// 
function paintSpecificationTable(){
  var head = body = '',
    bodyFragment = $(document.createDocumentFragment()),
    subModelNameArr = [],
    tableData = [],
    cases, label, name,
    page_href = GetQueryString('h');

  $.each(speModels, function(key, model) {
    if (model.subModelId.length) {
      head += '<span>'+model.name+'</span>';
      subModelNameArr.push((function(arr){
        $.each(model.subModelId, function(index, id){
          arr.push({
            id: id,
            name: model.subModelName[index]
          });
        });
        return arr;
      })([]));
    }
  });

  if (subModelNameArr.length) {
    let tableDataLength = 1;
    let pieces;
    subModelNameArr.forEach(function(subModel, index){
      tableDataLength *= subModel.length;
    });
    for (let m = tableDataLength - 1; m >= 0; m--) {
      tableData.push({ id: [], name: [] });
    }
    for (let i = 0, j = subModelNameArr.length - 1; i <= j; i++) {
      let subModel = subModelNameArr[i];
      
      pieces = i == 0 ? subModel.length : pieces*subModel.length;
      let pieceLength = tableDataLength/pieces;
      let loopCount = 1;
      for (let index = 0; index <= pieceLength*loopCount - 1;) {
        let modelIndex = Math.floor(index/pieceLength)%subModel.length;
        
        tableData[index].id.push(subModel[modelIndex].id);
        tableData[index].name.push(subModel[modelIndex].name);
        index++;
        if (index > pieceLength*loopCount - 1) {
          if (loopCount >= pieces) {
            break;
          } else {
            loopCount++;
          }
        }
      }
    }
  }

  body = getTableHtml(tableData);

  if (body) {

    if(page_href == 'manager_goods_manage'){
      head += '<span>鍥剧墖</span>';
    }

    head = '<div class="specification-detail-thead">' + head + '<span>价格: <input class="spe-all-price form-control input-sm" type="text" placeholder="统一价格"></span><span>库存: <input class="spe-all-stock form-control input-sm" type="text" placeholder="统一库存"></span><span style="min-width: 160px;">虚拟价格: <input class="spe-all-virtualPrice form-control input-sm" type="text" placeholder="统一虚拟价格"></span></div>';
    body = '<div class="specification-detail-tbody">' + body + '</div>';
    bodyFragment.append(body).find('.specification-detail-tbody > div').each(function(index, row) {
      var key = $(row).attr('data-models'),
        price = stock = virtual_price =  '',
        imgurl = '',
        body_goods = '';

      if (subPriceStock[key]) {
        price = subPriceStock[key].price;
        stock = subPriceStock[key].stock;
        imgurl = subPriceStock[key].img_url;
        virtual_price = subPriceStock[key].virtual_price || '';
      }
      if(page_href == 'manager_goods_manage'){
        body_goods = '<span><b class="specification-img-wrap thumbnail"><img class="specification-img" src="'+imgurl+'" alt="" /></b><a class="specification-img-change field-upload-img">鏇存崲</a></span>';
      }
      $(row).append(body_goods + '<span><input class="specification-price form-control" type="text" value=' + price + '></span><span><input class="specification-stock form-control" type="text" value=' + stock + '></span><span><input class="specification-virtualPrice form-control" type="text" value=' + virtual_price + '></span>');
    });
    $('.specification-detail-table').html(head).append(bodyFragment);
    $('.goods-field-ul').find('li[data-field="stock"], li[data-field="price"], li[data-field="virtual_price"]').hide();

  } else {
    $('.specification-detail-table').html('');
    $('.goods-field-ul').find('li[data-field="stock"], li[data-field="price"], li[data-field="virtual_price"]').show();
  }
  modelChanged = 1;
}

function getTableHtml(array){
  var html = '';

  if (!array || !array.length) {
    return html;
  }
  $.each(array, function(i, data) {
    html += '<div data-models=' + data.id.toString() + '>';
    $.each(data.name, function(index, name) {
      html += '<span>' + name + '</span>';
    });
    html += '</div>';
  });

  return html;
}

//
$(function(){
  $('.middle-info').on('click','.additional_val',function(){
    console.log(1);
  });
  $('li[data-field="price"]').on('keyup',function(){
    var input = $(this).find("input");
    console.log(input.val())
    input.val(input.val().replace(/[^0-9.]/g,''));
  });
})


initialGoodsManage();
