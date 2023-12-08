$("#cekKuota").on("click", function () {
    $.ajax({
        url: "../cek-kuota",
        method: "GET",
        dataType: "JSON",
        success: function (response) {
            // Dapatkan elemen tbody
            var tableBody = $("#tableBody");

            // Kosongkan tbody untuk membersihkan data sebelumnya
            tableBody.empty();

            // Iterasi melalui data respons dan tambahkan baris ke tbody
            $.each(response.data, function (index, data) {
                var formattedDate = formatDate(data.tanggal);

                var row = `
                    <tr>
                        <td>${formattedDate}</td>
                        <td>${data.kuota}</td>
                        <td>${data.tersedia}</td>
                        <td>
                            <button class="btn btn-primary" id="pilihTanggal" data-tanggal="${data.tanggal}">pilih</button>
                        </td>
                    </tr>
                `;

                // Tambahkan baris ke dalam tbody
                tableBody.append(row);
            });

            // Tampilkan modal setelah menambahkan data ke tbody
            $("#cekKuotaModal").modal("show");
        },
        error: function (xhr, status, error) {
            console.error("AJAX Request Error:", status, error);
            // Tambahkan kode penanganan kesalahan sesuai kebutuhan
        },
    });
});

$("body").on("click", "#pilihTanggal", function () {
    var tanggal = $(this).data("tanggal");

    $("#tanggalBooking").val(tanggal);

    $("#cekKuotaModal").modal("hide");
});

// Fungsi untuk mengubah format tanggal dari "YYYY-MM-DD" ke "DD-MM-YYYY"
function formatDate(inputDate) {
    var date = new Date(inputDate);
    var day = date.getDate();
    var month = date.getMonth() + 1; // Perhatikan bahwa bulan dimulai dari 0
    var year = date.getFullYear();

    // Tambahkan leading zero jika day atau month hanya satu digit
    day = day < 10 ? "0" + day : day;
    month = month < 10 ? "0" + month : month;

    return `${day}-${month}-${year}`;
}
