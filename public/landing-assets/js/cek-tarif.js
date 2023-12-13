$("#cekTarif").on("click", function () {
    var berat = $("#berat").val();

    $.ajax({
        url: "../cek-tarif/" + berat,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            $("#resultCekTarif").empty();
            $("#resultCekTarif").append(
                `
                    <ul>
                        <li>Tarif yang dikenakan yaitu ${formatRupiah(
                            response.data.tarif
                        )}</li>
                    </ul>
                `
            );
        },
    });
});

function formatRupiah(angka) {
    var reverse = angka.toString().split("").reverse().join("");
    var ribuan = reverse.match(/\d{1,3}/g);
    var formatted = ribuan.join(".").split("").reverse().join("");
    return "Rp " + formatted;
}
