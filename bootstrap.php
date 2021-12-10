<?php 
session_start();
$config=require 'config.php';
require 'classes/Connection.php';
$db = Connection::connect($config['database']);

require 'classes/QueryBuilder.php';
require 'classes/User.php';
require 'classes/Post.php';
require 'classes/Like.php';
require 'classes/Comment.php';
require 'classes/Subject.php';
require 'classes/Section.php';
require 'classes/Department.php';
require 'classes/Department_Sections.php';
require 'classes/Klasa.php';
require 'classes/School_Year.php';
require 'classes/Student_Year.php';
require 'classes/Test.php';
require 'classes/ProffesorSubject.php';

$query = new QueryBuilder($db);
$user = new User($db);
$post = new Post($db);
$like = new Like($db);
$comment = new Comment($db);
$test = new Test($db);
$proffesorsubject = new ProffesorSubject($db);



$subject = new Subject($db);
$section = new Section($db);
$department = new Department($db);
$departmentsections = new Department_Sections($db);
$class = new Klasa($db);
$school_year = new School_Year($db);
$student_year = new Student_Year($db);


?>