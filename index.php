<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?page=list-mhs">List Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=add-mhs">Tambah Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=list-motor">List Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=add-motor">Tambah Motor</a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <?php
                $halaman = "view/mahasiswa/index.php";
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "list-mhs":
                            $halaman = "view/mahasiswa/index.php";
                            break;
                        case "add-mhs":
                            $halaman = "view/mahasiswa/formTambah.php";
                            break;
                        case "list-motor":
                            $halaman = "view/motor/index.php";
                            break;
                        case "add-motor":
                            $halaman = "view/motor/formTambah.php";
                            break;
                    }
                }
                include $halaman;
                ?>
            </div>
        </div>
    </div>
</body>

</html>