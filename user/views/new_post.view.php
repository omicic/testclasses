<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center">Make new post</h2>
        <div class="col-2">
            <?php include "./views/includes/sidebar.php" ?>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-10">
                <form action="user/new_post.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="title" class="form-control"><br>
                    <?php if(isset($title_error)): ?>
                        <p class="text-danger"><?php echo $title_error ?></p>
                    <?php endif; ?>
                    <textarea name="body" class="form-control" cols="30" rows="10" placeholder="post text"></textarea><br>
                    <?php if(isset($body_error)): ?>
                        <p class="text-danger"><?php echo $body_error ?></p>
                    <?php endif; ?>
                    <input type="file" name="file" class="form-control"><br>
                    <?php if(isset($image_error)): ?>
                        <p class="text-danger"><?php echo $image_error ?></p>
                    <?php endif; ?>
                    <?php if(isset($not_valid_type)): ?>
                        <p class="text-danger"><?php echo $not_valid_type ?></p>
                    <?php endif; ?>
                    <select name="category" class="form-control">
                        <?php foreach($categories as $cat): ?>
                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <select name="public" class="form-control">
                       <option value="1">Public</option>
                       <option value="0">Private</option>
                    </select><br>
                    <?php if(isset($ups)): ?>
                        <p class="text-danger"><?php echo $ups ?></p>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-info form-control">Post</button>
                </form>
                </div>
            </div>
          
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>
    
