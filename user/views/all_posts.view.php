<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>
<?php // require ROOT."/user/views/includes/head.php" ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center p-5">All posts</h2><hr>
        <div class="col-2">
            <?php include "./views/includes/sidebar.php" ?>
        </div>
        <div class="col-10">
            <div class="row">
                <?php foreach($posts as $post): ?>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="d-flex justify-content-between align-center" style="border-bottom: 1px solid lightgray;">
                                    <p><?php echo ($post['public']) ? '<i class="far fa-eye"></i>':'<i class="far fa-eye-slash"></i>' ?></p>
                                    <p><?php echo ($post['created_at']); ?></p>
                                </div>
                            
                                <h4 class="pt-2"><?php echo $post['title'] ?></h4>
                            </div>
                            <div class="card-body">
                                <img src="uploads/<?php echo $post['image'] ?>" class="img-fluid">
                            </div>
                            <div class="card-footer">
                                <a href="user/edit_post.php?id=<?php echo $post['id'] ?>" class="btn btn-sm btn-warning float-start"><i class="far fa-edit"></i></a>
                                <a href="user/delete_post.php?id=<?php echo $post['id'] ?>&image=<?php echo $post['image'] ?>" class="btn btn-sm btn-danger float-end"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if(!$posts): ?>
                    <h3>No posts</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>
    
