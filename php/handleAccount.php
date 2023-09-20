<?php //insert an item into the character
if(!session_id()) session_start();
include("./DBConnect.php");
$username="";
$newPass="";
$newPassConf="";
$valid=true;

//validate user and password information
if(isset($_POST['chngUsrBtn']) || isset($_POST['newUsrBtn'])){
        //if username is empty
        if(!isset($_POST['username']) || strcmp(validate($_POST['username']), "")==0){
                goBack("Username was not set");
        }
        $username = validate($_POST['username']);

        //if username is unchanged
        if(isset($_SESSION['Username']) && strcmp($username, $_SESSION['Username']) == 0){
                goBack("Username unchanged");
        }

        //if username is dupe
        $sql = "
        select * from account
        where Username = \"{$username}\";
        ";
        $accountSearch = mysqli_fetch_all(query($sql), MYSQLI_ASSOC);
        if(sizeof($accountSearch) != 0){
                goBack("That user already exists");
        }
}
if(isset($_POST['chngPassBtn']) || isset($_POST['newUsrBtn'])){
        //blank passwords
        if(!isset($_POST['password']) || strcmp("", validate($_POST['password'])==0)){
                goBack("Password cannot be blank");
        }
        $newPass = validate($_POST['password']);
        $newPassConf = validate($_POST['passwordConf']);

        //non matching passwords
        if(strcmp($newPass, $newPassConf) != 0){
                goBack("Passwords didn't match");
        }
}


//insert/update the data into database
if($valid){
        if(isset($_POST['newUsrBtn'])){
                $sql = "
                INSERT INTO `dndd`.`account`
                (`Username`,
                `Password`,
                `isAdmin`)
                VALUES(
                \"$username\",
                \"$newPass\",
                0);
                ";
                query($sql);
                goBack("Account created");
        }else{
                $sql = "UPDATE `dndd`.`account` SET\n";
                if(isset($_POST['chngUsrBtn'])){
                        $sql = $sql . "`Username` = \"{$username}\"\n";
                        $_SESSION['Username'] = $username;
                }
                if(isset($_POST['chngPassBtn'])){
                        $sql = $sql . "`Password` = \"{$newPass}\"\n";
                }
                $sql = $sql . "WHERE `idAccount` = {$_SESSION['userID']};";

                query($sql);
                goBack("Account updated");
        }
}


function goBack(String $reason){
        global $valid;
        $valid = false;
        $_SESSION['reason']=$reason;
        header("Location: ../account.php");
}
?>