<?php

include("db.php");

if(isset($_POST['btn_save']))
{
$packid=$_POST['packid'];
$packagename=$_POST['packagename'];
$description=$_POST['description'];
$price=$_POST['price'];

mysqli_query($con,"insert into package(packid,packagename,description,price) values ('$packid','$packagename','$description','$price')") 
			or die ("Query 1 is inncorrect........");
header("location: package.php"); 
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

  <div class="col-sm-9 " align="center">	
  <div class="panel-heading" style="background-color:#c4e17f;">
	<h1>Add Package  </h1></div><br>
	
<form action="add_package.php" name="form" method="post">
<div class="col-sm-6">
    <input name="packid" class="input-lg" type="text"  id="packid" style="font-size:18px; width:330px" placeholder="Package ID" autofocus required><br><br>
</div>
<div class="col-sm-6">
<input name="packagename" class="input-lg" type="text"  id="packagename" style="font-size:18px; width:330px" placeholder="Package Name" autofocus required><br><br>
    </div>
    <div class="col-sm-6">
    <input name="description" class="input-lg" type="text"  id="description" style="font-size:18px; width:330px" placeholder="Description" autofocus required><br><br>
    </div>
    <div class="col-sm-6">
<input name="price" class="input-lg" type="text"  id="price" style="font-size:18px; width:330px"  placeholder="Price" required><br><br>
    </div>
    
<div class="col-sm-7" style="margin:20px;margin-left:90px;">
    <button type="submit" class="btn btn-success btn-block center" name="btn_save" id="btn_save" style="font-size:18px">Submit</button></div>
</form>
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>