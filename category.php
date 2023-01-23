<?php
session_start();
include "./classes/db.class.php";
$showCategory = new Db();
$data = $showCategory->select("category", "*", null);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="shortcut icon" href="assets/img/browser.png" type="image/x-icon">
    <title>CultureDev</title>
</head>

<body style="background-color: #eee;">
    <nav class="navbar navbar-dark navbar-expand-md sticky-top py-2">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="dashboard.php"><span><img src="assets/img/whiteblack.png" alt=""></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Statistics</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#articleModal">Article</a></li> -->
                </ul>
                <!-- <button class="btn bg-white me-3" type="button" data-bs-toggle="modal" data-bs-target="#articleModal">Add an article</button> -->
                <a href="inc/logout.inc.php" class="btn btn-dark" type="button">Log Out</a>
            </div>
        </div>
    </nav>



    <div style="background-color: white;" class="container col-md-6 mx-auto mt-5 rounded p-4">
        <?php if (isset($_SESSION["error"])) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Wait!</strong>
                <?php
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
            </div>
        <?php endif ?>
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add a category</h1>
        </div>
        <form class="p-4" action="inc/category.inc.php" method="post">
            <!-- name input -->
            <div class="form-outline mb-4 d-flex">
                <input type="text" id="form4Example1" name="addedC" class="form-control" placeholder="Add a category" required />
                <button type="submit" name="addC" class="btn btn-sm btn-primary rounded m-1"> Add </button>
            </div>
        </form>
        <!-- categories list -->
        <div class="form-outline mb-4">
            <table id="dtables" class="table ">
                <thead>
                    <tr>
                        <th>Category list</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $nameC) { ?>
                        <tr>
                            <td>
                                <?= $nameC["name"] ?></td>
                            <form action="inc/category.inc.php" method="post">
                                <td>
                                    <input type="hidden" name="deletedC" value="<?= $nameC["idC"] ?>">
                                    <button onclick="getCdata(<?= $nameC['idC'] ?>,`<?= $nameC['name'] ?>`)" type="button" class="btn btn-sm btn-secondary rounded mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#cModal">Update</button>
                                    <button name="deleteC" type="submit" class="btn btn-sm btn-danger mb-2 mt-2 rounded">Delete</button>
                                </td>
                            </form>
                        </tr>
                    <?php } ?>
                <tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <form action="inc/category.inc.php" method="post">
        <div class="modal fade" id="cModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit the category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editedC" name="editedC">
                        <input type="text" id="nameC" name="namedC" class="form-control" placeholder="Enter new category name" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editC" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- <div class="row row-sign row-focus">
                <div class="col-md-6 left-side"></div>
                <div class="col-md-6 right-side"></div>
            </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

    <script>
        function affiche($id) {
            document.getElementById('idcati').value = document.getElementById("" + id).getAttribute("");
            document.getElementById('nameC').value = document.getElementById("" + id).getAttribute("");
        }
    </script>

</body>

</html>