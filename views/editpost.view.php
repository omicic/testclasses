<?php require_once 'partials/top.php' ?>
<nav class="navbar navbar-expand navbar-light bg-light">
    <a href="" class="navbar-brand">Bloger</a>
    <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['loggedUser'])): ?>
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
        <li class="nav-item">
            <a href="index.php" class="nav-link">Back to Blog</a>
        </li>
        <?php endif; ?>

    </ul>
</nav>

<div class="jumbotron text-center">
    <h4>Edit Post</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <?php if($post->newPostStatus): ?>
            <div class="alert alert-success">Post edited</div>
            <?php endif; ?>
            <form action="edit_post.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="post_title" class="form-control" value="<?php echo $data[0]->title;?>"><br>

                <img src="uploads/<?php echo $data[0]->imagepath?>" alt="">
                <input type="file" name="file" class="form-control"><br>
                <?php if(isset($data->image_error)): ?>
                <p class="text-danger"><?php echo $data->image_error ?></p>
                <?php endif; ?>


                <?php if(isset($data->title_error)): ?>
                <p class="text-danger"><?php echo $data->title_error ?></p>
                <?php endif; ?>

                <textarea name="post_description" class="form-control" cols="30"
                    rows="10"><?php echo $data[0]->description;?></textarea><br>
                <?php if(isset($data->description_error)): ?>
                <p class="text-danger"><?php echo $data->description_error ?></p>
                <?php endif; ?>


                <!--<select name="category" class="form-control">
                        <--?php foreach($categories as $cat): ?>
                            <option value="<--?php echo $cat['id'] ?>"><--?php echo $cat['name'] ?></option>
                        <--?php endforeach; ?>
                </select><br> -->

                <select name="public" class="form-control">
                    <option value="1" value="<?php ($data[0]->public == 1)? "selected" : " " ;?>">Public</option>
                    <option value="0" value="<?php ($data[0]->public == 0)? "selected" : " ";?>">Private</option>
                </select><br>

                <button type="submit" name="post_sub_btn" class="form-control btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>