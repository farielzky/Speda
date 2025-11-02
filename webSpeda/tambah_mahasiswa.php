<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Speda - Tambah Mahasiswa</title>
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
                        <a class="nav-link active" href="tambah_mahasiswa.php" style="font-weight:bold;">Tambah Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="col-10">
                <h2>Tambah Mahasiswa</h2> 
                <form action="create.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" required>
                            <label class="form-check-label" for="laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" required>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                </form>               
            </div>        
        </div>

    </body>
</html>
