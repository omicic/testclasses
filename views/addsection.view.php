<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add Class </h4>
</div>

<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-8">
            <form action="add_section.php" method="POST">
                <input type="text" name="register_name" placeholder="Name for example: I, II... " class="form-control"
                    required><br>
                <textarea name="register_description" placeholder="Description" class="form-control" cols="30"
                    rows="10"></textarea>

                <button type="submit" name="section_sub_btn" class="form-control btn btn-primary mb-5">Add User</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>