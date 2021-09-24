<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row mb-5">
        <h2 class="display-4 text-center my-5"><?php echo $test['title'] ?></h2>
        <div class="col-2">
            <ul class="list-group">
                <li><a href="admin/results_for_test.php?id=<?php echo $test['id']?>" class="list-group-item">Back</a>
                </li>
            </ul>
        </div>
        <div class="col-8">
            <h4>Instruction</h4>
            <hr>
            <p class=""><?php echo $test['body'] ?></p>
        </div>
    </div>

    <div class="test row mt-5 d-flex ">
        <h3 class="text-center"><?php echo $user['first_name'] . " " . $user['last_name'] ?> &nbsp;answares</h3>
        <div class="col-8 p-5 m-auto" style="background: rgb(220, 220, 220);">


            <form action="admin/preview_result_for_test.php?id=<?php echo $user_test_id;?>" method="POST">
                <div class="d-flex flex-row align-center justify-content-between ms-auto">
                    <p class="text-right d-inline" style="font-size:1.3rem;color:gray;border:none;">Test duration:
                        &nbsp;<?php echo $usertest['time']?></p>
                    <p style="font-size:1.3rem;color:gray;border:none;">Created at:
                        &nbsp;<?php echo $usertest['created_at']?></p>
                </div>

                <?php foreach($userTestQuestionAnswares as $index=>$userTestQuestionAnsware): ?>

                <article class="shadow question_<?php echo $index?> mt-5" style="padding:50px;">
                    <div class="d-flex flex-row space-between align-items-center">
                        <h4 style="flex: 0 0 90%;">
                            <?php echo $index+1?>.&nbsp;<?php echo $userTestQuestionAnsware['question']; ?></h4>
                        <?php if(!$userTestQuestionAnsware['explanation']): ?>
                        <label class="ms-auto"
                            style="font-size:2rem;color:red;background:lightgray;padding:10px 15px;"><?php echo $arrayUserPoensForQuestion[$index]?></label>
                        <?php else: ?>
                        <div class="ml-autod-flex flex-column">
                            <?php if(!$userTestQuestionAnsware['poens_by_proffesor']): ?>
                            <input disabled style="font-size:2rem;color:green;background:#fff;padding:10px 15px;"
                                type="text" placeholder="?" class="form-control text-center" value="" style="width:30%">
                            <?php else: ?>
                            <input disabled style="font-size:2rem;color:green;background:#fff;padding:10px 15px;"
                                type="text" placeholder="?" class="form-control text-center"
                                value="<?php echo $userTestQuestionAnsware['poens_by_proffesor'];?>" style="width:30%">
                            <?php endif; ?>
                            <label>*max <?php echo $userTestQuestionAnsware['poens']?></label>
                        </div>
                        <?php endif; ?>
                    </div>

                    <hr>
                    <div class="image-fluid my-5">
                        <?php if(isset($question['image'])): ?>
                        <img src="admin/testimages/<?php echo $userTestQuestionAnsware['image']?>" class="" alt="">
                        <?php endif; ?>
                    </div>
                    <?php $exist=false; ?>
                    <?php for($i=0; $i < 4; $i++): ?>
                    <?php if($userTestQuestionAnsware['answare'.$i+1] == 1): ?>
                    <?php $exist=true; ?>
                    <?php endif; ?>
                    <?php endfor; ?>

                    <article class="posibleAnsware my-5">
                        <!-- <--?php foreach ($answares as $key => $answare):?> -->
                        <?php if($exist): ?>
                        <?php for($i=0; $i < 4; $i++): ?>
                        <div class="form-check form-switch ms-5 mb-2" style="width:70%;">
                            <input readonly disabled class="form-check-input" type="checkbox"
                                <?php if($userTestQuestionAnsware['answare'.$i+1] == 1): ?> checked <?php endif; ?>>
                            <input readonly type="text" class=""
                                value="<?php echo $answares[$index][$i]['answare']; ?>">
                        </div>
                        <?php endfor; ?>
                        <?php endif; ?>
                        <!-- <--?php endforeach; ?> -->

                    </article>

                    <?php if($userTestQuestionAnsware['explanation']): ?>
                    <textarea name="explanation" readonly cols="30" rows="10"
                        style="width:100%;"><?php echo $userTestQuestionAnsware['explanation'] ?></textarea>
                    <input type="text" placeholder="Enter poens" class="form-control"
                        name="poensForQuestion_<?php echo $userTestQuestionAnsware['id']?>" style="width:30%">
                    <label>*maximum for question <?php echo $userTestQuestionAnsware['poens']?></label>
                    <?php else: ?>
                    <?php if(!$exist): ?>
                    <input type="text" placeholder="Enter poens" class="form-control" value="0"
                        name="poensForQuestion_<?php echo $userTestQuestionAnsware['id']?>" data-id=""
                        style="width:30%">
                    <label>*maximum for question <?php echo $userTestQuestionAnsware['poens']?></label>
                    <?php endif; ?>
                    <?php endif; ?>
                </article>
                <?php endforeach; ?>
                <hr>
                <button id="btnSend" type="submit" class="btn btn-primary my-5">Save</button>
            </form>
        </div>

    </div>
</div>

<?php require "./views/includes/bottom.php"; ?>