<?php

include("db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$packid=$_GET['packid'];

/*this is delet quer*/
mysqli_query($con,"delete from package where packid='$packid'")or die("query is incorrect...");
}
?>

<?php

include("db.php");

if(isset($_POST['btn_save']))
{
	$packid=$_POST['packid'];
	$packagename=$_POST['packagename'];
	$description=$_POST['description'];
	$price=$_POST['price'];

mysqli_query($con,"insert into package(packid,packagename,description,price values ('$packid','$packagename','$description','$price')") 
			or die ("Query 1 is inncorrect........");
mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<script src="style/js/jquery.min.js"></script>
</head>
<body>

<div class="container-fluid">

<?php include("include/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
    <h1>Package </h1></div><br>

<br><br>
<div></div>
<div>
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>Package ID</th>
				<th>Package Name</th>
				<th>Description</th>
                <th>Price</th>
                <th><a href="add_package.php">Add New</a></th>
	</tr>	
<?php 
$result=mysqli_query($con,"select packid, packagename, description, price from package")or die ("query 2 incorrect.......");


while(list($packid,$packagename,$description,$price)=
mysqli_fetch_array($result))
{
echo "<tr><td>$packid</td><td>$packagename</td><td>$description</td><td>RM $price</td>";

echo"<td>
<a href='edit_package.php?packid=$packid'>Edit</a>
<a href='package.php?packid=$packid&action=delete'>Delete</a>
</td></tr>";
}
mysqli_close($con);
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>

