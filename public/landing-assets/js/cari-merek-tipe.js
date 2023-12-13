$("#merek").on("change", getTipe);

function getTipe() {
    var merek = $(this).val();

    $.ajax({
        url: "../cek-tipe/" + merek,
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            populateSelectOptions(response);
        },
    });
}

// Fungsi untuk menambahkan opsi ke elemen select
function populateSelectOptions(data) {
    var select = $("#tipe");
    // Hapus opsi yang sudah ada (kecuali opsi pertama)
    select.find("option:not(:first)").remove();
    // Tambahkan opsi berdasarkan data
    $.each(data.data.tipe, function (index, item) {
        select.append(
            '<option value="' + item.tipe + '">' + item.tipe + "</option>"
        );
    });
    // Perbarui tampilan Select2
    select.select2("destroy").select2();
}

// Panggil fungsi untuk pertama kali (saat halaman dimuat)
$(document).ready(function () {
    // Inisialisasi Select2 pada elemen merek dan tipe
    $(".select2").select2();
    // Tambahkan event listener pada perubahan nilai elemen merek
    $("#merek").on("change", getTipe);
});
