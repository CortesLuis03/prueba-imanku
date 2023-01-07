getInfo();

function getInfo() {
    $.get('./controllers/elections/electionsController.php?action=getElections',function(data){
        console.log(data)
        $(function () {
            $("#electionsDataTable").DataTable({
                "data": data.result,
                "columns": [
                    { data: "county" },
                    { data: "political_party" },
                    { data: "vote_count" },
                    { data: "year" },
                ],
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["csv", "excel", "pdf"]
            }).buttons().container().appendTo('#electionsDataTable_wrapper .col-md-6:eq(0)');
        });
    });
}