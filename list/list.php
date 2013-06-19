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

function today()
{
    return date("Y-m-d");
}
     
$db = new mysqli("localhost", "root", "new123", "checklist");

 // check DB connection
if ($db->connect_error)
{
    echo "Connect Error {$db->connect_errno} {$db->connect_error} ";
}


if (!empty($_POST['name']))
{
    echo "Adding new task";
    echo "Owner is {$_POST['owner']}";
    echo "Priority is {$_POST['priority']}";
    echo "Due date is {$_POST['due']}";
    $createdate=today();
    echo "Created date is {$createdate}";
    $query = "INSERT INTO tasks VALUES ('{$_POST['name']}','{$_POST['owner']}', '{$_POST['priority']}', '{$_POST['due']}' , '$createdate' ) ";
    echo $query;
    if (!$db->query($query))
    {
        echo "Insert failed". $db->error;
        $failed=true;
        $NameError="Duplicate task name";
    }
    else
    {
         printf("New Record has id %d.\n", $db->insert_id);
         $failed=false;
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
    <input type="text" name="name" value=<?php echo $failed?$_POST['name']:"" ?> >
    </td>
    <td style="color:rgb(255,0,0)">
         <?php echo $failed?$NameError:"" ?>
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

