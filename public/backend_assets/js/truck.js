$(document).ready(function () {
    datalist();
    let max_field = 5;
    let i = 1;
    let wrapper = $(".input_field");
    let add_button = $("#plus");
    $(add_button).click(function (e) {
        e.preventDefault();
        if (i < max_field) {
            i++;
            $(wrapper).append(`<div><div class="form-group">
                                    <div class="row">
                                        <div class='col-lg-6 col-md-6'>
                                            <div class='card'>
                                                <div class='card-body'>
                                                     <input type='file' id='input-file-now'  name='images[]' class='dropify' />
                                                </div>
                                            </div>
                                        </div>
                                        <button class='btn btn-danger' id='minus'><i class='fa fa-times'></i></button>
                                    </div>
                                    </div></div>`);
            $('.dropify').dropify();
        }
    });

    $(wrapper).on("click", "#minus", function (e) {
        e.preventDefault();
        $(this).closest('div').remove();
        i--;
    });

    $(document).on('change', '#division_name', function () {
        let data = $(this).val();

        $.ajax({
            url: "/admin/truck/division/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                let b = $();
                $.each(response.data, function (i, item) {
                    b = b.add("<option value=" + item.district_id + ">" + item.district_name + "</option>")
                });
                $("#district_name").html(b);
            }
        })
    });

    $(document).on('change', '#district_name', function () {
        let data = $(this).val();

        $.ajax({
            url: "/admin/truck/district/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                let b = $();
                $.each(response.data, function (i, item) {
                    b = b.add("<option value=" + item.upzilla_id + ">" + item.upzilla_name + "</option>")
                });
                $("#upzilla_name").html(b);
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
                        url: "/admin/truck/" + data,
                        type: "delete",
                        dataType: "json",
                        success: function (response) {
                            datalist();
                            toastr.success("Truck deleted successfully", "Success!");
                        }
                    })
                } else {
                    swal("Your imaginary District data is safe!");
                }
            });
    })

    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/truck/show/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Truck status inactive", "Success!");
                } else {
                    toastr.success("Truck status active", "Success!");
                }
            }
        })
    })

    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/truck/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#truck_number").val(response.truck_number);
                $("#ton").val(response.ton);
                $("#truck_id").val(response.truck_id);
            }
        })
    })

    $(document).on("submit", "#truck_update_form", function (e) {
        e.preventDefault();
        let id = $("#truck_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (key, value) {
            $("#e_" + data[key].name).html("");
            console.log(data[key].name);
        })

        $.ajax({
            url: "/admin/truck/" + id,
            data: data,
            type: "put",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Truck data updated successfully", "Success!");
                $("#close3").click();
                $("#truck_update_form").trigger("reset");
            },
            error: function (error) {
                if (error.status === 422) {
                    toastr.warning("Field is empty", "Warning!");
                } else {
                    toastr.error("Application errors", "Error!");
                }
                $.each(error.responseJSON.errors, function (i, value) {
                    $("#u_" + i).html(value[0]);
                })
            }
        })
    });

    $(document).on("click", ".image", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/image/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                let b = $();
                $.each(response.data, function (i, value) {
                    b = b.add("<input id='id_service_image' class='col-6 dropify' data-default-file="+ '/'+ value.images+ ">")
                })
                $("#blah").html(b);
                $('.dropify').dropify();
            }
        })
    })

    $("#data_lists").on("click", ".page-link", function (e) {
        e.preventDefault();
        let page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

    function datalist(page_link = "/admin/truck_list") {
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
