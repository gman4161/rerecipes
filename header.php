<!--
    This is the header and footer for the website
    If called on a page with 'include', this will
    be printed to the top and bottom respectively
-->
<?php if (!(bool) session_id()) session_start();?>
<head>
    <link rel="icon" href="./images/favicon-16x16.png">
    <link rel="stylesheet" href="./main.css">
</head>

<body>
    <!--
        Creates the header for all pages
    -->
    <header>
        <h1><a href="head.html">ReRecipes</a></h1>
        <nav>
            <button>Home</button>
            <button>Create/manage account</button>
            <button>Add Recipe</button>
        </nav>
    </header>

    <!--
        creates the footer for all pages
    -->
    <footer>
        <br>
        <small>Engel 2023</small>
    </footer>

    <script></script>
</body>