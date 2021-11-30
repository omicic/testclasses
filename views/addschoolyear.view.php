<?php require_once 'partials/top.php' ?>



<div class="header text-center">
    <a href="index.php" class="nav-link">Back</a>
    <h4>Add Class </h4>
</div>

<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-8">
            <form action="add_school_year.php" method="POST">
                <!-- <input type="text" name="register_year" placeholder="School Year " class="form-control" required><br> -->
                <input type="text" name="register_name" placeholder="Shool year: 2020/2021 " class="form-control"
                    required><br>
                <textarea name="register_description" placeholder="Description" class="form-control" cols="30"
                    rows="10"></textarea>

                <button type="submit" name="year_sub_btn" class="form-control btn btn-primary mb-5">Add
                    School year</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>