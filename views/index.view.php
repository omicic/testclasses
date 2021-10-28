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
            <li class="mx-3"><a href="index.php">Home</a></li>
            <li class="mx-3"><a href="show_departments.php">Departments</a></li>
            <li class="mx-3"><a href="show_proffesors.php">Our Proffesors</a></li>
            <li class="mx-3"><a href="index.php?category=news">News</a></li>
            <li class="mx-3"><a href="index.php?category=studentsblogs">Student's posts</a></li>
            <li class="mx-3"><a href="add_post.php">Add Post</a></li>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['loggedUser']->role == 'editor'): ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="index.php">Home</a></li>
            <li class="mx-3"><a href="index.php?category=studentsblogs">Student's posts</a></li>
            <li class="mx-3"><a href="index.php?category=news">News</a></li>
            <li class="mx-3"><a href="show_proffesors.php">Our Proffesors</a></li>
            <div class="dropdown">
                <button class="dropbtn">Settings&nbsp;<i class="fas fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <a href="#"><a href="add_user.php"> Add Proffesor</a></a>
                    <a href="#"><a href="add_post.php"> Add News</a></a>
                    <a href="#"><a href="add_department.php"> Add Department</a></a>
                    <a href="#"><a href="add_subject.php"> Add Subject</a></a>
                </div>
            </div>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['loggedUser']->role == 'proffesor'): ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="index.php">Home</a></li>
            <li class="mx-3"><a href="index.php?category=studentsblogs">Student's posts</a></li>
            <li class="mx-3"><a href="index.php?category=news">News</a></li>
            <div class="dropdown">
                <button class="dropbtn">Settings&nbsp;<i class="fas fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <a href="#"><a href="add_section.php"> Add Class</a></a>
                    <a href="#"><a href="add_post.php"> Add Posts</a></a>
                </div>
            </div>
        </ul>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <div class="rolenav d-flex flex-row justify-content-center align-items-center mx-auto">
        <ul class="d-flex flex-row justify-content-between align-items-center">
            <li class="mx-3"><a href="index.php?category=news">News</a></li>
            <li class="mx-3"><a href="index.php?category=blogs">Proffesor's Blogs</a></li>
            <li class="mx-3"><a href="index.php?category=studentsblogs">Student's Blogs</a></li>
            <li class="mx-3"><a href="about.php">About Us</a></li>
            <li class="mx-3"><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
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
                            <?php echo $user->getUserWithId($post->user_id)->name .', '.$user->getUserWithId($post->user_id)->title; ?>&nbsp;
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
            <?php if(count($posts)!=0): ?>
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

            <?php else: ?>
            <h5 class="mt-5">No posts</h5>
            <?php endif; ?>
            <?php endif; ?>


        </div>
    </div>
</div>



<?php require_once 'partials/bottom.php';?>