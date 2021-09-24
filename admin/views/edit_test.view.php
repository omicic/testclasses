<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center">Edit test</h2>
        <div class="col-2">
            <ul class="list-group">
                <li><a href="admin/all_tests.php" class="list-group-item">Back</a></li>
            </ul>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-10">
                    <form action="admin/edit_test.php?id=<?php echo $test['id'] ?>" method="POST">
                        <input type="text" name="title" value="<?php echo $test['title'] ?>" class="form-control"><br>
                        <?php if(isset($title_error)): ?>
                        <p class="text-danger"><?php echo $title_error ?></p>
                        <?php endif; ?>

                        <textarea name="body" class="form-control" cols="30"
                            rows="10"><?php echo $test['body'] ?></textarea><br>
                        <?php if(isset($body_error)): ?>
                        <p class="text-danger"><?php echo $body_error ?></p>
                        <?php endif; ?>

                        <select name="category" class="form-control">
                            <?php foreach($categories as $cat): ?>
                            <option value="<?php echo $cat['id'] ?>"
                                <?php echo ($test['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                <?php echo $cat['name'] ?></option>
                            <?php endforeach; ?>
                        </select><br>

                        <select name="public" class="form-control">
                            <option value="1" <?php echo ($test['public'] == 1) ? 'selected' : ''?>>Public</option>
                            <option value="0" <?php echo ($test['public'] == 0) ? 'selected' : ''?>>Private</option>
                        </select><br>

                        <p>Time:</p>
                        <input type="text" name="timer" id="inputMDEx1" class="form-control text-center"
                            style="width:30%" value="<?php echo substr($test['timer'],0,5)?>">
                        <br>

                        <button type="submit" class="btn btn-info form-control">Show/Change</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>