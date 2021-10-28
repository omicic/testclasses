<?php require_once 'partials/top.php';
?>

<div class="headerget remote -v
 text-center">
    <h4>List of proffesors</h4>
</div>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Title</th>
                <th scope="col">Phone</th>
                <th scope="col">Edit</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proffesors as $key => $proffesor):?>
            <tr>
                <th scope="row"><?php echo $key+1 ?></th>
                <td><?php echo $proffesor->name ?></td>
                <td><?php echo $proffesor->email ?></td>
                <td><?php echo $proffesor->title ?></td>
                <td><?php echo $proffesor->phone_number ?></td>
                <td><a href="edit_user.php?id=<?php echo $proffesor->id?>" class="btn btn-warning btn-sm"><i
                            class="fas fa-user-edit"></i></a></td>
                <td><a href="delete_user.php?id=<?php echo $proffesor->id?>" class="btn btn-danger btn-sm"><i
                            class="fas fa-user-minus"></i></a></td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>



<?php require_once 'partials/bottom.php';
?>