<?php

include("db.php");

if(isset($_POST['btn_cust']))
{
    $selectbranch=$_POST['selectbranch'];
     $selectdate=$_POST['selectdate'];
    // search in all table columns
    // using concat mysql function
    $query = "CALL getCust('$selectbranch','$selectdate')";
    $search_result = $result=mysqli_query($con,$query);
    
}
 else {
    $query = "CALL getAllCust()";
    $search_result = $result=mysqli_query($con,$query);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="test.php" method="post">
        <label style="font-size:18px;" for="selectbranch">Filter by Branch:</label>
<select class="input-lg" style="font-size:18px; width:200px" name="selectbranch" id="selectbranch" action="filterbranch">  
<option value="all">All</option>
  <option value="BGM05">Kuala Lumpur</option>  
  <option value="BKT03">Kuantan</option>  
  <option value="BPG02">Pagoh</option>
</select>

<label  style="font-size:18px;" for="selectbranch">Date:</label>
<select class="input-lg" style="font-size:18px; width:200px" name="selectdate" id="selectdate" action="filterdate">  
<option value="all">All</option>}  
  <option value="2020-06-01">01/06/2020</option>
  <option value="2020-06-02">02/06/2020</option>  
  <option value="2020-06-03">03/06/2020</option>
  <option value="2020-06-04">04/06/2020</option>
  <option value="2020-06-05">05/06/2020</option>
  <option value="2020-06-06">06/06/2020</option>
  <option value="2020-06-07">07/06/2020</option>
</select>

<button class="btn btn-success " type="submit" name="btn_cust" id="btn_cust" style="font-size:18px" value="submit">Filter</button><br><br>
            
            <table>
                <tr>
                <th>Invoice No</th>
                <th>Customer ID</th>
                <th>First Name</th>
				<th>Last Name</th>
                <th>Date</th>
                <th>Branch</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['invno'];?></td>
                    <td><?php echo $row['custid'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['dateservice'];?></td>
                    <td><?php echo $row['city'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>