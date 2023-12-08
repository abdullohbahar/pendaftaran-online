var token = $('meta[name="csrf-token"]').attr("content");

// destroy anak asuh
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": token,
    },
});

$("body").on("click", "#removeParentMenu", function () {
    var id = $(this).data("id");

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/menu/destroy-parent-menu/" + id,
                type: "DELETE",
                success: function (response) {
                    if (response.code == 200) {
                        Swal.fire(
                            "Berhasil!",
                            response.message,
                            "success"
                        ).then(() => {
                            location.reload(); // Refresh halaman setelah mengklik OK
                        });
                    } else if (response.code == 500) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: response.message,
                        });
                    }
                },
            });
        }
    });
});

// show sub menu modal
$("body").on("click", "#btnAddSubMenu", function () {
    $("#addSubMenu").modal("show");
    var parentID = $(this).data("id");
    $("#modalParentID").val(parentID);
});

$("body").on("click", "#removeSubMenu", function () {
    var id = $(this).data("id");

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/menu/destroy-sub-menu/" + id,
                type: "DELETE",
                success: function (response) {
                    if (response.code == 200) {
                        Swal.fire(
                            "Berhasil!",
                            response.message,
                            "success"
                        ).then(() => {
                            location.reload(); // Refresh halaman setelah mengklik OK
                        });
                    } else if (response.code == 500) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: response.message,
                        });
                    }
                },
            });
        }
    });
});

$("body").on("click", "#move-up-parent", function () {
    var data = $(this).data();
    // Kirim data ke server untuk memperbarui urutan di database
    $.ajax({
        type: "POST",
        url: "menu/update-order-parent", // Gantilah dengan endpoint yang sesuai
        data: data,
        success: function (response) {
            // Handle respons dari server jika diperlukan
            if (response.status == 200) {
                location.reload();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: response.message,
                });
            }
        },
    });
});

$("body").on("click", "#move-down-parent", function () {
    var data = $(this).data();
    // Kirim data ke server untuk memperbarui urutan di database
    $.ajax({
        type: "POST",
        url: "menu/update-order-parent", // Gantilah dengan endpoint yang sesuai
        data: data,
        success: function (response) {
            // Handle respons dari server jika diperlukan
            if (response.status == 200) {
                location.reload();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: response.message,
                });
            }
        },
    });
});

$("body").on("click", "#move-up-child", function () {
    var data = $(this).data();
    console.log(data);
    // Kirim data ke server untuk memperbarui urutan di database
    $.ajax({
        type: "POST",
        url: "menu/update-order-submenu", // Gantilah dengan endpoint yang sesuai
        data: data,
        success: function (response) {
            console.log(response);
            // Handle respons dari server jika diperlukan
            if (response.status == 200) {
                location.reload();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: response.message,
                });
            }
        },
    });
});

$("body").on("click", "#move-down-child", function () {
    var data = $(this).data();
    // Kirim data ke server untuk memperbarui urutan di database
    $.ajax({
        type: "POST",
        url: "menu/update-order-submenu", // Gantilah dengan endpoint yang sesuai
        data: data,
        success: function (response) {
            console.log(response);
            // Handle respons dari server jika diperlukan
            if (response.status == 200) {
                location.reload();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: response.message,
                });
            }
        },
    });
});
