<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <title>AudioVision|Warenkorb</title>
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

    <?php
    session_start();
    if (isset($_SESSION["costumerID"])){
        echo"Hello";
        $costumerID = $_SESSION['costumerID'];
        $counter = 1;

        $cartItems = getCart($costumerID);
        print_r($cartItems);
        foreach ($cartItems as $cartItem){
            $product = getProduct($cartItem);
            displayCartItem($product[0], $product[1], $product[2]);
        }

        displayCartItem("Bowers & Wilkins", 1200, 3);
        displayCartItem("Bowers & Wilkins", 1200, 3);
        displayCartItem("Bowers & Wilkins", 1200, 3);
    }else{
        echo 'Bitte zuerst <a href="./login.php">Einloggen</a>';
    }
    ?>

    <div class="cartProduct flex flexCenter">
        <h1 class="orderNumber" id="order1">1</h1>
        <div class="orderImageContainer flex flexCenter">
            <div class="dummy"></div>
        </div>
        <div class="orderInformation flex">
            <h1>B&W CM7</h1>
            <p>1.200,-€</p>
        </div>
        <div class="orderCount">
            <select name="count1" id="count1">
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>

    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>

<?php

$servername = "localhost";
        $username = "root";
        $password = "yoursql123";
        $database = "AudioVision";
        
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
function displayCartItem($name, $price, $amount) {
    global $counter;
        echo '<div class="cartProduct flex flexCenter">
        <h1 class="orderNumber" id="order1">' . $counter . '</h1>
        <div class="orderImageContainer flex flexCenter">
            <div class="dummy"></div>
        </div>
        <div class="orderInformation flex">
            <h1>' . $name . '</h1>
            <p>' . $price . '€</p>
        </div>
        <div class="orderCount">
            <select name="count1" id="count1">
                ' . generateSelection(5, 3) . '
            </select>
        </div>
    </div>';
    $counter++;
    }

    function getCart($costumerID) {
        global $conn;
        $sql = "SELECT * FROM Cart where costumerID = $costumerID";
        echo $sql;
        $result = $conn->query($sql);

        $cartItems = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push( $cartItems, $row['prodID']);
            }
        }else{
            return false;
        }

        return $cartItems;
    }

    function generateSelection($max, $selected) {
        $res = "";
        for($i = 0; $i <= $max; $i++ ) {
            if($i == $selected){
                $res .= ' <option value="' . $i . '" selected>' . $i . '</option>';
            }else{
                $res .= ' <option value="' . $i . '">' . $i . '</option>';
            }
        }
        return $res;
    }

    function getProduct($prodID) {
        global $conn;
        $sql = "SELECT * FROM Product WHERE prodID = $prodID";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product =  array($row["name"], $row["price"], $row["description"]);
            }
        } else {
            echo "Keine Daten gefunden.";
        }
        
        $conn->close();
    
        return $product;
    }
?>
</body>
</html>