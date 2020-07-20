$(document).ready(function () {
    datalist();
    $(document).on("submit", "#district_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (key, value) {
            $("#" + data[key].name).html("");
        })
        $.ajax({
            url: "/admin/district/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("District data added successfully", "Success!");
                $("#close").click();
                $("#district_form").trigger("reset");
            },
            error: function (error) {
                if (error.status === 422) {
                    toastr.warning("Field is empty", "Warning!");
                } else {
                    toastr.error("Application errors", "Error!");
                }
                $.each(error.responseJSON.errors, function (i, value) {
                    $("#" + i).html(value[0]);
                })
            }
        })
    });
    $(document).on("click", ".delete", function () {
        let data = $(this).attr("data");

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/admin/district/" + data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("District data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary District data is safe!");
            }
        });
    });
    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/district/show/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("District status inactive", "Success!");
                } else {
                    toastr.success("District status active", "Success!");
                }
            }
        })
    })

    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/district/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#e_division_name").val(response.division_name);
                $("#e_district_name").val(response.district_name);
                $("#e_description").val(response.description);
                $("#district_id").val(response.district_id);
            }
        })
    })

    $(document).on("submit", "#district_update_form", function (e) {
        e.preventDefault();
        let id = $("#district_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (key, value) {
            $("#e_" + data[key].name).html("");
            console.log(data[key].name);
        })

        $.ajax({
            url: "/admin/district/" + id,
            data: data,
            type: "put",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("District data updated successfully", "Success!");
                $("#close2").click();
                $("#district_update_form").trigger("reset");
            },
            error: function (error) {
                if (error.status === 422) {
                    toastr.warning("Field is empty", "Warning!");
                } else {
                    toastr.error("Application errors", "Error!");
                }
                console.log(error.responseJSON.errors);
                $.each(error.responseJSON.errors, function (i, value) {
                    $("#u_" + i).html(value[0]);
                })
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

    function datalist(page_link = "/admin/district/create") {
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

});
