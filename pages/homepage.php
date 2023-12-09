<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        h1 {
            color: green;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: GREY;
            background-image: url("IMG.jpg");
            background-repeat: 1;
        }

        nav.menu {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        div.menu-item {
            display: inline-block;
            margin: 0 10px;
        }

        div.menu-item a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        div.menu-item:hover {
            background-color: #555;
        }

        div.sub-menu {
            display: none;
            position: absolute;
            background-color: red;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        div.menu-item:hover div.sub-menu {
            display: block;
        }

        div.sub-menu div.menu-item {
            display: block;
            white-space: nowrap;
        }

        img {
            font-size: 1;
        }
    </style>
</head>

<body>

    <nav class="menu" role="navigation">
        <div class="menu-item"><a href="index.php">Home</a></div>
        <div class="menu-item"><a href="./pages/aboutus.php">About Us</a></div>
        <div class="menu-item" aria-haspopup="true"><a href="login.php">Client</a>
            <div class="sub-menu" aria-label="submenu">
                <div class="menu-item"><a href="login.php">Login</a></div>

            </div>

        </div>
        <div class="menu-item" aria-haspopup="true">
            <a href="./formulaire/login.php">Admin</a>
            <div class="sub-menu" aria-label="submenu">
                <div class="menu-item"><a href="login.php">Login</a></div>
            </div>
        </div>
        <div class="menu-item" aria-haspopup="true">
            <a href="#">Products</a>
            <div class="sub-menu" aria-label="submenu">
                <div class="menu-item"><a href="coat.php">Coats</a></div>
                <div class="menu-item"><a href="dress.php">Dresses</a></div>
                <div class="menu-item"><a href="jupe.php">Jupes</a></div>
                <div class="menu-item"><a href="pant.php">Pants</a></div>
                <div class="menu-item"><a href="t_shirt.php">T-shirts</a></div>
                <div class="menu-item"><a href="shirt.php">Shirts</a></div>
            </div>
        </div>
        <div class="menu-item"><a href="./pages/contactus.php">Contact Us</a></div>
    </nav>

    <footer>
        <marquee>
            <h1><i>Welcome to Diane Fashion Desingn<i></h1>
        </marquee>
        <p>&copy; <?php echo date("Y"); ?> Our shop. All rights reserved.</p>
    </footer>

</body>

</html>