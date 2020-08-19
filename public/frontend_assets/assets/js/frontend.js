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
                    b = b.add(" <div class='col-lg-4 col-md-6 content-item' data-aos='fade-up'><span>"+ (i+1) +"</span><h4>"+ data.post_pick_up_time +"</h4><p>"+ data.description +"</p></div>")
                });
                $("#post").html(b);
            }
        })
    }
});
