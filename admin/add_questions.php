<?php 
$title = "Add questions";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);
$test_id = $_GET['id'];
$test =getSingleTest($test_id);
//dd($test);
$questions = getAllQuestionsForCategory($test['category_id']);
//dd($questons);

$test_questions = getTestQuestions($test_id);
//for title
$test_category = getCategoryName($test['category_id']);


 if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST['question'])) {
        $selected = $_POST['question'];
        //echo 'You have chosen: ' . $selected;
        saveQuestionToTest($test_id,$selected,0);
        header("Location: add_questions.php?id=" . $test_id);

    } else {
 
  
    $cb_options = [intval(isset($_POST['cb_option1'])),intval(isset($_POST['cb_option2'])),intval(isset($_POST['cb_option3'])),intval(isset($_POST['cb_option4']))];
    $a_options =  [$_POST['a_option1'],$_POST['a_option2'],$_POST['a_option3'],$_POST['a_option4']]; 

    $body = $_POST['body'];
    $poens = $_POST['poens'];
    $cb_explain =$_POST['cb_explain'];
    //dd($cb_explain);

        // first get image name
        $name = $_FILES['file']['name'];
        // define document image folder
        if(isset($_FILES['file']['name']) || !empty($_FILES['file']['name'])){
            $target_dir = $_SERVER['DOCUMENT_ROOT']."/testclass/admin/testimages/"; 
            // define unique image name
            $target_name = time().$name;
            // define full path
            $target_file = $target_dir.$target_name;
            //todo everything
            // get image exstensio
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //define extensions
            $extensions_arr = ["png",'gif','jpg','jpeg'];
        }

        if(isset($_FILES['file']['name']) || !empty($_FILES['file']['name'])){

            if(in_array($imageFileType,$extensions_arr)){

                 if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){    
                     //save question to database
                     $question_id = saveQuestion($body, $target_name, $poens,$test['category_id']);
                 }else {
                        $not_valid_type = "Image is not valid type";
                }

        }else{
            $question_id = saveQuestionn($body,$poens,$test['category_id']);
        }
       
                $a_options_count = is_array($a_options) || $a_options instanceof Countable ? count($a_options) : 0;
                    if($question_id){  
                            if($a_options_count){
                                $type_of_question = 0;
                                for ($i=0; $i < $a_options_count; $i++) { 
                                    if(saveAnsware($question_id,$a_options[$i],$cb_options[$i])){
                                        $valid=true;
                                    }else{
                                        $valid=false;
                                    }
                                }
                            } else {
                                $type_of_question=1;
                            }
                        
                   

                        if($valid){
                            if(saveQuestionToTest($test_id,$question_id,$type_of_question)){
                                header("Location: add_questions.php?id=" . $test_id);
                            }else{
                                $ups = "Ups, something went wrong";
                            }

                        }else{
                            $ups = "Ups, something went wrong";
                        } 
                    }
        } 
    }
}

require "./views/add_questions.view.php";