<?php
require 'core.php';
$users = read();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Data Programmers dan Skills | Arkademy</title>
    <style>
        html,
        body {
            height: 100%;
        }

        #page-content {
            flex: 1 0 auto;
        }

        #sticky-footer {
            flex-shrink: none;
        }

        /* Other Classes for Page Styling */

        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
    </style>
</head>

<body class="d-flex flex-column">
    <div id="page-content">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h1 class="font-weight-light mt-4 text-white">Data Programmers</h1>
                    <p class="lead text-white">Kelola data Programmer dan Skill mereka</p>
                </div>

            </div>

            <?php if(isset($_SESSION['success'])) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        Data Berhasil <?= $_SESSION['success'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['success']) ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <form action="core.php" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="nama programmer"
                                        name="nama_user">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="tambah_user"
                                            id="button-addon2">Tambah
                                            Programmer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($users as $k ) : ?>
            <div class="row justify-content-center mt-4" id="baris<?= $k['id'] ?>">
                <div class="col-md-9">
                    <div class="card-group">
                        <div class="card shadow">
                            <div class="card-header"><?= $k['name'] ?></div>
                            <div class="card-body">
                                
                                <?php foreach($k['skills'] as $s) : ?>
                                    <a href="core.php?id=<?= $s['id'] ?>&delete_skill=<?= $k['id'] ?>" class="btn btn-dark btn-sm" name="delete_skill" onclick="return confirm('Yakin ?')"><?= $s['name'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="core.php" method="post">
                                    <div class="input-group mt-2 mb-2">
                                        <input type="hidden" value="<?= $k['id'] ?>" name="user_id">
                                        <input type="text" class="form-control" placeholder="Skills"
                                            aria-describedby="btnTambahSkill" name="nama_skill">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" id="btnTambahSkill"
                                                name="tambah_skill">Tambah
                                                Skill</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-right my-0 py-2">
                                <form action="core.php?id=<?= $k['id'] ?>" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm" name="delete_user" onclick="return confirm('Yakin ?')">delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>



    <footer id="sticky-footer" class="py-2 bg-dark text-white-50 mt-5">
        <div class="container text-center">
            <small>Copyright &copy; <a href="https://github.com/reserviert97" class="text-white">Nurlatif Ardhi
                    Pratama</a></small>
        </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>