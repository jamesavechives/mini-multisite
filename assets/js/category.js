var cate_js = cate_js || false;
var base_url = $("#base_url").val();
var bool_img = 0;

if( cate_js == false ){
    $( document ).on( 'click', '#btn-upload-picture', function (e) {
            var fileInput = $('#cate_image');
            fileInput.click();
    });

    $( document ).on( 'change', 'input[name=cate-image]', function() {
            var files = $( this )[0].files;
            if ( files ) {
                            if ( $( this ).validate_img( files[0] ) ) {
                                    // Create preview element
                                    $( '#img-div' ).html( '\
                                            <div class="image-preview img-preview-gallery d-flex flex-column" data-image="raw_img_'+ files[0]['name'] +'">\
                                                    <img style="width:100px;height:100px" id="attachment-img" />\
                                                    <input type="hidden" name="upload_img" value="raw_img_'+ files[0]['name'] +'" />\
                                                    </div>\
                                            ');

                                    // Populate preview element (cannot use attachment_id because reader.onload is asyncronous)
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                            $( '#attachment-img' ).attr( 'src', e.target.result );
                                    }
                                    reader.readAsDataURL( files[0] );
                                    bool_img = 1;
                            }
            }
    });
    $(document).on('change','input[name="ctype"]',function(){
        var a = $('input[name="ctype"]:checked').val();
        if(a==1){
            $('.subclass').show();
        } else {
            $('.subclass').hide();
        }
    });
    cate_js = true;
}
$( document ).ready(function(){
    var cid = $('#c_id').val();
    var ctype = $('#c_type').val();
    if(cid>0 && ctype==0){
        $('.subclass').hide();
        $("input[type=radio]").prop("disabled",true);
    }
    else if(cid>0 && ctype==1){
        $('.subclass').show();
        $("input[type=radio]").prop("disabled",true);
        $('#cate_parent').prop('disabled',true);
    }
    else {
    }
});

jQuery( '#form-edit-category' ).submit( function(e) {
        e.preventDefault();

        var formData = jQuery( this ).generate_form_data();
        jQuery.ajax({
                url : base_url+'admin/create_category',
                type : 'post',
                data : formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                        show_page_for_backend(base_url+"admin/products_categories");
                        console.log(response);
                        alertTip("提交成功!");
                },
                error : function (e){
                    console.log(e);
                }
        })
});

jQuery.fn.validate_img = function( file ) {
	if ( file['size'] > 300000 ) {
		alertTip("文件太大!!");
		return false;
	}
	return true;
}

jQuery.fn.generate_form_data = function() {
	var formData = new FormData( jQuery( '#form-edit-category' )[0] );

        if ( jQuery( '#cate_image' ).length && bool_img!=0 ) {
                var files = jQuery( '#cate_image')[0].files;
                if ( typeof(files[0])!='undefined' ) {
                    formData.append( 'cate_image', files[0], files[0]['name'] );
                }
        }
	return formData;
}

