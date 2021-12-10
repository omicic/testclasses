<?php 

require_once 'bootstrap.php';
$subjects = $subject->selectAll('subjects');

if(isset($_GET['id'])){
    $id_proffesor = $_GET['id'];
    $proffesor = $user->selectById('users',$id_proffesor);
    $proffesor_subjects = $proffesorsubject->selectById('proffesor_subject_year',$id_proffesor);

    if(isset($_POST['add_to_subject_btn'])){
        $subj_id=$_POST['subject'];
        if($proffesorsubject->createProffesorSubject($id_proffesor,$subj_id)){
            $proffesor_subjects = $proffesorsubject->selectAllById($id_proffesor);
        }
     }

    if(isset($_GET['delete_id'])){
        $proffesorsubject->deleteById('proffesor_subjects',$_GET['delete_id']);
        header('Location: edit_proffesor_change_subjects.php?id='.$_GET['id']);
    } 

}
   

require_once 'views/edit_proffesor_change_subject.view.php';
?>