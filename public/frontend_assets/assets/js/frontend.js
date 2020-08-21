$(document).ready(function () {
    getPost();

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
                    b = b.add(" <div class='col-lg-4 col-md-6 content-item' data-aos='fade-up'><span>"+ (i+1) +"</span><h3>" +data.assign_date+ "</h3><h5>"+ data.post_pick_up_time +"</h5><p>"+ data.description +"</p><button class='btn btn-dark'>More</button></div>")
                });
                $("#post").html(b);
            }
        })
    }
});
