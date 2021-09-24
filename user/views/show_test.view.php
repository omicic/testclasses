<?php require "./views/includes/head.php"; ?>
<?php require "./views/includes/navbar.php"; ?>

<div class="container">
    <div class="row mb-5">
        <h2 class="display-4 text-center my-5"><?php echo $test['title'] ?> test</h2>
        <div class="col-2">
            <ul class="list-group">
                <li><a href="index.php" class="list-group-item">Back</a></li>
            </ul>
        </div>
        <div class="col-8">
            <h4>Instruction</h4>
            <hr>
            <p class=""><?php echo $test['body'] ?></p>
        </div>
    </div>

    <div class="test row mt-5 d-flex ">
        <h4 class="text-center">Student answares</h4>
        <div class="col-8 p-5 m-auto" style="background: rgb(220, 220, 220);">

            <form action="preview_test.php" method="">
                <div class="d-flex flex-row align-center justify-content-between ms-auto">
                    <p class="text-right d-inline" style="font-size:1.3rem;color:gray;border:none;">Test duration:
                        &nbsp;<?php echo $usertest['time']?></p>
                    <p style="font-size:1.3rem;color:gray;border:none;">Created at:
                        &nbsp;<?php echo $usertest['created_at']?> </p>
                </div>
                <p class="text-right" style="font-size: 2rem;color:green;">Osvojeno:
                    <?php echo $usertest['poens'] ?>/<?php echo $usertest['possiblepoens']?>-
                    <?php echo round($usertest['poens']/$usertest['possiblepoens']*100); ?>%</p>
                <?php $j=0; ?>
                <?php foreach($userTestQuestionAnswares as $index=>$userTestQuestionAnsware): ?>

                <article class="shadow question_<?php echo $index?> mt-5" style="padding:50px;">
                    <h4><?php echo $index+1?>.&nbsp;<?php echo $userTestQuestionAnsware['question']; ?></h4>
                    <hr>
                    <div class="image-fluid my-5">
                        <?php if(isset($question['image'])): ?>
                        <img src="admin/testimages/<?php echo $userTestQuestionAnsware['image']?>" class="" alt="">
                        <?php endif; ?>
                    </div>

                    <article class="posibleAnsware my-5">
                        <!-- <--?php foreach ($answares as $key => $answare):?> -->

                        <?php  if(!$userTestQuestionAnsware['explanation']): ?>

                        <?php for ($i=0; $i < 4; $i++): ?>

                        <div class="form-check form-switch ms-5 mb-2 d-flex flex-row ">
                            <input readonly disabled class="form-check-input me-2" type="checkbox"
                                <?php if($userTestQuestionAnsware['answare'.$i+1] == 1): ?> checked <?php endif; ?>>
                            <input readonly type="text" class=""
                                value="<?php echo $answares[$index][$i]['answare']; ?>">


                            <?php if($arrayUserTrueFalse[$j]==1): ?>

                            <label class="mx-2" style="width:10%; color:green;padding:5px" for="poen">&check;</label>
                            <input disabled style="width:10%; color:green;padding:5px" type="text" class="text-center"
                                value="<?php echo $arrayUserAnswarePoen[$j]?>">


                            <?php endif; ?>

                            <?php $j++; ?>
                        </div>
                        <?php endfor; ?>
                        <?php else: ?>
                        <textarea name="explanation" readonly cols="30" rows="10"
                            style="width:100%;"><?php echo $userTestQuestionAnsware['explanation'] ?></textarea>
                        <input type="text" disabled placeholder="Enter poens" class="form-control"
                            style="font-size: 1.2rem;width:30%;color:green"
                            value="<?php echo $arrayUserAnswarePoen[$j]?>">
                        <label>*maximum for question <?php echo $userTestQuestionAnsware['poens']?></label>
                        <?php endif ?>

                    </article>
                </article>
                <?php endforeach; ?>
                <hr>
            </form>
        </div>

    </div>
</div>

<?php require "./views/includes/bottom.php"; ?>