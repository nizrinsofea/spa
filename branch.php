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
    <h1>Branch </h1></div><br>

<br><br>
<div></div>
<div>
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
                <th>Branch ID</th>
                <th>Street</th>
				<th>City</th>
                <th>Phone No</th>
	</tr>	
<?php 
include("db.php");
$result=mysqli_query($con,"select branchid, street, city, phoneno from branch")or die ("query 2 incorrect.......");

while(list($branchid,$street,$city,$phoneno)=
mysqli_fetch_array($result))
{
echo "<tr><td>$branchid</td><td>$street</td><td>$city</td><td>$phoneno</td></tr>";
}
mysqli_close($con);
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>

