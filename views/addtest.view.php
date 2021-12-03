<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add test </h4>
</div>

<div class="addDepartment container">
    <div class="row flex-column align-items-center m-5">
        <div class="col-8">
            <h5>Add Test</h5>
            <div class="section">

                <form action="add_test.php" method="POST">
                    <input type="text" name="title" placeholder="Title" class="form-control" required><br>
                    <textarea class="add_department_description form-control" placeholder="Description" cols="30"
                        rows="10"></textarea><br>
                    <input type="text" name="points" placeholder="Points" class="form-control" required><br>
                    <input type="text" name="timer" placeholder="Timer" class="form-control" required><br>
                    <button type="submit" name="test_sub_btn" class="form-control btn btn-primary mb-5">Add
                        Test</button>
                </form>

            </div>
        </div>
    </div>

    <?php require_once 'partials/bottom.php' ?>