<?php

// ===============================
//   Fungsi / Prosedur hitungDiskon
// ===============================

function hitungDiskon($totalBelanja) {
    $diskon = 0;

    // Kondisi 1: total belanja ≥ 100.000 → diskon 10%
    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;

    // Kondisi 2: 50.000 ≤ total belanja < 100.000 → diskon 5%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;

    // Kondisi 3: total belanja < 50.000 → diskon 0
    } else {
        $diskon = 0;
    }

    return $diskon; // Mengembalikan nominal diskon dalam rupiah
}


// ===============================
//   Eksekusi Program
// ===============================

// Contoh total belanja
$totalBelanja = 120000;

// Memanggil fungsi hitungDiskon()
$diskon = hitungDiskon($totalBelanja);

// Menghitung total bayar
$totalBayar = $totalBelanja - $diskon;


// ===============================
//   Output ke layar
// ===============================

echo "Total Belanja: Rp. " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon: Rp. " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Total yang Harus Dibayar: Rp. " . number_format($totalBayar, 0, ',', '.') . "<br>";

?>
