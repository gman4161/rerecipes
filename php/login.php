<?php //log into the website
    if(!session_id()) session_start();
    include "DBConnect.php";
    if(!isset($_SESSION['reason'])) $_SESSION['reason']="";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $uname = validate($_POST['username']);
        $pass = validate($_POST['password']);
        if (empty($uname)) {
            //echo "<script> alert('Enter a username');</script>";
            goBack("Username was empty");
        }else if(empty($pass)){
            //echo "<script> alert('Enter a password');</script>";
            goBack("Password was blank");
        }else{
            $sql = "SELECT * FROM account WHERE Username='$uname' AND Password='$pass'";
            $result = query($sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['Username'] === $uname && $row['Password'] === $pass) {
                    echo "Logged in!";
                    $_SESSION['Username'] = $row['Username'];
                    $_SESSION['userID'] = $row['idAccount'];    
                    header("Location: ../chooseChar.php");
                    exit();
                }else{
                    //echo "<script> alert('Incorect User name or password');</script>";
                    goBack("Incorrect username or password");
                }
            }else{
                //echo "<script> alert('Incorect User name or password');</script>";
                goBack("Incorrect username or password");
            }
        }
    }else{
        goBack();
    }
    function goBack($errorString=""){
        $_SESSION['reason'] =$errorString;
        header("Location: ../index.php");
        exit();
    }
?>