var base_url = $("#base_url").val();

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

$("#btn-upload-logo").click(function(e){
    $("#mediaModal").hide();
    $( "#mediaModal" ).modal("show");
    var from = $(this).data('from');
    show_page_for_modal(base_url+'media/photo_list?from='+from);
});

function changeLogo(guid)
{
    $( '#img-div' ).html( '\
                                            <div class="image-preview img-preview-gallery d-flex flex-column">\
                                                    <img style="width:100px;height:100px" src="'+guid+'" />\
                                                    <input type="hidden" name="app-logo" value="'+guid+'" />\
                                                    </div>\
                                            ');
    $("#mediaModal").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#mediaModal").hide();
}

