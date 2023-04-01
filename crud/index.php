<?php
    include 'koneksi.php';

    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);

    $no = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-text">
                <h5>CRUD-BS5</h5>
            </span>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-3">Data siswa</h1>
        <figure >
            <blockquote class="blockquote">
                <p>Data yang telah disimpan di Database </p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary ">Tambah Data</a>

        <div class="table-responsive  mt-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nisn</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td>
                            <?= ++$no ?>.
                        </td>
                        <td>
                        <?= $result['nisn'];?>
                        </td>
                        <td>
                        <?= $result['nama_siswa'];?>
                        </td>
                        <td>
                        <?= $result['jenis_kelamin'];?>
                        </td>
                        <td class="text-center">
                            <img src="img/<?= $result['foto_siswa'];?>" style="width: 150px;">
                        </td>
                        <td>
                        <?= $result['alamat'];?>
                        </td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-primary mx-1">
                                Edit
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" onclick="return confirm('apakah yakin')" class="btn btn-danger mx-1"  >
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
          </div>
    </div>
</body>
</html>