<?php
include "../classes/db.class.php";

if (isset($_POST["addA"])) {
    for ($i = 0; $i < count($_POST['titledA']); $i++) {
        $title = htmlspecialchars(strip_tags($_POST["titledA"][$i]));
        $pic = htmlspecialchars(strip_tags($_FILES['photoA']['name'][$i]));
        $target = "../assets/img/uploaded_img/" . $pic;
        $content = $_POST["textA"][$i];
        $catID = $_POST["choice"][$i];
        $autID = $_POST["authorA"][$i];
        $addArticle = new Db();
        if (empty($title) || empty($pic) || empty($content) || empty($catID)) {
            session_start();
            $_SESSION["error"] = "You should fill every input";
            header("location: ../dashboard.php");
        } else {
            $addArticle->insert("article", ['title' => $title, 'pic' => $pic, 'content' => $content, 'category_id' => $catID, 'author_id' => $autID]);
            move_uploaded_file($_FILES['photoA']['tmp_name'][$i], $target);
            header("location: ../dashboard.php");
        }
    }
}
if (isset($_POST["deleteA"])) {
    $id = $_POST["idA"];
    $deleteArticle = new Db();
    $deleteArticle->delete("article", "idA=$id", null);
    header("location: ../dashboard.php");
}
if (isset($_POST["editA"])) {
    $id = $_POST["idA"];
    $title = htmlspecialchars(strip_tags($_POST["titledA"]));
    $pic = htmlspecialchars(strip_tags($_FILES['photoA']['name']));
    $target = "../assets/img/uploaded_img/" . $pic;
    $content = $_POST["textA"];
    $catID = $_POST["choice"];
    $autID = $_POST["authorA"];
    $updateArticle = new Db();
    if (empty($title) || empty($content) || empty($catID)) {
        session_start();
        $_SESSION["error"] = "You should fill every input";
        header("location: ../editArticle.php");
    } else {
        if ($pic == "") {
            $updateArticle->update("article", ['title' => $title, 'content' => $content, 'category_id' => $catID, 'author_id' => $autID], "idA=$id");
        } else {
            $updateArticle->update("article", ['title' => $title, 'pic' => $pic, 'content' => $content, 'category_id' => $catID, 'author_id' => $autID], "idA=$id");
            move_uploaded_file($_FILES['photoA']['tmp_name'], $target);
        }
        header("location: ../dashboard.php");
    }
}
