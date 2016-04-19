/**
 * Created by wj on 16-4-18.
 */
var NoticeManage = function () {

    return {

        //main function to initiate the module
        init: function () {
            // $('#sample_1').editableTableWidget(
            //
            // );

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
                        url : "/Notice/updateCell",
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
                        url : "/Notice/delete",
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
                    title: 'required',
                    content: 'required',
                },
                messages: {
                    title: "请输入公告标题",
                    content: '请输入公告内容',
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
                        url : "/Notice/create",
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
                    update_title: 'required',
                    update_content:"required",
                },
                messages: {
                    update_title: "请输入公告标题",
                    update_content : "请输入公告内容",
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
                        url : "/Notice/update",
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

        },

    };

}();

function edit(id){
    $.post(viewUrl,{
        id:id,
    },function(data){
        data = eval('('+data+')');
        if(data.errCode == 200) {
            $('#update_id').val(data.data.id);
            $('#update_title').val(data.data.title);
            $('#update_content').val(data.data.content);
            status = data.data.status;
            $("#update_status option[value="+status+"]").attr("selected",'selected');
        }
        $('#updateModal').modal('show');
    });
}

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