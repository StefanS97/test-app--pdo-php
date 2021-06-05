<?php 
    include("./includes/class-autoload.inc.php");
    require_once('./templates/header.php');
?>

<div class="row p-3">
    <?php if(isset($_SESSION["username"])): ?>
        <div class="col-md-4">
            <div class="card my-2">
                <h5 class="card-header text-center">Add Post</h5>
                <form class="card-body" method="POST" action="post.process.php">
                    <div class="form-group">
                        <label for="postTitle">Title:</label>
                        <input type="text" class="form-control" name="postTitle" id="postTitle" placeholder="Title for post" required>
                    </div>
                    <div class="form-group">
                        <label for="postContent">Content:</label>
                        <textarea type="text" class="form-control" name="postContent" id="postContent" placeholder="Content for post" required></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" name="add" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-<?php 
                            if(isset($_SESSION["username"])){
                                echo "8";
                            } else {
                                echo "16";
                            } 
                        ?>">
        <div class="row">
            <?php $posts = new Post(); ?>
                <?php if ($posts->getAllPosts()): ?>
                    <?php foreach($posts->getAllPosts() as $post): ?>
                        <div class="col-md-6 my-2">
                            <div class="card">
                                <h4 class="card-header text-center"><?= $post->title ?></h4>
                                <div class="card-body">
                                    <p class="card-text"><?= $post->content ?></p>
                                    <p class="card-subtitle text-muted text-end">Author: <?= $post->author ?></p>
                                </div>
                                <div class="d-flex justify-content-end m-2">
                                    <a class="btn btn-primary" href="post.php?id=<?= $post->id ?>">View Post</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h4 class="text-center">Empty...</h4>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once('./templates/footer.php'); ?>