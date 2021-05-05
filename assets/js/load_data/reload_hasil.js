// id batch 
var url = window.location.href;
var id_tes = url.substring(url.indexOf("list_peserta/") + 13);


datatable = $('#dataTable').DataTable({ 
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": url_base+"tes/loadPesertaTes",
        "type": "POST",
        "data" : {id_tes: id_tes}
    },

    //Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
});