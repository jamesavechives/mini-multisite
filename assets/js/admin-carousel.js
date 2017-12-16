var var_js = var_js || false;
var base_url = $("#base_url").val();
var file;
if(var_js == false){
    $( document ).on( 'change', 'input[name=upfile]', function(e) {
        var id = $(this).closest('td').data('id');
        e.preventDefault();
        file=e.target.files[0];
        var myFormData = new FormData();
        myFormData.append('pictureFile', file,file['name']);
        myFormData.append('id', id);
        console.log(myFormData);
        $.ajax({
                    url : base_url+'admin/upload_carousel_photos',
                    type : 'post',
                    data : myFormData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success : function(response) {
                            show_page_for_backend(base_url+"admin/carousel_photos");
                    },
                    error : function (e){
                    }
            })
    });
    
    var_js=true;
}


$(".btn-change-product").click(function(e){
    $( "#exampleModal" ).modal("show");
    var Id = $(this).data('id');
    show_page_for_modal(base_url+'admin/productslist?photo_id='+Id);
});
$(".btn-change-media").click(function(e){
    $( "#mediaModal" ).modal("show");
    var Id = $(this).closest('td').data('id');
    var from = $(this).closest('td').data('from');
    show_page_for_modal(base_url+'media/photo_list?from='+from+'&photo_id='+Id);
});

function bindProduct(product_id,photo_id,product_name)
{
       
    $.ajax({
                    url : base_url+'admin/bind_carousel_product',
                    type : 'post',
                    data : {'photo_id':photo_id,'product_id':product_id,'product_name':product_name},
                    success : function(response) {
                             $("#exampleModal").removeClass("in");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
                              $('body').css('padding-right', '');
                              $("#exampleModal").hide();
                            show_page_for_backend(base_url+"admin/carousel_photos");
                    },
                    error : function (e){
                        console.log(e);
                    }
            });
            
}

function bindPhoto(guid,photo_id)
{
    $.ajax({
                    url : base_url+'media/bind_carousel_photo',
                    type : 'get',
                    data : {'photo_id':photo_id,'guid':guid},
                    success : function(response) {
                             $("#mediaModal").removeClass("in");
                              $(".modal-backdrop").remove();
                              $('body').removeClass('modal-open');
                              $('body').css('padding-right', '');
                              $("#mediaModal").hide();
                            show_page_for_backend(base_url+"admin/carousel_photos");
                    },
                    error : function (e){
                        console.log(e);
                    }
            });
}
function gotomedia()
{
      $("#mediaModal").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#mediaModal").hide();
      $('.navigation li.navigation__active').removeClass('navigation__active');
      $('.bank').addClass('navigation__active');
    show_page_for_backend(base_url+'media/view');
}
