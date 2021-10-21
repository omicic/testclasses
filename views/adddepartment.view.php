<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add department </h4>
</div>

<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-8">
            <form action="add_department.php" method="POST">
                <input type="text" name="register_name" placeholder="Name" class="form-control" required><br>
                <textarea name="register_description" placeholder="Description" class="form-control" cols="30"
                    rows="10"></textarea><br>

                <h5>Add Subject to Department</h5>
                <div class="section">

                    <div class="subject_to_deprt d-flex justify-content-center align-items-center">
                        <select class="subject_selection" name="subject" class="form-control">
                            <?php foreach($subjects as $subject): ?>
                            <option value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                            <?php endforeach; ?>
                        </select><br>
                        <button id="add_subject_to_department_btn" class="btn btn-primary">Add Subject</button>
                    </div><br>


                    <table class="table table-striped subj_to_dept_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" width="80%">Subject Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <button type="submit" name="department_sub_btn" class="form-control btn btn-primary my-3">Add
                    Department</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>