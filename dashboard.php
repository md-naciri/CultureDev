<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("location: index.php");
    die;
}
include "./classes/db.class.php";
$show = new Db();
$dataC = $show->select("category", "*", null);
$dataA = $show->select("article, category, user", "*", "author_id = user.idD and category_id = category.idC");
$countA = $show->count("article", null);
$countC = $show->count("category", null);
$countD = $show->count("user", null);
$countAD = $show->count("article", "author_id");

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
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script defer src="https://parsleyjs.org/dist/parsley.min.js"></script>
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
                    <li class="nav-item"><a class="nav-link" href="#">Article</a></li>
                </ul>
                <button onclick="hideDynamicForm()" class="btn bg-white me-3" type="button" data-bs-toggle="modal" data-bs-target="#articleModal">Add an article</button>
                <a href="inc/logout.inc.php" class="btn btn-dark" type="button">Log Out</a>
            </div>
        </div>
    </nav>

    <div class="mt-5 alert alert-success alert-dismissible fade show col-md-5 text-center mx-auto">
        <strong>Hello! </strong>
        <?php
        echo $_SESSION["username"];
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
    </div>

    <div class="row h-auto mx-auto d-flex col-md-8 my-2 mt-5">
        <div class="col-md-3 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3"><?= $countA ?></h3>
                    <p>Articles</p>
                </div>
                <!-- <i class="fa fa-chart-line fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
        <div class="col-md-3 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3"><?= $countC ?></h3>
                    <p>Categories</p>
                </div>
                <!-- <i class="fa fa-hand-holding fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
        <div class="col-md-3 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3"><?= $countD ?></h3>
                    <p>Developers</p>
                </div>
                <!-- <i class="fa fa-gift fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
        <div class="col-md-3 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3"><?= $countAD ?>/<?= $countD ?></h3>
                    <p class="fs-6">Authors</p>
                </div>
                <!-- <i class="fa fa-hand-holding fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
    </div>

    <div class="container shadow p-3 my-5 bg-white rounded col-md-8">
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
        <table id="dtables" class="table">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Article</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataA as $article) { ?>
                    <tr>
                        <form action="editArticle.php" method="post">
                            <td><img style="max-width: 150px;" src="assets/img/uploaded_img/<?= $article["pic"] ?>" class="img-thumbnail" alt="Article image"></td>
                            <td><?= $article["full_name"] ?></td>
                            <td><?= $article["name"] ?></td>
                            <td><?= $article["title"] ?></td>
                            <td><?= $article["content"] ?></td>
                            <td>
                                <input type="hidden" name="idA" value="<?= $article["idA"] ?>">
                                <button name="editA" type="submit" class="btn btn-sm btn-secondary rounded mt-2 mb-2">Update</button>
                        </form>
                        <form action="inc/article.inc.php" method="post">
                            <input type="hidden" name="idA" value="<?= $article["idA"] ?>">
                            <button name="deleteA" type="submit" class="btn btn-sm btn-danger mb-2 mt-2 rounded">Delete</button>
                        </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- </div> -->

    <!-- Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Write an article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="inc/article.inc.php" method="post" enctype="multipart/form-data" class="to-validate p-4" data-parsley-validate>
                    <!-- title input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="titledA[]" class="form-control" placeholder="Title" data-parsley-trigger="keyup" data-parsley-required data-parsley-minlength="3" data-parsley-maxlength="50" />
                    </div>
                    <!-- author input -->
                    <input type="hidden" name="authorA[]" class="form-control" value="<?= $_SESSION["userid"] ?>" />
                    <!-- category input -->
                    <div class="form-outline mb-4">
                        <select name="choice[]" class="form-select" aria-label="Default select example">
                            <?php foreach ($dataC as $nameC) { ?>
                                <option value="<?= $nameC["idC"] ?>"><?= $nameC["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- picture input -->
                    <div class="form-outline mb-4">
                        <input type="file" name="photoA[]" class="form-control" data-parsley-required accept=".jpg,.png,.jpeg" />
                    </div>
                    <!-- Submit button -->
                    <!-- article input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" name="textA[]" id="form4Example3" rows="9" placeholder="Write your article here." data-parsley-trigger="keyup" data-parsley-required></textarea>
                    </div>

                    <!-- Add form -->
                    <div id="dynamicForm">

                    </div>
                    <!-- Submit button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onclick="dynamicForm(`<?php foreach ($dataC as $nameC) { ?>
                        <option value='<?= $nameC['idC'] ?>'><?= $nameC['name'] ?></option>
                        <?php } ?>`, <?= $_SESSION['userid'] ?>)" type="button" class="btn btn-warning"> + </button>
                        <button type="submit" name="addA" class="btn btn-primary">Add an article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>