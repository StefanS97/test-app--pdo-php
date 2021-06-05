<?php require_once("./templates/header.php"); ?>
<?php if (isset($_SESSION["username"])) {
        header("Location: index.php");
    } ?>

<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <h2 class="card-header text-center">Login</h2>
            <div class="card-body">
                <form method="POST" action="user.process.php">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="text" class="form-control" name="loginUsername" id="loginUsername" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-2">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once("./templates/footer.php"); ?>