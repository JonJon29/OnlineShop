<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <title>AudioVision|Profil</title>
</head>
<body>
    <div id="navigation" style="position: absolute; display: none;">
        <div class="flexCenter flex">
            <div class="line" style="width: 60%;"></div>
            <a href="./products.php">Produkte</a>
            <a id="cart" href="./cart.php">Warenkorb</a>
            <a id="login" href="./login.php">Login</a>
            <a id="register" href="./register.php">Registrieren</a>
            <a id="profile" href="./profile.php">Profil</a>
        </div>
    </div>
    <nav>
        <div onclick="toggleNav()" id="menu">
            <img src="./assets/menu.svg" alt="">
        </div>
        <div id="logo" class="absCenterLeft">
            <a href="./index.php">
                <img class="absCenter" src="./assets/logo.svg">
            </a>
        </div>
        <a href="./cart.php" id="shoppingCart">
                    <img class="absCenter" src="./assets/shoppingCart.svg" alt="">
        </a>
    </nav>
    <h1>Ihr Einkaufswagen</h1>

    <!-- Put Content Here -->

    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
</body>
</html>