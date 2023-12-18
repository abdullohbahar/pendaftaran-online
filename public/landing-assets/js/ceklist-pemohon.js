$("#customCheck4").on("click", function () {
    var namaPemilik = $('input[name="nama_pemilik"').val();
    var provinsiPemilik = $("#select2-provinsiPemilik-container").attr("title");
    var kabupatenPemilik = $("#select2-kabupatenPemilik-container").attr(
        "title"
    );
    var kecamatanPemilik = $("#select2-kecamatanPemilik-container").attr(
        "title"
    );
    var kelurahanPemilik = $("#select2-kelurahanPemilik-container").attr(
        "title"
    );

    setSelect2Value(
        "select2-provinsiPemohon",
        "provinsiPemohon",
        provinsiPemilik,
        1000
    );
    setSelect2Value(
        "select2-kabupatenPemohon",
        "kabupatenPemohon",
        kabupatenPemilik,
        1500
    );
    setSelect2Value(
        "select2-kecamatanPemohon",
        "kecamatanPemohon",
        kecamatanPemilik,
        2000
    );
    setSelect2Value(
        "select2-kelurahanPemohon",
        "kelurahanPemohon",
        kelurahanPemilik,
        2500
    );
    $('input[name="namapemohon"]').val(namaPemilik);
});
