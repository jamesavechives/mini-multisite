function show_page_for_backend(page_url, e) {
    $('.dashboard-right').show();
    $(".dashboard-right").load(page_url, function (response, status, xhr) {
    });
}
function show_page_for_modal(page_url, e) {
    $('.modal-body').show();
    $(".modal-body").load(page_url, function (response, status, xhr) {
    });
}
$(document).on('click', '.navigation li', function (e) {
    if (!$(this).hasClass("navigation__active")) {
        jQuery('.navigation li.navigation__active').removeClass('navigation__active');
        jQuery(this).addClass("navigation__active");
    }
});
$(window).on('load', function () {
    var base_url = $('#base_url').val();
    var thisURL = document.location.href;
    if(thisURL.indexOf('from=auth')==-1){
     show_page_for_backend(base_url+'admin/view');
    }
    else{
      show_page_for_backend(base_url+'auth/index');  
      jQuery('.navigation li.navigation__active').removeClass('navigation__active');
      jQuery('.li-users').addClass("navigation__active");
    }
});

function enterSite(siteId,siteName)
{
    var base_url = $('#base_url').val();
    jQuery.ajax({
                url : base_url+'admin/add_session?site_id='+siteId+'&site_name='+siteName,
                type : 'get',
                data : {},
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                        window.location.href=base_url+"admin/index";
                },
                error : function (e){
                    console.log(e);
                }
        })
}


