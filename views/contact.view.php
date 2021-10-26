<?php require_once('partials/top.php') ?>
<!-- <nav class="navbar navbar-expand navbar-light bg-light">
    <a href="" class="navbar-brand">Bloger</a>
    <ul class="navbar-nav ml-auto">
        <--?php if(isset($_SESSION['loggedUser'])): ?>
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
        <li class="nav-item">
            <a href="index.php" class="nav-link">Back to Blog</a>
        </li>
        <--?php endif; ?>

    </ul>
</nav> -->

<div class="header text-center">
    <h4>Contact Form</h4>
</div>

<div class="container">

    <div class="success pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if(isset($_GET['success']) && $_GET['success']==true):?>
                <h4>Your comment is send sucessfully. </h4>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-md-8  py-5">
            <form action="contact.php" method="POST" class="d-flex flex-column">
                <input type="text" name="name" placeholder="Enter name" class="form-control"><br>

                <input type="email" name="sender_email" placeholder="Enter your email" required
                    class="form-control"><br>

                <input type="text" name="subject" placeholder="Enter Subject" class="form-control"><br>

                <textarea name="message" cols="30" rows="10" placeholder="Message" required
                    class="form-control"></textarea><br>

                <button name="btnSend" class="brn btn-primary btn-sm">Send</button>
            </form>
        </div>
    </div>

</div>



h


<?php require_once('partials/bottom.php') ?>