<?php

include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web CRUD Buku | Aghisna Aulia Rahma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="tampil.css">
</head>
<body>
    <div class="container" style="margin: top 20px;">
        <center><font size="6">Data Buku</font></center>
        <hr>
        <a href="tambah.php"><button class="btn btn-dark right">Tambah Data</button></a>
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr>
                        <th width="3%" class="id">ID</th>
                        <th width="10%">Judul</th>
                        <th width="10%">Pengarang</th>
                        <th width="10%">Penerbit</th>
                        <th width="10%">Gambar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC") or die(mysqli_error($koneksi));

                    if(mysqli_num_rows($sql) > 0) {
                        $no = 1;
                        
                        while($data = mysqli_fetch_assoc($sql)) {
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td class='juduul' style='color: rgb(0,0,255)';>".$data['judul']."</td>";
                            echo "<td>".$data['pengarang']."</td>";
                            echo "<td>".$data['penerbit']."</td>";
                            echo "<td><img src='upload/buku/".$data['gambar']."' width='100' height='100'></td>";

                            echo '<td>
                                    <a href="edit.php?id_buku='.$data['id_buku'].'" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="delete.php?id_buku='.$data['id_buku'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                                </td>
                            </tr>
                            ';
                            $no++;
                        }
                    }else {
                        echo '
                            <tr>
                                <td colspan="6">Tidak ada data.</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>