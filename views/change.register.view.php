<?php require_once 'partials/top.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Change registration</h4>
            <form action="change_register.php" method="POST">
                <input type="text" name="register_name" value="<?php echo $student[0]->name?>" class="form-control"><br>
                <input type="text" name="register_email" value="<?php echo $student[0]->email?>" class="form-control"
                    required><br>
                <input type="text" name="register_password" value="<?php echo $student[0]->password?>"
                    class="form-control" required><br>

                <input type="text" name="register_address" value="<?php echo $student[0]->address?>"
                    class="form-control"><br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="register_city" value="<?php echo $student[0]->city?>"
                            class="form-control" required><br>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="register_country" value="<?php echo $student[0]->country?>"
                            class="form-control" required><br>
                    </div>
                </div>

                <input type="text" name="register_phone_number" value="<?php echo $student[0]->phone_number?>"
                    class="form-control"><br>

                <div class="input-group">
                    <select class="custom-select" name="class" id="inputGroupSelect04"
                        aria-label="Example select with button addon">
                        <option selected>Choose...</option>
                        <?php foreach($classes as $class): ?>
                        <option value="<?php echo $class->id ?>"><?php echo $class->class?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button class="form-control btn btn-warning" name="registerBtn">Register</button>
            </form>

            <?php if($user->register_result): ?>
            <div class="alert alert-success">Success registration. Log In.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'partials/bottom.php' ?>