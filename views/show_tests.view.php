<?php require_once 'partials/top.php';
?>

<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>List of Tests </h4>
</div>

<div class="container mt-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th width="50%" scope="col">Description</th>
                <th scope="col">
                    <input type="checkbox" id="checkAllTests" name="checkAllTests" value="">
                    <label for="checkAllTests">All</label>
                </th>
                <th scope="col"></th>
                <th scope="col"></th>

                <th scope="col">
                    <form name="form" action="" method="post">
                        <button type="submit" class="deletebtn btn btn-danger btn-sm form-control" name="buttonDelete"
                            value="">Delete
                            Selection</button>
                    </form>


                </th>
            </tr>
        </thead>
        <tbody class="testsTbody">
            <?php foreach ($tests as $key => $test):?>
            <tr>
                <th scope="row"><?php echo $key+1 ?></th>
                <td hidden class="id"><?php echo $test->id?></td>
                <td><?php echo $test-> title?></td>
                <td><?php echo $test->body ?></td>
                <td> <input type="checkbox" class="checkTest" id="<?php echo $test->id?>" name="checkTest" value="">
                </td>
                <td> <a href="delete_test.php?id=<?php echo $test->id?>" class="btn btn-danger btn-sm"><i
                            class="fas fa-backspace"></i></a></td>
                <td><a href="edit_test_sections.php?id=<?php echo $test->id?>" class="btn btn-warning btn-sm"><i
                            class="fas fa-edit"></i></a></td>
                <td><a href="show_test.php?id=<?php echo $test->id?>" class="btn btn-primary btn-sm"><i
                            class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'partials/bottom.php';
?>