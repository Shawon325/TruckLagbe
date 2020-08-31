$(document).ready(function () {
    datalist();
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/user_access/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#user").html(response.name);
                if (response.roles != '') {
                    $("#role_id").val(response.roles[0].id);
                    $("#old_role").val(response.roles[0].name);
                }
                $("#user_id").val(response.id);
            }
        })
    })

    $(document).on("submit", "#user_access_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        let id = $("#user_id").val();

        $.ajax({
            url: "/admin/user_access/" + id,
            data: data,
            type: "put",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("User access updated successfully", "Success!");
                $(".close").click();
                $("#user_access_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    $("#data_lists").on("click", ".page-link", function (e) {
        e.preventDefault();
        let page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

    function datalist(page_link = "/admin/user_access/create") {
        let search = $(".search").val();

        $.ajax({
            url: page_link,
            data: {search: search},
            type: "get",
            datatype: "html",
            success: function (response) {
                $("#data_lists").html(response);
            }
        })
    }
})
