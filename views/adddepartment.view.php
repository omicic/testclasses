<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add department </h4>
</div>

<div class="addDepartment container">
    <div class="row flex-column align-items-center m-5">
        <div class="col-8">
            <div class="row flex-column">
                <input type="text" placeholder="Name" class="register_name">
                <textarea class="add_department_description" placeholder="Description" cols="30"
                    rows="10"></textarea><br>

            </div>

            <h5>Add Subjects to Department</h5>
            <div class="section">

                <div class="subject_to_deprt d-flex justify-content-center align-items-center">
                    <select class="subject_selection" name="subject">
                        <?php foreach($subjects as $subject): ?>
                        <option value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <button id="add_subject_to_department_btn" class="btn btn-warning">Add Subject</button>
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

            <form class="mt-5" action="add_department.php" method="GET">
                <input hidden class="inputArraySubjects form-control" name="arraySubjects" type="text" value="">
                <button name="add_dept_btn" class="btn btn-primary">Add department</button>
            </form>





            <!--   <a href="add_department.php?new_department=true" name="department_sub_btn" class="btn btn-primary my-3">Add
                Department</a> -->


        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>