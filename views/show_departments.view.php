<?php require_once 'partials/top.php';
?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>List of departments </h4>
</div>

<div class="container mt-5">
    <table class="table">
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
            <?php foreach ($departments as $key => $department):?>
            <tr>
                <th scope="row"><?php echo $key+1 ?></th>
                <td><?php echo $department->name ?></td>
                <td><?php echo $department->description ?></td>

                <td><a href="edit_department.php?id=<?php echo $department->id?>" class="btn btn-warning btn-sm"><i
                            class="fas fa-user-edit"></i></a></td>
                <td><a href="delete_department.php?id=<?php echo $department->id?>" class="btn btn-danger btn-sm"><i
                            class="fas fa-user-minus"></i></a></td>
                <td><a href="show_department_sections.php?id=<?php echo $department->id?>"
                        class="btn btn-primary btn-sm"><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>



<?php require_once 'partials/bottom.php';
?>