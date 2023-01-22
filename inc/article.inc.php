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
    $id = $_POST["deletedA"];
    $deleteArticle = new Db();
    $deleteArticle->delete("article", $id);
    header("location: ../dashboard.php");
}
if (isset($_POST["editC"])) {
    $id = $_POST["editedC"];
    $name = $_POST["namedC"];
    $updateCategory = new Db();
    $updateCategory->update("category", ['name' => $name], $id);
    header("location: ../dashboard.php");
}