<?php
include "../classes/db.class.php";

if (isset($_POST["addC"])) {
    $name = htmlspecialchars(strip_tags($_POST["addedC"]));
    $addCategory = new Db();
    $addCategory->insert("category", ['name' => $name]);
    header("location: ../category.php");
}
if (isset($_POST["deleteC"])) {
    $id = $_POST["deletedC"];
    $deleteCategory = new Db();
    $deleteCategory->delete("category", "idC = $id", "article");
    header("location: ../category.php");
}
if (isset($_POST["editC"])) {
    $id = $_POST["editedC"];
    $name = htmlspecialchars(strip_tags($_POST["namedC"]));
    $updateCategory = new Db();
    $updateCategory->update("category", ['name' => $name], "idC = $id");
    header("location: ../category.php");
}