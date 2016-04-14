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
                id = $(target).attr('tabindex');
                console.log();
                if (!newValue) {
                    return false; // reject change
                }else{
                    $.post('/User/update',{
                        id: id,
                        name:name,
                        value:newValue,
                    },function(data){
                        data = eval('('+data+')');
                        if(data.errCode != 0) return false;
                        else return true;
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


        }

    };

}();