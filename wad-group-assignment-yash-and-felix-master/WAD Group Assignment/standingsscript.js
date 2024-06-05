function sortTbl(columnName) {

    var sort = $("#sort").val();
    $.ajax({
        url: 'getstandings.php',
        type: 'post',
        data: {
            columnName: columnName,
            sort: sort
        },
        success: function (response) {

            $("#standings tr:not(:first)").remove();

            $("#standings").append(response);
            if (sort == "asc") {
                $("#sort").val("desc");
            } else {
                $("#sort").val("asc");
            }

        }
    });
}