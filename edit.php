<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web CRUD Buku | Aghisna Aulia Rahma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin: top 20px;">
        <h2>Edit Data</h2>

        <hr>

        <?php
        if(isset($_GET['id_buku'])) {
            $id_buku = $_GET['id_buku'];

            $select = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($select) == 0) {
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            }else {
                $data = mysqli_fetch_assoc($select);
            }
        }

        ?>

        <?php
        if(isset($_POST['submit'])) {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $penerbit = $_POST['penerbit'];

            $sql = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit' WHERE id_buku='$id_buku'");
            
            if($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="tampil.php";</script>';
            }else {
                echo '<div class="alert alert-warning">Gagal melakukan edit data.</div>';
            }
        }
        ?>

        <form action="edit.php?id_buku=<?php echo $id_buku; ?>" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="judul" class="form-control" size="4" value="<?php echo $data['judul']; ?>" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pengarang</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="pengarang" class="form-control" value="<?php echo $data['pengarang']; ?>" required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>" required>
                </div>
            </div>

            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="tampil.php" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>