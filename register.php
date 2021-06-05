<?php require_once("./templates/header.php"); ?>
<?php if (isset($_SESSION["username"])) {
        header("Location: index.php");
    } ?>

<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <h2 class="card-header text-center">Register</h2>
            <div class="card-body">
                <form method="POST" action="user.process.php">
                    <div class="form-group">
                        <label for="registerUsername">Username</label>
                        <input type="text" class="form-control" name="registerUsername" id="registerUsername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email address</label>
                        <input type="email" class="form-control" name="registerEmail" id="registerEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="registerPassword1">Password</label>
                        <input type="password" class="form-control" name="registerPassword1" id="registerPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="registerPassword2">Repeat Password</label>
                        <input type="password" class="form-control" name="registerPassword2" id="registerPassword2" placeholder="Repeat Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="admin" id="admin">
                        <label class="form-check-label" for="admin">Admin</label>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once("./templates/footer.php"); ?>