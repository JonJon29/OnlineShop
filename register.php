<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <script src="./scripts/formNavigation.js"></script>
    <title>AudioVision|Register</title>
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
   

    <div id="loginForm" class="absCenter">
        <h1>Registrieren</h1>
        <form action="" class="flex flexCenter">
            <div class="flex flexCenter" id="register1" style="display: flex;">
                <input type="email" placeholder="E-Mail" name="email" id="email">
                <input type="text" placeholder="Passwort" name="password" id="password">
                <input type="text" placeholder="Passwort wiederholen" name="password-repeate" id="password-repeate">
                <button onclick="switchTo(1)">Weiter</button>
            </div>
            <div class="flex flexCenter" id="register2" style="display: none;">
                <input type="text" placeholder="Straße" name="street" id="street">
                <input type="text" placeholder="PLZ" name="zipcode" id="zipcode">
                <input type="text" placeholder="Ort wiederholen" name="city" id="city">
                <div class="formNavigation flex flexCenter">
                    <button onclick="switchTo(0)">Zurück</button>
                    <button onclick="switchTo(2)">Weiter</button>
                </div>
            </div>
            <div class="flex flexCenter" id="register3" style="display: none;">
                <input type="text" placeholder="Kontonummer" name="bankaccountnumber" id="bankaccountnumber">
                <input type="text" placeholder="BLZ" name="blz" id="blz">
                <input type="text" placeholder="Institut" name="institut" id="institut">
                <div class="flex flexCenter formNavigation">
                    <button onclick="switchTo(1)">Zurück</button>
                    <input type="submit" value="Senden">
                </div>
            </div>
        </form>
    </div>



    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
</body>
</html>