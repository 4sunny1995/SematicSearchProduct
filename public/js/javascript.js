$(window).ready(function(){
    $('#items').on('click',function(){
        var items=$('#vendor-items');
        var contents=$('#vendor-contents');
        if(items.hasClass('hidden')){
            contents.addClass('hidden');
            items.removeClass('hidden');
        }
    });
    $('#contents').on('click',function(){
        var items=$('#vendor-items');
        var contents=$('#vendor-contents');
        if(contents.hasClass('hidden')){
            items.addClass('hidden');
            contents.removeClass('hidden');
        }
    });
    $('#product-infor').on('click',function(){
        var des=$('#description');
        var review=$('#review');
        var qa=$('#qa');
        if(des.hasClass('hidden')){
            review.addClass('hidden')
            qa.addClass('hidden')
            des.removeClass('hidden')
        }
    });
    $('#product-review').on('click',function(){
        var des=$('#description');
        var review=$('#review');
        var qa=$('#qa');
        if(review.hasClass('hidden')){
            des.addClass('hidden')
            qa.addClass('hidden')
            review.removeClass('hidden')
        }
    });
    $('#product-qa').on('click',function(){
        var des=$('#description');
        var review=$('#review');
        var qa=$('#qa');
        if(qa.hasClass('hidden')){
            des.addClass('hidden')
            review.addClass('hidden')
            qa.removeClass('hidden')
        }
    });
    $('#buy').on('click',function(){
        var buy=$('#buy');
        var buydetail=$('#buydetail');
        if(buydetail.hasClass('hidden')){
            buy.addClass('hidden');
            buydetail.removeClass('hidden');
        }
    });
    $('#buydetail').on('click',function(){
        var buy=$('#buy');
        var buydetail=$('#buydetail');
        if(buy.hasClass('hidden')){
            buydetail.addClass('hidden');
            buy.removeClass('hidden');
        }
    });
    $("#temp1").on('click',function(){
        if($("#leftmenu").width()==0){
            $("#leftmenu").width(265)
            $(".c-mask").width("100%")
        }
        else {
            $("#leftmenu").width()==0
            $(".c-mask").width(0)
        }
    });
    $(".closeleftmenu").on('click',function(){

        if($("#leftmenu").width()!=0){
            $("#leftmenu").width(0)
            $(".c-mask").width(0)
        }
        if($("#quickcart").width()!=0){
            $("#quickcart").width(0)
            $(".c-mask").width(0)
        }
    });
    $("#cart").on('click',function(){
        if($("#quickcart").width()==0){
            $("#quickcart").width(265)
            $(".c-mask").width("100%")
        }
        else {
            $("#quickcart").width()==0
            $(".c-mask").width(0)
        }
    });
    // $(".item-container").hover(function(){
    //     $(".item-action").css("z-index","4")
    // })
});