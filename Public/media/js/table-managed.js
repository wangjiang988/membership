var TableManaged = function () {

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
                        url : "/User/update",
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
                        url : "/User/delete",
                        data : "ids=" + ids ,
                        async : false,
                        success : function(data){
                            data = eval("(" + data + ")");
                            // aDataSet = data;
                            if(data.errCode != 0){
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

        },

    };

}();
