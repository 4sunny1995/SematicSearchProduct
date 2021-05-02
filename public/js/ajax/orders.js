$(document).ready(function(){
    $(".destroyorder").on('click',function(){
        var btn = $(this)
        var id = btn.data('id')
        console.log(id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        })
        $.ajax({
            url:"/admin/orders/"+id,
            method:"delete", // phương thức gửi dữ liệu.
            success:function(data){ //dữ liệu nhận về
                btn.parent().parent().html()
           }
         });
    })
    
})