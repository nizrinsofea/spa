<?php

include("db.php");

if(isset($_POST['btn_cust']))
{
    $selectpack=$_POST['selectpack'];

    // search in all table columns
    // using concat mysql function
    $query = "CALL getCustByPack('$selectpack')";
    $search_result = $result=mysqli_query($con,$query);
    
}

else
{
    $search_result = $result=mysqli_query($con,"CALL getAllCustByPack()");
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
    <h1>Customer </h1></div><br>

<br><br>
<div></div>
<div>



<form action="customer.php" name="form" method="post">

<label style="font-size:18px;" for="selectbranch">Filter by Package:</label>
<select class="input-lg" style="font-size:18px; width:200px" name="selectpack" id="selectpack">
<!-- <?php 
include("db.php");
$sql = mysqli_query($con, "SELECT packid, packagename FROM package");
while ($row = $sql->fetch_assoc()){
echo "<option value='".$row['packid']."'>" . $row['packagename'] . "</option>";
}
?> -->

  <option value="PM001|52.00|Manicure">Manicure</option>
  <option value="PP002|62.00|Pedicure">Pedicure</option>  
  <option value="PF003|135.00|Signature Facial">Signature Facial</option>
  <option value="PM004|128.00|Massage">Massage</option>
  <option value="PH005|200.00|Hair">Hair</option>
  <option value="PU006|62.00|Acne Treatment">Acne Treatment</option>
  <option value="PL007|36.00|Lips">Lips</option>
  <option value="PB008|55.00|Brows">Brows</option>
  <option value="PE009|48.00|Lashes">Lashes</option>
  <option value="PD010|155.00|Ultimate Facial">Ultimate Facial</option>

</select> 

<button class="btn btn-success " type="submit" name="btn_cust" id="btn_cust" style="font-size:18px" value="submit">Filter</button>
<button class="btn btn-success " type="submit" name="btn_all" id="btn_all" style="font-size:18px" value="submit">Show all</button>
<br>

</form>

<br>

<?php

include("db.php");

if(isset($_POST['btn_cust']))
{
    $result = $_POST['selectpack'];
    $result_explode = explode('|', $result);

 //   $sql=mysqli_query($con,"SELECT `pkg_disc2`(160) AS `pkg_disc2`");
    // $discount=mysqli_query($con,"CALL pkg_disc('$result_explode[0]')");
    $percent = getDiscount($result_explode[1])*100;
    $discount = number_format((float)calcDiscount($result_explode[1],$percent/100), 2, '.', '');

     echo "<h3>Package #$result_explode[0]: $result_explode[2] </h3>";
     echo "<h3>Initial price:  $result_explode[1]</h3>";
     echo "<h3>Price after $percent% discount: $discount </h3>";
}
?>

<?php
function getDiscount($price) {
    if ($price >= 150)
         $dis = 0.15;
    else
        $dis = 0.05;

    return $dis;
}
?>

<?php
function calcDiscount($price,$disc) {
     return $price - ($disc*$price);;
}
?>

<br>

<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
                <th>Date</th>
                <th>First Name</th>
				<th>Last Name</th>
                <th>Package</th>
                <th>Branch</th>
    </tr>

    <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['dateservice'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['packagename'];?></td>
                    <td><?php echo $row['city'];?></td>
                </tr>
                <?php endwhile;?>


</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>