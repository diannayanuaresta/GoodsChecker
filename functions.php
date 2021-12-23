<?php
$conn = mysqli_connect("localhost", "root", "", "goodschecker");

//fungsi query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahIn($data)
{
    global $conn;
    $kode_barang = $data["kode_barang"];
    $nama_barang = $data["nama_barang"];
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = $data["keterangan"];

    $query = "INSERT INTO barang_in
				VALUES
			('','$kode_barang','$nama_barang', $price, $quantity, '$keterangan', now(), now())";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahOut($data)
{
    global $conn;
    $id = $data["id_barang"];
    $kode_barang = $data["kode_barang"];
    $nama_barang = $data["nama_barang"];
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = $data["keterangan"];


    $query = "INSERT INTO barang_out
        VALUES('','$kode_barang','$nama_barang', $price, $quantity,'$keterangan', now())";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusOut($id)
{
    global $conn;
    $query = "DELETE FROM barang_out WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editIn($data)
{
    global $conn;
    $id = $data["id_barang"];
    $kode_barang = $data["kode_barang"];
    $nama_barang = $data["nama_barang"];
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = $data["keterangan"];

    $query = "UPDATE barang_in SET 
    kode_barang= '$kode_barang',
    nama_barang= '$nama_barang',
    price = $price,
    quantity = $quantity,
    keterangan = '$keterangan',
    updated_at = now() WHERE id= $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusIn($id)
{
    global $conn;
    $query = "DELETE FROM barang_in WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
