<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>My App | 领取微信卡券</title>
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
<div class="app-page" data-page="profile">
    <div id="section_container"><!--页面容器--->
        <section id="index_wxcard" class="active">
            <header>
                <h1 class="title">微信卡券福利</h1>
            </header>
            <article class="active ">
                 恭喜您获得一张微信卡券
                <a class="button small alizarin" href="<?php echo U('m/Member/index');?>">我的会员区</a>
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
//    Jingle.launch();
//    $(function(){
//
//
//    });
</script>
</body>
</html>