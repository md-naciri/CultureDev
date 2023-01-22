<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("location: index.php");
    die;
}
include "./classes/db.class.php";
$show = new Db();
$dataC = $show->select("category", "*", null);
$dataA = $show->select("article", "*", "idA = ".$_POST["idA"]);
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span><img src="assets/img/whiteblack.png" alt=""></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="category.php">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Statistics</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#articleModal">Article</a></li> -->
                </ul>
                <!-- <button class="btn bg-white me-3" type="button" data-bs-toggle="modal" data-bs-target="#articleModal">Add an article</button> -->
                <a href="inc/logout.inc.php" class="btn btn-dark" type="button">Log Out</a>
            </div>
        </div>
    </nav>





    <div style="background-color: white;" class="container col-md-6 mx-auto mt-5 rounded p-4">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit an article</h1>
        </div>
        <form action="inc/article.inc.php" method="post" enctype="multipart/form-data" class="p-4">
            <input type="hidden" name="idA" value="<?= $dataA[0]['idA'] ?>">
            <!-- title input -->
            <div class="form-outline mb-4">
                <input type="text" name="titledA" class="form-control" value="<?= $dataA[0]['title']; ?>" />
            </div>
            <!-- author input -->
            <input type="hidden" name="authorA" class="form-control" value="<?= $_SESSION["userid"] ?>" />
            <!-- category input -->
            <div class="form-outline mb-4">
                <select name="choice" class="form-select" aria-label="Default select example">
                    <?php foreach ($dataC as $nameC) { ?>
                        <option value="<?= $nameC["idC"] ?>" <?php echo $nameC["idC"] == $dataA[0]['category_id'] ? 'selected' : ''; ?>><?= $nameC["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- picture input -->
            <div class="form-outline mb-4">
                <input type="file" name="photoA" class="form-control" accept=".jpg,.png,.jpeg" />
            </div>

            <!-- article input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" name="textA" id="form4Example3" rows="9"><?= $dataA[0]['content']; ?></textarea>
            </div>
            <!-- Submit button -->

            <div class="modal-footer">
                <a href="dashboard.php" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" name="editA" class="btn btn-primary">Save Edit</button>
            </div>
        </form>
    </div>



    <!-- <div class="row row-sign row-focus">
                <div class="col-md-6 left-side"></div>
                <div class="col-md-6 right-side"></div>
            </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>