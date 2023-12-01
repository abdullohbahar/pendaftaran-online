var currentPage = 1;
var perPage = 10; // Jumlah gambar per halaman, sesuaikan sesuai kebutuhan.
var $selectedImageSrc = null; // Variabel untuk menyimpan URL gambar terpilih

function loadImages(page) {
    $.ajax({
        url: window.location.origin + "/admin/media?page=" + page,
        method: "GET",
        success: function (data) {
            var $mediaGallery = $("#media-library-section");
            $mediaGallery.empty();

            // Menangani klik pada checkbox
            $mediaGallery.on("change", ".imagecheck-input", function () {
                // Uncheck semua checkbox kecuali yang saat ini dicentang
                $mediaGallery
                    .find(".imagecheck-input")
                    .not(this)
                    .prop("checked", false);
            });

            $.each(data.images, function (index, image) {
                var imageHtml = `
                        <div class="col-sm-4 col-md-2">
                            <label class="imagecheck mb-4">
                                <input
                                    name="imagecheck"
                                    type="checkbox"
                                    value="${index}"
                                    class="imagecheck-input"
                                />
                                <figure class="imagecheck-figure">
                                    <img
                                    src="${image.url}"
                                    alt="Image ${index}"
                                    class="imagecheck-image"
                                    data-src="${image.url}"
                                    />
                                </figure>
                            </label>
                        </div>`;
                $mediaGallery.append(imageHtml);
            });

            // Menangani tautan halaman berikutnya dan sebelumnya
            var totalPages = Math.ceil(data.total / perPage);
            var $pagination = $("#pagination");
            $pagination.empty();
            if (page > 1) {
                $pagination.append(
                    '<a href="#" class="page-link prev-page">Previous</a>'
                );
            }
            if (page < totalPages) {
                $pagination.append(
                    '<a href="#" class="page-link next-page">Next</a>'
                );
            }

            // Menangani perubahan checkbox
            $mediaGallery.on("change", ".imagecheck-input", function () {
                // Jika checkbox dicentang, ambil URL gambar dari gambar yang sesuai
                if ($(this).is(":checked")) {
                    $selectedImageSrc = $(this)
                        .closest(".imagecheck")
                        .find(".imagecheck-image")
                        .attr("src");
                } else {
                    // Jika checkbox dicabut, reset variabel URL gambar
                    $selectedImageSrc = null;
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

// Memuat gambar untuk halaman pertama saat pertama kali ditampilkan
loadImages(currentPage);

// Menangani klik tautan halaman berikutnya
$("#pagination").on("click", ".next-page", function (e) {
    e.preventDefault();
    currentPage++;
    loadImages(currentPage);
});

// Menangani klik tautan halaman sebelumnya
$("#pagination").on("click", ".prev-page", function (e) {
    e.preventDefault();
    currentPage--;
    loadImages(currentPage);
});

// Menangani klik tombol untuk menampilkan URL gambar
$("#insertMedia").on("click", function () {
    if ($selectedImageSrc) {
        insertImage($selectedImageSrc);

        $selectedImageSrc = null;

        $("#modalAddMedia").modal("hide");
    } else {
        alert("Pilih gambar terlebih dahulu.");
    }
});

function insertImage(image) {
    CKEDITOR.instances["description"].insertHtml(
        `<img src="${image}" alt="Sisipkan Gambar" width="500" />`
    );
}
