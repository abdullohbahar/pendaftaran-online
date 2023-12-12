<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-size: 12.5pt;
        }

        @page {
            size: A4;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                margin: 30px;
                padding-right: 100px;
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .body-section-3 {
            text-align: justify;
        }

        .footer {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="header">
        <table style="width: 55%; align-self: flex-start;">
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td><b>Permohonan Pengujian Kendaraan Bermotor</b></td>
            </tr>
        </table>
        <table style="width: 45%">
            <tr>
                <td>Kepada <br>
                    Yth. Kepala Dinas Perhubungan <br>
                    Kabupaten Sragen <br>
                    di <b>Sragen</b></td>
            </tr>
        </table>
    </div>

    <div class="body">
        <div class="body-section-1">
            <p>Yang bertanda tangan dibawah ini saya :</p>
            <table>
                <tr>
                    <td style="width: 120px;">Nama</td>
                    <td>: {{ $transaksi->nama_pemohon ?? '-' }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $transaksi->alamat_pemohon ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>: {{ $transaksi->notelp_pemohon ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="body-section-2">
            <p>Dengan ini mengajukan permohonan pengujian kendaraan bermotor atas kendaraan :</p>
            <ol>
                <table>
                    <tr>
                        <td style="width: 220px;">
                            <li>Nomor Uji Kendaraan</li>
                        </td>
                        <td>: {{ $transaksi->nouji ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Nomor Kendaraan / TNKB</li>
                        </td>
                        <td>: {{ $transaksi->nomor_kendaraan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Nama Pemilik (Sesuai STNK)</li>
                        </td>
                        <td>: {{ $transaksi->nama_pemilik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Alamat Pemilik</li>
                        </td>
                        <td>: {{ $transaksi->alamat_pemilik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Merek / Type</li>
                        </td>
                        <td>: {{ $transaksi->merek ?? '-' }}/{{ $transaksi->tipe ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Tahun Pembuatan</li>
                        </td>
                        <td>: {{ $transaksi->tahun_pembuatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Nomor Rangka</li>
                        </td>
                        <td>: {{ $transaksi->nomor_rangka ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Nomor Mesin</li>
                        </td>
                        <td>: {{ $transaksi->nomor_mesin ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Jenis rumah-rumah</li>
                        </td>
                        <td>: {{ $transaksi->jenis_rumah_rumah ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Sifat Penggunaan</li>
                        </td>
                        <td>: {{ $transaksi->sifat_penggunaan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Sifat Pengujian</li>
                        </td>
                        <td>: {{ $transaksi->sifat_pengujian ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>
                            <li>Tanggal Berakhir Masa Uji</li>
                        </td>
                        <td>:
                            {{ str_replace('-', '', \Carbon\Carbon::parse($transaksi->tanggal_berakhir_masa_uji)->format('d-m-Y')) }}
                    </tr>
                    <tr>
                        <td>
                            <li>Untuk diuji pada tanggal</li>
                        </td>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <td>:
                            {{ $tglUji = \Carbon\Carbon::parse($transaksi->untuk_diuji_tanggal)->translatedFormat('j F Y') }}
                        </td>
                    </tr>
                </table>
            </ol>

        </div>
        <div class="body-section-3">
            <p>Sehubungan hal tersebut diatas, bersama ini kami lampirkan :</p>
            <ol>
                <li>Kartu Uji Kendaraan Bermotor</li>
                <li>Foto Copy KTP dan STNK, khusus bagi pengujian berkala pertama (kendaraan baru)/kendaraan mutasi
                    dan rubah bentuk (dengan menunjukan yang asli)</li>
                <li>Sertifikat Registrasi Uji Type dan Surat Keterangan Tera untuk mobil Tangki,khusus bagi
                    kendaraan
                    baru
                    (dengan menunjukan yang asli)</li>
                <li>
                    Foto Copy Surat Kerterangan Hasil Pemeriksaaan Mutu dan Surat Keterangan Tera untuk Mobil Tangki,
                    khusus kendaraan
                    hasil rancang bangun dan rekayasa (dengan menunjukan yang asli)
                </li>
                <li>
                    Surat Persetujuan Mutasi dari Unit Pengujian Kendaraan Bermotor daerah asal kendaraan semula
                    terdaftar
                    (khusus bagi kendaraan mutasi)
                </li>
            </ol>
            <p>
                Dari hasil pengujian yang telah dilaksanakan oleh Petugas Pengujian sesuai sistem dan prosedur yang
                telah di tetapkan dan
                berdasarkan peraturan perundang-undangan yang berlaku, jika terdapat catatan atau rekomendasi, saya
                sanggup
                menindaklanjuti dengan cara melakukan perbaikan kendaraan sebagaimana mestinya agar saya memenuhi
                persyaratan teknis
                dan laik jalan
            </p>
            <p>Demikian keterangan ini dibuat agar dapat dipegunakan sebagaimana mestinya</p>
        </div>
    </div>
    <div class="footer">
        <div>
            {!! QrCode::size(80)->generate($transaksi->bill_code) !!} <br>
            {{ $transaksi->bill_code }}
        </div>
        <div style="text-align: center">
            Sragen, {{ $tglUji }} <br>
            Pemohon
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            {{ $transaksi->nama_pemohon }}
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>
