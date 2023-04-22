<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);

$mpdf->AddPage('L');

$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");

function bulan($text)
{
    if ($text == "1") return "Januari";
    if ($text == "2") return "Februari";
    if ($text == "3") return "Maret";
    if ($text == "4") return "April";
    if ($text == "5") return "Mei";
    if ($text == "6") return "Juni";
    if ($text == "7") return "Juli";
    if ($text == "8") return "Agustus";
    if ($text == "9") return "September";
    if ($text == "10") return "Oktober";
    if ($text == "11") return "November";
    if ($text == "12") return "Desember";
}

require 'link.php';
require 'functions.php';

$cetakRekapStunting = query("SELECT * FROM stunting");

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data |</title>
    <link rel="icon" href="img/icon.ico">
    <link rel="stylesheet" href="css/print.css">
</head>

<body>
  <div class="container-fluid";>
    <table style="border: 1px solid #fff; width: 100%;">
        <tr>
            <td style="width: 15%;">
                <img src="img/logo.jpg" style="width:90px; height:90px;">
            </td>
            <td style="width:70%;">
                <center>
                    <p style="font-size: 20px;">PEMERINTAH KABUPATEN BANJAR</p>
                    <P style="font-size: 20px;">KECAMATAN KARANG INTAN</P>
                    <P style="font-size: 20px;"><b>DESA SUNGAI LANDAS</b></P>
                    <P style="font-size: 12px";>Jl. Irigasi RT.002 Desa Sungai Landas Kecamatan Karang Intan Kab. Banjar Email:</P>
                    <p style="font-size: 12px";>sungailandas70661@gmail.com Kode Pos: 70661</p>
                </center>
            </td>
            <td style="width:15%;">
            <img src="img/germas.jpg" alt="" style="width:160px; height: 85px;">
            </td>
        </tr>
    </table>

    <hr style="color: black; margin:0px; padding:0px; height:5px;">
    <br>
    <br>

    <h4 align="center" style="margin: 0px; padding:0px;"><b><u>FORMULIR REKAPITULASI HASIL PEMANTAUAN 3 (TIGA) BULANAN BAGI ANAK 0-2 TAHUN</u></b></h4>
        <p align="center" style="margin: 0px; padding:0px; font-size:12px;">Nomor : 981/SUNGAI-LANDAS/A.1/IX/2022
        </p>
    <br>';


$html .= '<table class="table table-sm table-bordered table-striped mb-3" style="border: 1px solid black; margin:0px;" cellspacing="0" cellpadding="5">
    <thead style="background-color: #15ADA7;">
        <tr align="center">
            <th style="width: 2%; border: 1px solid black;">No</th>
            <th style="width: 5%; border: 1px solid black;">KIA</th>
            <th style="width: 5%; border: 1px solid black;">Nama</th>
            <th style="width: 5%; border: 1px solid black;">JK</th>
            <th style="width: 5%; border: 1px solid black;">Umur</th>
            <th style="width: 5%; border: 1px solid black;">Status Gizi</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Pemberian Imunisasi Dasar</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Pengukuran Berat Badan</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Pengukuran Tinggi Badan</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Koseling Gizi Bagi Orang Tua</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Kunjungan Rumah</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Kepemilikan Akses Air Bersih</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Kepemilikan Jamban Sehat</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Akta Lahir</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Jaminan Kesehatan</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Pengasuhan Paud</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Jumlah Diterima Lengkap</th>
            <th style="width: 5%; border: 1px solid black; word-wrap: break-word;">Jumlah Seharusnya</th>
            <th style="width: 3%; border: 1px solid black; word-wrap: break-word;">%</th>    
        </tr>
    </thead>
';

$i = 1;
foreach ($cetakRekapStunting as $row) :
    $html .= '<tr align="center">';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $i . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['id_kia'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['nama'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['jenis_kelamin'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['umur'] . " " . "B" . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['status_gizi_imt_u'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['pemberian_imunisasi_dasar'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['pengukuran_berat_badan'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['pengukuran_tinggi_badan'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['konseling_gizi_bagi_ortu'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['kunjungan_rumah'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['kepemilikan_akses_air_bersih'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['kepemilikan_jamban_sehat'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['akta_lahir'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['jaminan_kesehatan'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['pengasuhan_paud'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['jumlah_diterima_lengkap'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['jumlah_seharusnya'] . '</td>';
    $html .= '<td  style="border: 1px solid black;" align="center">' . $row['presentase'] . '</td></tr>';
    $i++;
endforeach;

$html .= '

</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
