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
$user = getUser($usertest['user_id']);
$poens = 0;
$arrayUserPoensForQuestion=[];

$userTestQuestionAnswares = getUserTestAnswares($user_test_id);

foreach($userTestQuestionAnswares as $question){
    $rightansware=geAnswaresForQuestion($question['question_id']); 
    array_push($answares, $rightansware);   //right answare
} 

;
foreach($userTestQuestionAnswares as $index => $userTestQuestionAnsware) {

  $poens = 0;
  if(!$userTestQuestionAnsware['explanation']){
  for ($i=0; $i < 4; $i++) { 
    if($userTestQuestionAnsware['answare'.$i+1]==$answares[$index][$i]['right_wrong']){
        $poens+=$userTestQuestionAnsware['poens']/4;  
    }
  }
}
  array_push($arrayUserPoensForQuestion,$poens);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){

        $userTest = $_GET['id'];   
        $userTestQuestionAnswares = getUserTestAnswares($userTest);
        $arrayProfesorPoens = [];
        
//izracunati poene za ceo test
$arrayQuestionIdForChange=[];
$arrayProfesorPoens=[];

foreach($userTestQuestionAnswares as $index => $userTestQuestionAnsware) {
  if($userTestQuestionAnsware['explanation']){
    if($_POST['poensForQuestion_'.$userTestQuestionAnsware['id']]){
        array_push($arrayQuestionIdForChange, $userTestQuestionAnsware['id']);
        array_push($arrayProfesorPoens,$_POST['poensForQuestion_'.$userTestQuestionAnsware['id']]);   
    }
  }
}


if($arrayQuestionIdForChange){

    for ($i=0; $i < count($arrayQuestionIdForChange); $i++) { 
        if(!updateUserTestQuestionAnswares($arrayQuestionIdForChange[$i],$arrayProfesorPoens[$i])){
        } else{
          $poens=0;
          
           for ($i=0; $i <count($arrayUserPoensForQuestion) ; $i++) { 
             $poens+=$arrayUserPoensForQuestion[$i];
           }
        
           for ($j=0; $j < count($arrayProfesorPoens); $j++) { 
             $poens= $poens + $arrayProfesorPoens[$j];
           }
          
           if(updateUserTest($user_test_id,$poens,1)){
            header("Location: results_for_test.php?id=".$test['id']);
           }
            
        }  
    }  
}else{
  updateUserTest($user_test_id,$poens,1);
  header("Location: results_for_test.php?id=".$test['id']);
}

}


        
require "./views/preview_result_for_test.view.php";