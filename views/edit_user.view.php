<?php require_once 'partials/top.php' ?>

<div class="header text-center">
    <a href="show_proffesors.php" class="nav-link">[ Back To List to Professors ]</a>
    <h4>Edit User <span><?php echo $data[0]->name ?></span></h4>
</div>

<div class="mini-nav d-flex justify-content-center">
    <a href="" class="adisabled"><i class="fas fa-chevron-left"></i></a>
    <a href=" edit_proffesor_change_subject.php?id=<?php echo $data[0]->id?>"><i class="fas fa-chevron-right"></i></a>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-8 offset-2">

            <form action="edit_user.php?user_id=<?php echo $data[0]->id;?>" method="POST" enctype="multipart/form-data">
                <!--  <input type="text" name="id" value="<--?php echo $data[0]->id;?>"> -->

                <input type="text" name="name" class="form-control" value="<?php echo $data[0]->title;?>"><br>
                <?php if(isset($data->name_error)): ?>
                <p class="text-danger"><?php echo $data->name_error ?></p>
                <?php endif; ?>

                <input type="text" name="email" class="form-control" value="<?php echo $data[0]->email;?>"><br>
                <?php if(isset($data->email_error)): ?>
                <p class="text-danger"><?php echo $data->email_error ?></p>
                <?php endif; ?>

                <input type="text" name="title" class="form-control" value="<?php echo $data[0]->title;?>"><br>
                <?php if(isset($data->title_error)): ?>
                <p class="text-danger"><?php echo $data->title_error ?></p>
                <?php endif; ?>

                <input type="text" name="address" class="form-control" value="<?php echo $data[0]->address;?>"><br>
                <?php if(isset($data->address_error)): ?>
                <p class="text-danger"><?php echo $data->address_error ?></p>
                <?php endif; ?>

                <input type="text" name="city" class="form-control" value="<?php echo $data[0]->city;?>"><br>
                <?php if(isset($data->city_error)): ?>
                <p class="text-danger"><?php echo $data->city_error ?></p>
                <?php endif; ?>

                <input type="text" name="country" class="form-control" value="<?php echo $data[0]->country;?>"><br>
                <?php if(isset($data->country_error)): ?>
                <p class="text-danger"><?php echo $data->country_error ?></p>
                <?php endif; ?>

                <input type="text" name="phone_number" class="form-control"
                    value="<?php echo $data[0]->phone_number;?>"><br>
                <?php if(isset($data->phone_number_error)): ?>
                <p class="text-danger"><?php echo $data->phone_number_error ?></p>
                <?php endif; ?>

                <button type="submit" name="user_sub_btn" class="form-control btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>