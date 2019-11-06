$('.login').click(function(){
   const name = $('.u-inp').val();
   const pwd =  $('.p-inp').val();
   console.log(name, pwd);
    $.ajax({
        type: 'post',
        url: '../controller/AdminDao.php',
        data:{
            type:'login',
            name,
            pwd
        },
        success(res){
            const obj = JSON.parse(res);
            if(obj.code) {
                window.location.href = 'bmgs.html';
            }
        }
    });

})