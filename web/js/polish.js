function select(){
	$.ajax({
		type:'post',
		url:'http://127.0.0.1/YSL/controller/GoodlistDao.php',
		data:{
			type:'select',
			typeX:'4',
			name:'甲油'	
		},
		success(res){
			const arr = JSON.parse(res);
			for(let item of arr){
				let el = $(`
				<tr>
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
		                <div class="g-mod" data-id="${item.ID}" onclick="update(this)">修改</div>
		                <div class="g-del" data-id="${item.ID}" onclick="del(this)">删除</div>
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