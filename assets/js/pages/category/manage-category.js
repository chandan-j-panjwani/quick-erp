var TableDatatables = function(){
    var handleCategoryTable = function(){
        var manageCategoryTable = $('#manage-category-table');
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";
        var oTable = manageCategoryTable.DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: baseURL+filepath,
                type: "POST",
                data:{  
                    "page": "manage-category"
                }
            },
            "lengthMenu": [
                [5,15,25,-1], /** This is the values that are stored in the script */
                [5,15,25,"All"] /**This will be showed to the user */
            ],
            "order": [
                [1, "desc"] /**Order index 1 descending */
            ],
            "columnDefs": [
                {
                    'orderable': false, /**Setting which columns should not be sorted. Here: first & last */
                    'targets': [0,-1]
                }
            ],
            scrollX: true
        });
        manageCategoryTable.on('click','.edit', function(e){
            var id = $(this).data('id');
            $('#edit_category_id').val(id);
            $.ajax({
                url:baseURL+filepath,
                method:"POST",
                data:{
                    "category_id":id,
                    "fetch":"category"
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                    $("#edit_category_name").val(data.name);
                }
            });
        });
        manageCategoryTable.on('click', '.delete', function(e){
            var id = $(this).data('id');
            $('#delete_record_id').val(id);
        });
        new $.fn.dataTable.Buttons(oTable, {
            buttons: [
                'copy', 'csv', 'pdf'
            ]
        });
        oTable.buttons().container()
            .appendTo($('#export-buttons'));
    }
       return {
              //main function to handle all the dataTables.
              init: function(){
                     handleCategoryTable();
              }
       }
}();
jQuery(document).ready(function(){
       TableDatatables.init();
});