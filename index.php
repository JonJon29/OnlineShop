<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <title>AudioVision</title>
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
    <div id="landingPage">
        <div class="darken">
            <div id="welcomeText">Wilkommen bei AudioVision</div>
        </div>
    </div>

    <div id="offers" class="flex">
        <h1>Angebote</h1>
        <div class="offer">
            <div class="offerImage absCenterTop">
                <div class="dummy"></div>
            </div>
            <div class="infotext" style="display: flex; flex-direction: column;">
                <h1>B&W CM7</h1>
                <p>Gut für professionelle Nutzer</p>
                <div class="order">

                    <p>1.200€</p>
                    <div class="addToCart">
                        <img class="absCenter" src="./assets/shoppingCart.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="offer">
            <div class="offerImage absCenterTop">
                <div class="dummy"></div>
            </div>
            <div class="infotext" style="display: flex; flex-direction: column;">
                <h1>B&W CM7</h1>
                <p>Perfekt für Heimanwender</p>
                <div class="order">

                    <p>1.200€</p>
                    <div class="addToCart">
                        <img class="absCenter" src="./assets/shoppingCart.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="placeholderFooter"></div>
    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
</body>
</html>