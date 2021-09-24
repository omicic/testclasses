<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <h2 class="display-4 text-center mb-5"><?php echo $title ?></h2>

        <div class="col-2">
            <ul class="list-group">
                <li><a href="admin/home.php" class="list-group-item text-right">Back</a></li>
            </ul>
        </div>

        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <form  action="admin/add_category.php" method="POST" autocomplete="off"  class="d-flex justify-content-start">
                            <div class="autocomplete" >
                                <input id="mySearchInput" type="text" name="myCategory" placeholder="Category">
                            </div>
                            <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary">Add to list</button>
                    </form>        
                </div>
            </div>

            <hr>
            
            <div class="row mt-3">
                <div class="col-12">
                <table id="tableQuestions" class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            <?php for($i=0; $i < count($admin_categories) ; $i++): ?>
                <tr>
                    <th scope="row"><?php echo $i+1; ?></th>
                        <td style="width:80%"><?php echo $admin_categories[$i]['name'] ?></td>
                        <td style="text-align:right">
                        <a href="admin/delete_admin_category_test.php?id=<?php echo $admin_categories[$i]['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i></a>
                        </td>
                </tr>
            <?php endfor; ?>
          
            </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>