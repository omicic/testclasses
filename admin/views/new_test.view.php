<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center">Make new test</h2>
        <div class="col-2">
            <ul class="list-group">
                <li><a href="admin/all_tests.php" class="list-group-item text-right">Back</a></li>
            </ul>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <form action="admin/new_test.php" method="POST">
                        <input type="text" name="title" placeholder="title" class="form-control"><br>
                        <?php if(isset($title_error)): ?>
                        <p class="text-danger"><?php echo $title_error ?></p>
                        <?php endif; ?>
                        <textarea name="body" class="form-control" cols="30" rows="10"
                            placeholder="Enter instruction for text" required></textarea><br>
                        <?php if(isset($body_error)): ?>
                        <p class="text-danger"><?php echo $body_error ?></p>
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
                        <?php endif; ?><br>
                        <p>Time:</p>
                        <input type="text" name="timer" id="inputMDEx1" class="form-control text-center"
                            style="width:20%" value="00:30">
                        <br>
                        <button type="submit" class="btn btn-info form-control">Add new test</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>