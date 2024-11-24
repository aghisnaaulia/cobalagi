<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web CRUD Buku | Aghisna Aulia Rahma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><font size="6">Tambah Data</font></center>
    <hr>
    <?php
    if(isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $gambar = $_POST['gambar'];

        $cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul='$judul'") or die(mysqli_error);

        if (mysqli_num_rows($cek) >= 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO buku(judul, pengarang, penerbit, gambar) VALUES('$judul', '$pengarang', '$penerbit', '$gambar')");

            if($sql) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php";</script>';
            }else {
                echo '<div class="alert alert-warning">Gagal, Judul sudah terdaftar.</div>';
            }
        }
    }
        ?>

        <form action="tambah.php" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="judul" class="form-control" size="4" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pengarang</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="pengarang" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="penerbit" class="form-control" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label><br>
                <label class="col-form-label col-md-3 col-sm-3 label-align">Format .png .jpg .jpeg .tiff .gif .tif</label>
                <div class="col-md-6 col-sm-6">Pilih File :
                    <div class="custom-file">
                        <input class="custom-file-input" type="file" name="gambar"
                        onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.tiff,.jpg,.jpeg,.tif">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                </div>
            </div>

            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="tampil.php" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>