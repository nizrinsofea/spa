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
<link href="style/css/k.css" rel="stylesheet">
<script src="style/js/jquery.min.js"></script>
</head>
<body>
   	<div class="container-fluid main-container">
	<?php include("include/side_bar.php");?>

    
	<div class="col-md-9 content" align="center">  
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Increase Salary</h1></div><br>

<form action="updateSal.php" name="form" method="post" enctype="multipart/form-data">
<!-- <input type="hidden" name="position" id="position" value="<?php echo $position;?>" />
<input type="hidden" name="increment" id="increment" value="<?php echo $increment;?>" /> -->

<div class="col-sm-7 ">  
<label style="font-size:18px;">Position</label><br>
<select class="input-lg"  style="font-size:18px; width:200px" name="position" id="position">
    <option value="Manager">Manager</option>
    <option value="Hair Stylist">Hair Stylist</option>
    <option value="Spa Attendant">Spa Attendant</option>
	<option value="Nail Technician">Nail Technician</option>
	<option value="Masseur">Masseur</option>
	<option value="Aesthetician">Aesthetician</option>
</select>
</div>
<br><br>

<div class="col-sm-7 ">
    <label style="font-size:18px;">%</label><br>
    <input class="input-lg" style="font-size:18px; width:200px" name="increment" type="number"  id="increment" value="<?php echo $increment;?>"><br><br>
    </div>

    <div class="col-sm-7">
        <button type="submit" class="btn btn-success " name="btn_sal" id="btn_sal" style="font-size:18px">Update</button></div>
</form>
</div></div>
<?php include("include/js.php");?>
</body>
</html>