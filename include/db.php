<?php
$servername='localhost';
$username='root';
$passwd='';
$dbname='db_matrimony';
$conn=mysqli_connect($servername,$username,$passwd,$dbname) or 	die('Could not connect: '.mysqli_error());
if(!$conn)
{
 echo 'Could not connect:';
}

?>