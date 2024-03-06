<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="./scripts/navigation.js"></script>
    <title>AudioVision|Produkte</title>
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
            <div id="welcomeText">Unsere Produkte</div>
        </div>
    </div>

    <div id="offers" class="flex">
        <?php
        $products = getProducts();
        foreach ($products as $product) {
            displayProduct($product[0], $product[1], $product[2]);
        }
        ?>
    </div>

    <div class="placeholderFooter"></div>
    <footer>
        <a href="./datenschutz.html">Datenschutz</a>
        <a href="./impressum.html">Impressum</a>
    </footer>
    <button id="post-btn">Click me</button>

    <?php
    function displayProduct($name, $price, $description)
    {
        echo '<div class="offer"> 
    <div class="offerImage absCenterTop">
        <div class="dummy"></div>
    </div>
    <div class="infotext" style="display: flex; flex-direction: column;">
        <h1>' . $name . '</h1>
        <p>' . $description . '</p>
        <div class="order">

            <p>' . $price . '€</p>
            <button class="addToCart addToCart">
                <img class="absCenter" src="./assets/shoppingCart.svg" alt="">
            </button>
        </div>
    </div>
</div>"';
    }


    function getProducts()
    {
        $servername = "localhost";
        $username = "root";
        $password = "yoursql123";
        $database = "AudioVision";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Product";
        $result = $conn->query($sql);

        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($products, array($row["name"], $row["price"], $row["description"]));
            }
        } else {
            echo "Keine Daten gefunden.";
        }

        $conn->close();


        array_push($products, array("Bow", "123", "Gut"));
        array_push($products, array("Wil", "234", "sehr gut"));
        array_push($products, array("Elac", "345", "ncith so gut"));
        return $products;
    }
    ?>
    <script>
        const buttons = document.getElementsByClassName('addToCart');

        buttons.forEach(button =>
        {
            button.addEventListener('click', async _ =>
            {
                try
                {
                    const response = await fetch('./addToCart.php?prodID=2', {
                        method: 'get',
                    });
                    console.log('Completed!', response);
                } catch (err)
                {
                    console.error(`Error: ${err}`);
                }
            });

        });

    </script>
</body>

</html>