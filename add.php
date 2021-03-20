<?php
require 'functions.php';
$kelas = query("SELECT * FROM tb_kelas");

if (isset($_POST['tambah'])) {
    if (addStudent($_POST) > 0) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Tambah Data</h1>
    <a href="index.php" class="badge grey">Kembali</a>
    <br><br>

    <form action="" method="POST">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>
                    <input type="text" name="nama" id="nama" required placeholder="Masukkan nama siswa!" class="input-form" autofocus autocomplete="off">
                </td>
            </tr>
            <tr>
                <td><label for="kelas">Kelas</label></td>
                <td>
                    <select name="kelas" id="kelas" class="input-form">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k['id'] ?>"><?= $k['kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="2"><button type="submit" name="tambah" class="button green">Tambah Data</button></td>
            </tr>
        </table>
    </form>
</body>

</html>