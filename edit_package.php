<?php

include("db.php");
$packid=$_REQUEST['packid'];

$result=mysqli_query($con,"select packid, packagename, description, price from package where packid='$packid'")or die ("query 1 incorrect.......");

list($packid,$packagename,$description,$price)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$packagename=$_POST['packagename'];
$description=$_POST['description'];
$price=$_POST['price'];

mysqli_query($con,"update package set packagename='$packagename', description='$description', price='$price' where packid='$packid'") or die("Query 2 is inncorrect..........");

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
   	<div class="container-fluid main-container">
	<?php include("include/side_bar.php");?>
    
	<div class="col-md-9 content" align="center">  
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Edit Package Details </h1></div><br>
<form action="edit_package.php" name="form" method="post" enctype="multipart/form-data">
<input type="hidden" name="packid" id="packid" value="<?php echo $packid;?>" />


<div class="col-sm-7 ">
    <label style="font-size:18px;">Name</label><br>
    <input class="input-lg" style="font-size:18px; width:200px" name="packagename" type="text"  id="packagename" value="<?php echo $packagename; ?>" autofocus><br><br>
    </div>

<div class="col-sm-7 ">
<label style="font-size:18px;">Description</label><br>
<input class="input-lg" style="font-size:18px; width:200px" name="description" type="text"  id="description" value="<?php echo $description; ?>">
    <br><br></div>

    <div class="col-sm-7 ">
    <label style="font-size:18px;">Price</label><br>
    <input class="input-lg" style="font-size:18px; width:200px" name="price" type="text"  id="price" value="<?php echo $price; ?>" autofocus><br><br>
    </div>

    <div class="col-sm-7">
        <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">Submit</button></div>
</form>
</div></div>
<?php include("include/js.php");?>
</body>
</html>