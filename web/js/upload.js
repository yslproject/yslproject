function upFn(filedata, callback) {
    //创建一个 formdata 对象，用来打包文件数据
    const fd = new FormData();
    // 将文件信息打包到 fd 中
    fd.append('file', filedata);

    // 创建ajax请求
    var ajax = new XMLHttpRequest();
    ajax.open('post', 'http://127.0.0.1/YSL/model/Upload.php');
    ajax.send(fd);
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            callback(ajax.responseText);
        }
    }
}

