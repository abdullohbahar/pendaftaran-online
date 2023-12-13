var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

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
    $("#provinsiPemilik").select2({
        dropdownAutoWidth: true,
        width: "100%",
        data: data,
    });
});

var selectProv = $("#provinsiPemilik");
$(selectProv).change(function () {
    var value = $(selectProv).val();
    clearOptions("kabupatenPemilik");

    if (value) {
        console.log("on change selectProv");

        var text = $("#provinsiPemilik :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenProvPemilik").val(text);

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
            $("#kabupatenPemilik").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKab = $("#kabupatenPemilik");
$(selectKab).change(function () {
    var value = $(selectKab).val();
    clearOptions("kecamatanPemilik");

    if (value) {
        console.log("on change selectKab");

        var text = $("#kabupatenPemilik :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKabPemilik").val(text);

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
            $("#kecamatanPemilik").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKec = $("#kecamatanPemilik");
$(selectKec).change(function () {
    var value = $(selectKec).val();
    clearOptions("kelurahanPemilik");

    if (value) {
        console.log("on change selectKec");

        var text = $("#kecamatanPemilik :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKecPemilik").val(text);

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
            $("#kelurahanPemilik").select2({
                dropdownAutoWidth: true,
                width: "100%",
                data: data,
            });
        });
    }
});

var selectKel = $("#kelurahanPemilik");
$(selectKel).change(function () {
    var value = $(selectKel).val();

    if (value) {
        console.log("on change selectKel");

        var text = $("#kelurahanPemilik :selected").text();
        console.log("value = " + value + " / " + "text = " + text);
        $("#hiddenKelPemilik").val(text);
    }
});
