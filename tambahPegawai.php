<script src="js/jquery.js"></script>
<script src="sweetalert2-11.3.4/package/dist/sweetalert2.all.min.js"></script>

<?php

require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambahPegawai($_POST) > 0) {
        echo "<script>
            $(document).ready(function(){

            Swal.fire({
                title: 'Data Berhasil Di Simpan !',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = 'petugas.php';
                }
            })
        });
        </script>
    ";
    } else {
        mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php require 'link.php' ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #1A374D;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">SELAMAT DATANG ADMIN <b>| SiLandas</b></a>

            <div class="d-flex">
                <img src="img/icon/mail.png" class="iconTable" style="margin-right: 20px;" alt="">
                <img src="img/icon/bell.png" class="iconTable" style="margin-right: 20px;" alt="">
                <img src="img/icon/zoom-in.png" class="iconTable" style="margin-right: 0px;" alt="">
            </div>
        </div>
        </div>
    </nav>

    <div class="row no-gutter mt-5">

        <!-- sidebar -->
        <div class="col-md-2 pr-3 mt-2 pt-3" style="background-color: #406882;">
            <ul class=" nav flex-column mb-5" style="margin-left: 10px;">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="#"><img src="img/profil/admin.png" alt="" style="width: 35px; height: 35px; margin-right: 5px; font-family: 'Roboto', sans-serif;"> Admin</a>
                    <hr class="bg-light mr-5">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard.php"><img src="img/icon/dashboard.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="index.php"><img src="img/icon/silandas.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> SiLandas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="user.php"><img src="img/icon/user.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Data User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="petugas.php"><img src="img/icon/officer.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Data Petugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="master.php"><img src="img/icon/database1.png" alt="" style="width: 24px; height: 24px; margin-bottom: 5px; margin-right: 5px;"> Data Master</a>
                </li>
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
        <div class="col-md-10 pt-4 p-4 mt-2" style="background-color: #f8f9fa;">
            <h3 class="heading-Page">
                <img src="img/icon/officer_black.png" alt="" style="width: 27px; height: 27px; margin-bottom: 5px; margin-right: 5px;"> DATA PETUGAS > TAMBAH DATA PETUGAS
                <br style="margin-bottom: 17px;">
                <hr>
            </h3>

            <form action="" method="POST">

                <table class="table table-sm table-bordered mb-2" style="margin:0px; padding: 0px; border: 1px solid transparent;">

                    <td style="width: 14.8%; padding: 0px; margin: 0px;">
                        <a href="petugas.php" class="btn btn-primary font-Form-Input" style="border-radius: 0px; "><img src="img/icon/left-arrow.png" class="iconTable" style="margin-right: 5px;" alt="">
                            Kembali
                        </a>
                    </td>
                    </tr>

                </table>


                <div class="container shadow-Tambah-Petugas">

                    <!-- id -->
                    <div class="mb-3 row mt-3">
                        <label for="id" class="col-sm-4 col-form-label mt-3 font-Form">ID Petugas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mt-3 font-Form-Input" readonly name="id" id="id">
                        </div>
                    </div>
                    <!-- nama -->
                    <div class="mb-3 row mt-3">
                        <label for="nama" class="col-sm-4 col-form-label font-Form">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control font-Form-Input" name="nama" id="nama">
                        </div>
                    </div>
                    <!-- jabatan -->
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-4 col-form-label font-Form">Jabatan</label>
                        <div class="col-sm-8">
                            <select class="form-select font-Form-Input" id="jabatan" name="jabatan" required>
                                <option selected>Pilih...</option>
                                <option value="Kaur PM">KAUR Pembanguan Masyarakat</option>
                                <option value="Petugas">Petugas Pelaksana</option>
                            </select>
                        </div>
                    </div>
                    <!-- button -->
                    <div class="mt-2" style="border: 1px solid transparent; width: 100%; padding-left: 0px; padding: 0px;">
                        <table class="table table-sm table-bordered mb-2" style="margin:0px; padding: 0px; border: 1px solid transparent;">

                            <td style="width: 14.8%; padding: 0px; margin: 0px;">
                                <button type="submit" id="submit" name="submit" class="btn btn-success font-Form-Input" style="border-radius: 0px; "><img src="img/icon/diskette.png" class="iconTable" style="margin-right: 5px;" alt="">
                                    Simpan
                                </button>
                                <a href="petugas.php" type="batal" id="batal" name="batal" class="btn btn-danger batal" style="border-radius: 0px; right: 10px;"><img src="img/icon/trashWhite.png" class="iconTable" style="margin-right: 5px;" alt="">
                                    Batal
                                </a>
                            </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </form>
        </div>
        </ul>
    </div>

    <script>
        $('.batal').on('click', function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Yakin Ingin Mengulang Form ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = 'tambahPegawai.php';
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            let jabatan = $('#jabatan');
            let id = $('#id');
            let nama = $('#nama');
            let numberKaur = 1 + Math.floor(Math.random() * 99);
            let numberPetugas = 1 + Math.floor(Math.random() * 75);

            jabatan.on('change', function() {
                if (this.value === 'Kaur PM') {
                    id.val(63004915 + numberKaur);
                } else if (this.value === 'Petugas') {
                    id.val(63004990 + numberPetugas);
                } else {
                    id.val('');
                }
            });
        });
    </script>
</body>

</html>