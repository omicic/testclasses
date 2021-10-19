<?php require_once 'partials/top.php';
?>



<!--navigacija u zavisnosti od role-->
<div class="text-center">
    <!--ako je logovan korisnik-->
    <?php if(isset($_SESSION['loggedUser'])): ?>

    <?php if($_SESSION['loggedUser']->role == 'admin'): ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="show_editors.php">Show Editors</a></li>
            <li class="mx-3"><a href="add_editor.php">Add Editor</a></li>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['loggedUser']->role == 'user'): ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="add_post.php">Add Posts</a></li>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['loggedUser']->role == 'editor'): ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="index.php?role=user">Students posts</a></li>
            <li class="mx-3"><a href="show_proffesors.php">Show Proffesors</a></li>
            <li class="mx-3"><a href="add_user.php">Add Proffesor</a></li>
            <li class="mx-3"><a href="add_post.php">Add News</a></li>
        </ul>
    </div>
    <?php endif; ?>
    <?php endif; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">



            <?php if(isset($_SESSION['loggedUser'])): ?>
            <!--Nemoj prikazivati postove za admina-->
            <?php if($_SESSION['loggedUser']->role != 'admin'): ?>
            <?php foreach($posts as $post): ?>
            <div class="card mb-3 flex-row">
                <div class="card-header col-4">
                    <img class="postsimg" src="uploads/<?php echo $post->imagepath?>" alt="">
                </div>

                <div class="card-body" id="<?php if($user->getUserWithId($post->user_id)->role === 'editor'):
                    echo 'editor'; endif;?>">
                    <div class=" row justify-content-between">
                        <button class="btn btn-warning btn-sm">
                            <?php echo $user->getUserWithId($post->user_id)->name; ?>&nbsp;
                            <?php $date = date_create($post->created_at); echo date_format($date,"Y-m-d"); ?>
                        </button>
                        <div class="">
                            <?php if(isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
                            <a href=" index.php?post_id=<?php echo $post->id?>" class="btn btn-sm btn-danger ml-auto"> X
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <h3><?php echo $post->title; ?></h3>
                    <p><?php echo substr($post->description,0,50) . "[...]" ?></p><br>
                    <a href="post.php?post_id=<?php echo $post->id?>" class="btn btn-sm btn-info float-right"> Read
                        more...
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php else: ?>
            <?php foreach($posts as $post): ?>
            <div class="card mb-3 flex-row">
                <div class="card-header col-4">
                    <img class="postsimg" src="uploads/<?php echo $post->imagepath?>" alt="">
                </div>

                <div class="card-body" id="<?php if($user->getUserWithId($post->user_id)->role === 'editor'):
                    echo 'editor'; endif;?>">
                    <div class=" row justify-content-between">
                        <button class="btn btn-warning btn-sm">
                            <?php echo $user->getUserWithId($post->user_id)->name .', '.$user->getUserWithId($post->user_id)->title; ?>&nbsp;
                            <?php $date = date_create($post->created_at); echo date_format($date,"Y-m-d"); ?>
                        </button>
                        <div class=" ">
                            <?php if(isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
                            <a href=" index.php?post_id=<?php echo $post->id?>" class="btn btn-sm btn-danger ml-auto"> X
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <h3><?php echo $post->title; ?></h3>
                    <p><?php echo substr($post->description,0,50) . "[...]" ?></p><br>
                    <a href="post.php?post_id=<?php echo $post->id?>" class="btn btn-sm btn-info float-right"> Read
                        more...
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>



<?php require_once 'partials/bottom.php';?>