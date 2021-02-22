var TableDatatables = (function () {
    var handleSupplierTable = function () {
        var manageSupplierTable = $("#manage-suppliers-table");
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";
        var oTable = manageSupplierTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: baseURL + filepath,
                type: "POST",
                data: {
                    page: "manage-suppliers",
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
        manageSupplierTable.on('click', '.delete', function(e){
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
            handleSupplierTable();
        },
    };
})();
jQuery(document).ready(function () {
    TableDatatables.init();
});
