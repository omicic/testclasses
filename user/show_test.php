<?php 

$title = "Show test";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$answares=array();
$user_test_id = $_GET['id'];
$usertest = getUserTest($user_test_id);
$test = getSingleTest($usertest['test_id']);
$userTestQuestionAnswares = getUserTestAnswares($user_test_id);

foreach($userTestQuestionAnswares as $question){
    $rightansware=geAnswaresForQuestion($question['question_id']); 
    array_push($answares, $rightansware);    
} 

$arrayUserPoensForQuestion=[];
$arrayUserAnswarePoen=[];
$arrayUserTrueFalse=[];
foreach($userTestQuestionAnswares as $index => $userTestQuestionAnsware) {
  $poens = 0;
  if(!$userTestQuestionAnsware['explanation']){
    array_push($arrayUserPoensForQuestion,$userTestQuestionAnsware['poens']/4);
        for ($i=0; $i < 4; $i++) { 
            if($userTestQuestionAnsware['answare'.$i+1]==$answares[$index][$i]['right_wrong']){
            // $poens+=$userTestQuestionAnsware['poens']/4;  
            array_push($arrayUserTrueFalse,1);//tacno
            array_push($arrayUserAnswarePoen,$userTestQuestionAnsware['poens']/4);//tacno
            }else{
                array_push($arrayUserTrueFalse,0);//netacno
                array_push($arrayUserAnswarePoen,0);
            }   
        }
    }else{
        array_push($arrayUserAnswarePoen,$userTestQuestionAnsware['poens_by_proffesor']);
    }
  
}
//dd($arrayUserTrueFalse);

        
require "./views/show_test.view.php";