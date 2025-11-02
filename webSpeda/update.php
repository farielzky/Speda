<?php 
include "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM mahasiswa WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Speda - Update Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid" style="padding-left: 50px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link active" style="font-weight:bold;" href="index.html">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAT4BdeCYQ5yZCLfiua53FH69Q-61Jt1ys3A&s" alt="spedo logo" width="30" height="25" class="me-1">
                                Speda
                            </a>            
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tambah_mahasiswa.php">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="col-10">
                <h2>Update Mahasiswa</h2> 
                <form action="logicUpdate.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="mb-3">
                        <label for="" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM">
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" <?= ($data['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''?>>
                            <label class="form-check-label" for="laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan"  <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''?>>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>               
            </div>        
        </div>

    </body>
</html>
