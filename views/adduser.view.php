<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add <?php if($_SESSION['loggedUser']->role=='admin'): ?>Editor <?php else: ?> Proffesor <?php endif; ?> </h4>
</div>

<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-8">
            <!--        <--?php if($user->newUserStatus): ?>
            <div class="alert alert-success">New User Inserted</div>
            <--?php endif; ?> -->
            <form action="add_user.php" method="POST">
                <input type="text" name="register_name" placeholder="Name" class="form-control" required><br>
                <input type="email" name="register_email" placeholder="Email" class="form-control" required><br>
                <input type="password" name="register_password" placeholder="Password" class="form-control"
                    required><br>

                <?php if($_SESSION['loggedUser']->role=='admin'): ?>
                <input type="text" name="register_organisation" placeholder="Organisation" class="form-control"
                    required><br>
                <?php endif; ?>
                <input type="text" name="register_address" placeholder="Address" class="form-control" required><br>
                <input type="text" name="register_city" placeholder="City" class="form-control" required><br>
                <input type="text" name="register_country" placeholder="Country" class="form-control" required><br>
                <input type="text" name="register_phone_number" placeholder="phone" class="form-control"><br>

                <button type="submit" name="user_sub_btn" class="form-control btn btn-primary mb-5">Add User</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>