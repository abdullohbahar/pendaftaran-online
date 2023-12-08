$("body").on("click", "#search", function () {
    var nouji = $("#nouji").val();

    var pathname = window.location.pathname;

    if (nouji == "") {
        $(".alert-success").attr("hidden", true);
        $(".alert-danger").attr("hidden", false);
        $("#showResult").attr("hidden", true);
    }

    $.ajax({
        url: "../cari-data-kendaraan/" + nouji,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $(".alert-success").attr("hidden", false);
                $(".alert-danger").attr("hidden", true);
                $("#showResult").attr("hidden", false);

                if (pathname == "/cek-kendaraan") {
                    $("#nomorUji").text(response.data.nouji);
                    $("#nomorKendaraan").text(
                        response.data.noregistrasikendaraan
                    );
                    $("#namaPemilik").text(response.data.nama);
                    $("#nomorRangka").text(response.data.norangka);
                    $("#nomorMesin").text(response.data.nomesin);
                    $("#jenis").text(response.data.jenis);
                    $("#merek").text(
                        response.data.merek + " / " + response.data.tipe
                    );
                    $("#model").text(response.data.model);
                    $("#masaBerlakuUji").text("-");
                    $("#statusUjiTerakhir").text(
                        response.data.status_uji_terakhir
                    );
                }
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
