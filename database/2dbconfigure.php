<?php 
$dbserver = "127.0.0.1";//localhost
$dbuser = "root";
$dbpwd = "";
$dbname = "mydb555";
/* for old versions
$cid = mysql_connect($dbserver,$dbuser,$dbpwd) or die("Connection Failed");

mysql_select_db($dbname,$cid);

mysql_query("insert into employee values(3,'pqr','25000')",$cid);

$n = mysql_affected_rows($cid);
echo "<br>$n Record Saved";*/

function my_iud($query)//insert , update , delete 
{
global $dbserver,$dbuser,$dbpwd,$dbname; 
$cid = mysqli_connect($dbserver,$dbuser,$dbpwd) or die("Connection Failed");

mysqli_select_db($cid,$dbname);

mysqli_query($cid,$query);

$n = mysqli_affected_rows($cid);
return $n;
}


function my_select($query)//select 
{
global $dbserver,$dbuser,$dbpwd,$dbname; 
$cid = mysqli_connect($dbserver,$dbuser,$dbpwd) or die("Connection Failed");

mysqli_select_db($cid,$dbname);

$rs = mysqli_query($cid,$query);
return $rs;
}
?>