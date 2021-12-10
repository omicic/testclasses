<?php require_once 'partials/top.php';
?>
<div class="header text-center">
    <a href="show_departments.php" class="nav-link">[ Back To List to Departments ]</a>
    <h4>
        Change <span><?php echo $department[0]->name ?></span>
    </h4>
</div>


<div class="mini-nav d-flex justify-content-center">
    <a href="" class="adisabled"><i class="fas fa-chevron-left"></i></a>
    <a href=" edit_department_change_sections.php?id=<?php echo $department[0]->id?>"><i
            class="fas fa-chevron-right"></i></a>
</div>

<div class="container mt-3">
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

</div>



<?php require_once 'partials/bottom.php';
?>