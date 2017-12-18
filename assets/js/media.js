var media_js = media_js || false;
var base_url = $("#base_url").val();
var file;
if( media_js == false ){
    $( document ).on( 'click', '#btn-upload-media', function (e) {
            var fileInput = $('#media_image');
            fileInput.click();
    });

    $( document ).on( 'change', 'input[name=media-image]', function(e) {
            e.preventDefault();
            file=e.target.files[0];
            var myFormData = new FormData();
            myFormData.append('pictureFile', file,file['name']);
            console.log(myFormData);
            $.ajax({
                        url : base_url+'media/upload_media',
                        type : 'post',
                        data : myFormData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success : function(response) {
                                show_page_for_backend(base_url+"media/view");
                        },
                        error : function (e){
                        },
                        complete:function(e){
                            console.log(e);
                        }
                });
    });
    media_js = true;
}

function del(pid)
{
        confirmTip({ content: '确定要删除此图片？'}, function(){
        jQuery.ajax({
                    url : base_url+'media/delete_media?pid='+pid,
                    type : 'get',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                            show_page_for_backend(base_url+"media/view");
                            alertTip("删除成功!");
                    }
            });
    });
}