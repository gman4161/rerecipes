<!--
    This is the header and footer for the website
    If called on a page with 'include', this will
    be printed to the top and bottom respectively
-->
<?php if (!(bool) session_id()) session_start();?>
    <head>
        <link rel="icon" href="./images/favicon-16x16.png">
        <link rel="stylesheet" href="./main.css">
        <script src="https://kit.fontawesome.com/ae1ae47af0.js" crossorigin="anonymous"></script>
    </head>
    <header><nav>
            <a href="index.php"><img class="logo" alt="D20 Die" src="images/logo.png"></a>
            <h1>D&amp;D 3.5e Character Tracker</h1>
            <div class="navigation" id="navLinks">
                <i class="fa fa-window-close-o" onclick="hideMenu()"></i>
                <ul>
                    <li>
                        <div class='dropdown'>
                            <a href='#' class='dropbtn'><?= (isset($_SESSION['Username']) ? $_SESSION['Username'] : "ACCOUNT") . "<b>&#9660;</b>"?></a>
                            <div class='dropcontent'>
                                <a href='account.php'>
                                    <?=isset($_SESSION['Username']) ?
                                    "Account Details" :
                                    "Create Account" ?>
                                </a>
                                <a href='./php/logout.php'>
                                    <?= isset($_SESSION['Username']) ?
                                    "Logout" : "Sign-in"?>
                                </a>
                                <a><label>
                                    <input type='checkbox' onclick="document.body.classList.toggle('dark-mode')">Dark Mode(BETA)
                                </label></a>
                            </div>
                        </div>
                    </li>
                    <li><a href="listItems.php">ITEMS</a></li>
                    <li><a href="listSpells.php">SPELLS</a></li>
                    <?= isset($_SESSION['Username']) ? "<li><a href='chooseChar.php'>CHARACTERS</a></li>":""?>
                </ul>
            </div>
            <i class="fa fa-caret-square-o-down" onclick="showMenu()"></i>
        </nav>
    </header> <hr>

    <footer>
        <hr>
        <small>Engel, Cottrell 2022</small>
    </footer>
    
    <script>
        var navLinks = document.getElementById("navLinks");
        //show the menu in the header when too small
        function showMenu(){
            navLinks.style.display="block";
            setTimeout(()=>{navLinks.style.right="0"}, 1);
        }
        //hide the menu when small header menu is open
        function hideMenu(){
            navLinks.style.right="-125px";
            setTimeout(()=>{navLinks.style.display="none"}, 250);
        }
        
        //update the changing of header from normal to small mode
        window.addEventListener("resize", reportWindowSize);
        function reportWindowSize(){
            let width = window.innerWidth;
            if (width >= 703){
                navLinks.style.display="block";
                navLinks.style.right="0";
            } else {
                navLinks.style.display="none";
                navLinks.style.right="-125px";
            }
        }
    </script>