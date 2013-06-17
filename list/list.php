<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>


<script>
function validate()
{
    var x=document.getElementById("NewTaskInput");

    console.log("value of x is " + x.value);

    if(x.value==""||isNaN(x.value))
    {
	alert("Not Numeric");
    }
    //document.write("<p> "+ "foo" + "</p>");
}
</script>

<?php
$db = new mysqli("localhost", "root", "new123", "checklist");

 // check DB connection
if ($db->connect_error)
{
    echo "Connect Error {$db->connect_errno} {$db->connect_error} ";
}


if (!empty($_POST['NewTask']))
{
    echo "Adding new task {$_POST['NewTask']}";
    $query = "INSERT INTO tasks VALUES ('".$_POST['NewTask']."',NULL, NULL, NULL , NULL) ";
    echo $query;
    if (!$db->query($query))
    {
        echo "Insert failed". $db->error; 
    }
    else
    {
         //printf("New Record has id %d.\n", $db->insert_id);
    } 
}
?>



<h4>List of things to do</h4>
<ul>

<?php
$sql = "SELECT * FROM tasks";

if (($result = $db->query($sql))==FALSE)
{
    die($db->error); 
}
?>

<?php 
while ($row = $result->fetch_assoc()) {  ?>
    <li> <?php echo $row['name']; ?> </li>
<?php } ?>



</ul>




<form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Add new task: <input type="text" name="NewTask" ><br>
<input type="submit" value="Submit">
</form> 

<!--
<button type="button" onclick='validate()'>Add Item</button>
<form id="NewTask">
<input type="text" id="NewTaskInput" name="taskname"><br>
</form>
 -->

</body>
</html>

