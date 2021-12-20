<?php
require 'functions.php';
$id = $_GET['id'];

if (hapusOut($id) > 0) {
    echo "<script>
        alert('Data telah dihapus');
        document.location.href = 'index.php#2';
        </script>";
} else {
    echo "<script>alert('Data gagal dihapus');
        </script>";
}
