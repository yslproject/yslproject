$('.login').click(function(){
   const name = $('.u-inp').val();
   const psd =  $('.p-inp').val();

    $.ajax({
        type:'post',
        url:'http://127.0.0.1/YSL/controller/AdminDao.php',
        data:{
            type:'login',
            name,psd
        },
        success(res){
            const obj =JSON.parse(res);
            if(obj.code ==2){
                 window.location.href="bgms.html";
            }else{
            	layer.open({
            		title:'提示',
            		content:'登录失败,请查看用户名或密码是否正确！',
            	});
            }
        }
    });
})