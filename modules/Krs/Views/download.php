<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KartuRencanaStudi_<?= $data[0]->Nim ?></title>

   <link rel="stylesheet" href="assets/css/krs.css">

</head>



<body>

    <div class="logo">

        <img src="assets/images/logo-umsu-blackwhite.jpg" alt="logo-umsu">

    </div>

    <div class="header center">

        <p class="big space-clear">MAJELIS PENDIDIKAN TINGGI MUHAMMADIYAH</p>

        <p class="big space-clear">UNIVERSITAS MUHAMMADIYAH SUMATERA UTARA</p>

        <p class="big space-clear"><?= ($data[0]->Faculty_Id == 9) ? $data[0]->Department_Name : $data[0]->Faculty_Name; ?></p>

    </div>

    <div class="kartu center">

        <p class="big space-clear">KARTU RENCANA STUDI</p>

        <p class="big space-clear"><?= $data[0]->Term_Year_Name ?></p>

    </div>

    <div class="biodata">

        <table>

            <tr>

                <td class="big left">NPM</td>

                <td class="big left"></td>

                <td class="big left"> : <?= $data[0]->Nim; ?></td>

            </tr>

            <tr>

                <td class="big left">Nama Mahasiswa</td>

                <td class="big left"></td>

                <td class="big left"> : <?= $data[0]->Full_Name; ?></td>

            </tr>

            <tr>

                <td class="big left">Program Studi</td>

                <td class="big left"></td>

                <td class="big left"> : <?= $data[0]->Department_Name; ?> - <?= $data[0]->Class_Program_Name; ?></td>

            </tr>

        </table>

    </div>

    <div class="foto black">

        <?php $file_header = @get_headers("https://api.umsu.ac.id/FotoMhs/20" . substr($data[0]->Nim, 0, 2) . "/" . $data[0]->Nim . ".jpg"); ?>

        <?= (!$file_header || $file_header[0] == 'HTTP/1.1 404 Not Found') ? '' : '<img src="https://mahasiswa.umsu.ac.id/FotoMhs/20' . substr($data[0]->Nim, 0, 2) . '/' . $data[0]->Nim . '.jpg" alt="mahasiswa" class="photo">' ?>

    </div>

    <div class="matkul">

        <table>

            <thead>

                <tr>

                    <th class="big center" rowspan="2">NO</th>

                    <th class="big center" rowspan="2">Kode Matakuliah</th>

                    <th class="big center" rowspan="2">Sks</th>

                    <th class="big center" rowspan="2">Kls</th>

                    <th class="big center" rowspan="2">Jadwal</th>

                    <th class="big center" rowspan="2">Dosen</th>

                    <th class="big center" colspan="2">Paraf</th>

                </tr>

                <tr>

                    <th class="big center">UTS</th>

                    <th class="big center">UAS</th>

                </tr>

            </thead>

            <tbody>

                <?php $no = 1 ?>

                <?php foreach ($data as $row) : ?>

                    <tr>

                        <td class="small dinamis center"><?= $no++ ?></td>

                        <td class="small dinamis left"><?= $row->Course_Code ?> <?= $row->Course_Name; ?></td>

                        <td class="small dinamis center"><?= number_format($row->Sks, 2, ',', '') ?></td>

                        <td class="small dinamis center"><?= $row->Class_Name . $row->Class_Prog_Id ?></td>

                        <td class="small dinamis left"><?= $row->Description; ?></td>

                        <td class="small dinamis left"><?= $row->Employee_Full_Name; ?></td>

                        <td class="small dinamis left"></td>

                        <td class="small dinamis left"></td>

                    </tr>

                <?php endforeach ?>

                <tr>

                    <td class="big statis"></td>

                    <td class="big statis right">Jumlah :</td>

                    <td class="big statis center"><?= number_format($row->Amount_Sks, 1, ',', ''); ?></td>

                    <td class="big statis left">Sks</td>

                    <td class="big statis"></td>

                    <td class="big statis"></td>

                    <td class="big statis"></td>

                    <td class="big statis"></td>

                </tr>

            </tbody>

        </table>

    </div>

    <div class="ttd-mhs">

        <p class="big space-ttd">Mahasiswa Ybs,</p>

        <p class="big space-clear"><?= $data[0]->Full_Name; ?></p>

        <p class="big space-clear">NPM. <?= $data[0]->Nim; ?></p>

    </div>

    <div class="ttd-wd">

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
        }

        ?>

        <p class="big space-clear">Medan, <?= $date; ?></p>

        <?php if ($data[0]->Faculty_Id == 9) : ?>

            <p class="big space-ttd">Ketua Prodi,</p>

        <?php else : ?>

            <p class="big space-ttd">Wakil Dekan 1,</p>

        <?php endif ?>

        <p class="big space-clear"><?= $data[0]->Functional_Full_Name; ?></p>

    </div>

    <div class="ttd-pa">

        <p class="big space-ttd">Dosen Pembimbing,</p>

        <p class="big"><?= $data[0]->Supervision_Full_Name; ?></p>

    </div>

</body>



</html>