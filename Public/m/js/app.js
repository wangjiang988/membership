//将form中的值转换为键值对。
function getFormJson(frm) {
    var o = {};
    var a = $(frm).serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
}

//将form转为AJAX提交
function ajaxSubmit(frm, fn) {
    var dataPara = getFormJson(frm);
    //在这里进行表单空验证
    $.ajax({
        url: frm.action,
        type: frm.method,
        data: dataPara,
        success: fn
    });
}

function checkProfileForm(jsonData){
    if(jsonData.name==""||jsonData.birth==""||jsonData.phone==""){
        J.Toast.show('toast',"请将表单填写完整!",3000);
        // J.alert('提示',"请将表单填写完整!");
        return false;
    }
    if(!checkMobile(jsonData.phone)){
        J.Toast.show('toast',"请检查您的手机号码格式是否正确!",3000);
        // J.alert('提示','请检查您的手机号码格式是否正确!');
        return false;
    }
    if(jsonData.verifyCode==""){
        J.Toast.show('toast',"请输入验证码!",3000);
        // J.alert('提示','请输入验证码!');
        return false;
    }

    return true;
}

function checkMobile(mobile){
    if(!(/^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/.test(mobile))){
        return false;
    }
    return true;
}


$(function(){
    // App.run();

})