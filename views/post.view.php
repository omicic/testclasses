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

            <?php if(isset($_SESSION['loggedUser'])): ?>
            <!--ulogovan-->
            <a href="voteUp.php?post_id=<?php echo $posts[0]->id ?>" class="badge bg-primary"><i
                    class="far fa-thumbs-up"></i>
                <?php echo $likes ?>
            </a>

            <?php else: ?>
            <span><i class="far fa-thumbs-up"></i><?php echo $likes ?></span>
            <?php endif; ?>

            <?php if(isset($_SESSION['loggedUser']) && $posts[0]->user_id==$_SESSION['loggedUser']->id): ?>
            <a href="edit_post.php?post_id=<?php echo $posts[0]->id?>" class="btn btn-sm btn-info float-right">Edit
            </a>
            <?php endif; ?>

        </div>

        <div class="card-footer">
            <h4>Comments</h4>
            <hr>
            <?php if(isset($_SESSION['loggedUser'])): ?>
            <form action="add_comment.php" method="POST">
                <input type="hidden" name="post_id" class="form-control" value="<?php echo $posts[0]->id?>">
                <textarea name="body" class="form-control" cols="15" rows="5"
                    placeholder="Enter Comment"></textarea><br>
                <button name="add_comment_btn" class="btn btn-primary float-right">Send</button>
            </form>
            <?php endif; ?>
        </div>

        <div class="card-footer">

            <?php foreach ($comments as $key => $comment): ?>
            <div class="class-header">
                <dl>
                    <dd><?php echo $comment->name?></dd>
                    <dt class="ml-4"><?php echo $comment->body ?></dt>
                </dl>
            </div>


            <?php endforeach; ?>

        </div>
    </div>

</div>



<?php require_once 'partials/bottom.php';
?>