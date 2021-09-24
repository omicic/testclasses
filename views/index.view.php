<?php require "views/includes/head.php" ?>
<?php require "views/includes/navbar.php" ?>
<div class="container">
    <div class="row">
        <h1 class="display-4 text-center p-5">Tests</h1>
        <hr>

        <form action="index.php" method="POST" autocomplete="off" class="mb-4 d-flex justify-content-end">
            <div class="autocomplete">
                <input id="mySearchInput" type="text" name="myCategory" placeholder="All Category" value="">
            </div>
            <button id="btnSubmit" type="submit" class="btn btn-sm btn-outline-secondary" style="border-radius: 0;"><i
                    class="fas fa-hand-point-right"></i></button>
        </form>

        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <!--  <th scope="col">Points</th> -->
                        <?php if($role !='admin'): ?>
                        <th scope="col">Author</th>
                        <?php endif; ?>
                        <th scope="col">Action</th>
                        <?php if($role=='user'): ?>
                        <th scope="col">Best Result</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($all_public_tests as $test): ?>
                    <tr>
                        <td><?php echo $test['title'] ?></td>
                        <td><?php echo $test['body'] ?></td>
                        <!--  <td><--?php echo $test['points'] ?></td> -->

                        <?php if($role!='admin'): ?>
                        <td><?php echo $test['first_name'] . " " . $test['last_name']  ?></td>
                        <?php endif; ?>

                        <?php if(isset($user['id'])): ?>
                        <?php $testdone = doneTest($test['id'],$user['id']);?>
                        <?php endif; ?>

                        <?php if($role=='admin'): ?>
                        <td><a href="admin/edit_test.php?id=<?php echo $test['id']?>"
                                class="btn btn-sm btn-warning">Edit test</a></td>
                        <?php else: ?>
                        <?php if(isLogged()): ?>
                        <td>
                            <?php if(count($testdone)==0):?><a href="user/preview_test.php?id=<?php echo $test['id']?>"
                                class="btn btn-sm btn-warning">Start test</a>
                            <?php else: ?>
                            Done
                            <?php endif; ?>
                        </td>
                        <?php else: ?>
                        <td><a href="login.php" class="btn btn-sm btn-warning">Log In</a></td>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if($role=='user'): ?>
                        <?php if($testdone != null): ?>
                        <?php if( $testdone[0]['checked'] == 1): ?>
                        <td><a href="user/show_test.php?id=<?php echo $testdone[0]['id']?>"
                                class="btn btn-sm btn-success"><?php echo $testdone[0]['poens']?>/<?php echo $testdone[0]['possiblepoens'] ?></a>
                        </td>
                        <?php else: ?>
                        <td>
                            <p>Not checked</p>
                        </td>
                        <?php endif; ?>
                        <?php else: ?>
                        <td>0</td>
                        <?php endif; ?>
                        <?php endif; ?>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if(count($all_public_tests) == 0): ?>
            <h2>No tests</h2>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require "views/includes/bottom.php" ?>