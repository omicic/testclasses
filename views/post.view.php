<?php require_once 'partials/top.php';
?>

<nav class="navbar navbar-expand navbar-light bg-light">
    <a href="index.php" class="navbar-brand">Bloger</a>
    <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['loggedUser'])): ?>
        <li class="nav-link">
            <p>Hello, <?php echo $_SESSION['loggedUser']->name; ?></p>
        </li>
        <li class="nav-item">
            <a href="add_post.php" class="nav-link">Add Post</a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a href="login_register.php" class="nav-link">Login/Register</a>
        </li>
        <?php endif; ?>

    </ul>
</nav>

<div class="jumbotron text-center">
    <h4>Bloger Posts</h4>
</div>

<div class="container">

    <div class="card mb-3">
        <div class="card-header">
            <img src="uploads/<?php echo $posts[0]->imagepath?>" alt="">
        </div>
        <div class="card-body">
            <div class="row justify-content-between">
                <button class="btn btn-warning btn-sm">
                    <?php echo $user->getUserWithId($posts[0]->user_id)->name; ?>&nbsp;
                    <?php $date = date_create($posts[0]->created_at); echo date_format($date,"Y-m-d"); ?>
                </button>
                <div class="">
                    <?php if(isset($_SESSION['loggedUser']) && $posts[0]->user_id == $_SESSION['loggedUser']->id): ?>
                    <a href=" index.php?post_id=<?php echo $posts[0]->id?>" class="btn btn-sm btn-danger ml-auto"> X
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <h3><?php echo $posts[0]->title; ?></h3>
            <p><?php echo $posts[0]->description ?></p><br>

            <?php var_dump($voted); if($_SESSION['loggedUser'] && !$voted): ?>
            <a href="voteUp.php?post_id=<?php echo $posts[0]->id ?>" class="badge bg-primary"><i
                    class="far fa-thumbs-up"></i>
                <?php echo $likes ?>
            </a>
            <?php else: ?>
            <span class="badge bg-primary"><i class="far fa-thumbs-up"></i> <?php echo $likes; ?></span>
            <?php endif; ?>

            <?php if(isset($_SESSION['loggedUser']) && $posts[0]->user_id==$_SESSION['loggedUser']->id): ?>
            <a href="edit_post.php?post_id=<?php echo $posts[0]->id?>" class="btn btn-sm btn-info float-right">Edit
            </a>
            <?php endif; ?>

        </div>

        <div class="card-footer">



        </div>
    </div>

</div>



<?php require_once 'partials/bottom.php';
?>