$(document).ready(function () {
    datalist();

    $(document).on('change', '#division_name1', function () {
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
                $("#district_name1").html(b);
            }
        })
    });

    $(document).on('change', '#district_name1', function () {
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
                $("#upzilla_name1").html(b);
            }
        })
    });

    $(document).on('change', '#division_name2', function () {
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
                $("#district_name2").html(b);
            }
        })
    });

    $(document).on('change', '#district_name2', function () {
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
                $("#upzilla_name2").html(b);
            }
        })
    });

    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/posts/show/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Posts status inactive", "Success!");
                } else {
                    toastr.success("Posts status active", "Success!");
                }
            }
        })
    })

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
                    url: "/admin/posts/" + data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("Posts deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary District data is safe!");
            }
        });
    })
    $(document).on("click", ".bidAdd", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/posts/"+data+"/bidAdd",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#post_id").val(response.post_id);
                
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

    function datalist(page_link = "/admin/list") {
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
