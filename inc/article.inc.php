<?php
include "../classes/db.class.php";

if (isset($_POST["addA"])) {
    $title = $_POST["titledA"];
    $pic = $_FILES['photoA']['name'];
    $target = "../assets/img/uploaded_img/" . $pic;
    $content = $_POST["textA"];
    $catID = $_POST["choice"];
    $autID = $_POST["authorA"];
    $addArticle = new Db();
    $addArticle->insert("article", ['title'=>$title, 'pic'=>$pic, 'content'=>$content, 'category_id'=> $catID, 'author_id'=>$autID]);
    move_uploaded_file($_FILES['photoA']['tmp_name'],$target);
    header("location: ../dashboard.php");
}
if (isset($_POST["deleteA"])) {
    $id = $_POST["idA"];
    $deleteArticle = new Db();
    $deleteArticle->delete("article", "idA=$id", null);
    header("location: ../dashboard.php");
}
if (isset($_POST["editA"])) {
    $id = $_POST["idA"];
    $title = $_POST["titledA"];
    $pic = $_FILES['photoA']['name'];
    $target = "../assets/img/uploaded_img/" . $pic;
    $content = $_POST["textA"];
    $catID = $_POST["choice"];
    $autID = $_POST["authorA"];
    $updateArticle = new Db();
    if ($pic == ""){
        $updateArticle->update("article", ['title'=>$title, 'content'=>$content, 'category_id'=> $catID, 'author_id'=>$autID], "idA=$id");
    } else {
        $updateArticle->update("article", ['title'=>$title, 'pic'=>$pic, 'content'=>$content, 'category_id'=> $catID, 'author_id'=>$autID], "idA=$id");
        move_uploaded_file($_FILES['photoA']['tmp_name'],$target);
    }
    header("location: ../dashboard.php");
}