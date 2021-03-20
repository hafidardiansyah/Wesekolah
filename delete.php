<?php
require 'functions.php';

$id = $_GET['id'];

if(deleteStudent($id) > 0){
    header("Location: index.php");
}

echo "Gagal dihapus!";