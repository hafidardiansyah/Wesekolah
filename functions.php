<?php

// fungsi koneksi 
$CONN = mysqli_connect("localhost", "root", "", "db_sekolah");

function query($query)
{
    global $CONN;

    $result = mysqli_query($CONN, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function addStudent($data)
{
    global $CONN;

    $nama = $data['nama'];
    $kelas = $data['kelas'];

    $query = "INSERT INTO tb_siswa VALUES ('', '$nama', '$kelas')";

    mysqli_query($CONN, $query);

    return mysqli_affected_rows($CONN);
}

function updateStudent($data)
{
    global $CONN;

    $id = $data['id'];
    $nama = $data['nama'];
    $kelas = $data['kelas'];

    $query = "UPDATE tb_siswa SET
        nama = '$nama', 
        id_kelas = '$kelas'
        WHERE id = $id";

    mysqli_query($CONN, $query);

    return mysqli_affected_rows($CONN);
}

function deleteStudent($id)
{
    global $CONN;

    mysqli_query($CONN, "DELETE FROM tb_siswa WHERE id = $id");

    return mysqli_affected_rows($CONN);
}
