<?php
// Set header type konten.
require 'admin/fungsi.php';
header("Content-Type: application/json; charset=UTF-8");


// Deklarasi variable keyword buah.
$buah = $_GET["query"];

/*// Query ke database.
$query  = $koneksi->query("SELECT * FROM barang WHERE N_barang LIKE '%$buah%' ORDER BY N_barang DESC");

// Fetch hasil query.
$result = $query->fetch_All(MYSQLI_ASSOC);*/
$result=lihat("SELECT * FROM barang WHERE N_barang LIKE '%$buah%' ORDER BY N_barang DESC");

// Cek apakah ada yang cocok atau tidak.
if ($result !=null) {
    foreach($result as $data) {
        $output['suggestions'][] = [
            'value' => $data['N_barang'],
            'barang'  => $data['N_barang']
        ];

    }
    // Encode ke JSON.
    echo json_encode($output);

// Jika tidak ada yang cocok.
} else {

    $output['suggestions'][] = [
        'value' => "Tidak Ditemukan",
        'barang'  => ""
    ];

    // Encode ke JSON.
    echo json_encode($output);
}
