<?php

require 'functions.php';

// PAGINATION CONFIGURATION
$jumlahDataTampil = 6;
$jumlahData = count(query("SELECT * FROM obat_logistik"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataTampil);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataTampil * $halamanAktif) - $jumlahDataTampil;

$user = query("SELECT * FROM obat_logistik LIMIT $awalData,$jumlahDataTampil")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Puskesmas</title>
    <?php require 'link.php' ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #1A374D;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white; font-family: 'Source Sans Pro', sans-serif;">SELAMAT DATANG TIM PUSKESMAS <b>| SiLandas</b></a>
        </div>
        <div class="d-flex">
            <img src="img/icon/mail.png" class="iconTable" style="margin-right: 20px;" alt="">
            <img src="img/icon/bell.png" class="iconTable" style="margin-right: 20px;" alt="">
            <img src="img/icon/zoom-in.png" class="iconTable" style="margin-right: 12px;" alt="">
        </div>
    </nav>

    <div class="row no-gutter mt-5">

        <!-- sidebar -->
        <div class="col-md-2 pr-3 mt-2 pt-3" style="background-color: #406882;">
            <ul class=" nav flex-column mb-5" style="margin-left: 10px;">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><img src="img/profil/admin.png" alt="" style="width: 35px; height: 35px; margin-right: 5px; font-family: 'Roboto', sans-serif;"> Nakes </a>
                    <hr class="bg-light mr-5">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboardPuskesmas.php"><img src="img/icon/dashboard.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Dashboard</a>
                </li>
                <li class="nav-item" style="padding-bottom: 0px;">
                    <a class="nav-link active text-white" href="obatLogistik.php"><img src="img/icon/medicine-white.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Obat & Logistik</a>
                </li>
                <li class="nav-item" style="padding-bottom: 0px;">
                    <a class="nav-link active text-white" href="kpmVerified.php"><img src="img/icon/verified-white.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> KPM Verified</a>
                </li>
                <li class="nav-item" style="padding-bottom: 65px;">
                    <a class="nav-link active text-white" href="userDokterPuskemas.php"><img src="img/icon/stethoscope-white.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Data Dokter</a>
                </li>
                <!-- <li class="nav-item" style="padding-bottom: 0px;">
                    <a class="nav-link active text-white" href="userNakesPuskemas.php"><img src="img/icon/nurse-white.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Data Nakes</a>
                </li> -->
                <!-- <li class="nav-item" style="margin-left: 16px; margin-bottom: 0px; margin-top: -20px; padding-bottom: 5px;">
                    <div>Test</div>
                </li> -->
                <li class="nav-item" style="padding-top: 0px;">
                    <hr class="bg-light mr-5">
                    <a class="nav-link text-white" href="logout.php"><img src="img/icon/logout.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Logout</a>
                </li>
            </ul>
        </div>

        <!-- menu utama -->
        <div class="col-md-10 pt-4 p-4 mt-3" style="background-color: #f8f9fa;">
            <h3 class="heading-Page">
                <img src="img/icon/verified.png" alt="" style="width: 27px; height: 27px; margin-bottom: 8px; margin-right: 5px;"> KPM VERIFIED DOKTER
                <br style="margin-bottom: 10px;">
                <hr>
            </h3>


            <!-- Pencarian -->
            <form action="" method="POST">
                <table class="table table-bordered" style="border: 1px solid transparent; margin:0px; padding:0px;">

                    <tr>
                        <td style="padding: 0px; padding-top: 8px;">
                            <a href="dashboardPuskesmas.php" class="btn btn-success mb-2 font-Form-Input" style="border-radius: 0px; border: 1px solid #1A374D; background-color: #1A374D;"><img src="img/icon/left-arrow.png" alt="" class="iconTable" style="margin-right: 0px; height: 12px; width: 20px;">Kembali</a>
                        </td>
                        <td style="width: 19%; padding: 0px; padding-top: 8px;">
                            <input type="text" name="keyword" class="form-control ds-input font-Form-Input" placeholder="Cari data..." style="display: inline; width: 80%; border-radius: 0px;" autocomplete="off" id="keyword">

                            <img src="img/gif/loading.gif" alt="" style="width: 65px; height: 55px; z-index: -1; right: 0px; top: 165px; position: fixed; display: none;" id="loading">
                        </td>
                    </tr>

                </table>
            </form>


            <div id="tabel_user">
                <table class="table table-sm table-striped mb-3" style="border: 1px solid #DEE2E6; margin:0px;" cellspacing="0" cellpadding="5">
                    <thead class="font-Form">
                        <tr align="center">
                            <th style="width: 5%;">#</th>
                            <th style="width: 20%;">ID KIA</th>
                            <th style="width: 35%;">Nama Peserta</th>
                            <th style=>Kondisi</th>
                            <th style=" width: 9%;">Aksi</th>
                        </tr>
                    </thead>

                    <?php $i = 1 + $awalData ?>
                    <?php foreach ($user as $row) : ?>
                        <tr align="center" class="font-Form-Input">
                            <th><?= $i ?></th>
                            <td><?= $row["id_obat"] ?></td>
                            <td><?= $row["obat_logistik"] ?></td>
                            <td><?= $row["stok"] ?></td>
                            <td>
                                <a href="hapusUser.php?id= <?= $row["id_obat"] ?>" class="btn btn-danger hapus" style="font-family: 'Manrope', sans-serif; border-radius: 0px; border: 1px #dc3545;"><img src="img/icon/trashWhite.png" alt="" class="iconTable2"></a>

                                <a href="editUser.php?id= <?= $row["id_obat"] ?>" class="btn btn-info" style="font-family: 'Manrope', sans-serif; border-radius: 0px;  background-color: #FFC900; border: 1px #004f6e;" id="tombol_detail"><img src="img/icon/editing_white.png" alt="Detail" class="iconTable" align="center"></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </table>

                <!-- NAVIGATION PAGINATION -->
                <ul class="pagination">

                    <!-- PREVIOUS -->
                    <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item font-Form-Input">
                            <a class="page-link" href="?page=<?= $halamanAktif - 1 ?>"> &laquo; </a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled font-Form-Input">
                            <a class="page-link" href="?page=<?= $halamanAktif - 1 ?>"> &laquo; </a>
                        </li>
                    <?php endif; ?>

                    <!-- NUMBERING -->
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active font-Form-Input">
                                <a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item font-Form-Input">
                                <a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <!-- NEXT -->
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item font-Form-Input">
                            <a class="page-link" href="?page=<?= $halamanAktif + 1 ?>"> &raquo; </a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled font-Form-Input">
                            <a class="page-link" href="?page=<?= $halamanAktif + 1 ?>"> &raquo; </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>