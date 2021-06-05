<?php

include("./includes/class-autoload.inc.php");

session_start();

$post = new Post();

if (isset($_SESSION["username"])) {
    if (isset($_POST["add"])) {
        $title = $_POST["postTitle"];
        $content = $_POST["postContent"];
        $author = $_SESSION["username"];
        
        $post->addPost($title, $content, $author);

        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else if (isset($_POST["update"])) {
        $title = $_POST["postTitle"];
        $content = $_POST["postContent"];
        $id = $_GET["id"];

        $post->updatePost($title, $content, $id);

        header("Location: post.php?id=".$id);
    } else if (isset($_POST["delete"])) {
        $id = $_GET["id"];

        $post->deletePost($id);

        header("Location: index.php");
    }
}