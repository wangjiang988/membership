/**
 * Created by wj on 16-4-18.
 */
var CardManage = function () {

    return {

        //main function to initiate the module
        init: function () {
            $('#sample_1').editableTableWidget(

            );

            $('#sample_1 td').on('change', function(evt, newValue) {
                // do something with the new cell value
                target = evt.target;
                name = $(target).data('name');
                id = $(target).data('id');
                if (!newValue) {
                    return false; // reject change
                }else{
                    $.ajax({
                        type : "post",
                        url : "/Card/updateCell",
                        data : "id=" + id+"&name="+name+"&value="+newValue,
                        async : false,
                        success : function(data){
                            data = eval("(" + data + ")");
                            // aDataSet = data;
                            if(data.errCode != 0){
                                alert('修改失败');
                                $(target).text($("#temp").text());
                                return false;
                            }
                            else{
                                alert('修改成功');
                                if(name == 'password'){
                                    $(target).text('******');
                                }
                                return true;
                            }
                        }
                    });
                    return true;
                }
            });



            jQuery('#sample_1 .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                });
                jQuery.uniform.update(set);
            });

            jQuery('#sample_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            //jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialzie select2 dropdown

            /**
             * 删除操作
             */
            jQuery('#sample_editable_1_delete').click(function(){
                var set = jQuery('#sample_1 .group-checkable').attr("data-set");
                var ids = [];
                jQuery(set).each(function () {
                    if ($(this).is(":checked")) {
                        ids.push($(this).val());
                    }
                });
                if(confirm("确认删除数据么?")){
                    $.ajax({
                        type : "post",
                        url : "/Card/delete",
                        data : "ids=" + ids ,
                        async : false,
                        success : function(data){
                            data = eval("(" + data + ")");
                            // aDataSet = data;
                            if(data.errCode != 200){
                                alert('删除失败');
                                $(target).text($("#temp").text());
                                return false;
                            }
                            else{
                                alert('删除成功');
                                location.reload();
                            }
                        }
                    });
                }

            });


            $("#addForm").validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline error', // default input error message class
                rules: {
                    vip_card: 'required',
                    vip_card_password: 'required',
                },
                messages: {
                    name: "请输入会员卡号",
                    vip_card_password: '请输入会员卡密码',
                },
                success: function (label) {

                },
                invalidHandler: function(form, validator) {  //不通过回调
                    return false;
                },
                submitHandler: function (form) {
                    var param = $("#addForm").serialize();
                    console.log(param);
                    $.ajax({
                        type : "post",
                        url : "/Card/create",
                        data : param,
                        success : function(data){
                            data = eval("(" + data + ")");
                            if(data.errCode != 200){
                                alert('添加失败,'+data.msg);
                                return false;
                            }
                            else{
                                alert('添加成功');
                                location.reload();
                            }
                        }
                    });
                }
            });

            /**
             * 更新表单验证
             */
            $("#updateForm").validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline error', // default input error message class
                rules: {
                    update_name: 'required',
                    update_birth:{
                        required:true,
                        date:true,
                    },
                    update_phone: {
                        required:true,
//                        minlength:11,
                        isMobile:true,
                    },
                },
                messages: {
                    update_name: "请输入会员名字",
                    update_birth : "请输入生日",
                    update_phone: {
                        required: "请输入您的手机号码",
//                        minlength: "手机号码长度不对",
                        isMobile:"号码格式不对"

                    },
                },
                success: function (label) {

                },
                invalidHandler: function(form, validator) {  //不通过回调
                    return false;
                },
                submitHandler: function (form) {
                    var param = $("#updateForm").serialize();
                    $.ajax({
                        type : "post",
                        url : "/Member/update",
                        data : param,
                        success : function(data){
                            data = eval("(" + data + ")");
                            if(data.errCode != 0){
                                alert('更新失败,'+data.msg);
                                return false;
                            }
                            else{
                                alert('更新成功');
                                location.reload();
                            }
                        }
                    });
                }
            });
//
            $('#inExcel').click(function(){
                $('#excel_file').click();
            });



            $("#excel_file").fileupload({
                url:'/Card/inExcel',//文件上传地址，当然也可以直接写在input的data-url属性内
//                formData:{param1:"p1",param2:"p2"},//如果需要额外添加参数可以在这里添加
                done:function(e,result){
                    //done方法就是上传完毕的回调函数，其他回调函数可以自行查看api
                    //注意result要和jquery的ajax的data参数区分，这个对象包含了整个请求信息
                    //返回的数据在result.result中，假设我们服务器返回了一个json对象
                    // console.log(JSON.stringify(result.result));
                    data = eval('('+result.result+')');
                    if(data.errCode == 200){
                        alert('导入成功');
                        location.reload();
                    }else{
                        alert(data.msg);
                    }

                }
            });

        },

    };

}();


function enable(id,status){
    $.post(enableUrl,{
        id:id,
        status:status,
    },function(data){
        data = eval('('+data+')');
        console.log(data);
//                alert(data.errCode);
        if(data.errCode == 200) {
            alert(data.msg);
            location.reload();
        }else{
            alert(data.msg);
        }
    });
}