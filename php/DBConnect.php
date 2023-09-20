<?php
/*
This is the required code for connecting to the Database
call this with include before querying the DB
*/

/**
 * servername - the IP of the server
 * DBUsername - log in username for the database
 * DBPassword - password that accompanies the username
 * dbname - the schema you wish to query
 */
$servername = "localhost";
$DBUsername = "root";
$DBPassword = "abcd1110";
$dbname = "rerecipes";



function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * @String sql - The SQL query you want to send to the database
 */
function query(String $sql):bool | mysqli_result{
    global $servername, $DBUsername, $DBPassword, $dbname;
    $conn = new mysqli($servername, $DBUsername, $DBPassword, $dbname);

    if($conn->connect_error) 
        die("connection failed: " . $conn->connect_error);
    $result = $conn->query($sql); 
    $conn->close();
    return $result;
}
?>