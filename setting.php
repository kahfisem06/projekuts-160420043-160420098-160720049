<?php
session_start();

$Ya_alamat_wajib_diisi = "";
$Tidak_alamat_wajib_diisi = "";
if (isset($_COOKIE['input_alamat'])) {
    if ($_COOKIE['input_alamat'] == "Ya" || $_COOKIE['input_alamat'] == "") {
        $Ya_alamat_wajib_diisi = "checked";
        $Tidak_alamat_wajib_diisi = "";
    } else {
        $Ya_alamat_wajib_diisi = "";
        $Tidak_alamat_wajib_diisi = "checked";
    }
} else {
    $Ya_alamat_wajib_diisi = "checked";
    $Tidak_alamat_wajib_diisi = "";
}

$ipk_default = "";
if (isset($_COOKIE['ipk_default'])) {
    $ipk_default = $_COOKIE['ipk_default'];
} else {
    $ipk_default = "";
}

$ukuran_font = "";
if (isset($_COOKIE['ukuran_font'])) {
    $ukuran_font = $_COOKIE['ukuran_font'];
} else {
    $ukuran_font = "";
}

// TAMPILAN FONT BELUM
// normal bold italic oblique underline
$tampilan_font = "";
if (isset($_COOKIE['tampilan_font'])) {
    $tampilan_font = $_COOKIE['tampilan_font'];
}

$Ya_alamat_tampil = "";
$Tidak_alamat_tampil = "";
if (isset($_COOKIE['alamat_tampil'])) {
    if ($_COOKIE['alamat_tampil'] == "Ya" || $_COOKIE['alamat_tampil'] == "") {
        $Ya_alamat_tampil = "checked";
        $Tidak_alamat_tampil = "";
    } else {
        $Ya_alamat_tampil = "";
        $Tidak_alamat_tampil = "checked";
    }
} else {
    $Ya_alamat_tampil = "checked";
    $Tidak_alamat_tampil = "";
}

$Ya_ipk_tampil = "";
$Tidak_ipk_tampil = "";
if (isset($_COOKIE['ipk_tampil'])) {
    if ($_COOKIE['ipk_tampil'] == "Ya" || $_COOKIE['ipk_tampil'] == "") {
        $Ya_ipk_tampil = "checked";
        $Tidak_ipk_tampil = "";
    } else {
        $Ya_ipk_tampil = "";
        $Tidak_ipk_tampil = "checked";
    }
} else {
    $Ya_ipk_tampil = "checked";
    $Tidak_ipk_tampil = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            text-align: center;

        }

        #ipk_default,
        #ukuran_font,
        #tampilan_font {
            display: flex;
            flex-direction: column;
            margin: 1%;

        }
    </style>
    <title>Setting</title>
</head>

<body>

    <h1>Setting Input dan Display</h1>
    <form method="POST" action="">
        <h2>Input</h2>

        <label>Alamat Mahasiswa apakah wajib diisi:</label><br>
        <input type="radio" id="Ya_alamat_wajib_diisi" class="input_alamat" name="input_alamat" value="ya" <?php echo $Ya_alamat_wajib_diisi; ?> ><label for="Ya_alamat_wajib_diisi">Ya</label><br>
        <input type="radio" id="Tidak_alamat_wajib_diisi" class="input_alamat" name="input_alamat" value="tidak" <?php echo $Tidak_alamat_wajib_diisi; ?>><label for="Tidak_alamat_wajib_diisi">Tidak</label><br><br>

        <label>Nilai default IPK mahasiswa:</label><br>
        <input type="text" name="ipk_default" id="ipk_default" value="<?php echo $ipk_default; ?>"><br>

        <h2>Display</h2>

        <label>Ukuran font:</label><br>
        <input type="text" id="ukuran_font" name="ukuran_font" value="<?php echo $ukuran_font; ?>">

        <label>Tampilan font:</label><br>
        <select id="tampilan_font" name="tampilan_font">
            <option value="normal" <?php if ($tampilan_font == "" || $tampilan_font == "normal") { echo "selected"; } ?>>Normal</option>
            <option value="bold" <?php if ($tampilan_font == "bold") { echo "selected"; } ?>>Bold</option>
            <option value="italic" <?php if ($tampilan_font == "italic") { echo "selected"; } ?>>Italic</option>
            <option value="oblique" <?php if ($tampilan_font == "oblique") { echo "selected"; } ?>>Oblique</option>
            <option value="underline" <?php if ($tampilan_font == "underline") { echo "selected"; } ?>>Underline</option>
        </select><br>

        <label>Alamat Mahasiswa apakah akan ditampilkan:</label><br>
        <input type="radio" id="Ya_alamat_tampil" name="display_alamat" class="display_alamat" value="ya" <?php echo $Ya_alamat_tampil; ?>><label for="Ya_alamat_tampil">Ya</label><br>
        <input type="radio" id="Tidak_alamat_tampil" name="display_alamat" class="display_alamat" value="tidak" <?php echo $Tidak_alamat_tampil; ?>><label for="Tidak_alamat_tampil">Tidak</label><br><br>

        <label>IPK Mahasiswa apakah akan ditampilkan:</label><br>
        <input type="radio" id="Ya_ipk_tampil" name="display_ipk" class="display_ipk" value="ya" <?php echo $Ya_ipk_tampil; ?>><label for="Ya_ipk_tampil">Ya</label><br>
        <input type="radio" id="Tidak_ipk_tampil" name="display_ipk" class="display_ipk" value="tidak" <?php echo $Tidak_ipk_tampil; ?>><label for="Tidak_ipk_tampil">Tidak</label><br><br>
        <input type="submit" name="submit" value="Simpan"></input>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input_alamat = $_POST['input_alamat'];
        setcookie('input_alamat', $input_alamat);

        $ipk_default = ($_POST['ipk_default']);
        if ($ipk_default == "") {
            setcookie('ipk_default', 0);
        } else {
            setcookie('ipk_default', $ipk_default);
        }

        $ukuran_font = ($_POST['ukuran_font']);
        if ($ukuran_font == "") {
            setcookie('ukuran_font', 18);
        } else {
            setcookie('ukuran_font', $ukuran_font);
        }

        $tampilan_font = ($_POST['tampilan_font']);
        setcookie('tampilan_font', $tampilan_font);

        $alamat_tampil = ($_POST['display_alamat']);
        setcookie('alamat_tampil', $alamat_tampil);

        $ipk_tampil = ($_POST['display_ipk']);
        setcookie('ipk_tampil', $ipk_tampil);

        header('location:input.php');
    }
    ?>
</body>

</html>