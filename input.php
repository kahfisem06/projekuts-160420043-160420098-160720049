<?php
session_start();
$input_alamat = $_COOKIE['input_alamat'];
$ipk_default = $_COOKIE['ipk_default'];

$arr_cookie = array(
  'input_alamat' => $input_alamat,
  'default_ipk' => $ipk_default,
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
  <link rel="stylesheet" href="input_style.css">
  <title>Input</title>
</head>
<body>
  <?php
    // SAAT TOMBOL SIMPAN DI KLIK AKAN BEKERJA
    if (isset($_POST["hapus"])) {
      session_destroy();
      echo '<script type="text/javascript">
        alert("DATA TELAH DIHAPUS!!!");
        location="input.php";</script>';
    }
    if (isset($_POST["submit"])) {
      
      $nrp = $_POST["nrp"];
      $nama = $_POST["nama"];
      $alamat = $_POST["alamat"];
      $ipk = $_POST["ipk"];

      if ($ipk == "") {
        $ipk = $ipk_default;
      }

      if (!isset($_SESSION['mahasiswa'])) {
        $_SESSION['mahasiswa'] = array();
      }

      $newArrayMahasiswa = array(
        'nrp' => $nrp,
        'nama' => $nama,
        'alamat' => $alamat,
        'ipk' => $ipk
      );
      array_push($_SESSION['mahasiswa'], $newArrayMahasiswa);
      header("location: display.php");
    }
  ?>

  <div class="card">
    <form method="POST" action="">
      <div class="container">
        <label>NRP</label>
        <input type="text" id="nrp" name="nrp" pattern="[a-zA-Z]{1}[0-9]*||[0-9]*" placeholder="Masukkan NRP" required>

        <label>Nama</label>
        <input type="text" id="nama" name="nama" pattern="[a-z A-Z]*||[A-Z]*||[a-z]*" placeholder="Masukkan Nama" required>

        <label>Alamat</label>
        <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat" <?php if ($input_alamat == "ya") {echo "required";} ?>></textarea>

        <label>IPK</label>
        <input type="number" name="ipk" id="ipk" placeholder="IPK" min="0" max="4" step="0.01">
        <br>
        <input type="submit" id="btn_smpn" name="submit" value="SIMPAN">
        <input type="submit" id="btn_hps" name="hapus" value="HAPUS SELURUH DATA">
      </div>
    </form>
  </div>
  
</body>

</html>