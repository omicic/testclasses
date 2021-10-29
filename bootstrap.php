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

$query = new QueryBuilder($db);
$user = new User($db);
$post = new Post($db);
$like = new Like($db);
$comment = new Comment($db);


$subject = new Subject($db);
$section = new Section($db);
$department = new Department($db);
$departmentsections = new Department_Sections($db);



?>