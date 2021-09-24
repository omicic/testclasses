<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>
<?php if(isset($_GET['success'])): ?>
<div id="success-id" class="bg-success text-center">
    <p>Login success</p>
</div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <h2 class="display-4 text-center my-5"><?php echo $user['first_name']?> - admin dashboard</h2>
        <hr>
        <div class="col-2">
            <?php include "./views/includes/sidebar.php" ?>
        </div>
        <div class="col-10 p-5">
            <h4 class="mb-4">Hello admin</h4>
            <p>This is main page for making your tests. On left side you have options for creating test and questions.
            </p>
            <p>What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>Where does it come from?
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et
                Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                sit amet..", comes from a line in section 1.10.32.

                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their
                exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

        </div>
    </div>

    <script>
    let successMessage = document.querySelector("#success-id");
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.display = "none";
        }, 5000)
    }
    </script>

    <?php require "./views/includes/bottom.php"; ?>