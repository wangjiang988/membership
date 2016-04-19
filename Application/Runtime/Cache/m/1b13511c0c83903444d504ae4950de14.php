<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>My App | 会员卡激活</title>
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0,
                                   maximum-scale=1.0,
                                   user-scalable=no,
                                   minimal-ui">
    <link rel="stylesheet" href="/Public/m/css/Jingle.css?r=<?php echo rand(10000,99999); ?>">
    <link rel="stylesheet" href="/Public/m/css/app.css?r=<?php echo rand(10000,99999); ?>">
    <style>
        /* put your styles here */
    </style>
</head>
<body>
<div class="app-page" data-page="home">
    <div id="section_container"><!--页面容器--->
        <section id="index_section" class="active">
            <header>
                <h1 class="title">会员登录</h1>
            </header>
            <article class="active ">
                <form class="input-group" id="loginForm" method="post" action="<?php echo U('m/Login/login');?>">
                    <input type="text" name="vip_card" placeholder="请输入您的会员卡号">
                    <input type="password" name="vip_card_password" placeholder="请输入您的会员卡密码">
                </form>
                <a href="#" class="button block" id="submit">登录</a>
                <!---do it yourself --->
            </article>
        </section>
    </div>


</div>

<script type="text/javascript" src="/Public/m/js/zepto.js"></script>
<script type="text/javascript" src="/Public/m/js/iscroll.js"></script>
<script type="text/javascript" src="/Public/m/js/template.min.js"></script>
<script type="text/javascript" src="/Public/m/js/Jingle.debug.js"></script>
<!---PC端测试时需要这个文件，将click/home/wj/下载/shixy-Jingle-56d4a75/demo-muti/js/lib/Jingle.debug.js事件模拟成touch事件，正式上线删除该js文件即可--->
<script type="text/javascript" src="/Public/m/js/zepto.touch2mouse.js"></script>
<script type="text/javascript" src="/Public/m/js/app.js?r=<?php echo rand(10000,99999); ?>"></script>
<script>
    Jingle.launch();

    $(function(){
        $('#submit').click(function(){
            $('#loginForm').submit();
        });
        $('#loginForm').bind('submit', function(){
            ajaxSubmit(this, function(data){
                data = eval('('+data+')');
                if(data.errCode !==200){
                    J.Toast.show('toast',data.msg);
//                    J.alert('提示',data.msg);
                }else{
                    id = data.data.id;
                    url = "<?php echo U('m/Index/profile');?>";
                    url += "?id="+id;
                    location.href=url;
                }
            });
            return false;
        });

    })
//    J.Popup.alert('提示','请确认是否正确!');

</script>
</body>
</html>