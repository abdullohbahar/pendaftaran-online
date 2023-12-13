$("body").on("click", "#search", function () {
    var nouji = $("#nouji").val();

    var pathname = window.location.pathname;

    if (nouji == "") {
        $(".alert-success").attr("hidden", true);
        $(".alert-danger").attr("hidden", false);
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
                } else {
                    var noregistrasikendaraan =
                        response.data.noregistrasikendaraan.split(" ");

                    var alamatPemilik = response.data.alamat_pemilik.split(",");

                    var alamatPemilik = alamatPemilik.map(function (elemen) {
                        return elemen.trimStart();
                    });

                    console.log(alamatPemilik);

                    $("#noKendAwal").val(noregistrasikendaraan[0]);
                    $("#noKendTengah").val(noregistrasikendaraan[1]);
                    $("#noKendBelakang").val(noregistrasikendaraan[2]);
                    $("#namaPemilik").val(response.data.nama);

                    // Menggunakan fungsi setSelect2Value
                    setSelect2Value(
                        "select2-provinsiPemilik",
                        "provinsiPemilik",
                        alamatPemilik[3],
                        1000
                    );
                    setSelect2Value(
                        "select2-kabupatenPemilik",
                        "kabupatenPemilik",
                        alamatPemilik[2],
                        1500
                    );
                    setSelect2Value(
                        "select2-kecamatanPemilik",
                        "kecamatanPemilik",
                        alamatPemilik[1],
                        2000
                    );
                    setSelect2Value(
                        "select2-kelurahanPemilik",
                        "kelurahanPemilik",
                        alamatPemilik[0],
                        2500
                    );

                    $("#merek").val(response.data.merek).trigger("change");
                    $("#tipe").val(response.data.tipe);
                    $("#jenis").val(response.data.jenis);
                    $("#berat").val(response.data.jbb);
                    $("#daerah")
                        .val(response.data.kodewilayah)
                        .trigger("change");
                    $("#daerahTujuan")
                        .val(response.data.kodewilayah)
                        .trigger("change");
                    $("#daerahAsal")
                        .val(response.data.kodewilayahasal)
                        .trigger("change");
                }
            } else {
                $(".alert-success").attr("hidden", true);
                $(".alert-danger").attr("hidden", false);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", status, error);
        },
    });
});

// Fungsi untuk mengubah dan memilih opsi pada Select2
function setSelect2Value(containerId, selectId, optionText, delay) {
    setTimeout(() => {
        // Memeriksa apakah elemen sudah ada
        if ($(`#${containerId}-container`).length) {
            var optionToSelect = $(
                `#${selectId} option:contains('${optionText}')`
            );

            $(`#${selectId}`).val(optionToSelect.val()).trigger("change");

            // Mengubah isi (teks) dari elemen <span>
            $(`#${containerId}-container`)
                .text(optionText)
                .attr("title", optionText);

            $(`#${selectId}`).trigger("change");
        }
    }, delay);
}
