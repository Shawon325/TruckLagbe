$(document).ready(function () {
    datalist();
    $(document).on("submit", "#district_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
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
                console.log(error);
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
                    url: "/admin/district/"+data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("District data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary sub district data is safe!");
            }
        });
    });
    
    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/district/show/"+data,
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
            url: "/admin/district/"+data+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#e_division_name").val(response.division_name);
                $("#e_district_name").val(response.district_name);
                $("#e_description").val(response.description);
                $("#district_id").val(response.district_id);
            }
        })
    })

    $(document).on("submit", "#district_update_form", function (e) {
        e.preventDefault();
        let id = $(this).attr("#district_id");
        let data = $(this).serializeArray();
        console.log(id);
        $.ajax({
            url: "/admin/district/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("District data updated successfully", "Success!");
                $("#close2").click();
                $("#district_update_form").trigger("reset");
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
