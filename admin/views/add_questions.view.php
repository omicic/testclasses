<?php require "views/includes/head.php" ?>
<?php require "views/includes/navbar.php" ?>
<div class="container">


    <h3 class="display-4 text-center mb-5">Add questions to <?php echo $test_category['name'] ?></h3>
    <hr>
    <div class="row mt-5 justify-content-end align-items-end">
        <div class="col-1">
            <ul class="list-group">
                <a href="admin/all_tests.php" class="list-group-item">Back</a>
            </ul>
        </div>

        <div class="col-9">
            <form action="admin/add_questions.php?id=<?php echo $test_id?>" method="POST" autocomplete="off"
                class="d-flex justify-content-start">
                <!-- div class="autocomplete" >
                                <input id="mySearchInput" type="" name="choosedQuestion" placeholder="Choose question:">
                            </div> -->
                <select name="question" id="question" style="max-width: 400px;">
                    <?php foreach ($questions as $index => $questionByCategory):?>
                    <option value="<?php echo $questionByCategory['id']?>">
                        <?php echo $questionByCategory['question']; ?> </option>
                    <?php endforeach; ?>
                </select>
                <button id="btnSubmit" name="chooseQuestion" type="submit" class="btn btn-sm btn-primary">Add to
                    list</button>
            </form>


        </div>

        <div class="col-2">
            <button id="btnAddQuestion" class="btn btn-primary">New question</button>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12 mt-5">

            <table id="tableQuestions" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php for($i=0; $i < count($test_questions) ; $i++): ?>
                    <tr>
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td style="width:80%"><?php echo $test_questions[$i]['question'] ?></td>
                        <td style="text-align:right">
                            <a href="admin/edit_question.php?id=<?php echo $test_questions[$i]['id']?>&test_id=<?php echo $test_id?>"
                                class="btn btn-warning btn-sm"><i class="far fa-edit"></i></i></a>
                        </td>
                        <td style="text-align:right">
                            <a href="admin/delete_question_for_test.php?id=<?php echo $test_questions[$i]['tq_id']?>"
                                class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i></a>
                        </td>
                    </tr>
                    <?php endfor; ?>

                </tbody>
            </table>

            <form id="formAddQuestion" action="admin/add_questions.php?id=<?php echo $test_id?>"
                enctype="multipart/form-data" method="POST" class="d-none">
                <h3>Add New Question</h3>
                <textarea name="body" class="form-control" cols="30" rows="10" placeholder="Enter question"
                    required></textarea>

                <div class="d-flex flex-row pt-4">
                    <input type="checkbox" checked="checked" name="cb_explain" id="cb_explain">
                    <label for="cb_explain">&nbsp;Student give explanation</label>
                </div>

                <div class="answares d-none">
                    <h5 class="mt-5">Or Options</h5>
                    <hr>
                    <article class="posibleAnsware">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="cb_option1">
                            <input type="text" class="form-control" name="a_option1"></input>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="cb_option2">
                            <input type="text" class="form-control" name="a_option2"></input>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="cb_option3">
                            <input type="text" class="form-control" name="a_option3"></input>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" name="cb_option4">
                            <input type="text" class="form-control" name="a_option4"></input>
                        </div>
                    </article>
                </div>

                <hr>
                <input type="file" name="file" class="form-control">
                <?php if(isset($not_valid_type)): ?>
                <p class="text-danger"><?php echo $not_valid_type ?></p>
                <?php endif; ?><br>
                <hr>
                <div class="mt-3">
                    <input id="poensInput" type="text" name="poens" class="form-control" style="width:50%"
                        placeholder="Enter maximum poens..." required>

                </div>

                <button class="btn btn-primary form-control mt-5" style="width: 20%;">Add question</button>
            </form>
        </div>
    </div>
</div>
<?php require "views/includes/bottom.php" ?>