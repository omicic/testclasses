<?php require "views/includes/head.php" ?>
<?php require "views/includes/navbar.php" ?>
<div class="container">
    <div class="row my-5">
        <h3 class="display-4 text-center mb-5"><?php echo $title ?></h3>
        <hr>
        <div class="col-2">
            <ul class="list-group">
                <a href="admin/add_questions.php?id=<?php echo $test_id?>" class="list-group-item">Back</a>
            </ul>
        </div>
        <div class="col-10">

            <form action="admin/edit_question.php?id=<?php echo $question_id; ?>&test_id=<?php echo $test_id; ?>"
                method="POST" enctype="multipart/form-data">
                <?php if($question_answare['image']): ?>
                <div>
                    <img src="admin/testimages/<?php echo $question_answare['image']?>"
                        style="width:100%;display:block;" alt="">
                </div>
                <?php endif; ?>
                <textarea name="question" class="form-control" cols="30" rows="10"><?php if($question_answare['question']):?><?php echo $question_answare['question'] ?>
                <?php else: ?><?php echo $question_answares['question'] ?><?php endif; ?>
                </textarea>

                <div class="d-flex flex-row pt-4">
                    <?php if($type_of_question==0): ?>
                    <input type="checkbox" name="cb_explain" id="cb_edit_explain">
                    <?php else: ?>
                    <input type="checkbox" checked="checked" name="cb_explain" id="cb_edit_explain">
                    <?php endif; ?>

                    <label for="cb_explain">&nbsp;Student give explanation</label>
                </div>

                <div class="editAnswares  <?php if($type_of_question==1): ?> d-none  <?php endif;?>">
                    <?php if($type_of_question==0): ?>
                    <h5 class="mt-5">Options</h5>
                    <hr>
                    <article class="editPosibleAnsware">

                        <?php for ($i=0; $i < 4; $i++): ?>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="cb_option<?php echo $i+1?>"
                                <?php if($question_answares[$i]['right_wrong']==1): ?> checked <?php endif; ?>>
                            <input type="text" class="form-control" name="a_option<?php echo $i+1?>"
                                value="<?php echo $question_answares[$i]['answare']; ?>">
                        </div>
                        <?php endfor; ?>
                    </article>
                    <?php endif; ?>


                </div>


                <hr>
                <p>Poens</p>
                <input type="text" class="form-control" name="poens" value="<?php echo @$question_answare['poens']?>"
                    style="width:10%">
                <button class="btn btn-primary form-control mt-5" style="width: 20%;">Change question</button>
            </form>
        </div>
    </div>
</div>
<?php require "views/includes/bottom.php" ?>