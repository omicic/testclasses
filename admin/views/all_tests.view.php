<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>
<?php // require ROOT."/user/views/includes/head.php" ?>

<div class="container">

    <h2 class="display-4 text-center mt-5">Tests</h2>
    <hr>

    <div class="row align-item-end justify-content-end my-5">
        <div class="col-4 d-flex align-item-end justify-content-end">
            <form action="admin/all_tests.php" method="POST" autocomplete="off" class="my-auto">
                <div class="autocomplete">
                    <input id="mySearchInput1" class="pb-1" type="text" name="myCategory" placeholder="All Category"
                        style="border:none; border-bottom:1px solid lightgray;">
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary"><i
                        class="fas fa-search px-1"></i></button>
            </form>
        </div>

    </div>
    <div class="row ">


        <div class="col-2">
            <ul class="list-group">
                <li><a href="admin/home.php" class="list-group-item">Back</a></li>
                <a href="admin/new_test.php" class="list-group-item">New test</a>
            </ul>
        </div>
        <div class="col-10">
            <div class="row">

                <?php foreach($tests as $test): ?>
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header d-flex flex-row justify-content-between align-item-center">
                            <h4 class="m-0"><?php echo $test['title'] ?></h4>
                            <p class="float-end">
                                <?php echo ($test['public']) ? '<i class="far fa-eye"></i>':'<i class="far fa-eye-slash"></i>' ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <p class="m-0"><?php echo $test['body'] ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <a href="admin/add_questions.php?id=<?php echo $test['id'] ?>"
                                        class="btn btn-sm btn-primary mb-1">Show/Add questions</a>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <a href="admin/edit_test.php?id=<?php echo $test['id'] ?>"
                                        class="btn btn-sm btn-warning mx-1"><i class="far fa-edit"></i></a>
                                    <a href="admin/delete_test.php?id=<?php echo $test['id'] ?>"
                                        class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if(!$tests): ?>
                <h3>No tests.</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>