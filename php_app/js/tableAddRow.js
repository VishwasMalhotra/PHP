$(document).ready(function() {
    $("#createRow").on("click", myCreateFunction);
    $("#myTable").on("click", ".deleteRow", myDeleteFunction);
    $("#createRowQualification").on("click", myCreateFunctionQualification);
    $("#education").on("click", ".deleteRow", myDeleteFunction);

    function myCreateFunction() {
        var table = document.getElementById("myTable");
        var row = table.insertRow(1);
        for (var i = 0; i < 7; i++) {
            cell = row.insertCell(i);
            cell.innerHTML = '<input type="text" class="form-control table" />'
        }
        if (i = 6) {
            cell.innerHTML = '<button class="btn btn-danger deleteRow"">x</button>';
        }
    }

    function myCreateFunctionQualification() {
        var table = document.getElementById("education");
        var row = table.insertRow(7);
        for (var i = 0; i < 7; i++) {
            cell = row.insertCell(i);
            cell.innerHTML = '<input type="text" class="form-control table" />'
        }
        if (i = 6) {
            cell.innerHTML = '<button class="btn btn-danger deleteRow"">x</button>';
        }
    }

    function myDeleteFunction() {
        (this).closest('tr').remove();
    }
});