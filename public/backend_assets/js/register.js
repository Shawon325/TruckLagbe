$(document).ready(function () {
    getDivision();

    $(document).on('change', '#division_name', function () {
        let data = $(this).val();

        $.ajax({
            url: "/admin/getDistrict/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                let b = $();
                $.each(response, function (i, item) {
                    b = b.add("<option value=" + item.district_id + ">" + item.district_name + "</option>")
                });
                $("#district_name").html(b);
            }
        })
    });

    $(document).on('change', '#district_name', function () {
        let data = $(this).val();

        $.ajax({
            url: "/admin/getUpzilla/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                let b = $();
                $.each(response, function (i, item) {
                    b = b.add("<option value=" + item.upzilla_id + ">" + item.upzilla_name + "</option>")
                });
                $("#upzilla_name").html(b);
            }
        })
    });

    function getDivision() {
        $.ajax({
            url: "/admin/getDivision",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                let b = $();
                $.each(response, function (i, item) {
                    b = b.add("<option value=" + item.division_id + ">" + item.division_name + "</option>")
                });
                $("#division_name").html(b);
            }
        })
    }
})

