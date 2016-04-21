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
                    <input type="hidden" name="token" id="token" value="<?php echo I('get.token');?>">
                    <input type="hidden" name="card_id" id="card_id" value="<?php echo I('get.id');?>">
                    <input type="text" name="name" id="name" placeholder="姓名">
                    <div class="input-row">
                        <span id="birthSpan" style="position: absolute;left: 2.7em;top: 4.5em;">生日</span>
                        <input type="date" id="birth" name="birth" placeholder="生日">
                    </div>
                    <input type="text" id="phone" name="phone" placeholder="手机号码">
                    <input name="verify" id="verify" width="50%" value="" class="captcha-text" placeholder="图形验证码" type="text">
                    <img id="verifyImg" style="font-size:inherit;position: absolute;right: 2.1em;top:10.4em;width: 104px"
                         alt="验证码" src="<?php echo U('m/Index/verify_c');?>?token=<?php echo ($token); ?>" title="点击刷新">
                    <a class="button" id="getVerify" style="position: absolute; right: 2.1em;top: 13.6em;z-index: 10;">获取验证码</a>
                    <span class="green" disabled="disabled" id="verifyMask"
                          style="position: absolute; right: 2.1em;top: 13.6em;z-index: 9;display: none;">重新获取验证码</span>
                    <input type="text" id="verifyCode" name="verifyCode" placeholder="手机验证码">
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
    var countdown =60;

    $(function(){
        $('#birth').change(function(){
            if($(this).val()!=''){
                $('#birthSpan').hide();
            }else{
                $('#birthSpan').show();
            }
        });

        //点击图片验证码，刷新
        var captcha_img = $('#verifyImg');
        var verifyimg = captcha_img.attr("src");
        captcha_img.attr('title', '点击刷新');
        captcha_img.click(function(){
            if( verifyimg.indexOf('?')>0){
                $(this).attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });

        //TODO 点击获取验证码,1分钟内无效
        $('#getVerify').click(function(){
            imgVerify = $('#verify').val();
            phone = $('#phone').val();
            if(imgVerify =='' || imgVerify==undefined){
                J.alert('提示','请输入图片验证码');
            }
            //验证手机格式是否正确
            if(!checkMobile(phone)){
                J.alert('提示','请检查您的手机号码格式是否正确');
            }

            //验证图片验证码
            $.post("<?php echo U('m/Index/getVerifyCode');?>?token=<?php echo ($token); ?>",{
                imgVerify:$('#verify').val(),
                phone:phone,
            },function (data) {
                data = eval('('+data+')');
                if(data.errCode == 200){
                    //发送成功
                    //读秒
                    J.alert('提示','验证码为'+data.data.code);
                    $('#verifyMask').css('z-index','12');
                    $('#verifyMask').show();
                    settime(60);

                } else if(data.errCode == 400){
                    //发送,图形验证码错误
                    J.alert('提示',data.msg);
                }else{
                    //发送失败
                    J.alert('提示',data.msg);
                }
            });
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
                    token = data.data.token;
                    location.href="<?php echo U('m/Index/getwxcard');?>"+"?token="+token;
                }
            });
            return false;
        });

    });
    var countdown =60;

    function settime(counttime) {
        if (countdown == 0) {
            $('#verifyMask').css('z-index','9');
            $('#verifyMask').hide();
            countdown = counttime;
        } else {
            $('#verifyMask').html("重新发送(" + countdown + ")秒");
            countdown--;
        }
        t = setTimeout(function() {
            settime(60)
        },1000);
        if(countdown == 60) {
            clearTimeout(t);
        }
    }


</script>
</body>
</html>