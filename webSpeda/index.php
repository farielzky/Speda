<?php
  include "koneksi.php";

  if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' OR nim LIKE '%$search%'";
  } else {
    $sql = "SELECT * FROM mahasiswa";
  }

  $result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Speda - Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid" style="padding-left: 50px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight:bold;" href="index.php">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAT4BdeCYQ5yZCLfiua53FH69Q-61Jt1ys3A&s" alt="spedo logo" width="30" height="25" class="me-1">
                            Spedo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight:bold;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tambah_mahasiswa.php">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <h2>Daftar Mahasiswa</h2>    
                    <div class="search-container">
                        <form method="GET" action="index.php">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="search" placeholder="Cari Mahasiswa" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped-columns table-hover">
                            <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <?php if(mysqli_num_rows($result) > 0) : ?>
                                
                                <?php $i = 1; ?>
                                <?php while($data = mysqli_fetch_assoc($result)) : ?>    
                                    <tbody>
                                        <tr>
                                            <td><?=$i++ ?></td>
                                            <td><?= $data['nim'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td class="text-center">
                                                <a href="update.php?id=<?= $data['id'] ?>" class="btn btn-primary me-1">Update</a>
                                                <a 
                                                    href="#"
                                                    class="btn btn-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#delete_modal_<?= $data['id'] ?>">
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                    <div id="delete_modal_<?= $data['id'] ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin menghapus mahasiswa <strong><?= $data['nama'] ?></strong>?</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center" >Tidak ada data</td>
                                </tr>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.querySelector('input[name="search"]').addEventListener('input', function() {
                if (this.value === '') {
                    this.form.submit();
                }
            });
        </script>
    </body>
</html>