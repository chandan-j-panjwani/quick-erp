var TableDatatables = (function () {
    var handleCustomerTable = function () {
        var manageCustomerTable = $("#manage-customers-table");
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";
        var oTable = manageCustomerTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: baseURL + filepath,
                type: "POST",
                data: {
                    page: "manage-customers",
                },
            },
            lengthMenu: [
                [5, 15, 25, -1] /** This is the values that are stored in the script */,
                [5, 15, 25, "All"] /**This will be showed to the user */,
            ],
            order: [[1, "desc"] /**Order index 1 descending */],
            columnDefs: [
                {
                    orderable: false /**Setting which columns should not be sorted. Here: first & last */,
                    targets: [0, -1],
                },
            ],
            scrollX: true
        });
        manageCustomerTable.on('click', '.delete', function(e){
            var id = $(this).data('id');
            $('#delete_record_id').val(id);
        });
        new $.fn.dataTable.Buttons(oTable, {
            buttons: ["copy", "csv", "pdf"],
        });
        oTable.buttons().container().appendTo($("#export-buttons"));
    };
    return {
        //main function to handle all the dataTables.
        init: function () {
            handleCustomerTable();
        },
    };
})();
jQuery(document).ready(function () {
    TableDatatables.init();
});
