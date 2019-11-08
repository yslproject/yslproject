let flag=0; //标记 1 代表修改   0代表添加
let upId;
let td;

//为添加设置点击事件
$('.g-add').click(function(){
	$('.mask').fadeIn();
	$('.modal').fadeIn();
});


//为取消按钮设置点击事件
$('.exit').click(function(){
	$('.mask').fadeOut();
	$('.modal').fadeOut();
	$('.modal input').val('');
    $('.up-res').attr('src', '');
    $.each($('.up-imglist-2').children('div'), function (i, item) {
        item.remove();
    });
    $.each($('.up-imglist-3').children('div'), function (i, item) {
        item.remove();
    })
})


//点击确定执行事件
	$('.sure').click(function(){
		//获取详情图和样式图的img
		let imglist =$('.up-imglist-2').children('div').children('img');
		let iimglist = $('.up-imglist-3').children('div').children('img');
//		console.log(imglist);
		let arr1 =[];
		let arr2 =[];
		//遍历详情图
			$.each(imglist, function (i, item) {
            	arr1.push($(item).attr('src'));
        	})
		//遍历样式图
			$.each(iimglist,function(i,item){
				arr2.push($(item).attr('src'));
			})
		//获取信息
			const type1 = $('.g-type1').val();
			const type2 = $('.g-type2').val();
			const type3 = $('.g-type3').val();
			const enName = $('.g-enname').val();
			const chName = $('.g-chname').val();
			const color = $('.g-color').val();
			const price = $('.g-price').val();
			const count = $('.g-count').val();
			const intro = $('.g-intro').val();
			const img = $('.up-res').attr('src');
			const imgList = arr1.join('|');
			const countImg = arr2.join('|');
			const createTime = $('.g-time').val();
		
		flag ==1 ? up(type1,type2,type3,enName, chName, color, price, intro, count, img, imgList, countImg,createTime):insert(type1,type2,type3,enName, chName, color, price, intro, count, img, imgList, countImg,createTime);
	})

//添加事件
function insert(type1,type2,type3,enName, chName, color, price, intro, count,img, imgList, countImg,createTime){
	if(type1 && type2 && type3 && enName && chName && color && price && intro && count && img &&  imgList && countImg && createTime){
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'insert',
			type1,type2,type3,enName,chName,color,price,intro,count,img,imgList,countImg,createTime
		},
		success(res){
			const obj = JSON.parse(res);
			switch(obj.code){
				case'0':
					$('.mask').fadeOut();
					$('.modal').fadeOut();
					layer.open({
	            		title:'提示',
	            		content:'添加失败',
	            	});
	            	break;
            	case'1':
	            	$('.mask').fadeOut();
					$('.modal').fadeOut();
					layer.open({
	            		title:'提示',
	            		content:'添加成功',
	            	});
	            	//如果添加成功在页面生成表格
	            	let tr = $(`
						<tr>
				            <td>${type1}</td>
				            <td>${type2}</td>
				            <td>${type3}</td>
				            <td>${enName}</td>
				            <td>${chName}</td>
				            <td>${color}</td>
				            <td>${price}</td>
				            <td>${intro}</td>
				            <td>${count}</td>
				            <td>
				                <img src="${img}" alt="">
				            </td>
				            <td class="i-list"></td>
				            <td class="in-list"></td>
				            <td>${createTime}</td>
				            <td>
				                <div class="g-mod" data-id="${obj.ID}" onclick="update(this)">修改</div>
				                <div class="g-del" data-id="${obj.ID}" onclick="del(this)">删除</div>
				            </td>
				        </tr>
					`);
					
				//循环创建样式图
				let imglist = imgList.split('|');
				let iimglist = countImg.split('|');
				for(let img of imglist){
					let iimg = $(`<img src="${img}">`);
					tr.children('.i-list').append(iimg);
					}
				for(let img of iimglist){
					let inimg = $(`<img src="${img}">`);
					tr.children('.in-list').append(inimg);
					}
				$('.g-tab').append(tr);
				
				
				//清空input框
                $('.modal input').val('');
                $('.up-res').attr('src', '');
                $.each($('.up-imglist-2').children('div'), function (i, item) {
                    item.remove();
                })
                $.each($('.up-imglist-3').children('div'), function (i, item) {
                    item.remove();
                })
                $('.sure').unbind();
                break;	
			}
		}
	})
}
}
//修改按钮的点击事件
function update(btn){
	$('.mask').fadeIn();
	$('.modal').fadeIn();
	upId = $(btn).attr("data-id");
	td = $(btn).parent().parent().children('td');
	//将页面内容填到对应的数据框
	$('.g-type1').val(td.eq(0).text());
	$('.g-type2').val(td.eq(1).text());
	$('.g-type3').val(td.eq(2).text());
	$('.g-enname').val(td.eq(3).text());
	$('.g-chname').val(td.eq(4).text());
	$('.g-color').val(td.eq(5).text());
	$('.g-price').val(td.eq(6).text());
	$('.g-intro').val(td.eq(7).text());
	$('.g-count').val(td.eq(8).text());
    $('.up-res').attr('src', td.eq(9).children('img').attr('src'));
	$('.g-time').val(td.eq(12).text());
	//详情图
	let imglist1 = [];
	const list1 = $(btn).parent().parent().children('.i-list').children('img');
	$.each(list1,function(i,item){
		imglist1.push($(item).attr('src'));
	})
	
	for(let img of imglist1){
		let tu = $(`
                <div class="img-list-box">
                    <img src="${img}" alt="" class="up-list-box">
                    <div class="img-list-x" onclick="imgDel(this)">x</div>
                </div>`);
         $('.up-imglist-2').append(tu);
		}
	//样式图
	let imglist2 = [];
	const list2 = $(btn).parent().parent().children('.in-list').children('img');
	$.each(list2,function(i,item){
		imglist2.push($(item).attr('src'));
	})
	
	for(let img of imglist2){
		let tu = $(`
                <div class="img-list-box">
                    <img src="${img}" alt="" class="up-list-box">
                    <div class="img-list-x" onclick="imgDel(this)">x</div>
                </div>`);
         $('.up-imglist-3').append(tu);
		}
	
	flag = 1; //当前是修改状态
}

//修改确定按钮的点击事件
function up(type1,type2,type3,enName, chName, color, price, intro, count,img, imgList, countImg,createTime){
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'update',
			upId,
			type1,type2,type3,enName,chName,color,price,intro,count,img,imgList,countImg,createTime},
		success(res){
			const obj = JSON.parse(res);
				if(obj.code ==1){
					layer.open({
					title:'提示:',
					content:'修改成功!'
				});
				$('.mask').fadeOut();
				$('.modal').fadeOut();
				$('.modal input').val('');
				//将输入框里面的数据赋给页面对应的位置
				$(td[0]).text(type1);
				$(td[1]).text(type2);
				$(td[2]).text(type3);
				$(td[3]).text(enName);
				$(td[4]).text(chName);
				$(td[5]).text(color);
				$(td[6]).text(price);
				$(td[7]).text(intro);
				$(td[8]).text(count);
				$(td[9]).html(`<img src="${img}">`);
				$(td[12]).text(createTime);
				
				//循环创建详情图和样式图
				let imglistsure = imgList.split('|');
				let iimglistsure = countImg.split('|');
				
				for(let img of imglistsure){
					let iimg = $(`<img src="${img}">`);
					$(td[10]).append(iimg);
					}
				for(let img of iimglistsure){
					let inimg = $(`<img src="${img}">`);
					$(td[11]).append(inimg);
					}	
			}else{
				layer.open({
					title:'提示：',
					content:'修改失败！'
				})
			}
		}
	})
}

//删除
function del(btn){
	const id = $(btn).attr("data-id");
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'delete',
			id
		},
		success(res){
			const obj = JSON.parse(res);
			if(obj.code ==1){
				layer.open({
					title:'提示：',
					content:'删除成功'
				});
				$(btn).parent().parent().remove();
			}else{
				layer.open({
					title:'提示：',
					content:'删除失败!'
				})
			}
		}
	});
}

//图片上传
$('.up-img-btn-1').click(function(){
    const filedata = $('.addimg-1')[0].files[0];
    upFn(filedata,function(res){
    	$('.up-res').attr('src',res);
    });
});
//详情图上传

$('.up-img-btn-2').click(function(){	
	const filedata = $('.addimg-2')[0].files[0];
	upFn(filedata,function(res){
		
		let imglistadd = $(`
                <div class="img-list-box">
                    <img src="${res}" alt="" class="up-list-box">
                    <div class="img-list-x" onclick="imgDel(this)">x</div>
                </div>`);
        $('.up-imglist-2').append(imglistadd);
   });
})
//样式图上传
$('.up-img-btn-3').click(function(){
	const filedata = $('.addimg-3')[0].files[0];
	upFn(filedata,function(res){
		let imglist = $(`
                <div class="img-list-box">
                    <img src="${res}" alt="" class="up-list-box">
                    <div class="img-list-x" onclick="imgDel(this)">x</div>
                </div>`);
        $('.up-imglist-3').append(imglist);
   });
})

//添加的图片小缩略图删除
function imgDel(el) {
    const res = $(el).parent();
    res.remove();
}

 
