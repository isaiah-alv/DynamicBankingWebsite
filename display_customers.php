<?php
define("IN_CODE", 1);
include "dbconfig.php";
 
$con = mysqli_connect($host, $username, $password, $dbname) 
      or die("<br>Cannot connect to DB:$dbname on $host, error: ".mysqli_connect_error());
 
$sql="select * from CPS3740.Customers";
$result = mysqli_query($con, $sql); 
 
echo "<br>The following customers are in the bank system:\n";
 
if ($result) {
	if (mysqli_num_rows($result)>0) {
		echo "<TABLE border=1>\n";
		echo "<TR><TH>ID<TH>login<TH>password<TH>Name<TH>Gender<TH>DOB<TH>Street<TH>City<TH>State<TH>Zipcode";
	    while($row = mysqli_fetch_array($result)){
	    	$id = $row["id"];
	    	$login = $row["login"];
	    	$password = $row["password"];
	    	$name = $row["name"];
	    	$gender = $row["gender"];
	    	$dob = $row["DOB"];
	    	$street = $row["street"];
	    	$city = $row["city"];
			$state = $row["state"];
			$zipcode = $row["zipcode"];
        echo "<TR><TD>$id<TD>$login<TD>$password<TD>$name<TD>$gender<TD>$dob<TD>$street<TD>$city<TD>$state<TD>$zipcode";
	    }
	    echo "</TABLE>\n";
	}
	else
		echo "<br>No record found\n";
}
else {
  echo "Something is wrong with SQL:" . mysqli_error($con);	
}
mysqli_free_result($result);
mysqli_close($con);

?>
