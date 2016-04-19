<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>My App | 会员个人信息完善</title>
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
        <section id="index_section" class="active">
            <header>
                <h1 class="title">完善个人信息</h1>
            </header>
            <article class="active ">
                <form class="input-group" id="profileForm" method="post" action="<?php echo U('m/Index/profile');?>">
                    <input type="hidden" name="card_id" id="card_id" value="<?php echo I('get.id');?>">
                    <input type="text" name="name" id="name" placeholder="姓名">
                    <div class="input-row">
                        <span id="birthSpan" style="position: absolute;left: 2.7em;top: 4.5em;">生日</span>
                        <input type="date" id="birth" name="birth" placeholder="生日">
                    </div>
                    <input type="text" id="phone" name="phone" placeholder="手机号码">
                    <a class="button" id="getVerify" style="position: absolute; right: 2.1em;top:7.3em;">获取验证码</a>
                    <input type="text" id="verifyCode" name="verifyCode" placeholder="验证码">
                </form>
                <a href="#" class="button block" id="submit">提交</a>
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
        $('#birth').change(function(){
            if($(this).val()!=''){
                $('#birthSpan').hide();
            }else{
                $('#birthSpan').show();
            }
        });
        //TODO 点击获取验证码,1分钟内无效
        $('#getVerify').click(function(){

        });

        $('#submit').click(function(){
            $('#profileForm').submit();
        });
        $('#profileForm').bind('submit', function(){
            //对表单进行验证
            dataParam = getFormJson($(this));
            if(!checkProfileForm(dataParam)){
                return false;
            }

            ajaxSubmit(this, function(data){
                data = eval('('+data+')');
                if(data.errCode !==200){
                    J.Toast.show('toast',data.msg);
//                    J.alert('提示',data.msg);
                }else{
                    //TODO 成功,进入到微信卡券领取页面
                    J.Toast.show('toast',data.msg);
//                    J.alert('提示',data.msg);

                    location.href="<?php echo U('m/Index/getwxcard');?>";
                }

            });
            return false;
        });

    })
</script>
</body>
</html>