$(document).ready(function () {
 
    datalist();
    $(document).on("submit", "#ton_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/ton/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Ton data added successfully", "Success!");
                $("#close").click();
                $("#ton_form").trigger("reset");
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
                    url: "/admin/ton/"+data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("Ton data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary ton data is safe!");
            }
        });
    });

    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/ton/show/"+data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Ton status inactive", "Success!");
                } else {
                    toastr.success("Ton status active", "Success!");
                }
            }
        })
    })

    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/ton/"+data+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#ton_number").val(response.ton_number);
                $("#description").val(response.description);
                $("#ton_id").val(response.ton_id);
            }
        })
    })

    $(document).on("submit", "#ton_update_form", function (e) {
        e.preventDefault();
        let id = $(this).attr("#ton_id");
        let data = $(this).serializeArray();
        console.log(id);
        $.ajax({
            url: "/admin/ton/update",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Ton data updated successfully", "Success!");
                $("#close2").click();
                $("#ton_update_form").trigger("reset");
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

    function datalist(page_link="/admin/ton/create") {
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
