$(document).ready(function () {
    $(document).on("submit", "#district_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/district/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
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
                    url: "/admin/district/"+data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                       toastr.success("District data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary District data is safe!");
            }
        });
    });
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/district/"+data+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#district_name").val(response.district_name);
                $("#description").val(response.description);
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
                toastr.success("District data updated successfully", "Success!");
                $("#close2").click();
                $("#district_update_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});