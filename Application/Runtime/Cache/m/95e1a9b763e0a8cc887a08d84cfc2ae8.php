<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>My App | 我的会员区</title>
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
<div id="section_container"><!--页面容器--->
    <section id="index_section" class="active">
        <header>
            <h1 class="title">我的会员卡</h1>
        </header>
        <article class="active">
            <!---do it yourself --->
            <div class="info_top">
                <div class="title">王将</div>
            </div>
            <ul class="list inset demo-list">
                <li 　>
                    <div>卡号：vip01</div>
                    <div>密码：asdf</div>
                </li>
                <li 　>
                    <div>卡号：vip01</div>
                    <div>密码：asdf</div>
                </li>
                <li 　>
                    <div>卡号：vip01</div>
                    <div>密码：asdf</div>
                </li>
            </ul>

            <a href="#" id="addCard" class="button block tm10">新增会员卡</a>

            <a href="#" id="goback" class="button block tm10">返回</a>
        </article>
    </section>
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
        $('#addCard').click(function(){
            //进入新增会员卡页面
            location.href="<?php echo U('m/Member/addcard');?>";
        });

        $('#goback').click(function(){
            location.href = "<?php echo U('m/Member/index');?>";
        });
    });
</script>
</body>
</html>