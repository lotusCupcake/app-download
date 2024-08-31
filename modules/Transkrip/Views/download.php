<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TranskripNilai_<?= $data[0]->Nim ?></title>

   <link rel="stylesheet" href="assets/css/transkrip.css">

</head>



<body>

    <?php

    $date = '';

    $bulan = [

        "1" => "Januari",

        "2" => "Februari",

        "3" => "Maret",

        "4" => "April",

        "5" => "Mei",

        "6" => "Juni",

        "7" => "Juli",

        "8" => "Agustus",

        "9" => "September",

        "10" => "Oktober",

        "11" => "November",

        "12" => "Desember",

    ];

    foreach ($bulan as $key => $value) {

        if (date('m') == $key) {

            $date = date('j') . ' ' . $value . ' ' . date('Y');
        }

        if (date('m', strtotime($data[0]->Birth_Date)) == $key) {

            $birthDate = date('j', strtotime($data[0]->Birth_Date)) . ' ' . $value . ' ' . date('Y', strtotime($data[0]->Birth_Date));
        }
    }

    ?>

    <htmlpageheader name="firstpageheader">

        <div class="logo">

            <img src="assets/images/logo-umsu-blackwhite.jpg" alt="logo-umsu">

        </div>

        <div class="header center">

            <p class="big space-clear">MAJELIS PENDIDIKAN TINGGI MUHAMMADIYAH</p>

            <p class="big space-clear">UNIVERSITAS MUHAMMADIYAH SUMATERA UTARA</p>

        </div>

        <div class="kartu center">

            <p class="big space-clear">TRANSKRIP NILAI AKADEMIK SEMENTARA</p>

        </div>

        <div class="biodata">

            <table>

                <tr>

                    <td class="big left">Nama Mahasiswa</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Full_Name; ?></td>

                </tr>

                <tr>

                    <td class="big left">Tempat/Tgl Lahir</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Birth_Place; ?>, <?= $birthDate; ?></td>

                </tr>

                <tr>

                    <td class="big left">NPM</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Nim; ?></td>

                </tr>

                <tr>

                    <td class="big left">Fakultas</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Faculty_Name; ?></td>

                </tr>

                <tr>

                    <td class="big left">Program/Jenjang Studi</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Department_Name; ?></td>

                </tr>

            </table>

        </div>

        <div class="foto black">

            <?php $file_header = @get_headers("https://mahasiswa.umsu.ac.id/FotoMhs/20" . substr($data[0]->Nim, 0, 2) . "/" . $data[0]->Nim . ".jpg"); ?>

            <?= (!$file_header || $file_header[0] == 'HTTP/1.1 404 Not Found') ? '' : '<img src="https://mahasiswa.umsu.ac.id/FotoMhs/20' . substr($data[0]->Nim, 0, 2) . '/' . $data[0]->Nim . '.jpg" alt="mahasiswa" class="photo">' ?>

        </div>

    </htmlpageheader>

    <htmlpageheader name="otherpageheader">

        <div class="kartu center">

            <p class="big space-clear">TRANSKRIP NILAI AKADEMIK SEMENTARA</p>

        </div>

        <div class="biodata">

            <table>

                <tr>

                    <td class="big left">Nama Mahasiswa</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Full_Name; ?></td>

                </tr>

                <tr>

                    <td class="big left">Tempat/Tgl Lahir</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Birth_Place; ?>, <?= $birthDate; ?></td>

                </tr>

                <tr>

                    <td class="big left">NPM</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Nim; ?></td>

                </tr>

                <tr>

                    <td class="big left">Fakultas</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Faculty_Name; ?></td>

                </tr>

                <tr>

                    <td class="big left">Program/Jenjang Studi</td>

                    <td class="big left"></td>

                    <td class="big left"> : <?= $data[0]->Department_Name; ?></td>

                </tr>

            </table>

        </div>

        <div class="foto black">

            <?php $file_header = @get_headers("https://mahasiswa.umsu.ac.id/FotoMhs/20" . substr($data[0]->Nim, 0, 2) . "/" . $data[0]->Nim . ".jpg"); ?>

            <?= (!$file_header || $file_header[0] == 'HTTP/1.1 404 Not Found') ? '' : '<img src="https://mahasiswa.umsu.ac.id/FotoMhs/20' . substr($data[0]->Nim, 0, 2) . '/' . $data[0]->Nim . '.jpg" alt="logo-umsu" class="photo">' ?>

        </div>

    </htmlpageheader>

    <div class="matkul">

        <table>

            <thead>

                <tr>

                    <th class="big center">NO</th>

                    <th class="big center">Kode Matakuliah</th>

                    <th class="big center">Nama Matakuliah</th>

                    <th class="big center">SKS</th>

                    <th class="big center">Nilai</th>

                    <th class="big center">Bobot</th>

                    <th class="big center">Mutu</th>

                </tr>

            </thead>

            <tbody>

                <?php $no = 1 ?>

                <?php foreach ($data as $row) : ?>

                    <tr>

                        <td class="big dinamis center"><?= $no++ ?></td>

                        <td class="big dinamis left"><?= $row->Course_Code ?></td>

                        <td class="big dinamis left"><?= $row->Course_Name; ?></td>

                        <td class="big dinamis center"><?= number_format($row->Sks, 1, ',', '') ?></td>

                        <td class="big dinamis center"><?= $row->Grade_Letter; ?></td>

                        <td class="big dinamis center"><?= number_format($row->Weight_Value, 2, ',', ''); ?></td>

                        <td class="big dinamis center"><?= number_format($row->Bnk_Value, 2, ',', ''); ?></td>

                    </tr>

                <?php endforeach ?>

            </tbody>

        </table>

    </div>

    <div class="perkembangan">

        <table>

            <tr>

                <td class="big left">Jumlah SKS Semester</td>

                <td class="big left"></td>

                <td class="big left"> : <?= number_format($row->BOBOT_KALI_SKS, 1, ',', '') ?></td>

            </tr>

            <tr>

                <td class="big left">Bobot Nilai x Jumlah SKS Semester</td>

                <td class="big left"></td>

                <td class="big left"> : <?= number_format($row->TOTAL_ANGKA, 2, ',', '') ?></td>

            </tr>

            <tr>

                <td class="big left">Indeks Prestasi Semester</td>

                <td class="big left"></td>

                <td class="big left"> : <?= number_format($row->IPK, 2, ',', '') ?></td>

            </tr>

        </table>

    </div>

    <div class="ttd-biro">

        <p class="big space-ttd">Biro Akademik dan Data</p>

        <img class="kabaad-ttd" src="assets/images/kabaad.png" alt="kabaad">

        <p class="big space-clear">Dr. Marah Doly Nasution, S.Pd., M.Si.</p>

    </div>

    <div class="ttd-wd">

        <p class="big space-clear">Medan, <?= $date; ?></p>

        <?php if ($data[0]->Faculty_Id == 9) : ?>

            <p class="big space-ttd">Ketua Prodi,</p>

        <?php else : ?>

            <p class="big space-ttd">Wakil Dekan 1,</p>

        <?php endif ?>

        <p class="big space-clear"><?= $data[0]->Functional_Full_Name; ?></p>

    </div>

</body>



</html>