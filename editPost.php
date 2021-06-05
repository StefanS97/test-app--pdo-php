<?php
    include("./includes/class-autoload.inc.php");
    require_once("./templates/header.php");

    $posts = new Post();
    $post = $posts->getSinglePost($_GET["id"]);

    $id = $post->id;
    $title = $post->title;
    $content = $post->content;
    $author = $post->author;

    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }
?>

<div class="row justify-content-center">
    <div class="col-md-8 my-5">
        <h3 class="card-header text-center">Edit Post</h3>
        <form class="card-body" method="POST" action="post.process.php?id=<?= $id ?>">
            <div class="form-group">
                <label for="postTitle">Title:</label>
                <input type="text" class="form-control" name="postTitle" id="postTitle" value="<?= $post->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="postContent">Content:</label>
                <textarea type="text" class="form-control" name="postContent" id="postContent" required><?= $post->content; ?></textarea>
            </div>
            <p class="card-subtitle text-muted my-2">Author: <?= $post->author ?></p>
            <div class="d-flex m-2">
                <a class="btn btn-secondary" href="post.php?id=<?= $id ?>">Back</a>
                <button type="submit" name="update" class="btn btn-primary ms-auto">Submit</button>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>

<?php require_once("./templates/footer.php"); ?>