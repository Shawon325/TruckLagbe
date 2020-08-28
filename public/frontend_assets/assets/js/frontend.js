$(document).ready(function () {
    getPost();

    $(document).on("submit", "#bid_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/post_bid/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                console.log(response);
                // toastr.success("Upzilla data added successfully", "Success!");
                $(".close").click();
                $("#bid_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    function getPost() {
        $.ajax({
            url: "/get_post",
            type: "get",
            datatype: "html",
            success: function (response) {
                console.log(response);
                // $("#data_lists").html(response);
                let b = $();
                $.each(response, function (i, data) {
                    b = b.add("<div class='col-lg-4 col-md-6 content-item' data-aos='fade-up'><span>" + (i + 1) + "</span><h3>" + data.assign_date + "</h3><h5>" + data.post_pick_up_time + "</h5><p>" + data.description + "</p><button class='btn btn-dark'><a href='/view_post/" + data.post_id + "'>More</a>" +
                        "                        </button></div>")
                });
                $("#post").html(b);
            }
        })
    }
});
