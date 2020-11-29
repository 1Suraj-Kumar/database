<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<form method = post>
Enter Employee ID <input type = text name = eid>
<br>
Enter Employee Name <input type = text name = ename>
<br>
Enter Employee Salary <input type = text name = esalary>
<br>
<input type = submit value = "Save" class = 'btn btn-primary' name = "save">
<input type = submit value = "Modify" class = 'btn btn-danger' name = "modify">
<input type = submit value = "Remove" name = "remove">
<input type = submit value = "Search" name = "search">
</form>
<?php 
include "2dbconfigure.php";
if(isset($_POST['save']))
{
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$esalary = $_POST['esalary'];

$query = "insert into employee values($eid,'$ename','$esalary')";
$n = my_iud($query);
echo "$n Record Saved";
}

if(isset($_POST['modify']))
{
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$esalary = $_POST['esalary'];

$query = "update employee set ename='$ename',esalary='$esalary' where eid=$eid";
$n = my_iud($query);
echo "$n Record Modified";
}

if(isset($_POST['remove']))
{
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$esalary = $_POST['esalary'];

$query = "delete from employee where eid=$eid";
$n = my_iud($query);
echo "$n Record Removed";
}


if(isset($_POST['search']))
{
$eid = $_POST['eid'];
$ename = $_POST['ename'];
$esalary = $_POST['esalary'];
//* all
$query = "select * from employee";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
echo "$n Record Found";
/*while($row = mysqli_fetch_array($rs,MYSQLI_NUM))
{
echo "<hr>Emp ID is $row[0]";
echo "<br>Emp Name is $row[1]";
echo "<br>Emp Salary is $row[2]";

}*/

echo "<br><table class='table table-hover table-dark'>";
echo "<tr>";
echo "<th>EmpID</th>";
echo "<th>EmpName</th>";
echo "<th>EmpSalary</th>";
echo "</tr>";
while($row = mysqli_fetch_array($rs,MYSQLI_NUM))
{
echo "<tr>";
echo "<td>$row[0]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "</tr>";
}
echo "</table>";
}
?>