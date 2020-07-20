$(document).ready(function () {
    datalist();
    $(document).on("submit", "#upzilla_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/upzilla/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Upzilla data added successfully", "Success!");
                $("#close").click();
                $("#upzilla_form").trigger("reset");
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
                    url: "/admin/upzilla/"+data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("Upzilla data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary upzilla data is safe!");
            }
        });
    });
    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/upzilla/show/"+data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Upzilla status inactive", "Success!");
                } else {
                    toastr.success("Upzilla status active", "Success!");
                }
            }
        })
    })

    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/upzilla/"+data+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#district_name").val(response.district_name);
                $("#upzilla_name").val(response.upzilla_name);
                $("#description").val(response.description);
                $("#upzilla_id").val(response.upzilla_id);
            }
        })
    })

    $(document).on("submit", "#upzilla_update_form", function (e) {
        e.preventDefault();
        let id = $(this).attr("#upzilla_id");
        let data = $(this).serializeArray();
        console.log(id);
        $.ajax({
            url: "/admin/upzilla/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("upzilla data updated successfully", "Success!");
                $("#close2").click();
                $("#upzilla_update_form").trigger("reset");
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

    function datalist(page_link="/admin/upzilla/create") {
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

});
