let flag; //标记


//为添加设置点击事件
$('.g-add').click(function(){
	$('.mask').fadeIn();
	$('.modal').fadeIn();
	//点击确定执行事件
	$('.sure').click(function(){
		//获取详情图和样式图的img
		let imgList =$('.up-list-2').children('div').children('img');
		let countImg = $('.up-list-3').children('div').children('img');
		let arr1 =[];
		let arr2 =[];
		//遍历详情图
			$.each(imgList, function (i, item) {
            	arr1.push($(item).attr('src'));
        	})
		//遍历样式图
			$.each(countImg,function(i,item){
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
			
		
//		flag ==1 ? up():
		insert($type1,$type2,$type3,$enName, $chName, $colorType, $price, $intro, $count, $img, $imgList, $countImg,$createTime);
	})
	
});


//为取消按钮设置点击事件
$('.exit').click(function(){
	$('.mask').fadeOut();
	$('.modal').fadeOut();
})

//查找数据
function select(){
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'select',
			typeX:'1',
			name:'彩妆'	
		},
		success(res){
			const arr = JSON.parse(res);
			for(let item of arr){
				let el = $(`
				<tr>
		            <td>${item.ID}</td>
		            <td>${item.type1}</td>
		            <td>${item.type2}</td>
		            <td>${item.type3}</td>
		            <td>${item.enName}</td>
		            <td>${item.chName}</td>
		            <td>${item.color}</td>
		            <td>${item.price}</td>
		            <td>${item.intro}</td>
		            <td>${item.count}</td>
		            <td>
		                <img src="${item.img}" alt="">
		            </td>
		            <td class="i-list"></td>
		            <td class="in-list"></td>
		            <td>${item.createTime}</td>
		            <td>
		                <div class="g-mod">修改</div>
		                <div class="g-del">删除</div>
		            </td>
		        </tr>
			`);
				
			//循环创建样式图
			let imglist = item.imgList.split('|');
			let countImg = item.countImg.split('|');
			for(let img of imglist){
				let iimg = $(`<img src="${img}">`);
				el.children('.i-list').append(iimg);
				}
			for(let img of countImg){
				let inimg = $(`<img src="${img}">`);
				el.children('.in-list').append(inimg);
				}
			$('.g-tab').append(el);
			}
			
		}
	})
}
select();


	


//添加事件
function insert($type1,$type2,$type3,$enName, $chName, $colorType, $price, $intro, $count, $img, $imgList, $countImg,$createTime){
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'insert',
		},
		success(res){
			console.log(res);
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
			            <td>${ID}</td>
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
			                <div class="g-mod">修改</div>
			                <div class="g-del">删除</div>
			            </td>
			        </tr>
				`);
					
				//循环创建样式图
				let imglist = imgList.split('|');
				let countImg = countImg.split('|');
				for(let img of imglist){
					let iimg = $(`<img src="${img}">`);
					tr.children('.i-list').append(iimg);
					}
				for(let img of countImg){
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
