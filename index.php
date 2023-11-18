<!--

All the basic default methods or lines will be explained in this file only

-->

<?  /*these includes are normally referencing Database files that run before
    the file to set up variables, functions, or ensure the user is allowed
    to be on the page*/
include "login.php"
?>
<?php
//this line ensures a session is running
//the session stores variables like user sign in information
//character selected, and other similar items
if(!session_id()) session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>D&amp;DPST login</title>
    </head>
    <!--
        This places the template header at the start
        this includes the JS for the functionality and
        some other important information
    -->
    <?php include("header.php");?>
    <body>
        <main class="addPadding">
            <h3>Welcome!</h3>
            Here 
        </main>
        <form class="addPadding" method="POST" action="./php/login.php">
            <fieldset id="login">
                <legend>Sign in</legend>
                <!--Make the input line up properly-->
                <table class="login">
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" name="username" id="username"<?= isset($_SESSION["Username"]) ? "value='{$_SESSION['Username']}'" : ""?>></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><button type="submit" value="Log in">Log in</button></td>
                        <td>
                            <p style="color: red;">
                            <?php
                                //this will print an error message for why sign in failed
                                if(isset($_SESSION['reason'])){
                                    echo $_SESSION['reason'];
                                    unset($_SESSION['reason']);
                                }
                            ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>