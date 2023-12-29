<?php
session_start();
include "./env.php";
// GET DATA
$title = $_REQUEST["title"];
$details = $_REQUEST["details"];
$author = $_REQUEST["author"];

$errors = [];

// DATA VELIDATION

// TITLE VALIDATION
if(empty($title)){
    $errors["title_error"] = "Title is required!!";
}else if(strlen($title) > 100){
    $errors["title_error"] = "Title limit exceeded!!";
}

// DETAIL VALIDATION
if(empty($details)){
    $errors["details_error"] = "Detail is required!!";
}

// AUTHOR VALIDATION
if(empty($author)){
    $errors["author_error"] = "Author is required!!";
}

if(count($errors) > 0){
    $_SESSION["old"] = $_REQUEST;
    $_SESSION["error_check"] = $errors;
    header("location: ./index.php");
}else{
    $query = "INSERT INTO posts(title, detail, author) VALUES ('$title','$details','$author')";
    $result = mysqli_query($db_connect,$query);
    if($result){
        $_SESSION['success'] = "Your data has been submitted";
        header("location: ./index.php");
    }
}
