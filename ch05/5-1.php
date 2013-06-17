$ages = array('Person'  => 'Age',
              'Fred'    => 35,
              'Barney'  => 30,
	      'Tigger'  => 8,
	      'Pooh'    => 40);

//start table and print heading
reset($ages);
list($c1,$c2) = each($ages);
echo("<table><tr><th>$c1</th><th>$c2</th></tr>\n");

//print the rest of the values
while (list($c1,$c2) = each($ages)) {
  echo("<tr><td>$c1</td><td>$c2</td></tr>\n");
}

//end the table
echo("</table>");
