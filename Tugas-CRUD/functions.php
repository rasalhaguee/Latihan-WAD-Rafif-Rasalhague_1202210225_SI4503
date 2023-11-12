
<?php

$nama       ="";
$deskripsi  ="";
$harga      ="";
$durasi     ="";
$success    ="";
$error      ="";
$id         ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from courseonline where id = '$id'";
    $q1 = mysqli_query($connection,$sql1);
    if($q1){
        $success = "Data Berhasil Dihapus!";
    }else{
        $error = "Data Gagal untuk Dihapus!";
    }
}

if($op == '$edit'){
    $id             = $_GET['id'];
    $sql1           = "SELECT * FROM courseonline where id = '$id'";
    $q1             = mysqli_query($connection,$sql1);
    $r1             = mysqli_fetch_array($q1);
    $nama           = $r1['nama'];
    $deskripsi      = $r1['deskripsi'];
    $harga          = $r1['harga'];
    $durasi         = $r1['durasi'];

    if($nama == ''){
        $error = "Data tidak ditemukan";
    }
}

//create data
if(isset($_POST['simpan'])){ 
    $nama       = $_POST['nama'];
    $deskripsi  = $_POST['deskripsi'];
    $harga      = $_POST['harga'];
    $durasi     = $_POST['durasi'];

    if($nama && $deskripsi && $harga && $durasi){
        //update data
        if($op == 'edit'){ 
            $sql1       = "update courseonline set nama = '$nama',deskripsi='$deskripsi',harga='$harga',durasi='$durasi' where id = '$id'";
            $q1         = mysqli_query($connection,$sql1);
            if($q1){
                $success    = "Data Berhasil Diupdate!";
            }else{
                $error      = "Data Gagal Diupdate!";
            }
        }
        //tambah data
        else{ 
            $sql1 = "insert into courseonline(nama,deskripsi,harga,durasi) values ('$nama','$deskripsi','$harga','$durasi')";
            $q1   = mysqli_query($connection,$sql1);
            if($q1){
                $success = "Data Berhasil Ditambah!";
            }else{
                $error   = "Data Gagal Ditambahkan!";
            }
        }
        
    }else{
        $error = "Silahkan Lengkapi Data!";
    }
}
?>

