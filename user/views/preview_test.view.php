<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row mb-5">
        <h2 class="display-4 text-center my-5"><?php echo $test['title'] ?> test</h2>
        <div class="col-2">
        <ul class="list-group">
               <li><a href="user/home.php" class="list-group-item">Back</a></li>
        </ul>
        </div>
        <div class="col-8">
            <h4>Instruction</h4>
            <p><?php echo $test['body'] ?></p><hr>
            <div class="d-flex justify-content-end">           
                <button id="btnStartTest" class="btn btn-primary float-end ms-4">Start test</button>
            </div>       
        </div>      
    </div>

    <div class="test row mt-5 d-none">
    <?php if($countTests<3): ?>
    
    <div class="col-10">
        <form action="user/preview_test.php?id=<?php echo $test['id']?>" method="POST" >
        <input readonly id="timer" name="timer" class="form-control text-center" style="font-size:2rem;color:green;" value="<?php echo $test['timer']?>"></input>
            <?php foreach($questions as $index=>$question): ?>
            
                <article class="shadow question_<?php echo $index?> mt-5" style="padding:50px;">
                    <h4><?php echo $index+1?>.&nbsp;<?php echo $question['question']; ?></h4>
                    <hr>
                    <div class="image-fluid my-5">
                        <?php if($question['image']): ?>
                        <img src="admin/testimages/<?php echo $question['image']?>" class="form-control" alt="">
                        <?php endif; ?>
                    </div>
                    
                    <article class="posibleAnsware my-5">
                    <?php if($type_of_questions[$index]== 0): ?>  
                        <?php for ($i=0; $i < count($answares[$index]); $i++): ?>      
                                    <div class="form-check form-switch ms-5 mb-2" style="width:70%;">
                                        <input class="form-check-input" type="checkbox" name="cb_option<?php echo $i+1?>_for_question_<?php echo $index+1 ?>">
                                        <input readonly type="text" class="form-control" name="a_option<?php echo $i+1?>" value="<?php echo $answares[$index][$i]['answare']; ?>">                
                                    </div>                
                        <?php endfor; ?>  
                    <?php else: ?>
                        <textarea class="form-control my-5" name="explanation<?php echo $index+1?>"  cols="30" rows="10" placeholder="Enter your explanation"></textarea>
                    <?php endif; ?>      
                    
                    </article>
                </article>
            <?php endforeach; ?>
            <hr>
            <button id="btnSend" type="submit" class="btn btn-primary my-5">Send</button>
        </form>
    </div>

    <?php else: ?>
        <h3><?php echo $message; ?></h3>
    <?php endif; ?>
    
    </div>
</div>

<?php require "./views/includes/bottom.php"; ?>
    
