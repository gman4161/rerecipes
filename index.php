<!--

All the basic default methods or lines will be explained in this file only

-->

<?  /*these includes are normally referencing Database files that run before
    the file to set up variables, functions, or ensure the user is allowed
    to be on the page*/
include "login.php"
?>
<?php $longtext = "Simply a test of how long i can make this line because the line needs to be really long for me to see what is going to happen when it reaches the end of the line but also i can't just no see what happens when the line is really long because then i would not know how long the line could be or if the line goes off the page or if the line would just go to the next line and look nice just the way it is but without testing it first, i wouldn't know so i have to write this long sentance to figure out what exactly will happen otherwise i would be in the dark and lay awake at night now knowing what is or could be" ?>
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
    <main class="addPadding">
        <h1>Welcome to ReRecipes!</h1>
<!-- 
    Swap this out with a FOREACH loop after querying the DB

    Figure out how to dynamically load these as the page scrolls
    (maybe like a 'hidden' class and a # class for each item then
    remove the hidden class for the next 10 # class)
-->    
        <?php for($i=1; $i<=10; $i++){ ?>
        <div class="module">
            <h2 style="display: inline">Recipe <?=$i?> title   </h2><small> by [Author <?=$i?>]</small>
            <p><i>Short description: <?= $longtext?> <?=$i?>[more button?]</i></p>
            <ul>
                <li>
                    possible ingredient list
                </li>
                <li>
                    [potentially after more button/separate more button.]
                </li>
                <li>
                    [list left to right, maybe measurements]
                </li>
                <li>
                    <?= $longtext ?>
                </li>
            </ul>
            <small><?=$i?> steps</small>
        </div>
        <?php } ?>

    </main>
</html>