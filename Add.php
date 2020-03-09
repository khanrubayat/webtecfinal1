<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("DBCon.php");
 
if(isset($_POST['Submit'])) {    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quality = $_POST['quality'];
        
    // checking empty fields
    if(empty($id)||empty($name) || empty($des) || empty($quantity)) {


if(empty($id)) {
            echo "<font color='red'>Id field is empty.</font><br/>";
        }

        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>description field is empty.</font><br/>";
        }
        
        if(empty($quality)) {
            echo "<font color='red'>qauntity field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO products(id,name,description,quality) VALUES('$id','$name','$description','$quality')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>