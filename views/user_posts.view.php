<?php require "views/includes/head.php" ?>
<?php require "views/includes/navbar.php" ?>
<div class="container mt-5">
<h1 class="display-4 text-center pb-5">All posts</h1>
    <div class="row">
        <div class="col-2">
            <ul class="list-group">
            <a href="index.php" class="list-group-item">Back</a>
            </ul>
        </div>
        <div class="col-10">
        <!-- <h1 class="display-4 text-center">Public posts</h1> -->
            <?php foreach($all_public_posts as $post): ?>
            <div class="card mb-5 shadow p-4 flex-row justify-content-between align-center flex-wrap">
                <div class="card-header" style="flex:0 0 48%"><img src="uploads/<?php echo $post['image'] ?>" class="img-fluid p-4"></div>
                <div class="card-body" style="flex:0 0 48%">                 
                    <span class="float-end p-2"><i class="far fa-clock"></i> <?php echo date("d.m.Y",strtotime($post['created_at'])) ?></span>
                    <a href="" class="btn btn-sm btn-warning m-2"><?php echo $post['first_name']." ".$post["last_name"] ?></a>
                    <h4 class="p-4"><?php echo $post['title'] ?></h4>
                    <p class="mb-5"><?php echo substr($post['body'],0,200) ?> ...</p>
                    <a href="single_post.php?id=<?php echo $post['id'] ?>" class="btn btn-info form-control d-inline ">Read more</a>
                </div>
            </div>
            <?php endforeach ?>
            <?php if(count($all_public_posts) == 0): ?>
                <h1 class="display-4">No posts in this category</h1>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require "views/includes/bottom.php" ?>
