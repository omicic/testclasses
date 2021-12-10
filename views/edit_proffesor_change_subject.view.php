<?php require_once 'partials/top.php';
?>
<div class="header text-center">
    <a href="show_proffesors.php" class="nav-link">[ Back To List to Professors ]</a>
    <h4>
        Add/Change Subjects - <span><?php echo $proffesor[0]->name ?></span>
    </h4>
</div>
<div class="mini-nav d-flex justify-content-center">
    <a href="edit_user.php?id=<?php echo $proffesor[0]->id?>"><i class="fas fa-chevron-left"></i></a>
    <a href="" class="adisabled"><i class="fas fa-chevron-right"></i></a>
</div>
<div class="container mt-3">
    <div class="edit_sections_form">
        <form class="edit_subjects_form" action="edit_proffesor_change_subject.php?id=<?php echo $proffesor[0]->id?>"
            method="POST">
            <div class="section subject_to_deprt d-flex justify-content-center align-items-center">
                <select class="subject_selection" name="subject" class="form-control">
                    <?php foreach($subjects as $subject): ?>
                    <option value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                    <?php endforeach; ?>
                </select><br>
                <button name="add_to_subject_btn" class="btn btn-warning">Add
                    Subject</button>
            </div><br>
        </form>

        <table class="table subj_to_dept_table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th width="50%" scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proffesor_subjects as $key => $subject):?>
                <tr>
                    <th scope="row"><?php echo $key+1 ?></th>
                    <td hidden><?php echo $subject->d_section_id ?></td>
                    <td><?php echo $subject->name ?></td>
                    <td><?php echo $subject->description ?></td>
                    <td><a href="edit_proffesor_change_subject.php?delete_id=<?php echo $subject->p_subject_id?>&id=<?php echo $subject[0]->id?>"
                            class="btn btn-warning btn-sm"><i class="fas fa-backspace"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>



<?php require_once 'partials/bottom.php';
?>