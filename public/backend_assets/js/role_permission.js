$(document).ready(function () {
    datalist();
    $(document).on("submit", "#role_permission", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/role_has_permission/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Role Permission added successfully", "Success!");
                $(".close").click();
                $("#role_permission").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
    const arrayColumn = (arr, n) => arr.map(x => x[n]);
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/role_has_permission/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (data) {
                let role = data.role_permissions[0];
                $("#role_name").html(`${role.name}`);
                // $("#name").val(role.name);

                $("#edit_role_permission").attr("action", `role_has_permission/${role.id}`)

                $(".permission_input").remove();
                let role_permission = role.permissions;
                let role_permissions = [];
                role_permissions = arrayColumn(role_permission, 'id');
                $.each(data.permissions, function (k, v) {
                    let status = $.inArray(v.id, role_permissions) != -1 ? 'checked' : '';
                    $("#permission_box").append(`<tr class="permission_input">
                                                <td style="font-weight: bold;">
                                                    ${v.name}
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission_id[]"
                                                           value="${v.id}"  ${status}>
                                                </td>
                                            </tr>`);
                });
            }
        })
    })

    $(document).on("change", "#row", function () {
        datalist();
    })

    $("#data_lists").on("click", ".page-link", function (e) {
        e.preventDefault();
        let page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

    function datalist(page_link = "/admin/role_has_permission/create") {
        let search = $(".search").val();
        let row = $("#row").val();

        $.ajax({
            url: page_link,
            data: {
                search: search,
                row: row,
            },
            type: "get",
            datatype: "html",
            success: function (response) {
                $("#data_lists").html(response);
            }
        })
    }
})
