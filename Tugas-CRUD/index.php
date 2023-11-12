<?php
include "connection.php";
require "functions.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Daftar Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .mx-auto {width:800px}
        .card {margin-top: 10px;}
    </style>
</head>
<body>
    <h1 align="center">COURSE ONLINE</h1>
    <div class="mx-auto">
        <!-- memasukkan data -->
        <div class="card">
            <div class="card-header" align="center">
                Tambah / Edit Data
            </div>
            <div class="card-body">
                <?php
                if($error){
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                    <?php
                        header("refresh:2;url=index.php");
                    }
                    ?>
                <?php
                if($success){
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success ?>
                        </div>
                    <?php
                        header("refresh:2;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="durasi" class="col-sm-2 col-form-label">Durasi (hari)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="durasi" name="durasi" value="<?php echo $durasi ?>">
                        </div>
                    </div>
                    <div class="col-12" align="center">
                        <input type="submit" name="simpan" value="Tambah / Simpan Data" class="btn btn-success"/>
                    </div>
                </form>
            </div>
        </div>

        <!-- mengeluarkan data -->
        <div class="card">
            <div class="card-header text-black bg-warning" align="center">
                Daftar Course Online
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Durasi (hari)</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * FROM courseonline order by id desc";
                            $q2   = mysqli_query($connection,$sql2);
                            $sort = 1;
                            while($r2 = mysqli_fetch_array($q2)){
                                $id         = $r2['id'];
                                $nama       = $r2['Nama'];
                                $deskripsi  = $r2['Deskripsi'];
                                $harga      = $r2['Harga'];
                                $durasi     = $r2['Durasi'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $sort++ ?></th>
                                    <td scope="row"><?php echo $nama ?></td>
                                    <td scope="row"><?php echo $deskripsi ?></td>
                                    <td scope="row"><?php echo $harga ?></td>
                                    <td scope="row"><?php echo $durasi ?></td>
                                    <td scope="row">
                                        <a href="index.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-primary">Edit</button></a>
                                        <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Anda yakin mau menghapus data ini?');"><button type="button" class="btn btn-danger">Hapus</button></a>
                                        
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>