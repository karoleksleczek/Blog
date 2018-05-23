<?php 

class blog
{
  private $dbConn;


  function __construct($serverName, $userName, $password, $dbName)
  {

    $this -> dbConn = mysqli_connect($serverName, $userName, $password, $dbName);

    if (!$this -> dbConn) 
    { 
      die ("blad");
    } 
   
    return $this -> dbConn;

  }
  function pokaz ()
  {
   $sql="SELECT idPosts,postDate,postTitle FROM Posts";
   $dbQuery=mysqli_query($this -> dbConn, $sql);
  }
 
  function dodaj ($Date, $ReadMore, $Intro, $Authors, $Title)
  {
   
     $sql="INSERT INTO Posts (postDate, postReadMore, postIntro, postAuthors, postTitle) VALUES ('$Date','$ReadMore', '$Intro',  '$Authors', '$Title')";
     mysqli_query($this ->dbConn, $sql);
     mysqli_close ($this ->dbConn);
  }

  function usun($idPosts)
  {
    $sql = "DELETE  FROM Posts WHERE idPosts = $idPosts";
    mysqli_query($this ->dbConn, $sql);
    mysqli_close ($this ->dbConn);
  }

  function edytuj ($Date, $ReadMore, $Intro, $idNumber, $Title)
  {
    $sql= "UPDATE Posts SET postDate='$Date', postReadMore=$ReadMore, postIntro='$Intro', postTitle='$Title' WHERE idPosts=$idNumber"; 
    mysqli_query($this ->dbConn, $sql);
    mysqli_close ($this ->dbConn);


  }

}
$blogTomka = new blog('localhost', 'root', 'root', 'Blog3');
$blogTomka -> pokaz();
$action=$_GET['action'];

switch ($action)
{
  case 'usun':
  $blogTomka -> usun(50);
  break;
}


// // $blogTomka -> dodaj ('2001-12-12','readmore', 'intro',  '2', 'title');
// $blogTomka -> usun(50);



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
<a href="index.php?action=usun&id=50">usun</a>

</body>
</html>