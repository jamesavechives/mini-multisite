var items_js = items_js || false;
var base_url = $("#base_url").val();

var attachment_id = 0;
var input_id = 0;
var ignore_input = '';

$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();   
if( items_js == false ){
    $( document ).on( 'click', '#btn-add-picture', function (e) {
            var fileInput = $( '<input>' ).attr({
                    type: 'file',
                    id: 'images' + input_id,
                    name: 'images[]',
                    multiple: 'true',
            })
            input_id++;
            fileInput.appendTo( '#new-input-file' );
            fileInput.click();
    });

    $( document ).on( 'change', 'input[type=file]', function() {
            var files = $( this )[0].files;
            if ( files ) {
                    var reader_id = attachment_id;
                    for ( i = 0; files[i]; i++ ) {
                            if ( $( this ).validate_file( files[i], $( this ).attr( 'id' ) ) ) {
                                    // Create preview element
                                    $( '#sortable' ).append( '\
                                            <div class="img-preview img-preview-gallery d-flex flex-column" data-image="raw_img_'+ files[i]['name'] +'">\
                                                    <img id="attachment-img' + attachment_id + '">\
                                                    <div class="del-attachment btn btn-sm" data-name="' + $( this ).attr( 'id' ) + files[i]['name'] + '">Delete</div>\
                                                    <input type="hidden" name="sorts[]" value="raw_img_'+ files[i]['name'] +'" />\
                                                    </div>\
                                            ');

                                    // Populate preview element (cannot use attachment_id because reader.onload is asyncronous)
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                            $( '#attachment-img' + reader_id ).attr( 'src', e.target.result );
                                            reader_id++;
                                    }
                                    reader.readAsDataURL( files[i] );
                                    attachment_id++;
                            }
                    }
            }
    });
    /*
     * Delete picture
     * If picture was already is the mandate, get it's ID for deletion upon submit
     * If picture was added but not yet submited, ignore the input
     */
    $( document ).on( 'click', '.del-attachment', function() {
            if ( $( this ).data( 'id' ) ) {
                    var deleting = $( '#delete-existing-file' ).val();
                    if ( deleting == '' ) {
                            $('#delete-existing-file' ).val( $( this ).data( 'id' ) );
                    } else {
                            $( '#delete-existing-file' ).val( deleting + ',' + $( this ).data( 'id' ) );
                    }
            } else {
                    if ( ignore_input == '' ) {
                            ignore_input = $( this ).data( 'name' );
                    } else {
                            ignore_input = ignore_input + ',' + $( this ).data( 'name' );
                    }
            }
            $( this ).parent().remove();
    });
    /*
     * Onclick change the parent category checkbox
     * 
     */
    $( document ).on('change','.pcate',function(){
        var pid = $(this).data('id');
        if($(this).is(':checked')){
            $('.sub'+pid).prop('checked', true);
        }
        else{
            $('.sub'+pid).prop('checked', false);
        }
    });
    /*
     * Onclick change the sub category checkbox
     * 
     */
    $( document ).on('change','.subcate',function(){
        var pid = $(this).data('pid');
        if($(this).is(':checked')){
            $('.p'+pid).prop('checked', true);
        }
    });
  /*
   * Onclick add goods specification button
   * 
   */
       $( document ).on('click', '.add-goods-specification', function() {
                var $modal = $('#goodsSpecificationModal');
                $('#goodsSpecificationModal').modal("show");
//                $modal.find('.goods-specification.active').removeClass('active');
//                $.each(speModels, function(key, m) {
//                    $modal.find('.goods-specification[data-index=' + key + ']').addClass('active');
//                });
//                $('#goodsSpecificationModal').modal();

            });
       $( document ).on('click', '.goods-specification', function() {
                if (!$(this).hasClass('active') && $('.goods-specification.active').length >= 5) {
                    alertTip('最多只能选择5个规格');
                    return;
                }
                $(this).toggleClass('active');
            });
         $( document ).on('click', '.goods-specification-confirm', function() {

            var $specification, 
                spcId, 
                nomatch = true,
                $active = $('#goodsSpecificationModal .goods-specification.active');

//            $.each(speModels, function(key, model) {
//                nomatch = true;
//                $active.each(function(index, activeSpe) {
//                    if ($(activeSpe).attr('data-index') == key) {
//                        nomatch = false;
//                        return false;
//                    }
//                });
//                if(nomatch) {
//                    delete speModels[key];
//                }
//            });

            $active.each(function(index, spe) {
                $specification = $(spe);
                spcId = $specification.attr('data-index');

//                if (!speModels[spcId]) {
//                    speModels[spcId] = {
//                        id: spcId,
//                        name: $specification.text(),
//                        subModelName: [],
//                        subModelId: []
//                    };
//                }
            });
            $('#goodsSpecificationModal').modal('hide');
            modifyGoodsSpecification();
            paintSpecificationTable();
        });
          $(document).on('click', '.add-custom-specification', function() {
    // 娣诲姞瑙勬牸
                $(this).before('<span class="btn btn-sm btn-default goods-specification-input"><input class="form-control" type="text"><span class="glyphicon glyphicon-ok"></span></span>').find('input').focus();
              }).on('click', '.goods-specification-input > .glyphicon-ok', function() {
                // 淇濆瓨鏂版坊瑙勬牸
                var val = $(this).siblings('input').val().trim();
                if (val.length > 4) {
                  alertTip('不能大于4个规格');
                  return;
                }
                $(this).parent().removeClass('goods-specification-input').addClass('goods-specification').html(val).attr('data-index', specificationIndex++);
          });
    items_js = true;
}
jQuery( '#form-edit-mandate' ).submit( function(e) {
        e.preventDefault();

        var formData = jQuery( this ).create_form_data();
        jQuery.ajax({
                url : base_url+'admin/create_products',
                type : 'post',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                        show_page_for_backend(base_url+"admin/products");
                        console.log(response);
                        alertTip("提交成功");
                },
                error : function (e){
                    console.log(e);
                }
        })
});
jQuery.fn.validate_file = function( file, id ) {
	if ( file['size'] > 300000 ) {
		alertTip("文件太大!");
		if ( ignore_input == '' ) {
			ignore_input = id + file['name'];
		} else {
			ignore_input = ignore_input + ',' + id + file['name'];
		}
		return false;
	}
	return true;
}
jQuery.fn.create_form_data = function() {
	var formData = new FormData( jQuery( '#form-edit-mandate' )[0] );
	var ignored = ignore_input.split( ',' );

	for ( i = 0; i < input_id; i++ ) {
		if ( jQuery( '#images' + i ).length ) {
			var files = jQuery( '#images' + i )[0].files;
			if ( files ) {
				for ( j = 0; files[j]; j++ ) {
					var fileName = 'images' + i + files[j]['name'];
					if ( jQuery.inArray( fileName, ignored ) == -1 ) {
						formData.append( 'images[]', files[j], files[j]['name'] );
					}
				}
			}
		}
	}
	return formData;
}

jQuery( '#form-edit-site' ).submit( function(e) {
        e.preventDefault();

        var formData = new FormData( jQuery( '#form-edit-site' )[0] );
        jQuery.ajax({
                url : base_url+'admin/create_site',
                type : 'post',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                        show_page_for_backend(base_url+"admin/sites");
                        console.log(response);
                        alertTip("提交成功!");
                },
                error : function (e){
                    console.log(e);
                }
        })
});

jQuery( '#form-edit-mysite' ).submit( function(e) {
        e.preventDefault();

        var formData = new FormData( jQuery( '#form-edit-mysite' )[0] );
        jQuery.ajax({
                url : base_url+'admin/update_site',
                type : 'post',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                        alertTip("提交成功!");
                        show_page_for_backend(base_url+"admin/settings");
                        
                },
                error : function (e){
                    console.log(e);
                }
        })
});

function delete_item(pid){
    confirmTip({ content: '确定要删除此商品？'}, function(){
        jQuery.ajax({
                    url : base_url+'admin/delete_products?pid='+pid,
                    type : 'get',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                            show_page_for_backend(base_url+"admin/products");
                            alertTip("删除成功!");
                    }
            });
    });
}
