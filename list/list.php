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
   if (!empty($_POST['NewTask'])) {
       echo "Adding new task {$_POST['NewTask']}";
} ?>

<h4>List of things to do</h4>
<ul>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
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
