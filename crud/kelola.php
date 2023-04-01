<!DOCTYPE html>
    <?php
    include 'koneksi.php';

    $id_siswa = "";
    $nisn = "";
    $nama_siswa = "";
    $jenis_kelamin = "";
    $alamat = "";
        
    if(isset($_GET['ubah'])){
        $id_siswa = $_GET['ubah'];

        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nisn = $result['nisn'];
        $nama_siswa = $result['nama_siswa'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];

    }

    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-5">
        <div class="container-fluid">
            <span class="navbar-text">
                <h5>CRUD-BS5</h5>
            </span>
        </div>
    </nav>
    <div class="container pb-3 bg-body border-top border-info border-4 rounded-3 shadow-lg">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo "$id_siswa";?>" name="id_siswa">
        <div class="row mt-3 mb-3">
            <div class="col">
                <label for="nisn" class="form-label">NISN</label>
                <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukan NISN" value = "<?php echo $nisn;?>">
            </div>
            <div class="col">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input required type="text"name="nama_siswa" class="form-control" id="nama" placeholder="Masukan Nama" value = "<?php echo $nama_siswa;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="gender"  class="form-label col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select required id="gender" name="jenis_kelamin" class="form-select">
                        <option selected class="d-none">Jenis Kelamin</option>
                        <option <?php if($jenis_kelamin == 'Laki-Laki'){ echo 'selected';}?> value = "Laki-Laki">Laki-Laki</option>
                        <option <?php if($jenis_kelamin == 'Perempuan'){ echo 'selected';}?> value = "Perempuan">Perempuan</option>
                      </select>
                </div>
        </div>
        <div class="row mb-3">
            <label for="foto" class="form-label col-sm-2">Foto Siswa</label>
            <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){ echo 'required';} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
            </div>
        </div>
        <div class="row mb-3">
            <label for="alamat" class="form-label col-sm-2">Alamat Lengkap</label>
            <div class="col-sm-10">
                <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat;?></textarea>
            </div>
        </div>

        <div class="row my-5 mt-4">
            <div class="col">
            <?php
                if(isset($_GET['ubah'])){
            ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                    Simpan perubahan
                </button>
            <?php
                } else{
            ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary">
                    Tambahkan
                </button>
            <?php
                }
            ?>
                <a href="index.php" type="button" class="btn btn-danger">Batal</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>