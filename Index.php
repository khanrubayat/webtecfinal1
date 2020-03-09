<?php
//including the database connection file
include_once("DBCon.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Product ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="ProductForm.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Id</td>
            <td>Name</td>
            <td>Description</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['description']."</td>";
             echo "<td>".$res['quality']."</td>";     
            echo "<td><a href=\"Edit.php?id=$res[id]\">Edit</a> | <a href=\"Delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>