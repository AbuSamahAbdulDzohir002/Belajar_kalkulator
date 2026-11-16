<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kalkulator</title>
</head>
<body>
    <?php

// Siapkan variabel awal //
$angka1 = "";
$angka2 = "";
$operasi = "+";
$hasil = "";


// Jalankan hanya kalau tombol " Hitung " ditekan
if (isset ($_POST['hitung'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operasi = $_POST['operasi'];

    // Hitung sesuai jumlah operasi yang dipilih //
    switch ($operasi) {
        case "+":
        $hasil = $angka1 + $angka2;
        break;
        case "-";
        $hasil = $angka1 - $angka2;
        break;
        case "*";
        $hasil = $angka1 * $angka2;
        break;
        case "/";
        if ($angka2 == 0){
            $hasil = "tidak bisa dibagi 0";
        } else {
            $hasil = $angka1 / $angka2;
        }
        break;
    }
}

?>
<div class="kotak">
    <h1>Kalkulator Sederhana</h1>

    <form method="post">
        <input type="number" step="any" name="angka1" placeholder="Angka pertama"
            value="<?= htmlspecialchars($angka1) ?>" required>

        <select name="operasi">
            <option value="+" <?= $operasi == "+" ? "selected" : "" ?>>+ Tambah</option>
            <option value="-" <?= $operasi == "-" ? "selected" : "" ?>>- Kurang</option>
            <option value="*" <?= $operasi == "*" ? "selected" : "" ?>>* Kali</option>
            <option value="/" <?= $operasi == "/" ? "selected" : "" ?>>/ Bagi</option>
        </select>

        <input type="number" step="any" name="angka2" placeholder="Angka kedua"
            value="<?= htmlspecialchars($angka2) ?>" required>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php if ($hasil !== ""): ?>
        <div class="hasil">
            Hasil: <strong><?= $hasil ?></strong>
        </div>
    <?php endif; ?> 
</body>
</html>