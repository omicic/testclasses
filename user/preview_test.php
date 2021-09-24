<?php 

$title = "Priview test";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$test = getSingleTest($_GET['id']);
$user = getUser($_SESSION['id']);
$questions = getQuestionsForTest($_GET['id']);
//$test_questions = getTestQuestion($test['id'],$)
$possiblepoens=0;
$answares = array();
$useranswares = array();
$userpoens = array();//za prikaz za svako pitanje u testu
$type_of_questions= array();


foreach($questions as $question){
    $rightansware=geAnswaresForQuestion($question['question_id']); 
    $type_of_question=getTestQuestion($test['id'],$question['question_id']);
    //dd($type_of_question);
    $possiblepoens+=$question['poens'];
    array_push($answares, $rightansware);    
    array_push($type_of_questions, $type_of_question[0]['type_of_question']); 
} 
//dd($type_of_questions);


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $time_result = $_POST['timer'];//tami left to the end of test
    $test_id = $_GET['id'];
    $poens=0;
    
    //dd($explanation);
    $cb_options = [];
    for ($i=0; $i < count($questions); $i++) { 

        $explanation = $_POST['explanation'.$i+1];
        $arrayanswares = [intval(isset($_POST['cb_option1_for_question_'.$i+1])),intval(isset($_POST['cb_option2_for_question_'.$i+1])),
                        intval(isset($_POST['cb_option3_for_question_' . $i+1])),intval(isset($_POST['cb_option4_for_question_'.$i+1])),$explanation]; 
        array_push($useranswares,$arrayanswares);
    }

    //dd($useranswares);

    //za upis vremena za koje je test zavrsen
    $time_result = (strtotime($test['timer'])-strtotime($time_result));//sekunde
    $timetest = transformTime($time_result);

        $user_test_id=saveUserTest($user['id'],$test_id,$timetest,$possiblepoens);
        if($user_test_id){
            //izracunavanje ukupnog broja osvojenih poena
            foreach ($useranswares as $index=>$useransware) {     
            //moramo da uzmemo ukupan broj poena za pitanje i podelimo sa brojem odgovora
               $poen=$questions[$index]['poens']/count($useransware);
               for ($i=0; $i < count($useransware)-1; $i++) {         
                if($useransware[$i] == $answares[$index][$i]['right_wrong']){
                    $poens=$poens + $poen;     
                }
               }      
            }
           
            if(updateUserTest($user_test_id,$poens,0)){    
                    foreach ($questions as $index => $question) {
                        $usertestquestion = saveUserTestQuestionAnswares($user_test_id,$question['question_id'], $useranswares[$index][0],
                        $useranswares[$index][1],$useranswares[$index][2],$useranswares[$index][3],$useranswares[$index][4]);
                    }  
                    header("Location: /testclass/index.php");           
            } else{
                    header("Location: /testclass/error.php");   
            }
             
        }
                        
}

require "./views/preview_test.view.php";