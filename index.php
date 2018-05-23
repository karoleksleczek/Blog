<?php 

function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
{
 $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

 if (!$connect) 
 { 
   die ("blad");
 } 

 return $connect;
}

$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName = "Blog3";

$dbConn = dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName);

if (!isset($_GET['idPost']))
{
  $sql = "SELECT idPosts, postDate, postTitle, postIntro, postAuthors FROM Posts";
  $dbQuery = mysqli_query($dbConn, $sql);
  include('blog.php');
}

if(isset($_GET['idPost']))
{
  $postNumber=$_GET['idPost'];
  $sql = "SELECT idPosts, postDate, postTitle, postIntro, postAuthors, postReadMore FROM Posts WHERE idPosts=$postNumber";
  $dbQuery = mysqli_query($dbConn, $sql);

  include('post.php');
}


?>