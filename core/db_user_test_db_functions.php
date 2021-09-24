<?php 

function saveUserTest($user_id,$test_id,$time_result,$possiblepoens){

    //dd($test_id);
    global $db;

    $sql = $db->prepare("INSERT INTO user_test (user_id,test_id,time,possiblepoens)  VALUES (?,?,?,?)");
    $sql->bind_param('iisi', $user_id,$test_id,$time_result,$possiblepoens);
    $sql->execute();
    $user_test_id=$sql->insert_id;

    if($sql->errno==0){
       return $user_test_id;
    }else{
        return false;
    }
}

 function updateUserTest($user_test_id,$userpoens, $checked){
    //dd($user_test_id);
    global $db;
    $sql = $db->prepare("UPDATE user_test SET poens=?, checked=?
                                WHERE id=?");
    $sql->bind_param('iii',$userpoens, $checked, $user_test_id);
    $sql->execute();
 

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
} 

function updateUserTestQuestionAnswares($id,$poens){

    global $db;
    $sql = $db->prepare("UPDATE user_test_question_answare SET poens_by_proffesor=?
                                WHERE id=?");
    $sql->bind_param('ii',$poens,$id);
    $sql->execute();
 

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function doneTest($test_id,$user_id){
    //dd($user_id);
    global $db;
    $sql = $db->prepare("SELECT * FROM user_test WHERE test_id = ? AND user_id=? ORDER BY poens DESC;");
    $sql->bind_param('ii',$test_id,$user_id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $testdone = $result->fetch_all(MYSQLI_ASSOC);
        //dd($testdone);
        return $testdone;
    }else{
        return false;
    }
}

function saveUserTestQuestionAnswares($user_test_id,$question_id, $answare1,$answare2,$answare3,$answare4,$explanation){
    //dd($explanation);
    global $db;

    $sql = $db->prepare("INSERT INTO user_test_question_answare (user_test_id,question_id, answare1,answare2,answare3,answare4,explanation)  VALUES (?,?,?,?,?,?,?)");
    $sql->bind_param('iiiiiis',$user_test_id,$question_id, $answare1,$answare2,$answare3,$answare4,$explanation);
    $sql->execute();
  //$user_test_id=$sql->insert_id;

    if($sql->errno==0){
       return true;
    }else{
        return false;
    }
}

function getUserTestAnswares($test_id){
    //dd(true);
    global $db;
    $sql = $db->prepare("SELECT 
                            utq.id,
                             utq.answare1,
                             utq.answare2,
                             utq.answare3,
                             utq.answare4,
                             utq.explanation,
                             utq.poens_by_proffesor,
                             q.id AS question_id,
                             q.question,
                             q.poens,
                             utq.question_id
                            FROM user_test_question_answare utq 
                            INNER JOIN questions q 
                            ON utq.question_id = q.id
                            WHERE user_test_id = ?;
                        ");
    $sql->bind_param('i',$test_id);
    $sql->execute();
    
    if($sql->errno == 0){
        $result = $sql->get_result();
        $allanswares = $result->fetch_all(MYSQLI_ASSOC);
        //dd($allanswares);
        return $allanswares;
    }else{
        return false;
    }
}

function getUserTest($test_id){

    global $db;
    $sql = $db->prepare("SELECT *
                            FROM user_test 
                            WHERE id = ?;
                        ");
    $sql->bind_param('i',$test_id);
    $sql->execute();
    //dd($sql);
    if($sql->errno == 0){
        $result = $sql->get_result();
        $usertest = $result->fetch_assoc();
        //dd($usertest);
        return $usertest;
    }else{
        return false;
    }
}