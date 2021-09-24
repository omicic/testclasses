<?php 

function getDoneTests($test_id){
   // dd($test_id);
    global $db;
    $sql = $db->prepare("SELECT
                            ut.*,
                            u.first_name,
                            u.last_name,
                            u.email
                            FROM user_test ut 
                            JOIN users u 
                            ON u.id=ut.user_id
                            WHERE ut.test_id=? ORDER BY created_at DESC");
    $sql->bind_param('i',$test_id);
    $sql->execute();
   
    if($sql->errno == 0){
        
        $result = $sql->get_result();
        $donetests = $result->fetch_all(MYSQLI_ASSOC);
       //dd($donetests);
        return $donetests;
    }else{
        return false;
    }
}

function getDoneTestsByName($test_id,$first_name,$last_name){
  
     global $db;
     $sql = $db->prepare("SELECT
                             ut.*,
                             u.first_name,
                             u.last_name
                             FROM user_test ut 
                             JOIN users u 
                             ON u.id=ut.user_id
                             WHERE ut.test_id=?
                             AND u.first_name = ?
                             OR u.last_name =?
                            ");
     $sql->bind_param('iss',$test_id,$first_name,$last_name);
     $sql->execute();

     if($sql->errno == 0){
         
         $result = $sql->get_result();
         $donetests = $result->fetch_all(MYSQLI_ASSOC);
         //dd($donetests);
         return $donetests;
     }else{
         return false;
     }
 }

function getAllTestsForAdmin($admin_id){
    //dd($admin_id);
    global $db;
    $sql = $db->prepare("SELECT * FROM tests WHERE admin_id=?");
    $sql->bind_param('i',$admin_id);
    $sql->execute();

    if($sql->errno == 0){
        
        $result = $sql->get_result();
        $tests = $result->fetch_all(MYSQLI_ASSOC);
        return $tests;
    }else{
        return false;
    }
}

function getAllTestsForAdminCategory($admin_id,$category_id){
  // dd(true);
    global $db;
    $sql = $db->prepare("SELECT * FROM tests WHERE admin_id=? AND category_id=?");
    $sql->bind_param('ii',$admin_id, $category_id);
    $sql->execute();

    if($sql->errno == 0){
        
        $result = $sql->get_result();
        $tests = $result->fetch_all(MYSQLI_ASSOC);
        return $tests;
    }else{
        return false;
    }
}

function saveTest($admin_id,$title,$body,$category,$public,$timer){
    
    global $db;
    $sql = $db->prepare("INSERT INTO tests (admin_id,title,body,category_id,public,timer) 
                        VALUES(?,?,?,?,?,?)");
    $sql->bind_param('issiis',$admin_id,$title,$body,$category,$public,$timer);
    $sql->execute();
    $id=$sql->insert_id;

    if($sql->errno == 0){
        return $id;
    }else{
        return false;
    }
}

function numberOfDoneTests($user_id,$test_id){
    global $db;
    $sql = $db->prepare("SELECT * FROM user_test WHERE user_id=? AND test_id=?");
    $sql->bind_param('ii',$user_id, $test_id);
    $sql->execute();
 

    if($sql->errno == 0){
        $result = $sql->get_result();
       
        $num_rows=mysqli_num_rows($result);
        //dd($num_rows);
        return $num_rows;
    }else{
        return false;
    }
}

function deleteTest($id){
    global $db;
    $sql = $db->prepare("DELETE FROM tests WHERE id=?");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        $sql = $db->prepare("DELETE FROM test_questions WHERE test_id=?");
        $sql->bind_param('i',$id);
        $sql->execute();
        return true;
    }else{
        return false;
    }
}


function getSingleTest($id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM tests WHERE id = ?
                        ");
    $sql->bind_param('i',$id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $test = $result->fetch_assoc();
        return $test;
    }else{
        return false;
    }
}

function editTest($id,$title,$body,$category,$public,$timer)
{
    global $db;
    $sql = $db->prepare("UPDATE tests SET title=?, body=?, 
                                category_id=?, public=?, timer=?
                                WHERE id=?");
    $sql->bind_param('ssiisi',$title,$body,$category,$public,$timer,$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function getAllQuestionsForCategory($category_id){
    global $db;
    $sql = $db->prepare("SELECT
                        *
                        FROM questions 
                        WHERE category_id=?
                        ");
    $sql->bind_param('i',$category_id);
    $sql->execute();
    //dd($sql);
    if($sql->errno == 0){
        $result = $sql->get_result();
        $questions = $result->fetch_all(MYSQLI_ASSOC);
        //dd($test_questions);
        return $questions;
    }else{
        return false;
    }
}

function saveQuestion($body,$image_target_name,$poens,$category_id){

    global $db;
    $sql = $db->prepare("INSERT INTO questions (question,category_id,image,poens) 
    VALUES(?,?,?,?)");
$sql->bind_param('sisi',$body,$category_id,$image_target_name,$poens);
$sql->execute();
$question_id=$sql->insert_id;

    if($sql->errno == 0){
       return $question_id;;
    }else{
       return false;
    }
}

function saveQuestionn($body,$poens,$category_id){

        global $db;
        $sql = $db->prepare("INSERT INTO questions (question,category_id,poens) 
        VALUES(?,?,?)");
    $sql->bind_param('sii',$body,$category_id,$poens);
    $sql->execute();
    $question_id=$sql->insert_id;
    
       // dd($question_id);
    
        if($sql->errno == 0){
           return $question_id;;
        }else{
           return false;
        }
    }
    

function saveAnsware($question_id,$a_option,$cb_option){
   // dd($cb_option);
    global $db;
    $sql = $db->prepare("INSERT INTO answare (question_id,answare,right_wrong) VALUES (?,?,?)");
    $sql->bind_param('isi',$question_id,$a_option,$cb_option);
    $sql->execute();
    //dd($sql);
    

    if($sql->errno == 0){
       return true;
    }else{
        return false;
    }
}

function saveQuestionToTest($test_id,$question_id, $type_of_question){
    global $db;
    $sql = $db->prepare("INSERT INTO test_questions (test_id,question_id,type_of_question) VALUES (?,?,?)");
    $sql->bind_param('iii',$test_id,$question_id,$type_of_question);
    $sql->execute();
    //dd($sql);
    

    if($sql->errno == 0){
       return true;
    }else{
        return false;
    }
}


function getTestQuestions($test_id){//proveriti
    //dd($test_id);
    global $db;
    $sql = $db->prepare("SELECT
                        q.question,
                        q.id,
                        tq.type_of_question,
                        tq.id AS tq_id
                        FROM questions q
                        JOIN test_questions tq
                        ON q.id=tq.question_id
                        WHERE tq.test_id=?
                        ");
    $sql->bind_param('i',$test_id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $test_questions = $result->fetch_all(MYSQLI_ASSOC);
        //dd($test_questions);
        return $test_questions;
    }else{
        return false;
    }
}

function getTestQuestion($test_id,$question_id){
    //dd($test_id);
    global $db;
    $sql = $db->prepare("SELECT
                        *
                        FROM test_questions 
                        WHERE test_id=?
                        AND question_id=?
                        ");
    $sql->bind_param('ii',$test_id,$question_id);
    $sql->execute();

    if($sql->errno == 0){
        $result = $sql->get_result();
        $test_questions = $result->fetch_all(MYSQLI_ASSOC);
        //dd($test_questions);
        return $test_questions;
    }else{
        return false;
    }
}

function updateTestQuestion($test_id,$question_id,$type_of_question){
    global $db;
    $sql = $db->prepare("UPDATE test_questions SET type_of_question=?
    WHERE test_id=? AND question_id=?");
    $sql->bind_param('iii',$type_of_question,$test_id,$question_id);
    $sql->execute();

    if($sql->errno == 0){
    return true;
    }else{
    return false;
    }
}

function getTestQu($question_for_delete_id){

    global $db;
    $sql = $db->prepare("SELECT * FROM test_questions WHERE id=?");
    $sql->bind_param('i',$question_for_delete_id);
    $sql->execute();
    $result = $sql->get_result();
    $testQuestion = $result->fetch_assoc();
   

    if($sql->errno == 0){
        return $testQuestion;
    }else{
        return false;
    }
}


function deleteTestQuestion($question_for_delete_id){
    global $db;
    $sql = $db->prepare("DELETE FROM test_questions WHERE id=?");
    $sql->bind_param('i',$question_for_delete_id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function deleteQuestionFromDb($question_for_delete_id){
    global $db;
    $sql = $db->prepare("DELETE FROM questions WHERE id=?");
    $sql->bind_param('i',$question_for_delete_id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function getQuestionById($question_id){
  
    global $db;
    $sql = $db->prepare("SELECT 
                          *
                            FROM questions q 
                            WHERE q.id=?");
    $sql->bind_param('i',$question_id);
    $sql->execute();
    //dd($sql);
    if($sql->errno == 0){
        $result = $sql->get_result();
        $question = $result->fetch_assoc();
        //dd($question);
        return $question;
    }else{
        return false;
    }
}

function getQuestion($question_id){
  
    global $db;
    $sql = $db->prepare("SELECT 
                            q.question,
                            q.image,
                            q.poens,
                            a.id AS answareId,
                            a.answare,
                            a.right_wrong 
                            FROM questions q 
                            INNER JOIN answare a 
                            ON q.id=a.question_id 
                            WHERE q.id=?");
    $sql->bind_param('i',$question_id);
    $sql->execute();
    //dd($sql);
    if($sql->errno == 0){
        $result = $sql->get_result();
        $question = $result->fetch_all((MYSQLI_ASSOC));
        //dd($question);
        return $question;
    }else{
        return false;
    }
}

function updateQuestion($question_id,$question,$poens){

    global $db;
    //dd($image);
    $sql = $db->prepare("UPDATE questions SET question=?,poens=? 
                                WHERE id=?");
    $sql->bind_param('sii',$question,$poens,$question_id);
    $sql->execute();
    
    if($sql->errno == 0){   
        return true;
    }else{
        return false;
    }
}

function updateAnsware($answare_id,$cb_option,$a_option){
    //dd($a_option);
    global $db;
    $sql = $db->prepare("UPDATE answare SET answare=?, right_wrong=? 
                                WHERE id=?");
    $sql->bind_param('sii',$a_option,$cb_option,$answare_id);
    $sql->execute();
   // dd(true);

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}
function getQuestionsForTest($test_id){
    //dd($test_id);
    global $db;
    $sql = $db->prepare("SELECT
    tq.question_id,
    q.question,
    q.image,
    q.poens,
    q.created_at
    FROM tests t
    JOIN test_questions tq
    ON t.id=tq.test_id
    JOIN questions q
    ON tq.question_id=q.id
    WHERE t.id=?
    ");
    
    
    $sql->bind_param('i',$test_id);
    $sql->execute();
   // dd($sql);
    

    if($sql->errno == 0){
        $result = $sql->get_result();
        $test_questions = $result->fetch_all(MYSQLI_ASSOC);
        return $test_questions;
    }else{
        return false;
    }
}

function geAnswaresForQuestion($question_id){
//dd($question_id);
    global $db;
    $sql = $db->prepare("SELECT
                        q.id,
                        q.poens,
                        a.id AS answare_id,
                        a.answare,
                        a.img_answare,
                        a.right_wrong
                        FROM questions q
                        JOIN answare a
                        ON q.id=a.question_id
                        WHERE q.id=?
                        ");
    $sql->bind_param('i',$question_id);
    $sql->execute();
    //dd($sql);
    

    if($sql->errno == 0){
        $result = $sql->get_result();
        $answare = $result->fetch_all(MYSQLI_ASSOC);
        return $answare;
    }else{
        return false;
    }
}