function sortTbl(columnName) {

    var sort = $("#sort").val();
    $.ajax({
        url: 'getstats.php',
        type: 'post',
        data: {
            columnName: columnName,
            sort: sort
        },
        success: function (response) {

            $("#playerstats tr:not(:first)").remove();

            $("#playerstats").append(response);
            if (sort == "asc") {
                $("#sort").val("desc");
            } else {
                $("#sort").val("asc");
            }

        }
    });
}