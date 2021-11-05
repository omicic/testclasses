<?php require_once 'partials/top.php';
?>
<div class="header text-center">
    <a href="javascript:history.back();" class="nav-link">[ Back To List to Departments ]</a>
    <h4>
        <?php echo $department[0]->name ?>
    </h4>
</div>


<div class="container mt-3">

    <div class="d-flex justify-content-center mb-3">
        <button class="back_btn btn btn-primary mx-1 disabled"><i class="fas fa-chevron-left"></i></button>
        <button class="next_btn btn btn-primary mx-1"><i class="fas fa-chevron-right"></i></button>
    </div>

    <div class="edit_department_form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="edit_department_sections.php?id=<?php echo $department[0]->id?>" method="POST">
                    <input type="text" name="name" class="form-control" value="<?php echo $department[0]->name?>"><br>
                    <textarea width="100%" name="description" class="form-control" cols="30"
                        rows="10"><?php echo $department[0]->description ?></textarea><br>
                    <button name="changed_description_btn" class="btn btn-warning form-control">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="edit_sections_form d-none">
        <form class="edit_sections_form mt-5" action="show_department_sections.php?id=<?php echo $department[0]->id?>"
            method="POST">
            <div class="section subject_to_deprt d-flex justify-content-center align-items-center">
                <select class="subject_selection" name="section" class="form-control">
                    <?php foreach($sections as $section): ?>
                    <option value="<?php echo $section->id ?>"><?php echo $section->name ?></option>
                    <?php endforeach; ?>
                </select><br>
                <button name="add_to_section_btn" class="btn btn-warning">Add
                    Section</button>
            </div><br>
        </form>

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
                    <td hidden><?php echo $section->d_section_id ?></td>
                    <td><?php echo $section->section_name ?></td>
                    <td><?php echo $section->section_description ?></td>
                    <td><a href="edit_department_sections.php?delete_id=<?php echo $section->d_section_id?>&id=<?php echo $department[0]->id?>"
                            class="btn btn-warning btn-sm"><i class="fas fa-backspace"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>



<?php require_once 'partials/bottom.php';
?>