<?php
sleep(1);

require '../functions.php';

// PAGINATION CONFIGURATION
$jumlahDataTampil = 6;
$jumlahData = count(query("SELECT * FROM hamil"));
$jumlahHamalan = ceil($jumlahData / $jumlahDataTampil);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataTampil * $halamanAktif) - $jumlahDataTampil;

$keyword = $_GET["keyword"];

$hamil = query("SELECT * FROM hamil WHERE 
    id_kia LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    umur LIKE '%$keyword%' OR
    status_kehamilan LIKE '%$keyword%' OR
    usia_kehamilan LIKE '%$keyword%' OR
    tanggal_melahirkan LIKE '%$keyword%'
    LIMIT $awalData,$jumlahDataTampil");

?>

<div id="tabel_hamil">
    <table class="table table-sm table-bordered table-striped mb-3" style="border: 1px solid black; margin: 0px;" cellspacing="0" cellpadding="5">

        <thead style="background-color: #1EA3B2; color: white; font-size: 17px;" class="font-Form">
            <tr align="center">
                <th style="width: 4%;">#</th>
                <th style="width: 12%;">No Register KIA</th>
                <th>Nama</th>
                <th style="width: 10%;">Umur</th>
                <th style="width: 15%;">Usia Kehamilan</th>
                <th style="width: 18%;">Status Kehamilan</th>
                <th style="width: 6%;">Aksi</th>
            </tr>
        </thead>

        <?php $i = 1 + $awalData; ?>
        <?php foreach ($hamil as $row) : ?>
            <tr align="center" class="font-Form-Input">
                <th style=""><?= $i ?></td>
                <td style=""><?= $row["id_kia"]  ?></td>
                <td style=""><?= $row["nama"]  ?></td>
                <td style=""><?= $row["umur"] . " " . "Tahun"  ?></td>
                <td style=""><?= $row["usia_kehamilan"] . " " . "Bulan" ?></td>
                <td style=""><?= $row["status_kehamilan"] ?></td>
                <td>
                    <a href="hapusHamil.php?id= <?= $row["id"] ?>" class="btn btn-sm btn-danger hapus" style="border-radius: 0px; border: 1px #dc3545;"><img src="img/icon/trashWhite.png" alt="" class="iconTable2"></a>

                    <a href="detailHamil.php?id= <?= $row["id"] ?>" class="btn btn-sm btn-info" style="border-radius: 0px;  background-color: #004f6e; border: 1px #004f6e;" id="tombol_detail"><img src="img/icon/view.png" alt="Detail" class="iconTable2" align="center"></a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <!-- NAVIGATION PAGINATION -->
    <ul class="pagination font-Form-Input">

        <!-- PREVIOUS -->
        <?php if ($halamanAktif > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $halamanAktif - 1 ?>"> &laquo; </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <a class="page-link" href="?page=<?= $halamanAktif - 1 ?>"> &laquo; </a>
            </li>
        <?php endif; ?>

        <!-- NUMBERING -->
        <?php for ($i = 1; $i <= $jumlahHamalan; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <li class="page-item active">
                    <a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- NEXT -->
        <?php if ($halamanAktif < $jumlahHamalan) : ?>
            <li class="page-item">
                <a href="?page=<?= $halamanAktif + 1 ?>" class="page-link"> &raquo; </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <a href="?page=<?= $halamanAktif + 1 ?>" class="page-link"> &raquo; </a>
            </li>
        <?php endif; ?>
    </ul>

</div>

<script src="js/jquery.js"></script>

<script src="sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

<script>
    <?php foreach ($hamil as $row) : ?>
        $('.hapus').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Yakin Hapus Data <?= $row["nama"] ?>?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
    <?php endforeach; ?>
</script>