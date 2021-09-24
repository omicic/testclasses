<?php 

$title = "Edit question";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$question_id=$_GET['id'];
$test_id=$_GET['test_id'];
$test_question =getTestQuestion($test_id,$question_id);
$question_answares = getQuestion($question_id);
$question_answare=$question_answares[0];
$type_of_question = 0;//options

if(!$question_answares){
    $type_of_question = 1;// explanation
    $question_answare = getQuestionById($question_id);
}
$testQuestion = getTestQuestion($test_id,$question_id);
$type_of_question = $testQuestion[0]["type_of_question"];

//dd($testQuestion[0]["type_of_question"]);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $question = $_POST['question'];
    $poens = $_POST['poens'];    
    $cb_options = [intval(isset($_POST['cb_option1'])),intval(isset($_POST['cb_option2'])),intval(isset($_POST['cb_option3'])),intval(isset($_POST['cb_option4']))];  
    $a_options =  [$_POST['a_option1'],$_POST['a_option2'],$_POST['a_option3'],$_POST['a_option4']] ; 
    $test_id = $_GET['test_id'];
    
 
    
   
    $cb_explain =$_POST['cb_explain'];
    if($cb_explain){
        $type_of_question = 1;
    }else{
        $type_of_question = 0;
    }

                if(updateQuestion($question_id,$question,$poens)){

                    $cb_options_count = is_array($cb_options) || $cb_options instanceof Countable ? count($cb_options) : 0;
                    
                    if($cb_options_count && $type_of_question==0){
                        
                        if(getAnswaresForQuestion($question_id)){      
                            for($i=0; $i < 3; $i++){                      
                                    updateAnsware($question_answares[$i]['answareId'],$cb_options[$i],$a_options[$i]);
                            } 
                        } else {
                           
                            for($i=0; $i < 4; $i++){    
                               // dd($a_options[$i]);  
                            saveAnsware($question_id,$a_options[$i],$cb_options[$i]);
                            }
                        }    
                    }else{

                        if(updateTestQuestion($test_id,$question_id,$type_of_question)){
                            header("Location: add_questions.php?id=$test_id");
                        }else{
                            return "/testclass/error.php";
                        }
                    }

                    //if($valid){
                       // dd($cb_explain);
                        


                        

                   /*  }else{
                        return "/testclass/error.php";
                    } */  
              
            
                         
                } else {
                    dd("error");
                    return "/testclass/error.php";
                }
}


require "./views/edit_question.view.php";