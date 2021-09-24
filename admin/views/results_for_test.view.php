<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="donetests container">

    <h2 class="display-4 text-center mt-5">Done tests</h2>
    <hr>

    <div class="row d-flex center justify-space-between ">
        <div class="col-1">
            <ul class="list-group">
                <li><a href="admin/student_tests.php" class="list-group-item">Back</a></li>
            </ul>
        </div>
        <div class="col-11 d-flex justify-content-end">
            <form action="admin/results_for_test.php?id=<?php echo $done_tests_id?>" method="POST" autocomplete="off"
                class=" ms-auto">
                <div class="autocomplete">
                    <input id="mySearchStudentDoneTests" type="text" class="pb-2" name="studentName" placeholder="All"
                        style="border:none; border-bottom:1px solid lightgray;">
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary p-2 "><i
                        class="fas fa-search px-1"></i></button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4><?php echo $test['title'] ?></h4>
            <hr>
            <table class="table">
                <tbody>
                    <?php foreach($done_tests as $index=>$done_test): ?>
                    <?php if($test['id']==$done_test['test_id']): ?>
                    <tr>
                        <td><?php echo $index+1 ?>.</td>
                        <td>
                            <a href="admin/show_user_info.php?id=<?php echo "nesto"?>">
                                <?php echo $done_test['first_name'] . " "  . $done_test['last_name']?></a>
                        </td>
                        <td><?php echo $done_test['email']?></td>
                        <td><?php echo $done_test['poens']?> / <?php echo $done_test["possiblepoens"] ?></td>
                        <td><a href="admin/preview_result_for_test.php?id=<?php echo $done_test['id']?>"
                                class="btn btn-sm btn-warning">More</a></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
</div>


<?php require "./views/includes/bottom.php"; ?>