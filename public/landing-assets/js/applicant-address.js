function clearOptions(id) {
    console.log("on clearOptions :" + id);

    //$('#' + id).val(null);
    $("#" + id)
        .empty()
        .trigger("change");
}

$.getJSON(urlProvinsi, function (res) {
    res = $.map(res, function (obj) {
        obj.text = obj.nama;
        return obj;
    });

    // Mengurutkan data berdasarkan properti text (A-Z)
    res.sort(function (a, b) {
        var textA = a.text.toUpperCase();
        var textB = b.text.toUpperCase();
        if (textA < textB) {
            return -1;
        }
        if (textA > textB) {
            return 1;
        }
        return 0;
    });

    data = [
        {
            id: "",
            nama: "- Pilih Provinsi -",
            text: "- Pilih Provinsi -",
        },
    ].concat(res);

    //implemen data ke select provinsi
    $("#provinsiPemohon").select2({
        dropdownAutoWidth: true,
        width: "100%",
        data: data,
    });
});

var selectProvPemohon = $("#provinsiPemohon");
$(selectProvPemohon).change(function () {
    var value = $(selectProvPemohon).val();
    clearOptions("kabupatenPemohon");

    if (value) {
        console.log("on change selectProvPemohon");

        var text = $("#provinsiPemohon :selected").text();
        console.log("values = " + value + " / " + "text = " + text);
        $("#hiddenProvPemohon").val(text);

        console.log("Load Kabupaten di " + text + "...");
        $.getJSON(urlKabupaten + value + ".json", function (res) {
            res = $.map(res, function (obj) {
                obj.text = obj.nama;
                return obj;
            });

            // Mengurutkan data berdasarkan properti text (A-Z)
            res.sort(function (a, b) {
                var textA = a.text.toUpperCase();
                var textB = b.text.toUpperCase();
                if (textA < textB) {
                    return -1;
                }
                if (textA > textB) {
                    return 1;
                }
                return 0;
            });

            data = [
                {
                    id: "",
                    nama: "- Pilih Kabupaten -",
                    text: "- Pilih Kabupaten -",
                },
            ].concat(res);

            //implemen data ke select provinsi
            $("#kabupatenPemohon").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKabPemohon = $("#kabupatenPemohon");
$(selectKabPemohon).change(function () {
    var value = $(selectKabPemohon).val();
    clearOptions("kecamatanPemohon");

    if (value) {
        console.log("on change selectKabPemohon");

        var text = $("#kabupatenPemohon :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKabPemohon").val(text);

        console.log("Load Kecamatan di " + text + "...");
        $.getJSON(urlKecamatan + value + ".json", function (res) {
            res = $.map(res, function (obj) {
                obj.text = obj.nama;
                return obj;
            });

            // Mengurutkan data berdasarkan properti text (A-Z)
            res.sort(function (a, b) {
                var textA = a.text.toUpperCase();
                var textB = b.text.toUpperCase();
                if (textA < textB) {
                    return -1;
                }
                if (textA > textB) {
                    return 1;
                }
                return 0;
            });

            data = [
                {
                    id: "",
                    nama: "- Pilih Kecamatan -",
                    text: "- Pilih Kecamatan -",
                },
            ].concat(res);

            //implemen data ke select provinsi
            $("#kecamatanPemohon").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKecPemohon = $("#kecamatanPemohon");
$(selectKecPemohon).change(function () {
    var value = $(selectKecPemohon).val();
    clearOptions("kelurahanPemohon");

    if (value) {
        console.log("on change selectKecPemohon");

        var text = $("#kecamatanPemohon :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKecPemohon").val(text);

        console.log("Load Kelurahan di " + text + "...");
        $.getJSON(urlKelurahan + value + ".json", function (res) {
            res = $.map(res, function (obj) {
                obj.text = obj.nama;
                return obj;
            });

            // Mengurutkan data berdasarkan properti text (A-Z)
            res.sort(function (a, b) {
                var textA = a.text.toUpperCase();
                var textB = b.text.toUpperCase();
                if (textA < textB) {
                    return -1;
                }
                if (textA > textB) {
                    return 1;
                }
                return 0;
            });

            data = [
                {
                    id: "",
                    nama: "- Pilih Kelurahan -",
                    text: "- Pilih Kelurahan -",
                },
            ].concat(res);

            //implemen data ke select provinsi
            $("#kelurahanPemohon").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKelPemohon = $("#kelurahanPemohon");
$(selectKelPemohon).change(function () {
    var value = $(selectKelPemohon).val();

    if (value) {
        console.log("on change selectKelPemohon");

        var text = $("#kelurahanPemohon :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKelPemohon").val(text);
    }
});
