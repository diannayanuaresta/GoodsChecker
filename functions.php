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
    $nama_barang = strtolower($data["nama_barang"]);
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = strtolower($data["keterangan"]);

    $query = "INSERT INTO barang_in
				VALUES
			('','$kode_barang','$nama_barang','$price','$quantity','$keterangan', '','')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahOut($data)
{
    global $conn;
    $id = $data["id_barang"];
    $kode_barang = $data["kode_barang"];
    $nama_barang = strtolower($data["nama_barang"]);
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = strtolower($data["keterangan"]);

    $dataIn = query("SELECT * FROM barang_in WHERE id=$id");
    foreach ($dataIn as $data) :
        $quantity_sisa = (int)$data['quantity'] - (int)$quantity;
    endforeach;
    if (updateQuantity($quantity_sisa, $id) > 0) {
        $query = "INSERT INTO barang_out
    VALUES('','$kode_barang','$nama_barang', $price, $quantity,'$keterangan', '','')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function hapusOut($id)
{
    global $conn;
    $idIn = 0;
    $quantity_update = 0;

    $dataOut = query("SELECT * FROM barang_out WHERE id= id");
    foreach ($dataOut as $data) :
        $nama = $data['nama_barang'];
        $quantity = (int)$data['quantity'];
    endforeach;
    $dataIn = query("SELECT * FROM barang_in WHERE nama_barang= '$nama'");
    foreach ($dataIn as $in) :
        $idIn = $in['id'];
        $quantity_update = $quantity + (int)$in['quantity'];
    endforeach;
    if (updateQuantity($quantity_update, $idIn) > 0) {
        $query = "DELETE FROM barang_out WHERE id=$id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function updateQuantity($data, $id)
{
    global $conn;
    if ($data > 0) {
        $query = "UPDATE barang_in SET quantity= $data WHERE id= $id";
    } else {
        $query = "DELETE FROM barang_in WHERE id= $id";
    }
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editIn($data)
{
    global $conn;
    $id = $data["id_barang"];
    $kode_barang = $data["kode_barang"];
    $nama_barang = strtolower($data["nama_barang"]);
    $price = $data["harga_barang"];
    $quantity = $data["jumlah_barang"];
    $keterangan = strtolower($data["keterangan"]);

    $query = "UPDATE barang_in SET 
    kode_barang= '$kode_barang',
    nama_barang= '$nama_barang',
    price = $price,
    quantity = $quantity,
    keterangan = '$keterangan' WHERE id= $id";
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
