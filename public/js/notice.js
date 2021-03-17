$(document).ready(function(){
    $('.question').on('click',function(){
        var temp=$(this);
        var aws=temp.parent().find('.answer')
        // var icon=temp.find('.icon')
        if(aws.height()==0){
            aws.height(150)
            temp.css('color','#FF5500') 
        }
        else {
            aws.height(0)
            temp.css('color','black')
        }
    })
    
})