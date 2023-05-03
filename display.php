<?php
session_start();
// PROCESS AWAL DIBUKA
$ukuran_font = $_COOKIE['ukuran_font'];
$tampilan_font = $_COOKIE['tampilan_font'];
$alamat_tampil = $_COOKIE['alamat_tampil'];
$ipk_tampil = $_COOKIE['ipk_tampil'];

$arr_cookie = array(
    'input_alamat' => $_COOKIE['input_alamat'],
    'default_ipk' => $_COOKIE['ipk_default'],
    'ukuran_font' => $_COOKIE['ukuran_font'],
    'tampilan_font' => $_COOKIE['tampilan_font'],
    'alamat_tampil' => $_COOKIE['alamat_tampil'],
    'pk_tampil' => $_COOKIE['ipk_tampil']
);

foreach ($arr_cookie as $setting) {
    if (isset($setting) == "") {
        echo '<script type="text/javascript">
      alert("HARAP MENGISI SEMUA SETTING (TERUTAMA YANG PILIHAN) !!!");
      location="setting.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="setting.php">
    <link rel="stylesheet" href="input.php">
    <link rel="stylesheet" href="display_style.css">
    <style>
        div {
            font-style: <?php echo $tampilan_font; ?>;
            font-size: <?php echo $ukuran_font; ?>;
            font-weight: <?php echo $tampilan_font; ?>;
            text-decoration: <?php echo $tampilan_font; ?>;
        }
    </style>
    <title>Document</title>
</head>

<body>
    
        <?php
        if (isset($_SESSION['mahasiswa'])) {
            $index = 1;
            echo '<div class="card">';
            foreach ($_SESSION['mahasiswa'] as $mahasiswa) {
                echo $index . ".<br>";
                echo "NRP: " . $mahasiswa['nrp'] . "<br>";
                echo "Nama: " . strtoupper($mahasiswa['nama']) . "<br>";

                if ($alamat_tampil == "ya") {
                    echo "Alamat: " . $mahasiswa['alamat'] . "<br>";
                }

                if ($ipk_tampil == "ya") {
                    echo "IPK: " . $mahasiswa['ipk'] . "<br>";
                }
                $index = $index + 1;
                echo "<br>";
            }
            echo "</div>";
        }
        else {
            echo "TIDAK ADA DATA SAMA SEKALI";
        }
        ?>
    
</body>

</html>