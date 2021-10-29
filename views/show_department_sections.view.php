<?php require_once 'partials/top.php';
?>
<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4><?php echo $department[0]->name ?> </h4>
</div>

<div class="container mt-5">
    <div class="section subject_to_deprt d-flex justify-content-center align-items-center">
        <select class="subject_selection" name="section">
            <?php foreach($sections as $section): ?>
            <option value="<?php echo $section->id ?>"><?php echo $section->name ?></option>
            <?php endforeach; ?>
        </select><br>
        <button id="add_section_btn" class="btn btn-warning">Add Section</button>
    </div><br>

    <table class="table subj_to_dept_table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th width="50%" scope="col">Description</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($department_sections as $key => $section):?>
            <tr>
                <th scope="row"><?php echo $key+1 ?></th>
                <td><?php echo $section->section_name ?></td>
                <td><?php echo $section->section_description ?></td>
                <td><a href="delete_section_from_department.php?id=<?php echo $section->d_section_id?>"
                        class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a></td>
                <!--                 <td><a href="delete_department.php?id=<--?php echo $department->id?>" class="btn btn-danger btn-sm"><i
                            class="fas fa-user-minus"></i></a></td>
                <td><a href="show_department_sections.php?id=<--?php echo $department->id?>"
                        class="btn btn-primary btn-sm"><i class="fas fa-angle-double-right"></i></a></td> -->
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>



<?php require_once 'partials/bottom.php';
?>