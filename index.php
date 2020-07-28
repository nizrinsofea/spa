<?php

include("db.php");

if(isset($_POST['btn_tot']))
{
    $custid=$_POST['custid'];
    $dateservice=$_POST['dateservice'];

    $query = "CALL getCustomer('$custid','$dateservice')";
    $query2 = "CALL total_price('$custid','$dateservice')";
    $search_result = $result=mysqli_query($con,$query);
    $search_result2 = $result=mysqli_query($con,$query2);
    
}

else
{}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<script src="style/js/jquery.min.js"></script>
<style>
    table, tr, td, .receipt {
        border: 0px solid black;
        padding: 5px;
        font-size: 20px;
        padding-left: 50px;
    }

    .left {
        padding-right: 10px;
        text-align: right;
    }

    .right {
        padding-left: 30px;
        text-align: left;
    }

    th {
        border-bottom: 1px solid black;
    }
</style>

</head>
<body>

<div class="container-fluid">

<?php include("include/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
    <h1>Invoice</h1></div><br>

<br><br>
<div></div>
<div>

<form action="index.php" name="form" method="post">
    <label style="font-size:18px;">Customer ID: </label>
    <input class="input-lg" style="font-size:18px; width:200px" name="custid" type="text"  id="custid" placeholder="C0006"> 
    
    <label  style="font-size:18px;" for="dateservice">Date:</label>
    <select class="input-lg" style="font-size:18px; width:200px" name="dateservice" id="dateservice" >  
        <option value="2020-06-01">01/06/2020</option>
        <option value="2020-06-02">02/06/2020</option>  
        <option value="2020-06-03">03/06/2020</option>
        <option value="2020-06-04">04/06/2020</option>
        <option value="2020-06-05">05/06/2020</option>
        <option value="2020-06-06">06/06/2020</option>
        <option value="2020-06-07">07/06/2020</option>
    </select>

    <button style="font-size:18px;" type="submit" class="btn btn-success " name="btn_tot" id="btn_tot" >Select</button></div>

</form>

<br><br>

<table class="receipt">
	
<?php 
include("db.php");

if(isset($_POST['btn_tot']))
{
	$custid=$_POST['custid'];
	$dateservice=$_POST['dateservice'];

$result = mysqli_query($con,"CALL getCustomer('$custid','$dateservice')")or die ("Query 1 is inncorrect........");

while(list($custid,$fname,$lname,$membership,$dateservice)=
mysqli_fetch_array($result))
{
    $newdate = date("d-m-Y", strtotime($dateservice));

    echo "<tr><td>Date: </td><td>$newdate</td></tr>";
    echo "<tr><td>Customer ID: </td><td>$custid</td></tr>";
    echo "<tr><td>Name: </td><td>$fname $lname</td></tr>";
    echo "<tr><td>Membership: </td><td>$membership</td></tr>";

}

mysqli_close($con);
}
?>
</table>
<br><br>
<table class="receipt">
<tr><th class='left'>Invoice No</th><th class='left'>Package</th><th class='right'>Price</th></tr>

<?php 
include("db.php");

if(isset($_POST['btn_tot']))
{
	$custid=$_POST['custid'];
	$dateservice=$_POST['dateservice'];

$result2 = mysqli_query($con,"CALL totalPrice('$custid','$dateservice')")or die ("Query 2 is inncorrect........");
$subtotal = 0;
while(list($invno,$packagename,$price,$membership)=
mysqli_fetch_array($result2))
{
    $disc = isMember($membership);
    $subtotal = number_format((float)$subtotal + $price, 2, '.', '');
    $discount = number_format((float)$disc * $subtotal, 2, '.', '');
    $total =  number_format((float)$subtotal - $discount, 2, '.', '');
    $percent = $disc * 100;

    echo "<tr><td class='left'>$invno</td><td class='left'>$packagename</td><td class='right'>RM $price</td></tr>";
}
    echo "<tr><td></td><td class='left'></td><td></td></tr>";
    echo "<tr><td></td><td class='left'></td><td></td></tr>";
    echo "<tr><td></td><td class='left'>Subtotal: </td><td class='right'>RM $subtotal</td></tr>";
    echo "<tr><td></td><td class='left'>Discount ($percent%): </td><td class='right'>RM $discount</td></tr>";
    echo "<tr><td></td><td class='left'>Total: </td><td class='right'>RM $total</td></tr>";

mysqli_close($con);
}
?>

</table>

<?php
function isMember($membership) {
    if ($membership == 'Y')
        return 0.1;

    else
        return 0;
}
?>

</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>