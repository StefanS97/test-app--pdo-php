<?php
    include("./includes/class-autoload.inc.php");
    require_once("./templates/header.php");

    $posts = new Post();
    $post = $posts->getSinglePost($_GET["id"]);

    $id = $post->id;
    $title = $post->title;
    $content = $post->content;
    $author = $post->author;
?>

<div class="row justify-content-center">
    <div class="col-md-8 my-5">
        <div class="card">
            <h4 class="card-header text-center"><?= $title ?></h4>
            <div class="card-body">
                <p class="card-text"><?= $content ?></p>
                <p class="card-subtitle text-muted text-end">Author: <?= $author ?></p>
            </div>
            <div class="d-flex justify-content-between m-2">
                <a class="btn btn-secondary" href="index.php">Back</a>
                <?php if(isset($_SESSION["username"]) && $_SESSION["username"] === $author): ?>
                    <a class="btn btn-primary" href="editPost.php?id=<?= $post->id ?>">Edit Post</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once("./templates/footer.php"); ?>