<?php require_once 'partials/top.php' ?>
<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add test </h4>
    <a href="show_tests.php" class="nav-link">[List Of Tests]</a>
</div>

<?php if($newTest): ?>
<p id="success" class="text-center container">Test is added succesfully</p>
<?php endif; ?>
<div class="addDepartment container">
    <div class="row flex-column align-items-center m-5">
        <div class="col-8">
            <h5>Add Test</h5>
            <div class="section">
                <form action="add_test.php" method="POST">
                    <input type="text" name="test_title" placeholder="Title" class="form-control" required><br>
                    <textarea class="add_department_description form-control" name="test_description"
                        placeholder="Description" cols="30" rows="10"></textarea>
                    <input type="text" name="points" placeholder="Points" class="form-control" required><br>
                    <input type="text" name="timer" placeholder="Timer: 00:00" class="form-control" required><br>

                    <label for="dept">Department: &nbsp;</label>
                    <select class="department_selection form-control" name="department_selection" id="dept">
                        <option value="">Optional: Chose category</option>
                        <?php foreach($departments as $department): ?>
                        <option value="<?php echo $department->id ?>"><?php echo $department->name ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <button type="submit" name="test_sub_btn" class="form-control btn btn-primary mb-5">Add
                        Test</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'partials/bottom.php' ?>