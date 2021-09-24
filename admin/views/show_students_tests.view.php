<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>
<?php // require ROOT."/user/views/includes/head.php" ?>

<div class="donetests container">

    <h2 class="display-4 text-center mt-5">Tests</h2><hr>

    <div class="row d-flex center justify-space-between ">
        <div class="col-1">
            <ul class="list-group">
               <li><a href="admin/home.php" class="list-group-item">Back</a></li>
            </ul>
        </div>
        <div class="col-11 d-flex justify-content-end">
          <form action="admin/student_tests.php" method="POST" autocomplete="off" class=" ms-auto">
                <div class="autocomplete" >
                    <input id="mySearchInput2" type="text" class="pb-3" name="myCategory" placeholder="All Category" style="border:none; border-bottom:1px solid lightgray;">
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary p-2 "><i class="fas fa-search px-1"></i></button>
            </form>  
        </div>     
     </div>


    <div class="row mt-4">
        <div class="col-12">
            <!-- <div class="row">                        -->
                     <table class="table table-striped ">
        
                    <tbody>
                    <?php foreach($tests as $index=>$test): ?>
                        <tr>    
                        <td><?php echo $index+1 ?></td>
                            <td><?php echo $test['title'] ?></td>
                            <td class="text-left"><?php echo $test['body'] ?></td>
                            <td><?php echo $test['points'] ?></td>
                            <td><a href="admin/results_for_test.php?id=<?php echo $test['id']?>" class="btn btn-warning">Preview</a></td>                    
                        </tr>
                        <?php endforeach; ?>           
                      </tbody>
                    </table>
                    <?php if(!$tests): ?>
                        <h3>No tests</h3>    
                    <?php endif; ?>
                  
                  
       
          
           <!--  </div> -->
        </div>
    </div>
</div>


<?php require "./views/includes/bottom.php"; ?>
    
