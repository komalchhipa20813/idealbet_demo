

$(document).ready(function () {
    if ($("#admin-user_tbl").length) {
        function user_listing(filterdata) {
            $("#admin-user_tbl").DataTable({
                processing: true,
                serverSide: true,
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"],
                ],
                iDisplayLength: 10,
                language: {
                    search: "",
                },

                ajax: {
                    type: "POST",
                    data: filterdata,
                    url: aurl + "/admin-user/listing",
                },
                columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                ],
                createdRow: function (row, data, dataIndex) {
                    if (data[8] == 3) {
                        $(row).addClass("error");
                    }
                },
            });
        }
        user_listing({});
    }
});