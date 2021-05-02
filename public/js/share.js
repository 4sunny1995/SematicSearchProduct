var popupSize = {
    width: 780,
    height: 550
};

$(document).on('click', '.social-button', function (e) {
    var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
        horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);
    // var data = window.location.href
    var data = 'https://dkmh.tdmu.edu.vn/'
    var url = $(this).prop('href')
    var popup = window.open(url+data, 'social',
        'width=' + popupSize.width + ',height=' + popupSize.height +
        ',left=' + verticalPos + ',top=' + horisontalPos +
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        e.preventDefault();
    }
    
});
$(document).on('click','#pinterest',function(e){
    var img = $('.img-product').data('media')
    var urlshare = window.location.href
    var url = `//www.pinterest.com/pin/create/button?url=${urlshare}&media=${img}`
    var popup = window.open(url, 'social',
        'width=' + popupSize.width + ',height=' + popupSize.height +
        ',left=' + verticalPos + ',top=' + horisontalPos +
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        e.preventDefault();
    }
})
$(document).on('click','#linkedin-share',function(e){
    // var urlshare = window.location.href
    var urlshare = 'https://dkmh.tdmu.edu.vn/'
    var hostname = window.location.hostname
    // var name = $("#name").text().replace('','%20%')
    var name = "share linkein"
    var url = ` http://www.linkedin.com/shareArticle?mini=true&url=${urlshare}&title=${name}&source=${hostname}`
    console.log(url)
    var popup = window.open(url, 'social',400);

    if (popup) {
        popup.focus();
        e.preventDefault();
    }
})