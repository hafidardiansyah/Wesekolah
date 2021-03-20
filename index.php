<?php
require 'functions.php';

// JOIN tb_siswa dan tb_kelas
$siswa = query("SELECT *, tb_siswa.id AS id_siswa FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Daftar Siswa</h1>
    <a href="add.php" class="badge green">Tambah Siswa</a>
    <a href="pdf.php" class="badge grey">File PDF</a>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Pengaturan</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($siswa as $s) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $s['nama']; ?></td>
                <td><?= $s['kelas']; ?></td>
                <td>
                    <a href="update.php?id=<?= $s['id_siswa']; ?>" class="badge yellow">Edit</a>
                    <a href="delete.php?id=<?= $s['id_siswa']; ?>" class="badge red">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>