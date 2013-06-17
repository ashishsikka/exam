<html>
<head>
<?php
require_once('db_login.php');

?>

<title>
<?php

//  Print the window title and the top most body heading.

$doc_title = 'Category Administration';
echo "$doc_title\n";
?>
</title>
</head>
<body>
<h1>
<?php
echo "$doc_title\n";
?>
</h1>

<?php

   /**************************************
   ** Add Category Record Input Section **
   **************************************/

// extract values from $_REQUEST
$Cat_ID = $_REQUEST['Cat_ID'];
$Cat_Title = $_REQUEST['Cat_Title'];
$Cat_Desc = $_REQUEST['Cat_Desc'];
$add_record = $_REQUEST['add_record'];

//  Determine the length of each input field
$len_cat_id = strlen($Cat_ID);
$len_cat_tl = strlen($Cat_Title);
$len_cat_de = strlen($Cat_Desc);

//  Validate and insert if the form script has been
//  called by the Add Category button.
if ($add_record == 1) {
    if (($len_cat_id > 0) and ($len_cat_tl > 0) and ($len_cat_de > 0)){
        $sql  = "insert into categories (category_id, title, description)";
        $sql .= " values ('$Cat_ID', '$Cat_Title', '$Cat_Desc')";
        $result = $db->query($sql);
        $db->commit();
    } else {
    echo "<p>Please make sure all fields are filled in ";
    echo "and try again.</p>\n";
    }
}


   /**************************************
   ** List Categories Reporting Section **
   **************************************/

//  Query all records in the table after any
//  insertion that may have occurred above.

$sql = "select * from categories";
$result = $db->query($sql);
?>

<form method="POST" action="admin.php">

<table>
<tr><th bgcolor="#EEEEEE">Cat ID</th>
    <th bgcolor="#EEEEEE">Title</th>
    <th bgcolor="#EEEEEE">Description</th>
</tr>

<?php
//  Display any records fetched from the database
//  plus an input line for a new category.

while ($row = $result->fetchRow()){
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>\n";
}
?>

<tr><td><input type="text" name="Cat_ID"    size="15" maxlength="10"></td>
    <td><input type="text" name="Cat_Title" size="40" maxlength="128"></td>
    <td><input type="text" name="Cat_Desc"  size="45" maxlength="255"></td>
</tr>
</table>
<input type="hidden" name="add_record" value="1">
<input type="submit" name="submit" value="Add Category">
</body>
</html>
