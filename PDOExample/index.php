<?php

$host = 'localhost';
$user = 'root';
$password ='Root@123';
$dbname  ='pdoposts';

/* set DSN */
 $dsn = 'mysql:host=' . $host .';dbname='. $dbname ;

 /*create the instance of PDO */
 $pdo = new PDO($dsn, $user, $password ,$option);

 /* PDO qurey */

 $stmt =$pdo->query('SELECT * FROM posts');

//  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
//  {
//      echo $row['title'] . '<br>' ;
//  }

while($row = $stmt->fetch(PDO::FETCH_OBJ))
 {
     echo $row->title . '<br>';
 }