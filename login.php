<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <title>AudioVision|Login</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "yoursql123";
$database = "AudioVision";

$conn = new mysqli($servername, $username, $password, $database);
echo "Testttt";
print_r($_GET['email']);
if(isset($_GET['email'])) {
    echo "Hello This is here";
    $email = $_GET['email'];
    $passwort = $_GET['password'];
    
    $sql = 'SELECT * FROM Costumer WHERE email = "' . $email . '"';
    echo "Querry: ". $sql ." ";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "This is Body" . $row;
            if ($result->num_rows > 0 && password_verify( $passwort, $row["password"]) ) {
                $_SESSION["costumerID"] = $row['costumerID'];
                header("Location: index.php");
die();
            }else{
                $errorMessage = "E-Mail oder Passwort war ungültig<br>";
            }
        }
    }
    
}
?>

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
        <h1>Einloggen</h1>
        <form action="?login=1" method="get" class="flex flexCenter">
            <div class="flex flexCenter">
                <input type="email" placeholder="E-Mail" name="email" id="email">
                <input type="text" placeholder="Passwort" name="password" id="password">
                <input type="submit" value="Senden">
                <a href="./register.html">Noch nicht registriert?</a>
            </div>
        </form>
    </div>



    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
</body>
</html>