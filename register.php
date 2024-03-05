<?php 
session_start();
$servername = "localhost";
    $username = "root";
    $password = "yoursql123";
    $database = "AudioVision";
    
    $conn = new mysqli($servername, $username, $password, $database);
?>

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
   

    <?php 
    $showFormular = true; 
 
    if(isset($_GET['register'])) {
        $error = false;
        $name = $_GET['name'];
        $lastname = $_GET['lastname'];
        $street = $_GET['street'];
        $zipcode = $_GET['zipcode'];
        $city = $_GET['city'];
        $bankaccount = $_GET['bankaccount'];
        $blz = $_GET['blz'];
        $institut = $_GET['institut'];
        $email = $_GET['email'];
        $passwort = $_GET['password'];
        $passwort2 = $_GET['password2'];
      
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $email . "Das ist die Maiukl";
            echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
            $error = true;
        }     
        if(strlen($passwort) == 0) {
            echo 'Bitte ein Passwort angeben<br>';
            $error = true;
        }
        if($passwort != $passwort2) {
            echo 'Die Passwörter müssen übereinstimmen<br>';
            $error = true;
        }
        
        if(!$error) { 
            $sql = "SELECT * FROM users WHERE email = $email";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0) {
                echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                $error = true;
            }    
        }
        
        if(!$error) {    
            $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Costumer (name, lastname, street, zipcode, city, bankaccount, blz, institut, password, email) VALUES ($name,  $lastname , $street , $zipcode , $city , $bankaccount , $blz, $institut , $passwort_hash , $email)";
            $result = $conn->query($sql);
            echo '("' . $name . '", "' . $lastname . '", "' .$street . '", ' . $zipcode . ', "' . $city . '", ' . $bankaccount . ', ' . $blz . ', "' . $institut . '", "' . $passwort_hash . '", "' . $email . '")';
            echo "This is res" . $result;
            
            /*  
            $statement = $pdo->prepare("INSERT INTO Costumer (name, lastname, street, zipcode, city, bankaccount, blz, institut, password, email) VALUES (:name, :lastname, :street, :zipcode, :city, :bankaccount, :blz, :institut, :password, :email)");
            $arr = array( 
                'name' => $name,
                'lastname' => $lastname,
                'street' => $street,
                'zipcode' => $zipcode,
                'city' => $city,
                'bankaccount' => $bankaccount,
                'blz' => $blz, 
                'institut' => $institut, 
                'password' => $passwort_hash,
                'email' => $email);
                print_r($arr);
                echo "This is the statement" . $statement;
            $result = $statement->execute($arr);
            */
            
            if($result) {        
                echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
        } 
    }
    if($showFormular) {
    ?>
    <div id="loginForm" class="absCenter">
        <h1>Registrieren</h1>
	<form action="?register=1" method="get" class="flex flexCenter">
            <div class="flex flexCenter" id="register1" style="display: flex;">
                <input type="email" placeholder="E-Mail" name="email" id="email" required>
                <input type="text" placeholder="Passwort" name="password" id="password1" required>
                <input type="text" placeholder="Passwort wiederholen" name="password2" id="password-repeate" required>
                <div class="formNavigation flex flexCenter">
                    <button onclick="switchTo(1)">Weiter</button>
                </div>
            </div>
            <div class="flex flexCenter" id="register2" style="display: none;">
                <input type="text" placeholder="Name" name="name" id="name" required>
                <input type="text" placeholder="Nachname" name="lastname" id="lastname" required>
                <input type="text" placeholder="Straße" name="street" id="street" required>
                <input type="text" placeholder="PLZ" name="zipcode" id="zipcode" required>
                <input type="text" placeholder="Ort" name="city" id="city" required>
                <div class="formNavigation flex flexCenter">
                    <button onclick="switchTo(0)">Zurück</button>
                    <button onclick="switchTo(2)">Weiter</button>
                </div>
            </div>
            <div class="flex flexCenter" id="register3" style="display: none;">
                <input type="text" placeholder="Kontonummer" name="bankaccount" id="bankaccount" required>
                <input type="text" placeholder="BLZ" name="blz" id="blz" required>
                <input type="text" placeholder="Institut" name="institut" id="institut" required>
                <div class="flex flexCenter formNavigation">
                    <button onclick="switchTo(1)">Zurück</button>
                    <input type="submit" value="Senden">
                </div>
            </div>
        </form>
    </div>

    <?php }?>

    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
</body>
</html>
