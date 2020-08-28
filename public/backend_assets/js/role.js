$(document).ready(function () {
    datalist();
    $(document).on("submit", "#role_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/role/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                toastr.success("New Role added successfully", "Success!");
                $(".close").click();
                $("#role_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    $("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        let page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

    function datalist(page_link="/admin/role/create") {
        let search = $(".search").val();

        $.ajax({
            url: page_link,
            data:{search : search},
            type: "get",
            datatype: "html",
            success: function (response) {
                $("#data_lists").html(response);
            }
        })
    }
})
