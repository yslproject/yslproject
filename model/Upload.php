<?php
if($_FILES["file"]["error"]){
    echo $_FILES["file"]["error"];
}else{
//  //没有出错
//  //加限制条件
//  //判断上传文件类型为png或jpeg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg" || $_FILES['file']['type'] == 'image/jpg') && $_FILES["file"]["size"]<102400000){
        //防止文件名重复
        // 'img/1555958959895girl.jpg'
        // 为图片重新命名，且不能重复
        $imgt = substr($_FILES['file']['type'], 6);
        $imgName = time().'.'.$imgt;
        $fileName = '../web/img/'.$imgName;
        //转码，把utf-8转成gb2312,返回转换后的字符串，或者在失败时返回 FALSE。
        $fileName =iconv("UTF-8","gb2312",$fileName);
        //检查文件或目录是否存在
        if(file_exists($fileName)){
            echo "该文件已存在";
        }else{
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file"]["tmp_name"],$fileName);//将临时地址移动到指定地址
            echo "http://localhost:8081/classContent/4-php全栈/练习MVC/web/img/{$imgName}";
        }
    }else{
        echo "文件类型不对或大小出错";
    }
}