<?php
// including the database connection file
include_once("DBCon.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $description=$_POST['description'];
    $quality=$_POST['quality'];    
    
     if(empty($id) || empty($name) || empty($description)||empty($quality)) {                
        if(empty($id)) {
            echo "<font color='red'>Id field is empty.</font><br/>";
        }
        
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        }
        if(empty($quality)) {
            echo "<font color='red'>Quality field is empty.</font><br/>";
        }
      
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Product SET id='$id',name='$name',description='$description' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Product WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $id = $res['id'];
    $name = $res['name'];
    $description = $res['description'];
    $quality=$res['quality'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="Edit.php">
        <table border="0">
            <tr> 
                <td>Id</td>
                <td><input type="text" name="id" value="<?php echo $id;?>"></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr> 
                <td>Quality</td>
                <td><input type="text" name="quality" value="<?php echo $quality;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>