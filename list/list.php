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


if (!empty($_POST['name']))
{
    echo "Adding new task {$_POST['NewTask']}";
    echo "Owner is {$_POST['owner']}";
    echo "Priority is {$_POST['priority']}";
    echo "Due date is {$_POST['due']}";        
    $query = "INSERT INTO tasks VALUES ('".$_POST['name']."','{$_POST['owner']}', '{$_POST['priority']}', '{$_POST['due']}' , NULL) ";
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


<?php
$sql = "SELECT * FROM tasks";

if (($result = $db->query($sql))==FALSE)
{
    die($db->error); 
}
?>
<table border="1">
    <tr>                                       
    <td> <b> name </b> </td>     <td> <b> owner </b> </td>    <td> <b> priority </b> </td>    <td> <b> due date </b> </td>    <td> <b> created </b> </td>
    
    <tr>
    
<?php 
while ($row = $result->fetch_assoc()) {  ?>
    <tr>                                         
    <td> <?php echo $row['name']; ?> </td>
    <td> <?php echo $row['owner']; ?> </td> 
    <td> <?php echo $row['priority']; ?> </td>
    <td> <?php echo $row['due']; ?> </td>
    <td> <?php echo $row['created']; ?> </td>                                         
    <tr>                                         
<?php } ?>

</table>

</br>
</br>


<form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Add new task: </br>
<table>
<tr>
    <td> Name</td>
    <td>
    <input type="text" name="name" >
    </td>
</tr>
    <tr>
    <td> Owner</td>
    <td>
    <input type="text" name="owner" >
    </td>
</tr>
<tr>
    <td> Priority</td>
    <td>
    <input type="text" name="priority" >
    </td>
</tr>
<tr>
    <td> Due Date</td>
    <td>
    <input type="text" name="due" >
    </td>
</tr>

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

