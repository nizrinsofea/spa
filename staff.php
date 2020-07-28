<?php

include("db.php");

if(isset($_POST['btn_sal'])) 
{
   $position=$_POST['position'];
    $increment=$_POST['increment'];

mysqli_query($con,"CALL increaseSal('$position',$increment)") or die("Query 2 is inncorrect..........");

header("location: staff.php");
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
	<h1>Staff </h1></div><br>

	<br><br>

<div>


<form action="staff.php" name="form" method="post">
<label style="font-size:18px;">Increase Salary: </label>
<select class="input-lg" style="font-size:18px; width:200px" name="position" id="position">
	<option value="">Position</option>
	<option value="Manager">Manager</option>
    <option value="Hair Stylist">Hair Stylist</option>
    <option value="Spa Attendant">Spa Attendant</option>
	<option value="Nail Technician">Nail Technician</option>
	<option value="Masseur">Masseur</option>
	<option value="Aesthetician">Aesthetician</option>
</select>

    <label style="font-size:18px;">%: </label>
    <input class="input-lg" style="font-size:18px; width:200px" name="increment" type="number"  id="increment" value="<?php echo $increment;?>"> 
    <button style="font-size:18px;" type="submit" class="btn btn-success " name="btn_sal" id="btn_sal" >Update</button></div>
</form>
<br><br>
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>Staff ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Position</th>
				<th>Salary</th>
                <th>Branch</th>
	</tr>	
<?php 
$result=mysqli_query($con,"select staffid, fname, lname, position, salary, branchid from staff")or die ("query 2 incorrect.......");

while(list($staffid,$fname,$lname,$position,$salary,$branchid)=
mysqli_fetch_array($result))
{
echo "<tr><td>$staffid</td><td>$fname</td><td>$lname</td><td>$position</td><td>$salary</td><td>$branchid</td>";

}
mysqli_close($con);
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>

