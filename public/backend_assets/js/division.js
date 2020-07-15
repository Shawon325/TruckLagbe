$(document).ready(function () {

    datalist();
    $(document).on("submit", "#division_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/division/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Division data added successfully", "Success!");
                $("#close").click();
                $("#division_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    $(document).on("click", ".delete", function () {
        let data = $(this).attr("data");
        console.log(data);

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
                    url: "/admin/division/"+data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("Division data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary division data is safe!");
            }
        });
    });

    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/division/show/"+data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Division status inactive", "Success!");
                } else {
                    toastr.success("Division status active", "Success!");
                }
            }
        })
    })

    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/division/"+data+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#division_name").val(response.division_name);
                $("#description").val(response.description);
                $("#division_id").val(response.division_id);
            }
        })
    })

    $(document).on("submit", "#division_update_form", function (e) {
        e.preventDefault();
        let id = $(this).attr("#division_id");
        let data = $(this).serializeArray();
        console.log(id);
        $.ajax({
            url: "/admin/division/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Division data updated successfully", "Success!");
                $("#close2").click();
                $("#division_update_form").trigger("reset");
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

    function datalist(page_link="/admin/division/create") {
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
