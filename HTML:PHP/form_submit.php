
<?php

$link = mysqli_connect("sql9.freemysqlhosting.net", "sql9313593", "IQvP9FNPv6", "sql9313593");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$Message = mysqli_real_escape_string($link, $_REQUEST['Message']);
$BNID = mysqli_real_escape_string($link, $_REQUEST['BNID']);
 
// Attempt insert query execution
$sql = "INSERT INTO contactus (name, BNID, Message) VALUES ('$name', '$BNID', '$Message')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>