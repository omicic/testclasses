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

            <h5>Add Sections to Department</h5>
            <div class="section">

                <div class="subject_to_deprt d-flex justify-content-center align-items-center">
                    <select class="subject_selection" name="subject">
                        <?php foreach($sections as $section): ?>
                        <option value="<?php echo $section->id ?>"><?php echo $section->name ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <button id="add_section_to_department_btn" class="btn btn-warning">Add Section</button>
                </div><br>

                <table class="table table-striped subj_to_dept_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="80%">Section Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

            <form class="mt-5" action="add_department.php" method="POST">
                <input class="inputArraySubjects form-control" name="arraySubjects" type="text" value="">
                <button name="add_dept_btn" class="btn btn-primary" class="form-control">Add department</button>
            </form>

        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>