<?php

require 'functions.php';
require_once 'assets/dompdf/autoload.inc.php';

$no = 1;
$siswa = query("SELECT *, tb_siswa.id AS id_siswa FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id");

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = "
    <h1>Daftar Siswa</h1>
    <table border='1' cellspacing='0' cellpadding='10'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
";

foreach($siswa as $s) {
    $html .= "
        <tr>
            <td>". $no++ ."</td>
            <td>". $s['nama'] ."</td>
            <td>". $s['kelas'] ."</td>
        </tr>
    ";
}

$html .= "</table>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('daftar-siswa');