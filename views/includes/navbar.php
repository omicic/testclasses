<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if(getRole($user['id'])=='user'): ?>
                <li class="nav-item me-2">
                    <a class="btn btn-outline-none"
                        href="index.php"><?php echo $user['first_name'] . " " . $user['last_name']?></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user/account.php">Account</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="logout.php" tabindex="-1"
                                aria-disabled="true">Logout</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <li class="nav-item me-2">
                    <a class="btn btn-outline-warning" href="index.php">TestClasses</a>
                </li>

                <li class="nav-item">
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                    <?php if(isLogged()): ?>
                    <?php if($user && $user['role']=='user'): ?>
                    <a href="user/home.php" class="btn btn-outline-success">My Blogs</a>
                    <a href="user_posts.php" class="btn btn-outline-warning">All posts</a>
                    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                    <?php else: ?>
                    <a href="user_posts.php" class="btn btn-outline-warning">Student posts</a>
                    <a href="admin/home.php" class="btn btn-outline-warning">Proffesor Dashboard</a>
                    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                    <?php endif; ?>
                    <?php else: ?>
                    <a href="user_posts.php" class="btn btn-outline-warning">All posts</a>
                    <a href="login.php" class="btn btn-outline-primary">Login</a>
                    <a href="register.php" class="btn btn-outline-info">Register</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>