$("body").on("click", "#search", function () {
    var nouji = $("#nouji").val();

    if (nouji == "") {
        nouji = 0;
    }

    $.ajax({
        url: "../cari-data-kendaraan/" + nouji,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            if (response.status == 200) {
                $(".alert-success").attr("hidden", false);
                $(".alert-danger").attr("hidden", true);
                $("#showResult").attr("hidden", false);
            } else {
                $(".alert-success").attr("hidden", true);
                $(".alert-danger").attr("hidden", false);
                $("#showResult").attr("hidden", true);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", status, error);
        },
    });
});
