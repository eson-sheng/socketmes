<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>消息推送测试</title>
</head>
<body>
	<div id='cont'></div>
</body>
<script type="text/javascript" src='http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js'></script>
<script src='http://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>
    // 连接服务端
    var socket = io('http://127.0.0.1:2120');
    // uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
    uid = 'eson';
    // socket连接后以uid登录
    socket.on('connect', function(){
        socket.emit('login', uid);
    });
    // 后端推送来消息时
    socket.on('new_msg', function(msg){
       $('#cont').append(msg);
       alert(msg);
    });
    // 后端推送来在线数据时
    socket.on('update_online_count', function(online_stat){
        // console.log(online_stat);
    });
</script>
</html>